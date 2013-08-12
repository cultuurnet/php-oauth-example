<?php

require 'common.php';

?>
<?php if (!isset($oauth_token) || empty($oauth_token)) : ?>

  <p><a href="connect.php">Connect</a></p>

  <?php exit(); ?>

<?php endif; ?>

<?php

$base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/') . '/';

$oc = new CultureFeed_DefaultOAuthClient($key, $secret, $oauth_token, $oauth_token_secret);
$oc->setEndpoint($endpoint);
$cf = new CultureFeed($oc);


// query goes in here
// $query = new …
// $query->
// $result = $cf->
// $rows = count($result->objects);

?>