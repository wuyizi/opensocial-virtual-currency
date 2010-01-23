Run Local Shindig Server(Java) with VC Patch
 - Checkout or sync your shindig to 1.1 BETA5 version: http://svn.apache.org/repos/asf/incubator/shindig/tags/shindig-project-1.1-BETA5-incubating/
 - Apply shindig-patch/r4-902364.patch to the shindig on your client.
 - Run 'mvn install -Dmaven.test.skip=true' in command line under shindig's root dir to build the java shindig. Skip testing to save time.
 - Run 'mvn -Prun -Djetty.port=9002' under shindig's root dir to start the jetty server on any specific port (e.g.9002) .
 - Go to http://localhost:9002/gadgets/files/container/sample-payment-container.html and play and debug.

