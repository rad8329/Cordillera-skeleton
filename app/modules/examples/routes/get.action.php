<?php

namespace modules\examples\routes;

use cordillera\middlewares\Controller;
use modules\examples\routes\models\Route;
use cordillera\middlewares\Request;

/* @var Controller $this */

$this->filters(function () {
    /* @var Controller $this */

    $this->filter->assertAjax();
    $this->filter->assertJsonContentType();
});

$this->get(function () {

    /* @var Controller $this */

    //$route = Route::findByPk(Request::payload('id')); // If request method is POST and Payload

    $route = Route::findByPk(Request::get('id')); // If request method is GET

    $this->setResponse($route ? $route : new Route());
});
