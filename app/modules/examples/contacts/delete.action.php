<?php
namespace modules\examples\contacts;

use cordillera\base\Application;
use cordillera\helpers\Url;
use cordillera\middlewares\Controller;
use modules\examples\contacts\models\Contact;

/** @var Controller $this */
/** @var Contact $model */

$model = Contact::findByPk($_GET['id']);

if ($model) {
    $model->delete();
}

Application::getRequest()->redirect(Url::relative("examples/contacts/index"));