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

<?php include "../mojavemvc-php-incl/docs-bottom.php" ?>
<?php include "../mojavemvc-php-incl/page-bottom.php" ?>
