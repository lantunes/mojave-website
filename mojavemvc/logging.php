<?php define("TITLE", "Logging"); ?>
<?php include "../mojavemvc-php-incl/page-top.php" ?>
<?php include "../mojavemvc-php-incl/docs-top.php" ?>

<p class="regtext">
Logging is a critically important aspect of web application
development. Because a web request typically spans multiple
layers in an application, intelligently placed logging statements can
help developers debug problems and understand how their application is 
behaving.
</p>

<p class="regtext">
In the traditional servlet/JSP environment, logging is not
provided out-of-the-box. It is something that must be configured separately.
JDK logging is available, but it requires some work to set up. The result
is that the same logging solution must be re-implemented every time a 
new project is started.
</p>

<p class="regtext">
To address these issues, Mojave uses SLF4J, a simple logging facade 
framework. Critical logging statements are placed throughout the 
framework core code, with varying levels of importance. This ensures
that the application is easy to debug and trace. And because a facade 
pattern is used, you are free to use Log4J, JDK logging, or any 
logging framework you wish, as long as it is supported by SLF4J.
</p>

<p class="regtext">
As an example, if you wish to use Log4J in your application along with
Mojave, simply include the SLF4J-Log4J binding jar (obtained through the 
SLF4J distribution download) and the Log4J jar in your lib folder, and 
configure Log4J using the approaches provided by the Log4J framework. 
Mojave framework logging messages will appear through the Log4J mechanism 
you've configured, along with your application-specific logging messages.
</p>

<?php include "../mojavemvc-php-incl/docs-bottom.php" ?>
<?php include "../mojavemvc-php-incl/page-bottom.php" ?>
