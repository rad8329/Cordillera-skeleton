<?php

namespace modules\examples\site;

use cordillera\helpers\Url;
use cordillera\middlewares\Controller;

/* @var Controller $this */

app()->auth->logout();
$this->redirect(Url::relative('examples/site/login'));
