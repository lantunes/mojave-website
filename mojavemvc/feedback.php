<?php session_start(); ?>
<?php define("TITLE", "Feedback"); ?>
<?php include "../mojavemvc-php-incl/page-top.php" ?>

<table width="420px" border="0" cellpadding="10" cellspacing="10">
 <tr>
  <td>
   <p class="regtext">
    We'd be happy to hear from you. If you have questions, 
	please post them to <a class="sitelink" href="http://groups.google.com/group/mojave-mvc" target="_blank">our Google Groups discussion group</a>. You can use this forum to post questions about the Mojave MVC Java web framework, or start a discussion related to it. We're really interested in hearing about your experiences using the framework, including what you like or don't like about it. If you are currently using it for one of your projects, please post a short description. We'd really like to hear any kind of feedback you may have--good or bad!
   </p>
   <p class="regtext">
    Alternatively, you can provide feedback using this form. We'd like to hear
    your feedback, and we'll try our best to answer any questions you may
    have.
   </p>
  </td>
 </tr>
</table>

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

<?php include "../mojavemvc-php-incl/page-bottom.php" ?>
