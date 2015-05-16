<?php

namespace modules\examples\contacts;

use cordillera\middlewares\Controller;
use cordillera\middlewares\Layout;
use cordillera\middlewares\Request;
use cordillera\middlewares\View;
use modules\examples\contacts\models\Contact;

/*
 * @TODO: We must check if the current user is logged, but you can do it :)
 */

/* @var Controller $this */
/* @var Contact $model */

$model = Contact::findByPk(Request::get('id'));

$this->filters(function () {

    /* @var Controller $this */

    $this->filter->assertAjax();
});

$this->get(function () use ($model) {

    /* @var Controller $this */

    $view = new View('modules/examples/contacts/views/form', new Layout('main'));
    $view->data = ['model' => $model];

    $this->setResponse($view);
});

$this->post(function () use ($model) {

    /* @var Controller $this */
    /* @var Contact $model */

    $data = [
        'firstname' => Request::post('Contact.firstname'),
        'lastname' => Request::post('Contact.lastname'),
        'email' => Request::post('Contact.email'),
        'phone' => Request::post('Contact.phone'),
        'address' => Request::post('Contact.address'),
        'gender' => Request::post('Contact.gender'),
        'updated_at' => time(),
    ];

    $model->bind($data);

    $model->save();

    $this->setResponse(['errors' => $model->getAllErrors()]);
});
