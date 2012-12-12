<?php include_once 'source/lib/geshi.php'; ?>
<html>
<head>
<?php define("TITLE", "Dependency Injection with Guice"); ?>
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
     <h1>Dependency Injection with Guice</h1>
    </td>
   </tr>
   <tr>
    <td>

<p class="regtext">
Mojave MVC supports dependency injection through the Google Guice framework. The entry point 
is always a Mojave MVC controller. Users specify resources that are to be injected using the
&#64;Inject annotation, as they would normally in any Guice-enabled application. To wire objects
together, and to configure injection, users provide their own modules, which extend Guice's 
AbstractModule. Finally, users report the location of their modules to the Mojave MVC 
framework through an init param.
</p>

<p class="regtext">
It is important to note that the Mojave MVC framework relies on a single Guice Injector
instance throughout the entire application. The Injector is constructed during initialization of 
the FrontController. During Injector creation, the framework first adds its own module,
which is used to bind servlet resources (namely, HttpServletRequest, HttpServletResponse, and
HttpSession), then adds user-defined modules in the order in which the component scanner
finds them, given a package name. The only restriction for user-defined modules used in the 
Mojave MVC framework is that they must provide a no-arg constructor.
</p>

<p class="regtext">
To illustrate the use of a controller with injected dependencies, consider the following
class:
</p>

<?php 
$source = 'package injected.controllers;

import javax.servlet.http.HttpSession;

import org.mojavemvc.annotations.Action;
import org.mojavemvc.annotations.Param;
import org.mojavemvc.annotations.StatelessController;
import org.mojavemvc.views.JspView;
import org.mojavemvc.views.View;

import com.google.inject.Inject;

@StatelessController
public class InjectedController {

  private final HttpSession session;

  @Inject
  public InjectedController(HttpSession session) {

    this.session = session;
  }

  @Action
  public View putInSession(@Param("name") String name) {

    session.setAttribute("name", name);
    return new JspView("index.jsp");
  }
}';
$geshi = new GeSHi($source, 'java5');
$geshi->enable_keyword_links(false);
$geshi->set_overall_style('background-color: #f8f8f8;', true);
echo $geshi->parse_code();
?>

<p class="regtext">
The class above is declared to be a stateless controller. This means, in practice, that a new 
instance of the controller will be created with every request. (It is unfortunate that in this 
example the controller, though a StatelessController, does, in a sense, carry state in the 
form of the HttpSession. In practice, however, no state should be stored in StatelessController 
fields between requests.) The instance is obtained through the application-wide Guice Injector, 
so the HttpSession dependency will be injected upon creation. In this example, we are using 
constructor injection, but any of the supported Guice injection mechanisms can be used.
</p>

<p class="regtext">
The HttpSession injected in the example above is not the only servlet resource that can be 
injected. Mojave MVC also supports injection of the HttpServletRequest and the HttpServletResponse.
(Injection of the ServletContext, however, is not currently allowed.) And servlet resources are not 
the only dependencies which can be injected. Any kind of dependency can be injected&mdash;even other 
controllers&mdash;so long as the bindings are defined in the user-supplied modules.
</p>

<p class="regtext">
To provide user-defined modules to the Mojave MVC framework, users must supply the 'guice-modules'
init param in the FrontController servlet definition in the application's web.xml file. For example,
if the user's own modules existed under a package called 'my.modules', the following could be a 
FrontController servlet definition in the web.xml:
</p>

<?php 
$source = '<servlet>
  <servlet-name>FrontController</servlet-name>
  <servlet-class>org.mojavemvc.FrontController</servlet-class>
  <init-param>
    <param-name>controller-classes</param-name>
    <param-value>injected.controllers</param-value>
  </init-param> 
  <init-param>
    <param-name>guice-modules</param-name>
    <param-value>my.modules</param-value>
  </init-param> 
  <load-on-startup>1</load-on-startup>
</servlet>';
$geshi = new GeSHi($source, 'xml');
$geshi->enable_keyword_links(false);
$geshi->set_overall_style('background-color: #f8f8f8;', true);
echo $geshi->parse_code();
?>

    </td>
   </tr>
  </table>
 </td>
</tr>

<?php include "../mojavemvc-php-incl/footer.php" ?>

</table>

</body>
</html>
