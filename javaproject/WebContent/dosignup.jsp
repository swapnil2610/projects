<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>

<%@ page import ="java.sql.*" %>
<%@ page import ="javax.sql.*" %>


<%
String userid=request.getParameter("email"); 
session.putValue("userid",userid); 
String password=request.getParameter("pass"); 
String fname=request.getParameter("name"); 
Class.forName("com.mysql.jdbc.Driver"); 
java.sql.Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/javaproject",
"root","root"); 
Statement stm= con.createStatement();

// check is there any other buyer exists with the sane login

ResultSet rs=stm.executeQuery("select * from javaproject.signup where userid='"+userid+"'"); 
if(rs.next()) 
{ 
if(rs.getString(1).equals(userid))
{ 
out.println("User_id already exists!!!\n"); 	
// redirect to index page
response.sendRedirect("login.html");
}
}

//insert into data base
else 
{ 
	int i=stm.executeUpdate("insert into javaproject.signup values ('"+userid+"','"+password+"','"+fname+"')"); 
	int j=stm.executeUpdate("insert into javaproject.place_order (user_id) values ('"+userid+"')"); 
	out.println("signup successfully"); 
		  // redirect to login page
	   response.sendRedirect("index.html");
} 
%>
</body>
</html>