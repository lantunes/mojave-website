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

<?php include "../mojavemvc-php-incl/docs-bottom.php" ?>
<?php include "../mojavemvc-php-incl/page-bottom.php" ?>
