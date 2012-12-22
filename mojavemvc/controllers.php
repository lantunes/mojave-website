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

<?php include "../mojavemvc-php-incl/docs-bottom.php" ?>
<?php include "../mojavemvc-php-incl/page-bottom.php" ?>
