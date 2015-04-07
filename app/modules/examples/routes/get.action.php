<?php
namespace modules\examples\routes;

use cordillera\middlewares\Controller;
use modules\examples\routes\models\Route;
use cordillera\middlewares\Request;

/** @var Controller $this */

$this->filters(function () {
    /** @var Controller $this */

    $this->assertAjax();
    $this->assertJsonContentType();
});

$this->get(function () {

    /** @var Controller $this */

    //$payload = Request::payload(); // If request method is POST
    //$route = Route::findByPk($payload->id); // If request method is POST

    $route = Route::findByPk(Request::get('id')); // If request method is GET

    $this->setResponse($route ? $route : new Route());
});