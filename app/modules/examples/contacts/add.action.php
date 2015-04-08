<?php
namespace modules\examples\contacts;

use cordillera\helpers\Crypt;
use cordillera\middlewares\Controller;
use cordillera\middlewares\Layout;
use cordillera\middlewares\Request;
use cordillera\middlewares\View;
use modules\examples\contacts\models\Contact;

/** @var Controller $this */

$view = new View("modules/examples/contacts/views/add", new Layout("main"));
$model = new Contact();

$this->filters(function () {
    /** @var Controller $this */

    $this->assertAjax();
});


$this->get(function () use ($view, $model) {

    /** @var Controller $this */

    $view = new View("modules/examples/contacts/views/add", new Layout("main"));
    $view->data = ['model' => $model];

    $this->setResponse($view);
});

$this->post(function () use ($view, $model) {

    /** @var Controller $this */
    
    $this->assertJsonContentType();

    $view = new View("modules/examples/contacts/views/add", new Layout("main"));

    $payload = Request::payload();

    $data = [
        'firstname' => $payload->{Crypt::requestVar("firstname")},
        'lastname' => $payload->{Crypt::requestVar("lastname")},
        'email' => $payload->{Crypt::requestVar("email")},
        'phone' => $payload->{Crypt::requestVar("phone")},
        'address' => $payload->{Crypt::requestVar("address")}
    ];

    $model->bind($data);

    if ($model->validate()) {
        //$model->save();
    }

    $view->data = ['model' => $model];

    $this->setResponse($view);
});