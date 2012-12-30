<?php define("TITLE", "Error Handling"); ?>
<?php include "../mojavemvc-php-incl/page-top.php" ?>
<?php include "../mojavemvc-php-incl/docs-top.php" ?>

<p class="regtext">
Correct error handling is an important concern when developing web 
applications. Because there are typically several layers a web request
must proceed through before a response is returned, there are many
places where an error can occur. Moreover, the error message the user
should see when something goes wrong, compared to what the developer
would like to see, are almost certainly bound to be different. In 
traditional servlet/JSP environments, the developer would have to take 
certain measures to ensure that the end user would not see a stack
trace, for example, and would instead see a friendlier error screen. 
This process, however, is not built in to the servlet/JSP environment,
and inevitably the same soultion would need to be re-implemented every 
time a new project was started.
</p>

<p class="regtext">
Mojave addresses this problem by providing a number of safe mechanisms
for introducing correct error handling at the web application level.
The error handling functionality of Mojave can be found in the 
<code>org.mojavemvc.exception</code> package.
At the core is the <code>ErrorHandler</code> interface, which simply 
defines a single <code>handlerError</code> method. The 
<code>handleError</code> method returns a View to be rendered in place of 
the View that was not able to be rendered. A developer is able to provide 
their own <code>ErrorHandler</code> implementation to define what to 
render when an error occurs.
</p>

<p class="regtext">
Mojave makes no assumptions about how an <code>ErrorHandler</code> behaves 
internally, and so a new instance of an <code>ErrorHandler</code> is 
created per request. Therefore, for a developer to specify their own 
<code>ErrorHandler</code>, they must specify an 
<code>ErrorHandlerFactory</code>. An <code>ErrorHandlerFactory</code> is
specified to the application in the web.xml file, through the 
<code>error-handler-factory</code> init parameter. 
</p>

<p class="regtext">
By default, if no <code>ErrorHandlerFactory</code> is specified, then a 
default implementation is provided that simply prints the stack trace
in the response. Another init parameter, <code>jsp-error-file</code>,
exists to allow a developer to quickly specify a JSP page that should
be rendered in case of an exception. If this init parameter is specified,
then no <code>error-handler-factory</code> need be specified (though it
can be).
</p>

<?php include "../mojavemvc-php-incl/docs-bottom.php" ?>
<?php include "../mojavemvc-php-incl/page-bottom.php" ?>
