<?php
namespace modules\examples\contacts;

use cordillera\middlewares\Controller;
use cordillera\middlewares\Layout;
use cordillera\middlewares\Request;
use cordillera\middlewares\View;
use modules\examples\contacts\models\Contact;

/** @var Controller $this */

$model = new Contact();

$this->filters(function () {

    /** @var Controller $this */

    $this->assertAjax();
});


$this->get(function () use ($model) {

    /** @var Controller $this */

    $view = new View("modules/examples/contacts/views/add", new Layout("main"));
    $view->data = ['model' => $model];

    $this->setResponse($view);
});

$this->post(function () use ($model) {

    /** @var Controller $this */

    $data = [
        'firstname' => Request::post("Contact.firstname"),
        'lastname' => Request::post("Contact.lastname"),
        'email' => Request::post("Contact.email"),
        'phone' => Request::post("Contact.phone"),
        'address' => Request::post("Contact.address"),
        'created_at' => time(),
        'updated_at' => time()
    ];

    $model->bind($data);

    $model->save();

    $this->setResponse(['errors' => $model->getAllErrors()]);
});