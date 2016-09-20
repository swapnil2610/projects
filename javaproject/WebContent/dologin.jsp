<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
<body>
	<%@ page import="java.sql.*"%>
	<%@ page import="javax.sql.*"%>
	<%
String userid=request.getParameter("email"); 
session.putValue("userid",userid);
String password=request.getParameter("pass"); 
Class.forName("com.mysql.jdbc.Driver"); 
java.sql.Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/javaproject","root","root"); 
Statement stm= con.createStatement(); 
ResultSet rs=stm.executeQuery("select * from javaproject.signup where userid='"+userid+"'"); 
if(rs.next()) 
{ 
if(rs.getString(2).equals(password))
{ 
out.println("welcome "+userid); 
response.sendRedirect("home.html");
} 
else 
{ 
out.println("Invalid password try again and userid"); 
} 
} 
else 
%>
<a href="index.html">Home</a>
</body>
</html>