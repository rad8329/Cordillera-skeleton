<?php

namespace modules\examples\routes;

use cordillera\base\Cordillera;
use cordillera\middlewares\Controller;
use cordillera\middlewares\Layout;
use modules\examples\routes\models\Zone;
use cordillera\middlewares\View;

/* @var Controller $this */

$this->get(function () {

    /* @var Controller $this */
    $id = Cordillera::app()->request->get('id', 1);

    $view = new View(
        'modules/examples/routes/views/index',
        new Layout('main'),
        [
            'zones' => Zone::findAll(),
            'id' => $id,
        ]
    );

    $view->layout->properties['title'] = 'Medellín bus routes';

    $this->setResponse($view);
});
