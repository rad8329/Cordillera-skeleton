<?php

error_reporting(E_ALL & ~E_DEPRECATED);//For php 7

require '../app/config/bootstrap.php';

$config = require CORDILLERA_APP_DIR.'config'.DS.'web'.DS.'dev.php';

$app = new \cordillera\base\Bootstrap($config);
$app->run();
