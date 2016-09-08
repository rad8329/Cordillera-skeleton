<?php

namespace modules\examples\test;

use cordillera\middlewares\Controller;
use cordillera\middlewares\Layout;
use cordillera\middlewares\View;
use cordillera\middlewares\db\adapters\sql\providers\ActiveRecord;
use modules\examples\routes\models\Route;

/* @var $this Controller */

$this->get(function () {

    /* @var $this Controller */

    $view = new View(
        'modules/examples/test/views/grid',
        new Layout('main'), [
            'data_provider' => new ActiveRecord(
                [
                    'data_source' => new Route(),
                    'search' => function (ActiveRecord $scope) {

                        if (isset($scope->request_params['name'])) {
                        }
                    },
                ]
            ),
        ]
    );

    $this->setResponse($view);
});
