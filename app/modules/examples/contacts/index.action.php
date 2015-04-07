<?php
namespace modules\examples\contacts;

use cordillera\middlewares\Controller;
use cordillera\middlewares\Layout;
use cordillera\middlewares\View;

/** @var Controller $this */


$this->get(function () {

    /** @var Controller $this */

    $view = new View("modules/examples/contacts/views/index", new Layout("main"));

    $this->setResponse($view);
});