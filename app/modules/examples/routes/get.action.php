<?php

namespace modules\examples\routes;

use cordillera\middlewares\Controller;
use modules\examples\routes\models\Route;

/* @var Controller $this */

$this->filters(function () {
    /* @var Controller $this */

    $this->filter->assertAjax();
    $this->filter->assertJsonContentType();
});

$this->get(function () {

    /* @var Controller $this */

    //$route = Route::findByPk(app()->request->payload('id')); // If request method is POST and Payload

    $route = Route::findByPk(app()->request->get('id')); // If request method is GET

    $this->setResponse($route ? $route : new Route());
});
