<?php define("TITLE", "Bootstrapping with Embedded Jetty"); ?>
<?php include "../mojavemvc-php-incl/page-top.php" ?>
<?php include "../mojavemvc-php-incl/docs-top.php" ?>

<p class="regtext">
Instead of deploying a war file to a standalone servlet container,
such as Tomcat, it's also possible to create a standalone application
that embeds a servlet container. Jetty is the servlet container 
commonly used for this purpose. It's easy to bootstrap your application
with Jetty and Mojave. To demostrate this, let's create a simple 
Hello World application that embeds a Jetty server, and handles 
requests through Mojave controllers.
</p>

<p class="notetext">
NOTE: You'll need to have the Mojave jar and all its dependencies on the 
classpath for this demo application to compile and run. We're using Jetty 8
in this example, so be sure to add the Jetty jars to the classpath as well.
</p>

<p class="regtext">
To start, create a package called 'demo.mojave.controllers', and add
the following controller class to that package:
</p>

<?php 
echo geshify('package demo.mojave.controllers;

import org.mojavemvc.annotations.Action;
import org.mojavemvc.annotations.StatelessController;
import org.mojavemvc.views.PlainText;

@StatelessController
public class HelloWorld {

  @Action
  public PlainText sayHello() {
    return new PlainText("Hello World!");
  }
}', 'java5');
?>

<p class="regtext">
Next, in the 'demo.mojave' package, create the following Main class:
</p>

<?php 
echo geshify('package demo.mojave;

import org.eclipse.jetty.server.Server;
import org.eclipse.jetty.servlet.ServletContextHandler;
import org.eclipse.jetty.servlet.ServletHolder;

public class Main {

  public static void main(String[] args) throws Exception {

    Server server = new Server(8080);
    ServletContextHandler context = new ServletContextHandler(ServletContextHandler.SESSIONS);
    context.setContextPath("/");
    HandlerList handlers = new HandlerList();
    handlers.setHandlers(new Handler[]{context, new DefaultHandler()});
    server.setHandler(handlers);

    ServletHolder servletHolder = new ServletHolder(new org.mojavemvc.FrontController());
    servletHolder.setInitParameter("controller-classes", "demo.mojave.controllers");
    servletHolder.setInitOrder(1);
    context.addServlet(servletHolder, "/*");

    server.start();
    server.join();
  }
}', 'java5');
?>

<p class="regtext">
That's it! Now, just start the application from the command line, and in a browser, go to:
</p>

<code>
http://localhost:8080/HelloWorld/sayHello
</code>

<p class="regtext">
You should see the words 'Hello World!' displayed in the browser.
</p>

<p class="notetext">
NOTE: In the example above, we set the URL pattern to &quot;/*&quot;. However,
if we had returned a JSP view, or otherwise used forward() or include() when rendering
our views, we would need to use a pattern like &quot;/serv/*&quot;.
</p>

<?php include "../mojavemvc-php-incl/docs-bottom.php" ?>
<?php include "../mojavemvc-php-incl/page-bottom.php" ?>
