<?php

namespace modules\examples\contacts;

use cordillera\base\Cordillera;
use cordillera\middlewares\Controller;
use cordillera\middlewares\Layout;
use cordillera\middlewares\View;
use modules\examples\contacts\models\Contact;

/*
 * @TODO: We must check if the current user is logged, but you can do it :)
 */

/* @var Controller $this */
/* @var Contact $model */

$model = Contact::findByPk(Cordillera::app()->request->get('id'));

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
        'firstname' => Cordillera::app()->request->post('Contact.firstname'),
        'lastname' => Cordillera::app()->request->post('Contact.lastname'),
        'email' => Cordillera::app()->request->post('Contact.email'),
        'phone' => Cordillera::app()->request->post('Contact.phone'),
        'address' => Cordillera::app()->request->post('Contact.address'),
        'gender' => Cordillera::app()->request->post('Contact.gender'),
        'updated_at' => time(),
    ];

    $model->bind($data);

    $model->save();

    $this->setResponse(['errors' => $model->getAllErrors()]);
});
