<?php session_start(); ?>
<html>
<head>
<?php define("TITLE", "Feedback"); ?>
<?php include "../mojavemvc-php-incl/head.php" ?>
</head>
<body>

<table id="maintable" width="100%" border="0" cellpadding="0" cellspacing="0">

<?php include "../mojavemvc-php-incl/banner.php" ?>

<?php include "../mojavemvc-php-incl/menu.php" ?>

<tr>
 <td valign="middle" align="center">
  <table width="420px" border="0" cellpadding="10" cellspacing="10">
   <tr>
    <td>
<p class="regtext">
Please feel free to provide feedback using this form. We'd like to hear
your feedback, and we'll try our best to answer any questions you may
have.
</p>
    </td>
   </tr>
  </table>
 </td>
</tr>

<tr>
 <td align="center" valign="middle">
  <table width="400px" border="0" cellpadding="10" cellspacing="10">
   <tr>
    <td align="center" valign="middle">

<form id="Form1" enctype="multipart/form-data" action="send" method="post">
 <input type="hidden" value="1" name="submit_check">
 <table border="0" cellpadding="0" cellspacing="0">
  <tr>
   <td>
    <span class="text">Name: <span class="red">*</span> </span>
   </td>
   <td>
    <input type="text" value="<?=$_SESSION['name'];?>" name="name" class="inputtext">
   </td>
  </tr>
  <tr>
   <td>
    <span class="text">Email: <span class="red">*</span> </span>
   </td>
   <td>
    <input type="text" value="<?=$_SESSION['email'];?>" name="email" class="inputtext">
   </td>
  </tr>
  <tr>
   <td>
    <span class="text">Subject: </span>
   </td>
   <td>
    <input type="text" value="<?=$_SESSION['subject'];?>" name="subject" class="inputtext">
   </td>
  </tr>
  <tr>
   <td colspan="2">
    <span class="text">Message: <span class="red">*</span> </span>
   </td>
  </tr>
  <tr>
   <td colspan="2">
    <textarea cols="34" rows="7" id="messagearea" name="message"><?=$_SESSION['message'];?></textarea>
   </td>
  </tr>
  <tr>
   <td colspan="2">
    <div id="captcha"><img src="captcha.php"></div>
   </td>
  </tr>
  <tr>
   <td colspan="2">
    <div id="norobots">
     <span class="text">Please enter the code above: <span class="red">*</span> </span><input type="text" name="norobots" id="norobotstext">
    </div>
   </td>
  </tr>
  <tr>
   <td colspan="2">
    <input type="submit" value="Send" id="submitbutton">
   </td>
  </tr>
 </table>
</form>

    </td>
   </tr>
  </table>
 </td>
</tr>

<?php include "../mojavemvc-php-incl/footer.php" ?>

</table>

</body>
</html>
