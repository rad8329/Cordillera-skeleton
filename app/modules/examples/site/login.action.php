<?php

namespace modules\examples\site;

use cordillera\base\Cordillera;
use cordillera\middlewares\Controller;
use cordillera\middlewares\Layout;
use cordillera\middlewares\Request;
use cordillera\middlewares\View;
use modules\examples\site\models\LoginForm;

/* @var Controller $this */

$model = new LoginForm();
$view = new View('modules/examples/site/views/login', new Layout('main'));

$this->filters(function () {

    if (Cordillera::app()->auth->id) {
        Cordillera::app()->request->redirect(Cordillera::app()->request->base_url);
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

    $model->username = Request::post('LoginForm.username');
    $model->password = Request::post('LoginForm.password');

    if ($data = $model->login()) {
        Cordillera::app()->auth->login($data['id'], $data);
        Cordillera::app()->session->put(
            'flash.success',
            translate(
                '<strong>%s</strong>, welcome to Cordillera framework',
                [$model->username]
            )
        );

        Cordillera::app()->request->redirect(Cordillera::app()->request->home);
    }

    $view->data = ['model' => $model];
    $view->layout->properties['title'] = 'Login';

    $this->setResponse($view);
});
