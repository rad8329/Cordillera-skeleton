<?php

namespace modules\examples\contacts;

use cordillera\middlewares\Controller;
use cordillera\middlewares\Layout;
use cordillera\middlewares\View;
use modules\examples\contacts\models\Contact;

/*
 * @TODO: We must check if the current user is logged
 */

/* @var Controller $this */
/* @var Contact $model */

$model = Contact::findByPk(app()->request->get('id'));

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
        'firstname' => app()->request->post('Contact.firstname'),
        'lastname' => app()->request->post('Contact.lastname'),
        'email' => app()->request->post('Contact.email'),
        'phone' => app()->request->post('Contact.phone'),
        'address' => app()->request->post('Contact.address'),
        'gender' => app()->request->post('Contact.gender'),
        'updated_at' => time(),
    ];

    $model->bind($data);

    $model->save();

    $this->setResponse(['errors' => $model->getAllErrors()]);
});
