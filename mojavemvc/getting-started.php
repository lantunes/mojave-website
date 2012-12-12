<?php include_once 'source/lib/geshi.php'; ?>
<html>
<head>
<?php define("TITLE", "Getting Started"); ?>
<?php include "../mojavemvc-php-incl/head.php" ?>
</head>
<body>

<table id="maintable" width="100%" border="0" cellpadding="0" cellspacing="0">

<?php include "../mojavemvc-php-incl/banner.php" ?>

<?php include "../mojavemvc-php-incl/menu.php" ?>

<tr>
 <td valign="middle" align="center">
  <table width="690px" border="0" cellpadding="10" cellspacing="10">
   <tr>
    <td align="center">
     <h1>Getting Started: Hello World</h1>
    </td>
   </tr>
   <tr>
    <td>

<p class="regtext">
Mojave MVC is a framework for robust web application development in Java. You use the 
framework like you would use popular frameworks like Struts or Spring Web MVC. 
This short introduction assumes you have some familiarity with Java web development. 
Specifically, you should be familiar with servlets and JSP before continuing. If you 
are not familiar with these areas of Java development, please refer to documentation 
on that subject before continuing.
</p>

<p class="regtext">
The Mojave MVC framework is built around the Front Controller pattern, and, not 
surprisingly, the Model-View-Controller pattern. All requests that come into the 
application arrive at a single servlet, and are processed by that servlet. In the 
Mojave MVC framework, that servlet is called org.mojavemvc.FrontController. The front
controller receives a request, then decides where it needs to be routed. All requests
are routed to controllers. A controller is simply a POJO that has been 
annotated with one of @StatelessController, @StatefulController, or @SingletonController.
If you are familiar with EJB 3.1, you will see the similarities.
</p>

<p class="regtext">
Once a request is routed to the correct controller, the next step is to invoke an action
on that controller. An action is simply a public method in that controller class that has
been annotated with @Action, or one of its variants. Actions return views, which are typically 
either renderable JSP pages, or streaming content, such as XML or JSON. But they can also be
redirects, or carry a custom payload. Once the front controller receives the view from the 
invoked controller action, it dispatches to that view, and returns to the requestor.
</p>

<p class="regtext">
So, a request made on the application is effectively an invocation of a method in a POJO.
Request parameters are converted into Java types, and passed along as parameters to the 
controller action method.
</p>

<p class="regtext">
It might be best at this point to illustrate this through use of the canonical Hello World 
example. To run this example, you'll need access to a servlet container, such as Apache 
Tomcat.
</p>

<p class="regtext">
Our Hello World application will be deployed as a .war file into the servlet container.
In our .war archive, we'll need to include a web.xml in the WEB-INF folder. The web.xml
file will define one servlet, the Mojave MVC front controller:
</p>

<?php 
$source = '<?xml version="1.0" encoding="UTF-8"?>
<web-app id="WebApp_ID" version="2.4" 
xmlns="http://java.sun.com/xml/ns/j2ee" 
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
xsi:schemaLocation="http://java.sun.com/xml/ns/javaee 
  http://java.sun.com/xml/ns/javaee/web-app_2_5.xsd">
	
  <display-name>HelloWorld</display-name>
	
  <servlet>
    <servlet-name>FrontController</servlet-name>
    <servlet-class>org.mojavemvc.FrontController</servlet-class>
    <init-param>
      <param-name>controller-classes</param-name>
      <param-value>helloworld.controllers</param-value>
    </init-param>
    <init-param>
      <param-name>jsp-path</param-name>
      <param-value>/WEB-INF/jsp/</param-value>
    </init-param>
    <load-on-startup>1</load-on-startup>
  </servlet>
  <servlet-mapping>
    <servlet-name>FrontController</servlet-name>
    <url-pattern>/serv/*</url-pattern>
  </servlet-mapping>
	
</web-app>';
$geshi = new GeSHi($source, 'xml');
$geshi->enable_keyword_links(false);
$geshi->set_overall_style('background-color: #F8F8F8;', true);
echo $geshi->parse_code();
?>

<p class="regtext">
The web.xml file above defines one servlet, the Mojave MVC front controller, and several init 
parameters. This is the only XML-based configuration that is required. There are other init 
parameters, but these will suffice for now. The controller-classes parameter defines the 
namespace of the controller classes in the application. The jsp-path parameter defines
the location of JSP pages. Note the URL pattern of the servlet mapping: you can replace 
"serv" with whatever you like, but the pattern must otherwise follow the same convention
as above. 
</p>

<p class="regtext">
Next, we'll need to create a controller. Let's create a class called HelloWorld:
</p>

<?php 
$source = 'package helloworld.controllers;

import org.mojavemvc.annotations.Action;
import org.mojavemvc.annotations.Param;
import org.mojavemvc.annotations.StatelessController;
import org.mojavemvc.views.JspView;
import org.mojavemvc.views.View;

@StatelessController
public class HelloWorld {

  @Action
  public View sayHello(@Param("name") String name) {
		
    return new JspView("hello.jsp").withAttribute("name", name);
  }
}';
$geshi = new GeSHi($source, 'java5');
$geshi->enable_keyword_links(false);
echo $geshi->parse_code();
?>

<p class="regtext">
Finally, we'll need to create the hello.jsp file referred to in the HelloWorld class above:
</p>

<?php 
$source = '<html>
  <body>
    <p>Hello <%=request.getAttribute("name") %>!</p>
  </body>
</html>';
$geshi = new GeSHi($source, 'html4strict');
$geshi->enable_keyword_links(false);
echo $geshi->parse_code();
?>

<p class="regtext">
Be sure to place the hello.jsp file in the /WEB-INF/jsp folder in the .war archive, as that's
what we specified in the web.xml servlet init param. Also, you'll need to place the 
Mojave MVC jar with all dependencies in the /WEB-INF/lib folder.
</p>

<p class="regtext">
When we deploy this .war archive, called helloworld.war, for example, to a servlet container 
like Apache Tomcat, we can invoke the application with the following request:
</p>

<code>
http://localhost:8080/helloworld/serv/HelloWorld/sayHello?name=John
</code>

<p class="regtext">
In a browser, you should see the following response:
</p>

<code>
Hello John!
</code>

<p class="regtext">
The request path following "serv/" should be of the form "[controller]/[action]".
There are possible variations on this; for example, if you didn't specify an 
action, the framework would look for an annotated default action. Also, the
controller and action annotations take optional String parameters that indicate
their URL representation, as an alternative to using the class name or method
signature. Please see other documentation for more information.
</p>

<p class="regtext">
This concludes this short introduction to the Mojave MVC framework. More documentation will
be provided over time. The framework is still in its infancy, but it already provides some
powerful capabilites, such as dependency injection via Guice, and support for AOP through 
the use of custom interceptor classes. Please refer to the Javadocs for more information.
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
