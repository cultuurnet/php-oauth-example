<?php
session_start();
require 'common.php';

if (isset($_GET['oauth_token']) && isset($_GET['oauth_verifier'])) {


  $oc = new CultureFeed_DefaultOAuthClient($key, $secret, $_GET['oauth_token'], $_SESSION['oauth_token_secret']);
  $oc->setEndpoint($endpoint);
  $cf = new CultureFeed($oc);

  $token = $cf->getAccessToken($_GET['oauth_verifier']);

  $_SESSION['oauth_user'] = $token['userId'];
  $_SESSION['oauth_token'] =  $token['oauth_token'];
  $_SESSION['oauth_token_secret'] = $token['oauth_token_secret'];
  
  print 'Token: ' . $token['oauth_token'] . '<br>';
	print 'Secret: ' .$token['oauth_token_secret'] . '<br>';

  print 'Please change these settings in your settings file.<br>';
  print 'And goto <href="index.php>script</a>.';
}
