<?php define("TITLE", "Views"); ?>
<?php include "../mojavemvc-php-incl/page-top.php" ?>
<?php include "../mojavemvc-php-incl/docs-top.php" ?>

<p class="regtext">
The Mojave framework requires that all controller actions return
a <code>View</code>. A <code>View</code> is simply an interface
with a single method: <code>render</code>.
</p>

<?php 
echo geshify('public interface View {

  void render(HttpServletRequest request, HttpServletResponse response) 
    throws ServletException, IOException;
}
', 'java5');
?>

<p class="regtext">
The <code>render</code> method is invoked last in the sequence of steps 
involved in processing a request sent to the FrontController. The provided servlet 
request can be used to set attributes, then to obtain a RequestDispatcher 
for forwarding or including; or, the servlet response may be used to send a
redirect, for example.
</p>

<p class="regtext">
It should be noted that any exceptions thrown from the <code>render</code> 
method are not guaranteed to be caught in the FrontController. They may escape to 
the requestor. Developers should handle any exceptions inside the implementation
of the <code>render</code> method if different behaviour is desired.
</p>

<p class="regtext">
The Mojave framework does not try to impose too many restrictions
on what a <code>View</code> does in any given application, so developers
are encouraged to implement their own. Nevertheless, the Mojave framework
does provide some <code>View</code> implementations out-of-the-box that 
correspond to common use cases.
</p>

<h2>JSP Views</h2>

<p class="regtext">
The Mojave framework provides a <code>View</code> implementation called 
<code>JSP</code>. This class is meant for applications that use Java Server
Pages, or JSPs, to render their views. To use this class, the 
<code>jsp-path</code> init param must have been specified at start-up. When the
<code>render</code> method in invoked, the <code>RequestDispatcher</code> is 
obtained for the specified JSP page, and the request is forwarded to it. Finally,
it is also useful to note that the class provides methods for setting attributes
using a fluent interface.
</p>

<?php 
echo geshify('@StatelessController
public class HelloWorld {

  @Action
  @ParamPath("to/:name")
  public View sayHello(@Param("name") String name) {
    return new JSP("hello").withAttribute("name", name);
  }
}', 'java5');
?>

<h2>Redirects</h2>

<p class="regtext">
Often, it is necessary to redirect a request. To do this in the Mojave framework,
a <code>View</code> implementation called <code>Redirect</code> is provided. The 
constructor for the class takes a single String argument, which is the redirect 
location. Invoking the <code>render</code> method simply invokes 
<code>HttpServletResponse.sendRedirect(location)</code>.
</p>

<?php 
echo geshify('@StatelessController
public class HelloWorld {

  @Action
  public PlainText sayHello() {
    return new PlainText("Hello World!");
  }
	
  @Action
  public View redirectToSayHello() {
    return new Redirect("sayHello");
  }
}', 'java5');
?>

<h2>Streams</h2>

<p class="regtext">
An HTTP request is not limited to receiving HTML content in reply. There are many different
content types supported. The body of an HTTP response can carry any form of data in the 
form of raw bytes--no content encoding is required, so long as the client making the 
request can understand the response. The Servlet specification makes available the response
OutputStream, so that binary data can be written to the body of the response. The Mojave
framework provides an abstract class, <code>StreamView</code>, that works with the response 
OutputStrean, and performs the necessary I/O in the implementation of the <code>render</code> 
method. This should make it convenient for developers needing to send binary data back in the 
response.
</p>

<?php 
echo geshify('@StatelessController
public class HelloWorld {

  @Action
  public View getPDF() {
    return new StreamView() {            
      @Override
      protected byte[] getPayload() {
        return getPDFBytes();
      }
            
      @Override
      protected String getContentType() {
        return "application/pdf";
      }
    };
  }
}', 'java5');
?>

<p class="regtext">
As extensions of the <code>StreamView</code>, the Mojave framework also provides the 
<code>JSON</code>, <code>XML</code>, and <code>PlainText</code> View 
implementations. Each of these classes contain a single constructor that requires a 
String representing the fully formed content. The Mojave framework does not provide
classes for interconverting between objects and XML or JSON.
</p>

<?php 
echo geshify('@StatelessController
public class HelloWorld {

  @Action
  public PlainText sayHello() {
    return new PlainText("Hello World!");
  }
	
  @Action
  public JSON sayHelloInJSON() {
    return new JSON("{\"data\":\"hello\"}");
  }
    
  @Action
  public XML sayHelloInXML() {
    return new XML("<data>hello</data>");
  }
}', 'java5');
?>

<h2>Customized Responses</h2>

<p class="regtext">
Some use cases may require that the response contains a particular status code, with
additional information in headers, in addition to an optional content payload. For these
cases, the Mojave framework provides the <code>Status<code> class. The <code>Status<code>
class gives the user fine grained control over the response being sent to the requestor.
</p>

<?php 
echo geshify('@StatelessController
public class HelloWorld {

  @Action
  public View customizedResponse() {
    return new Status.OK()
      .withContent("it is ok")
      .withHeader("My-Custom-Header", "123")
      .withLastModified(new Date());
  }
}', 'java5');
?>

<?php include "../mojavemvc-php-incl/docs-bottom.php" ?>
<?php include "../mojavemvc-php-incl/page-bottom.php" ?>
