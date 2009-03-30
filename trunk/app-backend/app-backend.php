<?php
require_once("oauth-handler.php");

if ($signature_valid == true) {
  $a = $payload["post"]["amount"];
  $res = array();
  if ($a == 500) {
    header ("HTTP/1.0 500 Server Unavailable", true, 500);
    echo "<h1>Server Unavailable</h1>";
  } else if ($a == 404) {
    header ("HTTP/1.0 404 Not Found", true, 404);
    echo "<h1>Not Found</h1>";
  } else if ($a == 999) {
    $res["responseCode"] = "APP_LOGIC_ERROR";
    $res["responseMsg"] = "This is just a fake logic error.";
    echo json_encode($res);
  } else {
    if ($payload["post"]["paymentType"] == "credit") {
      $res["responseMsg"] = "The app has given you a credit of ".$a.".";
    } else {
      $res["responseMsg"] = "You have checked out those items which cost for ".$a.".";
    }
    $res["responseCode"] = "OK";
    echo json_encode($res);
  }
} else {
  header ("HTTP/1.0 400 Bad Request", true, 400);
  echo "<h1>Invalid OAuth Signiture</h1>";

}
// echo json_encode($payload);
?>
