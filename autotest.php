<?php
// require Facebook PHP SDK
// see: https://developers.facebook.com/docs/php/gettingstarted/
require_once("/godly/facebook/facebook.php");
 
// initialize Facebook class using your own Facebook App credentials
// see: https://developers.facebook.com/docs/php/gettingstarted/#install
$config = array();
$config['appId'] = '2064056423838182';
$config['secret'] = 'ad8969657f9e815e962da1a4753ead14';
$config['fileUpload'] = false; // optional
 
$fb = new Facebook($config);
 
// define your POST parameters (replace with your own values)
$params = array(
  "access_token" => "553bf4bacf714a57896fc7123db69f38", // see: https://developers.facebook.com/docs/facebook-login/access-tokens/
  "message" => "Here is a blog post about auto posting on Facebook using PHP #php #facebook",
  "link" => "http://www.pontikis.net/blog/auto_post_on_facebook_with_php",
  "picture" => "http://i.imgur.com/lHkOsiH.png",
  "name" => "How AutopostTest",
  "caption" => "www.northpost.ga",
  "description" => "Automatically post on Facebook with PHP using Facebook PHP SDK. How to create a Facebook app. Obtain and extend Facebook access tokens. Cron automation."
);
 
// post to Facebook
// see: https://developers.facebook.com/docs/reference/php/facebook-api/
try {
  $ret = $fb->api('/YOUR_FACEBOOK_ID/feed', 'POST', $params);
  echo 'Successfully posted to Facebook';
} catch(Exception $e) {
  echo $e->getMessage();
}

