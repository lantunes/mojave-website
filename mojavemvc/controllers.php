<?php define("TITLE", "Controllers"); ?>
<?php include "../mojavemvc-php-incl/page-top.php" ?>
<?php include "../mojavemvc-php-incl/docs-top.php" ?>

<h2>Introduction</h2>
	
<p class="regtext">
When a request arrives, it is routed to a controller. There must always be at least
one controller in a Mojave application. A controller is simply a POJO annotated at 
the class level with one of several controller annotations. You specificy the package
location of your controllers, and during startup, Mojave will scan the package for
classes with the aforementioned controller annotations.
</p>

<p class="regtext">
A controller must have at least one action, which is the method that is ultimately
called to handle the incoming request. We won't go into more detail about actions
here. To learn more about actions, please see the 
<a class="sitelink" href="actions">actions</a> documentation page.
</p>

<h2>Controller Types</h2>

<p class="regtext">
There are three types of controllers in the Mojave framework:
</p>

<ul class="list">
 <li class="listitem">Stateless</li>
 <li class="listitem">Stateful</li>
 <li class="listitem">Singleton</li>
</ul>

<h2>Stateless Controller</h2>

<p class="regtext">
A new instance of this controller is created per request. Its dependencies are 
injected after creation.
</p>

<p class="regtext">
The following are valid declarations of stateless controllers:
</p>

<?php 
echo geshify(
'@StatelessController
public class SomeController {
 ...
}
 
@StatelessController("some-name")
public class SomeController {
 ...
}', 'java5');
?>
 
<p class="regtext">
It is important to note that as a new instance of a stateless controller is created with every 
request, the developer should not design the stateless controller with state. That is, class 
fields should not be used with the intention of storing state between requests, but they can be 
used for storing state in the object during a request. For storing state between requests, 
use a StatefulController.
</p>

<h2>Stateful Controller</h2>

<p class="regtext">
Only one instance of this controller will exist per request session. It is kept in the HttpSession. 
The instance goes away when the session is invalidated, the session times out, or the application 
is restarted. Its dependencies, if any, are re-injected with every new request.
</p>

<p class="regtext">
The following are valid declarations of stateful controllers:
</p>

<?php 
echo geshify(
'@StatefulController
public class SomeController {
 ...
}
 
@StatefulController("some-name")
public class SomeController {
 ...
}', 'java5');
?>

<h2>Singleton Controller</h2>

<p class="regtext">
Only one instance of this controller will exist in the application, placed in the front controller 
context. Its dependencies, if any, are re-injected with every new request.
</p>

<p class="regtext">
The following are valid declarations of singleton controllers:
</p>

<?php 
echo geshify(
'@SingletonController
public class SomeController {
 ...
}
 
@SingletonController("some-name")
public class SomeController {
 ...
}', 'java5');
?>

<p class="regtext">
Note that it is up to the developer to address thread-safety in singleton controllers. The single 
instance will be accessed simultaneously by multiple threads, and thus there will be concurrency 
issues to address. The container will not attempt to address those issues.
</p>

<p class="regtext">
Singleton controllers can also be optionally annotated with the Init annotation. The singleton 
controller instance will be created at startup if it is annotated with this annotation. As an example, 
consider the following controller:
</p>

<?php 
echo geshify(
'@Init
@SingletonController
public class StartupController {
 ...
}', 'java5');
?>

<p class="regtext">
The controller above will be instantiated during initialization of the FrontController servlet.
</p>

<h2>Default Controllers</h2>

<p class="regtext">
A Stateless or Stateful controller in the Mojave framework can be annotated as the Default controller, 
using the DefaultController annotation. A controller annotated with this annotation is flagged as the 
default controller for all application requests not specifying a controller. Only one controller in 
the application can be annotated with this annotation. As an example, consider the following controller:
</p>

<?php 
echo geshify(
'@DefaultController
@StatelessController("test")
public class SomeController {

  @Action
  public JSP someAction() {
    return new JSP("index");
  }
}', 'java5');
?>

<p class="regtext">
We can invoke the someAction method by making the following request (provided there is no controller 
named 'someAction'):
</p>

<code>
http://.../someAction
</code>

<p class="regtext">
Since there was no controller name supplied, the default controller was used as the controller 
for the request. However, we can also invoke the someAction method by making the following standard 
request:
</p>

<code>
http://.../test/someAction
</code>

<h2>Controller Constructors</h2>

<p class="regtext">
Every instance of a Mojave controller is created through the Guice injector. Therefore, if the controller
has a constructor that requires parameters, then the contructor must be annotated with the Inject
annotation, and the application's Guice modules must be configured appropriately. The Mojave framework
supports injecting the HttpServletRequest, HttpServletResponse, and HttpSession out-of-the-box. (Injection 
of the ServletContext, however, is not currently allowed.) There is no module configuration required to
support injecting instances of these types. Also, controllers can be injected into other controllers.
</p>

<?php 
echo geshify(
'@StatelessController
public class SomeController {

  private final HttpServletRequest req;
  private final HttpServletResponse resp;
  private final HttpSession sess;
  
  @Inject
  public SomeController(HttpServletRequest req, HttpServletResponse resp, HttpSession sess) {
    this.req = req;
	this.resp = resp;
	this.sess = sess;
  }
  
  ...  
  
}', 'java5');
?>

<?php include "../mojavemvc-php-incl/docs-bottom.php" ?>
<?php include "../mojavemvc-php-incl/page-bottom.php" ?>
