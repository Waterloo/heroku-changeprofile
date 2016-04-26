# login-callback.php
<?php
require( __DIR__.'/facebook_start.php' );


$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions


$loginUrl = $helper->getLoginUrl($callback_url .'fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';


?>