#include<stdio.h>
#include<conio.h>
#include <stdlib.h>
#include<string.h>
void getvalue(int i);
void search();
void display();
void delete(int m);
struct election
{
char name[20];
char dob[20];
char sir[20];
char father[20];
char mother[20];
int age;
}p[100];
int k=0;
int n=0;
int x=0;
char ch;
void getvalue(int i)
{

   printf("\nINFORMATION OF CANDIDATE %d:\n",i+1);
printf(" ENTER THE NAME(FIRST NAME) \n");
scanf("%c",&ch);
scanf("%[^\n]",p[i].name);
scanf("%c",&ch);
printf(" ENTER THE LAST NAme \n");
scanf("%[^\n]",p[i].sir);
scanf("%c",&ch);

printf(" ENTER THE DATE OF BIRTH \n");
scanf("%[^\n]",p[i].dob);
scanf("%c",&ch);
printf(" ENTER THE AGE \n");
scanf("%d",&p[i].age);
scanf("%c",&ch);
printf(" ENTER THE FATHER'S NAME \n");
scanf("%[^\n]",p[i].father);
scanf("%c",&ch);
printf(" ENTER THE MOTHER'S NAME \n");
scanf("%[^\n]",p[i].mother);



}

void search()
{
int pos[100];
char *name1;
char *name2;
name1=(char*)malloc(sizeof(char)*20);
name2=(char*)malloc(sizeof(char)*20);
int m;
int i=0;
int choice;
int j=0;
int c=0;
printf("ENTER THE NAME OF CANDIDATE\n");
scanf("%c",&ch);
scanf("[^\n]",name1);

      while(i<x)
        {
        if(strcmp(p[i].name,name1)==0)
        {
            c++;
            pos[j]=i;
            j++;
        }i++;
        }
        if(c==0)
        {
            printf("NO SUCH CANDIDATE \n");
        }
    else if(c==1)
    {printf("DETAIL IS AS FOLLOW");
        printf("\nNAME OF CANDIDATE: %s ",p[pos[0]].name);
         printf("\n FATHER NAME OF CANDIDATE: %s",p[pos[0]].father);
          printf("\n MOTHER NAME OF CANDIDATE: %s",p[pos[0]].mother);
           printf("\n DATE OF BIRTH OF CANDIDATE: %s",p[pos[0]].dob);
            printf("\n AGE OF CANDIDATE: %d",p[pos[0]].age);
            printf("\n WANT TO DELETE THE INFORMATION OF %s",p[pos[0]].name);
            printf("\n PRESS 1 FOR YES AND 2 FOR NO");
            scanf("%d",&choice);
            switch(choice)
            {case 1:delete(pos[0]);
            break;
            case 2:break;
            }
        }
    else{
    printf("THERE ARE %d CANDIDATE WITH NAME %s",c,p[pos[0]].name);
            printf("ENTER FATHER NAME \n");
            scanf("%c",&ch);
            scanf("%[^\n]",name2);

        for(i=0;i<c;i++)
     {
                m=pos[i];

         if(strcmp(p[m].father,name2)==0)

        {printf("DETAIL IS AS FOLLOW");

            printf("\n NAME OF CANDIDATE: %s ",p[m].name);
         printf("\n FATHER NAME OF CANDIDATE: %s",p[m].father);
          printf("\n MOTHER NAME OF CANDIDATE: %s",p[m].mother);
           printf("\n DATE OF BIRTH OF CANDIDATE: %s",p[m].dob);
            printf("\n AGE OF CANDIDATE: %d",p[m].age);
              printf("\n WANT TO DELETE THE INFORMATION %s",p[m].name);
            printf("\nPRESS 1 FOR YES AND 2 FOR NO");
            scanf("%d",&choice);
            switch(choice)
            {case 1:delete(m);
            break;
            case 2:break;
            }
     }
       }

    }

}
void delete(int m)
{int i;
if(m<(x-1)){
for(i=m;i<(x-1);i++){
p[m]=p[m+1];
}x--;
k--;
printf("THE CANDIDATE INFORMATION IS DELETD");}
else if(m==(x-1))
{
printf("THE CANDIDATE INFORMATION IS DELETD");
    k--;x--;
}
else printf("NO SUCH CANDIDATE EXIST");


}


void display()
{int i;
     for(i=0;i<(x-1);i++)
    {printf("\nINFORMATION OF CANDIDATE: %d\n",i+1);
         printf("\n NAME OF CANDIDATE: %s ",p[i].name);
         printf("\n FATHER NAME OF CANDIDATE: %s",p[i].father);
          printf("\n MOTHER NAME OF CANDIDATE: %s",p[i].mother);
           printf("\n DATE OF BIRTH OF CANDIDATE: %s",p[i].dob);
            printf("\n AGE OF CANDIDATE: %d",p[i].age);

    }
}
int main()
{int z;
    int a=0;
    int g,choice,i;
printf(".......WELCOME TO ELECTION COMMISION.....\n");
while(a==0)
    {printf("          ......MENU.....\n  ");
printf("PRESS 1 TO SUBMIT THE INFORMATION ABOUT CANDIDATE\n");
printf("PRESS 2 TO SEARCH THE INFORMATION ABOUT CANDIDATE\n");
printf("PRESS 3 TO DELETE THE INFORMATIONIDATE ABOUT CANDIDATE\n");
printf("PRESS 4 TO DISPLAY THE INFORMATION ABOUT CANDIDATE\n");

scanf("%d",&choice);

            switch(choice)
{
    case 1:
       {printf("ENTER THE NUMBER OF CANDIDATE\n");
   scanf("%d",&n);

   for(i=k;i<(k+n);i++)
            getvalue(i);
            k+=n;
            x=i+1;}
    break;
    case 2:search();
    break;
    case 4: display();
    break;
    case 3:
        {printf("ENTER THE THE CANDIDATE'S NUMBER TO BE DELETED");
        scanf("%d",&z);
            delete(z-1);}
            break;
    default:
        printf("WRONG ENTRY");

}choice=0;
a=0;
 printf("\n PRESS 0 TO GET BACK TO MAIN MENU");
scanf("%d",&g);

a=g;
}
return 0;
}
