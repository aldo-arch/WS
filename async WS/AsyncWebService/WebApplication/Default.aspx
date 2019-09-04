<%@ Page  Async="true" Language="C#" AutoEventWireup="true" CodeBehind="Default.aspx.cs" Inherits="WebApplication._Default" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head runat="server">
    <title>Untitled Page</title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
    <asp:Button ID="btnService" runat="server" onclick="btnService_Click" 
        Text="Sinkrone" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <asp:Label ID="lblResult" runat="server"></asp:Label>
        <br />
    
        <br />
    
    </div>
    <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Pastro" />
    &nbsp;&nbsp;&nbsp;&nbsp;
    <br />
    <br />
    <asp:Button ID="btnServiceAsync" runat="server" onclick="btnServiceAsync_Click" 
        Text="Josinkrone" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <asp:Label ID="lblResult0" runat="server"></asp:Label>
    <br />
    <asp:Label ID="lblResult1" runat="server" ForeColor="#FF3300" Height="500px" 
        Width="1000px"></asp:Label>
    <br />
    <asp:Label ID="lblResult2" runat="server" ForeColor="#0033CC" Height="500px" 
        Width="1000px"></asp:Label>
    <br />
    <br />
    </form>
</body>
</html>
