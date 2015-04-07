<?php
define('DS', DIRECTORY_SEPARATOR);
define('CORDILLERA_APP_DIR', realpath(str_replace('\\', '/', dirname(__FILE__) . '/../..') . DS . 'app') . DS);
define('CORDILLERA_DIR', realpath(str_replace('\\', '/', dirname(__FILE__) . '/../../vendor/') . DS . 'cordillera') . DS);
define('CORDILLERA_DEBUG', true);

require CORDILLERA_DIR . 'bootstrap.php';