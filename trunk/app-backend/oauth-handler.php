<?php
   require_once("OAuth.php");
 
   class OrkutSignatureMethod extends OAuthSignatureMethod_RSA_SHA1 {
     protected function fetch_public_cert(&$request) {
       // $filename = $_REQUEST["xoauth_signature_publickey"];
       $filename = "pub-local.crt";
       $handle = fopen($filename, "r");
       while (!feof($handle)) {
         $buffer .= fgets($handle, 4096);
       }
       fclose($handle);
       return $buffer;
     }
   }

   //Build a request object from the current request
   $request = OAuthRequest::from_request(null, null, array_merge($_GET, $_POST));

   //Initialize the new signature method
   $signature_method = new OrkutSignatureMethod();

   //Check the request signature
   @$signature_valid = $signature_method->check_signature($request, null, null, $_GET["oauth_signature"]);

   //Build the output object
   $payload = array();
   if ($signature_valid == true) {
     $payload["validated"] = "Success! The data was validated";
   } else {
     $payload["validated"] = "This request was spoofed";
   }

   //Add extra parameters to help debugging
   $payload["get"] = $_GET;
   $payload["post"] = $_POST;
   $payload["rawpost"] = file_get_contents("php://input");
 
   //Return the response as JSON
   //echo var_export($payload);
?>
