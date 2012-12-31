<?php define("TITLE", "Routing"); ?>
<?php include "../mojavemvc-php-incl/page-top.php" ?>
<?php include "../mojavemvc-php-incl/docs-top.php" ?>

<p class="regtext">
Routing, in the context of the Mojave framework, is the forwarding
of a request from the front controller to its intended controller 
and action.
</p>

<p class="regtext">
Routing is defined at the controller level. There is no routing 
definition file, or some other central place where routing rules
are defined. In the Mojave framework, all routes have a mandatory
controller and action specified as part of their path. This may
sound constraining, but at the same time it also removes any ambiguity
about what path maps to a particular action. It adds clarity, and
simplifies the routing definition process.
</p>

<p class="regtext">
The simplest example of a routing definition can be seen in the
following class:
</p>

<?php 
echo geshify('@StatelessController
public class HelloWorld {

  @Action
  public PlainText sayHello() {
    return new PlainText("Hello!");
  }
}', 'java5');
?>

<p class="regtext">
This controller's action method can be invoked by making a 
request to the following URL:
</p>

<code>http://localhost/demo/HelloWorld/sayHello</code>

<p class="notetext">
NOTE: For all example URLs in this document, 'localhost' will refer
to the host, and 'demo' is the url-pattern of the FrontController 
servlet. The context path is implicitly '/'.
</p>

<p class="regtext">
By specifying a controller and an action, the path is automatically
implied. Moreover, the path, in the example above, is case sensitive,
and must match the case of the controller class name and action 
method name.
</p>

<p class="regtext">
Optionally, to provide an alias for the controller and/or action, and
as an alternative to using the class and method names, the controller 
and action annotations accept a String argument:
</p>

<?php 
echo geshify('@StatelessController("main")
public class HelloWorld {

  @Action("hello")
  public PlainText sayHello() {
    return new PlainText("Hello!");
  }
}', 'java5');
?>

<p class="regtext">
This controller's action method can be invoked by making a 
request to the following URL:
</p>

<code>http://localhost/demo/main/hello</code>

<p class="regtext">
It is common, however, especially for RESTful services, for URIs
to carry more information, such as a customer ID, for example. To 
accomodate this, the Mojave framework provides the ParamPath 
annotation. Action parameters are identified by Param annotations
in the action method signature. These parameters can be mapped to, 
and extracted from, the request path. As an example, consider the
following controller:
</p>

<?php 
echo geshify('@StatelessController
public class HelloWorld {

  @Action
  @ParamPath("to/:name")
  public PlainText sayHello(@Param("name") String name) {
    return new PlainText("Hello " + name);
  }
}', 'java5');
?>

<p class="regtext">
This controller's action method can be invoked by making a 
request to the following URL:
</p>

<code>http://localhost/demo/HelloWorld/sayHello/to/John</code>

<p class="regtext">
The ParamPath annotation accepts an argument which should not start
with a forward-slash, and defines the path which, when combined with
the controller and action portions, map to the associated action method.
The portions of the path which begin with a colon are treated as 
parameters, and their name must match a corresponding argument in the 
action method signature. Also, when an action method is obtaining its 
parameters through the request path, any matching HTTP request parameters 
are ignored. Therefore, matching path parameters and request parameters 
cannot both be used when invoking an action method. 
</p>

<p class="regtext">
Path parameters can also be defined with custom regular expression 
definitions. Take the following as an example:
</p>

<?php 
echo geshify('@StatelessController
public class HelloWorld {

  @Action
  @ParamPath("to/:name<[a-z]+>")
  public PlainText sayHello(@Param("name") String name) {
    return new PlainText("Hello " + name);
  }
}', 'java5');
?>

<p class="regtext">
The value inside the angle brackets, next to ":name", is a custom regular 
expression definition. When no such definition exists, the regular 
expression [^/]+ is used by default. When a custom definition exists, it will 
be used to match an incoming path to the route. Thus, the following request 
will not match the action method above:
</p>

<code>http://localhost/demo/HelloWorld/sayHello/to/123</code>

<p class="regtext">
It is important to note that there are exceptions to the framework routing 
rules described above. For instance, using default controllers and actions,
and/or HTTP method action annotations, will provide alternative paths for 
routing. The following provides an example:
</p>

<?php 
echo geshify('@StatelessController("customer")
public class CustomerController {

  @PUTAction
  @ParamPath("name/:name<[A-Za-z]+>/id/:id<[0-9]+>")
  public PlainText create(@Param("name") String name, @Param("id") long id) {
    return new PlainText("Created customer " + name + " with ID " + id);
  }
}', 'java5');
?>

<p class="regtext">
This controller's action method can be invoked by making an HTTP PUT 
request to the following URL:
</p>

<code>http://localhost/demo/customer/name/John/id/123</code>

<?php include "../mojavemvc-php-incl/docs-bottom.php" ?>
<?php include "../mojavemvc-php-incl/page-bottom.php" ?>
