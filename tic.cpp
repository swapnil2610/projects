#include<iostream>
using namespace std;
int m[10][10];int n=1;
int oi[10];int z;
int res();
void display()
{
int i,j;int k=1;
cout<<"THE NUMBER BELOW DENOTES THE POSITION"<<endl<<endl;
for(i=0;i<3;i++){
for(j=0;j<3;j++)
{m[i][j]=k;k++;}}
for(i=0;i<3;i++){
for(j=0;j<3;j++)
{cout<<m[i][j]<<"  ";
}cout<<endl;}
cout<<endl;
for(i=0;i<10;i++)
    oi[i]=0;
    for(i=0;i<3;i++){
for(j=0;j<3;j++)
    m[i][j]=10;}
}

void input()
{int k,i,j,l;int c;int p=1;
 while(n<=9)
{
if(n%2==0)
cout<<"player 2 enter the position "<<endl;
else
cout<<"player 1 enter the position "<<endl;
cout<<"->";
cin>>l;
if(n%2==0)
    c=0;
else c=1;
switch(l){
case 1:m[0][0]=c;break;
    case 2:m[0][1]=c;break;
case 3:m[0][2]=c;break;
    case 4:m[1][0]=c;break;
case 5:m[1][1]=c;break;
    case 6:m[1][2]=c;break;
case 7:m[2][0]=c;break;
    case 8:m[2][1]=c;break;
case 9:m[2][2]=c;break;
}cout<<endl;
for(i=0;i<3;i++){
for(j=0;j<3;j++){
    if(m[i][j]==0 || m[i][j]==1)
   cout<<m[i][j]<<" ";
   else cout<<"_"<<" ";}
   cout<<endl;}
    cout<<endl;
if(n>=5)
{
    for(i=0;i<3;i++)//horizontal
   {
    oi[0]=0;oi[1]=0;
    for(j=0;j<3;j++)
   {
      k=m[i][j];
      if(k==0)
      oi[0]++;
      else if(k==1)
      oi[1]++;
   }
   if((oi[0]==3)||(oi[1]==3))
            break;
   }
    for(i=0;i<3;i++)//vertical
   {
    oi[2]=0;oi[3]=0;
    for(j=0;j<3;j++)
   {
      k=m[j][i];
      if(k==0)
      oi[2]++;
      else if(k==1)
      oi[3]++;
   }
   if(oi[2]==3||oi[3]==3)
            break;
   }
           oi[4]=0;oi[5]=0;
    for(i=0;i<3;i++)
   {
    for(j=0;j<3;j++)          //diagonal
   {   if(i==j){
        k=m[i][j];
      if(k==0)
      oi[4]++;
      else if(k==1)
      oi[5]++;}
   }
   }oi[6]=0;oi[7]=0;
    k=m[0][2];
      if(k==0)
      oi[6]++;
      else if(k==1)
      oi[7]++;
       k=m[1][1];
      if(k==0)
      oi[6]++;
      else if(k==1)
      oi[7]++;
       k=m[2][0];
      if(k==0)
      oi[6]++;
      else if(k==1)
      oi[7]++;
}
z=res();
if(z==0)
    {cout<<"player 2 is winner"<<endl;break;}
else if(z==1)
    {cout<<"player 1 is winner"<<endl;break;}

n++;
}
if(z==4)
    cout<<"draw"<<endl;
}

int res()
{
    if(oi[0]==3||oi[2]==3||oi[4]==3||oi[6]==3)
        return 0;
   else  if(oi[1]==3||oi[3]==3||oi[5]==3||oi[7]==3)
        return 1;
        else return 4;
}
int main()
{int i,j;int a=0;
 while(a==0){
        display();
    input();
      cout<<"press 0 to continue"<<endl;
      cin>>a;  }

/*for(i=0;i<3;i++){
for(j=0;j<3;j++){
    if(m[i][j]==0 || m[i][j]==1)
   cout<<m[i][j]<<" ";
   else cout<<"_"<<" ";}
   cout<<endl;}*/
    return 0;
    }
