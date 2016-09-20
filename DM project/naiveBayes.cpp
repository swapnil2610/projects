#include <bits/stdc++.h>
using namespace std;

#define sz(arr)	arr.size()
#define pb 		push_back
#define PI 		3.142
int ll;
void load(string filename , vector< vector<double> > &trainingSet , vector< vector<double> > &testSet)
{
	ifstream fin(filename.c_str());
	string s;
	while(1)
	{
		getline(fin,s);
		if(s.size() == 0) break;
		for(int i = 0; i < sz(s); i++)
			if(s[i] == ',')
				s[i] = ' ';
		double val;
		vector<double> curr;
		stringstream iss(s);
		while(iss >> val)
			curr.push_back(val);
		if(trainingSet.size() < ll)
			trainingSet.push_back(curr);
		else
			testSet.push_back(curr);
	}
}

double mean(vector<double> arr)
{
	double ret = 0;
	for(int i = 0; i < sz(arr); i++)
		ret += arr[i];
	return (ret / (sz(arr)));
}

double stdev(vector<double> arr)
{
	double avg = mean(arr);
	double variance = 0;
	for(int i = 0; i < sz(arr); i++)
	{
		double v = arr[i] - avg;
		variance += v*v;
	}
	variance /= (sz(arr) - 1);
	return sqrt(variance);
}

double calculateProbability(double x , double mean , double stdev)
{
	double ex = exp(-(pow(x-mean,2) / (2*pow(stdev,2))));
	return (1.0 / (sqrt(2*PI) * stdev)) * ex;
}

vector< vector< vector<double> > > separateByClass(vector< vector<double> > arr)
{
	vector< vector< vector<double> > > ret(2);
	for(int i = 0; i < sz(arr); i++)
	{
		int lst = sz(arr[i]) - 1;
		int val = arr[i][lst];
		ret[val].pb(arr[i]);
	}
	return ret;
}

vector< pair<double,double> > summarize(vector< vector<double> >a)
{
	vector< pair<double,double> > ret;
	int attr = sz(a[0]) - 1;
	for(int i = 0; i < attr; i++)
	{
		vector<double> arr;
		for(int j = 0; j < sz(a); j++)
			arr.pb(a[j][i]);
		ret.pb(make_pair(mean(arr) , stdev(arr) ));
	}
	return ret;
}

vector< vector< pair<double,double> > > summarizeByClass(vector< vector<double> > arr)
{
	vector< vector< vector<double> > > S = separateByClass(arr);
	vector< vector< pair<double,double> > > ret;
	for(int i = 0; i < 2; i++)
	{
		ret.pb(summarize(S[i]));
	}
	return ret;
}

vector<double> calculateClassProbabilities(vector< vector< pair<double,double> > > summaries , vector<double> inputVector)
{
	vector<double> prob(2);
	for(int classValue = 0; classValue < 2; classValue++)
	{
		prob[classValue] = 1.0;
		vector< pair<double,double> > arr = summaries[classValue];
		for(int i = 0; i < sz(arr); i++)
		{
			double mean = arr[i].first;
			double stdev = arr[i].second;
			double x = inputVector[i];
			prob[classValue] *= calculateProbability(x,mean,stdev);
		}
	}
	return prob;
}

int predict(vector< vector< pair<double,double> > > summaries , vector<double> inputVector)
{
	vector<double> prob = calculateClassProbabilities(summaries , inputVector);
	if(prob[0] > prob[1])
		return 0;
	else
		return 1;
}

vector<int> getPredictions(vector< vector< pair<double,double> > > summaries , vector< vector<double> > res)
{
	vector<int> ret;
	for(int i = 0; i < sz(res); i++)
		ret.pb(predict(summaries , res[i]));
	return ret;
}

double getAccuracy(vector< vector<double> > given , vector<int> predictions)
{
	int ac = 0 , tot = 0;
	int lst = sz(given[0]) - 1;
	for(int i = 0; i < sz(predictions); i++)
	{
		if(given[i][lst] == predictions[i])
			ac++;
		tot++;
	}
	return ((ac*100.0) / tot);
}

int main()
{
    cout<<"enter the division size"<<endl;
    cin>>ll;
	vector< vector<double> > trainingSet , testSet;
	load("data.csv" , trainingSet , testSet);
	vector< vector< pair<double,double> > > summaries = summarizeByClass(trainingSet);
	vector<int> pred = getPredictions(summaries , testSet);
	double acc = getAccuracy(testSet , pred);
	printf("Accuracy : %.4lf\n", acc);
	return 0;
}
