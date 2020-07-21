<?php

	
// require Facebook PHP SDK
// see: https://developers.facebook.com/docs/php/gettingstarted/
require_once("/fb/facebook.php");
 
// initialize Facebook class using your own Facebook App credentials
// see: https://developers.facebook.com/docs/php/gettingstarted/#install
$config = array();
$config['appId'] = '2064056423838182';
$config['secret'] = 'ad8969657f9e815e962da1a4753ead14';
$config['fileUpload'] = false; // optional
 
$fb = new Facebook($config);
 
// define your POST parameters (replace with your own values)
$params = array(
  "access_token" => "EAAdVP5XwceYBABZCZCRgDhyZBIwvTKj6ksq3VDlnkctvurU4CFij819ZBMxKg5M0z46eyZBGE2z4vM9mlEZBC67YjQvWbZCpXxHwy78MJGjvN9Qd76KQCGSdgZBNLorpndXq6fImI1EgWrYfEvuZC3UPnMkW3eeTlb8TU6V5L3dSLMZCL1TAbxsKro5Im55aOZAD8oZD", // see: https://developers.facebook.com/docs/facebook-login/access-tokens/
  "message" => "Test",
  "link" => "http://www.northpost.ga",
  "picture" => "http://i.imgur.com/lHkOsiH.png",
  "name" => "How to Auto Post on Facebook with PHP",
  "caption" => "www.intellifeed.xyz",
  "description" => "Facebook access tokens. Cron automation."
);
 
// post to Facebook
// see: https://developers.facebook.com/docs/reference/php/facebook-api/
try {
  $ret = $fb->api('/2064056423838182/feed', 'POST', $params);
  echo 'Successfully posted to Facebook';
} catch(Exception $e) {
  echo $e->getMessage();
}
?>