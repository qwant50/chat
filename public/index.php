<?php

use Qwant\Config;
use malahov\Bootstrap;


require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'config.php';

try {
    require dirname(__DIR__) . '/vendor/autoload.php';

    $config = new Config(dirname(__DIR__) . '/app/core/configs');

  //   var_dump($config->getData());

    $app = new Bootstrap();  // default page
    $app->init();
    $app->router();
    $app->firewall();
    $app->dispatch();
  //  echo "Controller: $app->controller<br>";
  //  echo "Action: $app->action<br>";
  //  var_dump($app->params);


} catch (Exception $e) {
    echo $e;
}





