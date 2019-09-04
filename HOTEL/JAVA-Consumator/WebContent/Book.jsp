<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<p><%
 int guests = Integer.parseInt(request.getParameter("gnr")); 
 String city =request.getParameter("vnd");
 Consumator.Main x = new Consumator.Main(); %>
<%=x.GetPrice(guests,city) %> 
     </p>
<br>
<p>Per te vazhduar rezervimin..</p>
<br>

      <form action = "Done.jsp" method = "POST">
      	Emaili <input type="email" name="email">
         Numri i personave: <input type = "text" name = "gnr" value=<%=guests %>>
         <br />
         Vendndodhja: <input type = "text" name = "vnd"  value=<%=city %>>
         <input type = "submit" value = "Submit" />
      </form>
</body>
</html>