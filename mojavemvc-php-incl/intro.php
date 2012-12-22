<table width="500px" border="0" cellpadding="10" cellspacing="10">
 <tr>
  <td>
   <p style="font-family: arial;font-size:10pt">
Mojave MVC is an annotation-driven, POJO-based web application development framework for Java. 
It borrows ideas from Spring Web MVC and EJB 3.1, and incorporates Guice. It attempts to:
   </p>
   <ul style="padding-left:20px;font-family: arial;font-size:10pt">
     <li class="listitem">facilitate TDD and Dependency Injection, and ultimately the development of decoupled components, by providing IoC capabilities</li>
     <li class="listitem">remove concurrency concerns from web application development by providing a single-thread programming model</li>
     <li class="listitem">remove cross-cutting concerns from web application development by supporting AOP through the interceptor pattern</li>
     <li class="listitem">be as minimally intrusive a framework as possible; it tries to get out of your way by minimizing framework-related metadata and biolerplate code</li>
   </ul>
   <p style="font-family: arial;font-size:10pt">
Mojave also:
   </p>
   <ul style="padding-left:20px;font-family: arial;font-size:10pt">
     <li class="listitem">supports building RESTful applications: controller actions can be bound to specific HTTP methods and URIs</li>
     <li class="listitem">supports JSP out-of-the-box</li>		
     <li class="listitem">is small and lightweight</li>
     <li class="listitem">has very high test coverage, making the framework easy to change</li>
   </ul>
   <p class="regtext">
Mojave MVC incorporates the Google Guice framework. All user components in the application can be configured with injectable dependencies, 
through use of the standard @Inject annotation. Injection is configured through user-supplied Guice Modules, using only idiomatic Java. Mojave
also works out-of-the-box on Google App Engine and AWS Elastic Beanstalk.
   </p>
  </td>
 </tr>
</table>
