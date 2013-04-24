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
    <tr>
     <td style="padding-top:20px">
      <a  style="text-decoration:none;font-family:arial;font-size:10pt" href="files/mojave-core-1.0.6.jar">Mojave MVC v1.0.6 jar</a><br/>
      <div class="smalltext" style="padding-top:6px">
       md5: 610A93FA6BA720DCB6479ACEC5946A93<br/>
       sha1: A97AB30D53A566CD04C65D306E6759FE5049ACAF
      </div>
     </td>
    </tr>      
    <tr>
     <td style="padding-top:20px">
      <a  style="text-decoration:none;font-family:arial;font-size:10pt" href="files/mojave-core-1.0.6-all.jar">Mojave MVC v1.0.6 jar with all dependencies</a><br/>
      <div class="smalltext" style="padding-top:6px">
       md5: 541739031211373748B39B6761C6861D<br/>
       sha1: E6514457A3F54F1703504DEAC6514F66032F15EC
      </div>
     </td>
    </tr>      
   </table>
  </td>
 </tr>
</table>

<?php include "../mojavemvc-php-incl/page-bottom.php" ?>
