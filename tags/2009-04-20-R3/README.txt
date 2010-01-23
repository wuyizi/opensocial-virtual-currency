Prepare Shindig Server
 - Apply the 042109.patch to the latest shindig (revision 766937).
 - Edit your hosts file and map 127.0.0.1 to 'www.mycontainer.com' and 'www.myshindig.com' to pretend to be under different domains.
 - Run 'build.bat' under shindig's root dir to build the java shindig. Skip testing to save time.
 - Run 'run.bat' under shindig's root dir to start the jetty server.

Prepare App Backend
 - Start a php server with the files in the 'app-backend' dir.

Running
 - Go to http://www.mycontainer.com:8080/gadgets/files/container/sample-payment.html and play and debug. NOTE that the gadget iframe is running under www.myshindig.com:8080.
