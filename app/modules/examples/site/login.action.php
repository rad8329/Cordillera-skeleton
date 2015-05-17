<?php

namespace modules\examples\site;

use cordillera\middlewares\Controller;
use cordillera\middlewares\Layout;
use cordillera\middlewares\View;
use modules\examples\site\models\LoginForm;

/* @var Controller $this */

$model = new LoginForm();
$view = new View('modules/examples/site/views/login', new Layout('main'));

$this->filters(function () {
    /* @var Controller $this */

    if (app()->auth->id) {
        $this->redirect(app()->request->base_url);
    }
});

$this->get(function () use ($model, $view) {

    /* @var Controller $this */

    $view->data = ['model' => $model];

    $view->layout->properties['title'] = 'Login';

    $this->setResponse($view);
});

$this->post(function () use ($model, $view) {

    /* @var Controller $this */

    $model->username = app()->request->post('LoginForm.username');
    $model->password = app()->request->post('LoginForm.password');

    if ($data = $model->login()) {
        app()->auth->login($data['id'], $data);
        app()->session->put(
            'flash.success',
            translate(
                '<strong>%s</strong>, welcome to Cordillera framework',
                [$model->username]
            )
        );

        $this->redirect(app()->request->home);
    }

    $view->data = ['model' => $model];
    $view->layout->properties['title'] = 'Login';

    $this->setResponse($view);
});
