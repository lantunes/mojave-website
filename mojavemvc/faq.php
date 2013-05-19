<?php define("TITLE", "Frequently Asked Questions"); ?>
<?php include "../mojavemvc-php-incl/page-top.php" ?>
<?php include "../mojavemvc-php-incl/docs-top.php" ?>

<h2>Why another Java web framework?</h2>

<p class="regtext">
There are plenty of established Java web frameworks, such as Struts,
Spring Web MVC, and more recent JAX-RS implementations, such as 
Jersey and RESTEasy. It is therefore very valid to question the
introduction of yet another web framework for Java. Mojave was created
to meet several needs. The first was the need for a framework that 
leads to code free of boilerplate that is very easy to test. The second 
was the need for a framework supporting full Dependency Injection with
an alternative IoC container. Spring is a great framework, but if you
didn't want to use the Spring IoC container, there were not many choices
of frameworks supporting both an alternative IoC container, such as Guice,
and the MVC paradigm. Finally, Mojave attempts to be flexible in terms
of the scenarios in which it can be used. For instance, it can be used
to render JSPs, or to provide a RESTful service, where the content produced
is not necessarily meant to be rendered in a browser.
</p>

<h2>What problems does Mojave solve?</h2>

<ol class="regtext">
 <li>
  Improves on the current state of Dependency Injection in an MVC or RESTful web application
  <ul>
   <li>provides a viable alternative to Spring Web MVC</li>
   <li>provides a simpler, cleaner way to integrate Google Guice into a web setting</li>
  </ul>
 </li>
 <br />
 <li>
  Adds interceptor support to the MVC and RESTful web application landscape
 </li>
 <br />
 <li>
  Provides painless MVC templates by supporting JSP, <a class="sitelink" href="http://freemarker.org/">FreeMarker</a>, 
  and <a class="sitelink" href="http://velocity.apache.org/">Velocity</a> (in progress)
 </li>
 <br />
 <li>
  Adds server-side asynchronous HTTP capabilities to the MVC web application landscape through integration with the 
  <a class="sitelink" href="https://github.com/Atmosphere/atmosphere">Atmosphere</a> framework (in progress)
 </li>
 <br />
 <li>
  Provides a &quot;one-stop shop&quot; for various web application scenarios, from MVC with templates to URI-bound 
  RESTful web services, to server push
 </li>
</ol>

<p class="regtext">
If you have other questions, please post them to 
<a class="sitelink" href="http://groups.google.com/group/mojave-mvc" target="_blank">our Google Groups discussion group</a>. 
We'd really like to hear from you!
</p>

<?php include "../mojavemvc-php-incl/docs-bottom.php" ?>
<?php include "../mojavemvc-php-incl/page-bottom.php" ?>
