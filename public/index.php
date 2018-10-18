<?php

require '../app/config/bootstrap.php';

$config = require CORDILLERA_APP_DIR.'config'.DS.'web'.DS.'dev.php';

$app = new \cordillera\base\Bootstrap($config);
$app->run();
