<?php
namespace modules\examples\site;

use cordillera\base\Application;
use cordillera\helpers\Url;
use cordillera\middlewares\Controller;

/** @var Controller $this */

Application::getAuth()->logout();
Application::getRequest()->redirect(Url::relative("examples/site/login"));