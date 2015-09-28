<?php define("TITLE", "Downloads"); ?>
<?php include "../mojavemvc-php-incl/page-top.php" ?>
<?php include_once "../mojavemvc-php-incl/geshify.php"; ?>

<table width="400px" border="0" cellpadding="10" cellspacing="10">
 <tr>
  <td align="center">
   <table cellspacing="15">
    <tr>
	  <td>
	    <span class="smalltext">Apache Maven</span>
<?php
echo geshify('<dependency>
  <groupId>org.mojavemvc</groupId>
  <artifactId>mojave-core</artifactId>
  <version>1.0.6</version>
</dependency>','xml');
?>
	  </td>
	</tr>
   </table>
  </td>
 </tr>
</table>

<?php include "../mojavemvc-php-incl/page-bottom.php" ?>
