<html>
<head>
<?php define("TITLE", "About"); ?>
<?php include "../mojavemvc-php-incl/head.php" ?>
</head>
<body>

<table id="maintable" width="100%" border="0" cellpadding="0" cellspacing="0">

<?php include "../mojavemvc-php-incl/banner.php" ?>

<?php include "../mojavemvc-php-incl/menu.php" ?>

<tr>
 <td valign="middle" align="center">
  <table width="500px" border="0" cellpadding="10" cellspacing="10">
   <tr>
    <td>
     <p style="font-family: arial;font-size:10pt">
Mojave MVC is an annotation-driven, POJO-based web application development framework for Java. 
It borrows ideas from Spring Web MVC and EJB 3.1, and incorporates Guice. It attempts to:
     </p>
     <ul style="padding-left:20px;font-family: arial;font-size:10pt"">
      <li class="listitem">facilitate TDD and Dependency Injection, and ultimately the development of decoupled components, by providing IoC capabilities</li>
      <li class="listitem">remove concurrency concerns from web application development by providing a single-thread programming model</li>
      <li class="listitem">remove cross-cutting concerns from web application development by supporting AOP through the interceptor pattern</li>
      <li class="listitem">be as minimally intrusive a framework as possible; it tries to get out of your way by minimizing framework-related metadata</li>
     </ul>
<p class="regtext">
Mojave MVC incorporates the Google Guice framework. All user components in the application can be configured with injectable dependencies, 
through use of the standard @Inject annotation. Injection is configured through user-supplied Guice Modules, using only idiomatic Java. Mojave
also works out-of-the-box on Google App Engine and AWS Elastic Beanstalk.
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
