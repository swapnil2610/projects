#include<iostream>
#include<vector>
#include<cstdio>
#include<new>
using namespace std;
class kbc
{
    char name[20];
    int c=0;int s,ch,id,j;int x[6]={0,0,0,0,0,0};int m=0;
    public:
    kbc(){}
    kbc(int i)
     {
      cout<<"___________________________________________________________"<<endl<<endl;
      cout<<"  CANDIDATE "<<i+1<<"::"<<endl;
      cout<<"  ENTER YOUR NAME "<<endl<<"->";
      cin>>name;
      id=19606+((i+1)*9);
      cout<<"  YOUR USER ID IS:"<<"AXD"<<id<<endl<<endl;
      cout<<"  REGISTER FOR THE SUBJECT"<<endl;
      cout<<"  * 311 FOR DMS "<<endl;
      cout<<"  * 312 FOR OPPS"<<endl;cout<<"->";
      cin>>ch;
      cout<<"___________________________________________________________"<<endl;
     }
    kbc getpass();
    void que(int a);
    friend int pass(kbc ob1);
    friend void winner(kbc s);
    friend int view(kbc d,kbc ab,int i);
};

int main()
{kbc ab;
vector<kbc> ob;
int p,a,f,l,s,n,o,i,choice;f=1;
l=0;p=0;o=0;
cout<<"___________________________________________________________"<<endl<<endl;
cout<<"*****************WELCOME TO WORLD OF QUIZ*****************"<<endl<<endl;
cout<<"___________________________________________________________"<<endl<<endl;
//while(f==1){
cout<<"  ENTER THE NUMBER OF CANDIDATE"<<endl;cout<<"->";
cin>>n;
for(i=l;i<(n+l);i++){
ob.push_back(kbc(i));
a=pass(ob[i]);
if(a==1)
ob[i].que(0);
else
cout<<"  WRONG PASSWORD"<<endl;p+=a;

}cout<<endl;
if(p>=1){
cout<<"___________________________________________________________"<<endl;
cout<<"  CANDIDATES RESPONSE ARE CHECKED"<<endl;}
cout<<"___________________________________________________________"<<endl;
while(p>=1){
cout<<"  PRESS 1 TO VIEW SCORE OF EVERYONE"<<endl;
cout<<"  PRESS 2 TO VIEW MARKS"<<endl;
cout<<"  PRESS 3 T0 VIEW CORREECT ANSWER"<<endl;cout<<"->";
cin>>choice;
switch(choice)
{
case 3:{
     ab.getpass();
    for(i=0;i<(n+l);i++)
    {
    o=view(ob[i],ab,1);
    if(o==1)
        break;}if(o==0) cout<<" WRONG ID"<<endl;
        }break;
case 2:{
    ab.getpass();
    for(i=0;i<(n+l);i++)
    {
    o=view(ob[i],ab,0);
    if(o==1)
        break;
             }if(o==0) cout<<" WRONG ID"<<endl;
    }break;
case 1:
    {
    cout<<"  NAME"<<"       "<<"     MARKS"<<"       "<<"     PERFORMANCE"<<endl;
    for(i=0;i<(n+l);i++)
    winner(ob[i]);
    }break;
default:
    cout<<"  WRONG CHOICE";

}
cout<<"  PRESS 0 TO EXIT"<<endl;cout<<"->";
cin>>p;
}if(a==0)
cout<<"  THE PLAYER ARE DISQULIFIED"<<endl;
cout<<"___________________________________________________________"<<endl;
/*cout<<"  WANT TO START QUIZ AGAIN"<<endl<<"  PRESS 1"<<endl;cout<<"->";
cin>>f;l=n;
}*/
}
kbc kbc::getpass()
{int e;
cout<<"  ENTER THE ID NUMBER"<<endl;cout<<"-> AXD";
cin>>e;
id=e;
return *this;
}
int pass(kbc ob1)
{
int k;
cout<<"  TO GET STARTED";
cout<<"  ENTER YOUR ID"<<endl;
cout<<"  -> AXD";
cin>>k;

if(ob1.id==k)
return 1;
else
return 0;
}
void winner(kbc s1)
{int k =(s1.c*5)+s1.m;

    if(k==25)
  cout<<"  "<<s1.name<<"               "<<k<<"               "<<"GOOD"<<endl;
  else if((k>=15)&&(k<25))
  cout<<"  "<<s1.name<<"             "<<k<<"              "<<"AVERAGE"<<endl;
  else
  cout<<"  "<<s1.name<<"              "<<k<<"                "<<"POOR"<<endl;
  cout<<"___________________________________________________________"<<endl;
  cout<<endl;
}
int view(kbc d,kbc ab,int a)
{

    if(d.id==ab.id)
        {
            if(a==0)
        {cout<<"  TOTAL MARKS ARE:"<<((d.c*5)+d.m)<<endl;
                return 1;   }
         if(a==1){
             if(d.s==1)
         d.que(1);
         else
            cout<<" ->CANDIDATE RULED OUT "<<endl;
         return 1;}
         }
         else return 0;}





void kbc::que(int a)
{int i=0;
int j;
if(ch==311){
cout<< "****************<----DMS--->******************"<<endl<<endl;
cout<<"<1>     "<<"(P->Q)^(Q->R)<=>"<<endl<<endl;

cout<<"        1>  R->P               2>  P->R"<<endl<<endl;
cout<<"        3>  T                  4>  ~P->R "<<endl<<endl;
if(a==1)
   {
    cout<<"        CORRECT ANSWER IS: 2> P->R"<<endl<<endl;
    cout<<"        YOUR RESPONSE IS---->"<<x[1]<<endl<<endl;
   }
else{cout<<"->";cin>>x[1];
if(x[1]==2)
c++;else m--; }

cout<<"<2>      "<<"TO HAVE A EULER TRAIL ALL VERTEX SHOULD HAVE________DEGREE EXECPT______  ";

cout<<endl<<endl;
cout<<"         1>  2,EVEN              2>  ODD,4"<<endl<<endl;
cout<<"         3>  ODD,2               4>  EVEN,2 "<<endl<<endl;
if(a==1)
   {
    cout<<"         CORRECT ANSWER IS: 4> EVEN ,2"<<endl<<endl;
     cout<<"        YOUR RESPONSE IS---->"<<x[2]<<endl<<endl;}

else{cout<<"->";cin>>x[2];
if(x[2]==4)
c++;else m--;}

cout<<"<3>       "<<"A:(1,2,3) R=((1,1),(2,2),(3,3)) IS  "<<endl;
cout<<endl;
cout<<"          1>  REFLEXIVE             2>  ANTISYMETRIC"<<endl<<endl;
cout<<"          3>  EQUVILENCE            4>  NONE OF THE ABOVE"<<endl<<endl;
if(a==1)
   {
    cout<<"          CORRECT ANSWER IS: 3> EQUIVALENCE"<<endl<<endl;
     cout<<"         YOUR RESPONSE IS---->"<<x[3]<<endl<<endl;
     }
else{cout<<"->";cin>>x[3];
if(x[3]==3)
c++;else m--;}

cout<<"<4>        "<<" A GRAPH G  WITH NO MULTIPLE EDGES OR LOOPS IS CALLED____ GRAPH   "<<endl<<endl;

cout<<"            1>  NULL                  2>  MULTIGRAPH"<<endl<<endl;
cout<<"            3>  SIMPLE                4>  STRAIGHT "<<endl<<endl;
if(a==1){
    cout<<"            CORRECT ANSWER IS: 3> SIMPLE"<<endl<<endl;
     cout<<"           YOUR RESPONSE IS---->"<<x[4]<<endl<<endl;}
else{cout<<"->";cin>>x[4];
if(x[4]==3)
c++;else m--;}

cout<<"<5>    "<<" IF (A,R) IS A POSET THEN,X BELONGS TO A IS A ____IF X R a !V a BELONGS TO A "<<endl<<endl;

cout<<"        1>  LEAST ELEMENT             2>  LOWER BOUND"<<endl<<endl;
cout<<"        3>  GREATEST ELEMENT          4>  MINIMAL ELEMENT "<<endl<<endl;
if(a==1){
    cout<<"        CORRECT ANSWER IS: 1> LEAST ELEMENT"<<endl;
     cout<<"       YOUR RESPONSE IS---->"<<x[5]<<endl<<endl;
     cout<<"         CORRECT ANSWERED"<<" -> "<<c<<endl;
     cout<<"         WRONG ANSWERED -> "<<(-1*m)<<endl; }
else{cout<<"->";cin>>x[5];
if(x[5]==1)
c++;else m--;
cout<<"  YOUR RESPONSES ARE LOCKED"<<endl<<endl;}

}
else if(ch==312){
    cout<< "****************<----OPPS--->******************"<<endl<<endl;;
cout<<"<1>     "<<"THIS CONCEPT OF THIS POINTER CAN NOT BE USED IN______"<<endl<<endl;

cout<<"        1>  MEMBER FUNCTION               2>  INLINE FUNCTIONS"<<endl<<endl;
cout<<"        3>  FRIEND FUNCTION               4>  OVERLOADED FUNCTIONS "<<endl<<endl;
if(a==1)
   {
    cout<<"        CORRECT ANSWER IS: 3>  FRIEND FUNCTION"<<endl<<endl;
    cout<<"        YOUR RESPONSE IS---->"<<x[1]<<endl<<endl;
   }
else{cout<<"->";cin>>x[1];
if(x[1]==3)
c++;else m--;}

cout<<"<2>      "<<"A CLASS THAT CONTAINS ATLEAST ONE_____ IS SAID TO BE ABSTRACT";

cout<<endl<<endl;
cout<<"         1>  VIRTUAL FUNCTION              2>  PURE VIRTUAL FUNCTION"<<endl<<endl;
cout<<"         3>  INLINE FUNCTION               4>  GENRIC FUNCTION "<<endl<<endl;
if(a==1)
   {
    cout<<"        CORRECT ANSWER IS: 2> PURE VIRTUAL FUNCTION "<<endl<<endl;
     cout<<"        YOUR RESPONSE IS---->"<<x[2]<<endl<<endl;}

else{cout<<"->";cin>>x[2];
if(x[2]==2)
c++;else m--;}

cout<<"<3>       "<<"PROTECTED DATA MEMBER REMAINS PROTECTED ,PRIVATE DATA MEMBER REMAIN PRIVATE WHEN INHERITED  "<<endl;
cout<<endl;
cout<<"          1>  TRUE,TRUE               2>  FALSE,FALSE"<<endl<<endl;
cout<<"          3>  FALSE,TRUE              4>  TRUE,FALSE"<<endl<<endl;
if(a==1)
   {
    cout<<"         CORRECT ANSWER IS: 4> TRUE,FALSE"<<endl<<endl;
     cout<<"         YOUR RESPONSE IS---->"<<x[3]<<endl<<endl;}
else{cout<<"->";cin>>x[3];
if(x[3]==4)
c++;else m--;}

cout<<"<4>        "<<" XY OB=XY(102);  : WHERE XY IS A CLASS NAME IS VALID "<<endl<<endl;

cout<<"            1>  FALSE                  2>  TRUE"<<endl<<endl;

if(a==1){
    cout<<"           CORRECT ANSWER IS: 2> TRUE"<<endl<<endl;
     cout<<"           YOUR RESPONSE IS---->"<<x[4]<<endl<<endl;}
else{cout<<"->";cin>>x[4];
if(x[4]==2)
c++;else m--;}

cout<<"<5>    "<<"CAN WE EXPLICITLY OVEERLOADING OF GENERIC FUNCTION POSSIBLE? "<<endl<<endl;

cout<<"        1>  TRUE,UNDER SOME CONDITIONS     2>  TRUE"<<endl<<endl;
cout<<"        3>  SOMETIME YES SOMETIME NO       4>  FALSE "<<endl<<endl;
if(a==1){
    cout<<"       CORRECT ANSWER IS: 2> TRUE"<<endl<<endl;
     cout<<"       YOUR RESPONSE IS---->"<<x[5]<<endl<<endl;
     cout<<"         CORRECT ANSWERED"<<" -> "<<c<<endl;
     cout<<"         WRONG ANSWERED -> "<<(-1*m)<<endl; }
else{cout<<"->";cin>>x[5];
if(x[5]==2)
c++;else m--;
cout<<"  YOUR RESPONSES ARE LOCKED"<<endl<<endl;}

}
    else cout<<" YOUR COURSE REGISTRATION IS WRONG"<<endl;
s=1;
}






