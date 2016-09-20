
var x,c,reg,u,c1,u1;
//function of main
function fns(){
	window.open("regis.html");
}
//function for admin
function fns1()
{var k=0;
c=document.getElementById("usr").value;	
if(c!="")
	{
		var reg=/^([a-zA-Z ]{8,})$/i;
		if(reg.test(c)==false)
			{k++;}
	}
	else
		{k++;}

		 u=document.getElementById("pw").value;
	if(u!="")
	{
		 reg=/^[a-zA-Z0-9]*$/;
		if(reg.test(u)==false)
			{k++;}
	}
	else
		{k++;}
	
	if(k==0)
	{

		if(c==="swapnil jain" && u==="1ms13cs121")
	{	alert("login success");
        window.open("admin.html");                  
    }
		else
			alert("login fail");
	}
	else
			alert("login fail");
}
//function of regis
function fns2(){
var k=0;
	 
x= Math.floor((Math.random() * 999999) + 100000);
	 c=document.getElementById("name").value;
	if(c!="")
	{
		var reg=/^([a-zA-Z ]{8,})$/i;
		if(reg.test(c)==false)
			{k++;alert("INVALID NAME");}
	}
	else
		{k++;alert("ENTER THE NAME");}

	 u=document.getElementById("usn").value;
	if(u!="")
	{
		 reg=/^[a-zA-Z0-9]*$/;
		if(reg.test(u)==false)
			{alert("INVALID USN");k++;}
	}
	else
		{alert("ENTER THE USN");k++;}

if(k==0)
	     {
			 alert("YOUR ID IS:\n"+x+"\nYOUR USER NAME IS:\n"+u);
			 <?php mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("first_db") or die("Cannot connect to database"); //Connect to database
  $password=x;
  mysql_query("INSERT INTO users (password) VALUES ('$password')");
	 ?>
	 
		  window.open("login.php");}
}
//function of login


	function fns3(){
var k=0;
	

	 c1=document.getElementById("myname").value;
	if(c1!="")
	{
		var reg=/^([a-zA-Z ]{8,})$/i;
		if(reg.test(c1)==false)
			{k++;}
	}
	else
		{k++;}

	 u1=document.getElementById("pw").value;
	if(u1!="")
	{
		 reg=/^[a-zA-Z0-9]*$/;
		if(reg.test(u1)==false)
			{k++;}
	}
	else
		{k++;}
	alert(c);
	alert("\n");
	alert(c1);
	alert("\n");
	alert(u);
	alert("\n");
	alert(u1);
	alert("\n");

if(k==0)
	     { if(c1===c && u1===u)
		  window.open("cser.html");}
else
	alert("LOGIN FAILED");
}


