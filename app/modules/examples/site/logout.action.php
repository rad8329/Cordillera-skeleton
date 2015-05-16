<?php

namespace modules\examples\site;

use cordillera\base\Cordillera;
use cordillera\helpers\Url;
use cordillera\middlewares\Controller;

/* @var Controller $this */

Cordillera::app()->auth->logout();
Cordillera::app()->request->redirect(Url::relative('examples/site/login'));
