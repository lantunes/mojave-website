<?php

session_start();
if ($_POST['submit_check'] == '1')
{
  $name = htmlspecialchars(trim($_POST['name']));
  $_SESSION['name'] = $name;
  $email = htmlspecialchars(trim($_POST['email']));
  $_SESSION['email'] = $email;
  $subject = htmlspecialchars(trim($_POST['subject']));
  $_SESSION['subject'] = $subject;
  $message = htmlspecialchars(trim($_POST['message']));
  $_SESSION['message'] = $message;
  $norobots = htmlspecialchars(trim($_POST['norobots']));
  $errors = array();
  if (strlen($name) == 0)
  {
    $errors[] = 'You must enter your name.';
  }
  if (strlen($email) == 0)
  {
    $errors[] = 'You must enter your email.';
  }
  if (strlen($message) == 0)
  {
    $errors[] = 'You must enter a message.';
  }
  if ( md5($norobots) != $_SESSION['randomnr2'])
  {
    $errors[] = 'You must enter the code you see in the image.';
  }
 
  if (count($errors) == 0)
  {

    $formatted_message = 'Sender ' . $name . ' sent a question from the mojavemvc.org website'. "\n" .
        'Their email is: ' . $email . "\n" . 'Message:' . "\n"  . $message;

    mail('Lantunes@gmail.com', $subject, $formatted_message, 'From: Mojave MVC Website <mojavemvc@mojavemvc.org>');
    session_unset();
    session_destroy();
    $_SESSION = array();
  }
}

?>
<html>
 <?php define("TITLE", "Send"); ?>
 <?php include "../mojavemvc-php-incl/head.php" ?>
 <body>	
 <table id="maintable" width="100%" border="0" cellpadding="0" cellspacing="0">

  <?php include "../mojavemvc-php-incl/banner.php" ?>
 
  <?php include "../mojavemvc-php-incl/menu.php" ?>

<tr>
 <td align="center" valign="middle">
  <table width="400px" border="0" cellpadding="10" cellspacing="10">
   <tr>
    <td align="center" valign="middle">
     <p class="text">
      <?php
       if ($_POST['submit_check'] == '1' && count($errors) != 0)
       {
        print 'There was a problem with the form:<br/>';
	for ($i = 0; $i < count($errors); $i++)
        {
         print $errors[$i] . '<br/>';
        }
       print 'Please <a href="feedback" class="menulink">try again</a>.';
       }
       elseif ($_POST['submit_check'] == '1' && count($errors) == 0)
       {
        print 'Thank you for your message! If requested, you will be contacted shortly.';
       }
       else
       {
        print 'Please use the <a href="feedback" class="menulink">feedback page</a> to send a message.';
       }
      ?>
     </p>
    </td>
   </tr>
  </table>
 </td>
</tr>

 <?php include "../mojavemvc-php-incl/footer.php" ?>

 </table>
 </body>
</html>
