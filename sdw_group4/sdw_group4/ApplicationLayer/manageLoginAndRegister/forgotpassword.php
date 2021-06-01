<?php
require_once '../../BusinessLayer/controller/manageLoginAndRegisterController.php';
$user = new manageLoginAndRegisterController();

if(isset($_POST['login'])){
    $user->custLogin();
}
?>
<html>
<head>
  <title>Reset password</title>
  <link href="../../css/design.css" rel="stylesheet">
</head>
<body>
<body bgcolor="#ffffe6">
  <table id="top" height="9%" width="100%">
    <tr height="4%" valign="center">
      <th align="left" width="33.3%"> <img src="../../images/GUIImages/courier.png" width="25" height="25"> Speeda</th>
      <th align="center" > 100% Guaranteed Dispatch </th>
      <th align="right" width="33.3%"> <input type="button" onclick="window.location.href='Login.php'" value="Login" style="margin-right:50px "> <input type="button" onclick="window.location.href='CustomerSignup.php'" value="Sign up"></th>
    </tr>
    <tr height="6.6%">
      <td></td>
      <td colspan="2" valign="center" align="right"> <input type="button" onclick="window.location.href='Homepage.php'" value="Home" style="margin-right:40px">   <input type="button" onclick="window.location.href='About.php'" value="About us" style="margin-right:40px">   <input type="button" onclick="window.location.href='Service.php'" value="Our Service" style="margin-right:40px"> <input type="button" onclick="window.location.href='ContactUs.php'" value="Contact us" style="margin-right:40px">   <input type="button" onclick="window.location.href='Faq.php'" value="FAQ" style="margin-right:50px"></td>
    </tr>
  </table>
  <form action="" method="POST">
  <table id="scd_detail" width="30%" height="72.5%" align="center">
    <tr> <hr>
      <th align="center" colspan="2"><h1>Reset Password</h1> </th>
    </tr>
    <tr>
      <td align="right">Email: </td>
      <td align="center"><input type="text" name="email" size="30" required> <br></td>
    </tr>
    <tr>
      <td align="right">Account type: </td>
      <td align="center"><select name="user_type" required>
        <option value="Customer">Customer</option>
        <option value="Service Provider">Service Provider</option>
        <option value="Runner">Runner</option></select> <br></td>
    </tr>
    <tr>
      <td align="center" colspan="2"> <input type="submit" name="reset" value="Reset" style="height: 30px;width: 60px"> </td>
    </tr>
  </table>
  </form>
  </html>