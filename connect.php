<?php
session_start();
require 'common.php';


$oc = new CultureFeed_DefaultOAuthClient($key, $secret);
$oc->setEndpoint($endpoint);
$cf = new CultureFeed($oc);

$token = $cf->getRequestToken();

if (!$token) {
  return;
}

$base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/') . '/';

$callback_url = $base_url . 'authorize.php?token=' . $token['oauth_token'] . '&token_secret=' . $token['oauth_token_secret'];

$auth_url = $cf->getUrlAuthorize($token, $callback_url);

$_SESSION['oauth_token'] =  $token['oauth_token'];
$_SESSION['oauth_token_secret'] =  $token['oauth_token_secret'];

Header("Location: $auth_url");
exit();