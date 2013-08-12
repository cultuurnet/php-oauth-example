<?php

require 'settings.php';

require 'autoloader.php';

require '../culturefeed/lib/OAuth/OAuth.php';

$classLoader = new SplClassLoader(null, '../culturefeed/lib/CultureFeed');
$classLoader->register();