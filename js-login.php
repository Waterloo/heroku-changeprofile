<?php

  require('../vendor/autoload.php');  
  require( __DIR__.'/cred.php' );
  $fb = new Facebook\Facebook(array(
    'app_id'                => $_YOUR_APP_ID,
    'app_secret'            => $_YOUR_APP_SECRET,
    'default_graph_version' => '$v2.3',
    ));
	


$helper = $fb->getJavaScriptHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  echo 'No cookie set or no OAuth data could be obtained from cookie.';
  exit;
}

// Logged in
echo '<h3>Access Token</h3>';
var_dump($accessToken->getValue());

$_SESSION['fb_access_token'] = (string) $accessToken;
$_SESSION['facebook_access_token'] = (string) $accessToken;

// User is logged in!
// You can redirect them to a members-only page.
//header('Location: https://example.com/members.php');

?>