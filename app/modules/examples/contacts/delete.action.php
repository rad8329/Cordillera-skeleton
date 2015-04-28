<?php

namespace modules\examples\contacts;

use cordillera\base\Application;
use cordillera\helpers\Url;
use cordillera\middlewares\Controller;
use cordillera\middlewares\Exception;
use cordillera\middlewares\Request;
use modules\examples\contacts\models\Contact;

/*
 * @TODO: We must check if the current user is logged, but you can do it :)
 */

/* @var Controller $this */
/* @var Contact $model */

$model = Contact::findByPk(Request::get('id'));

if ($model) {
    $model->delete();
} else {
    throw new Exception(translate('Record was not found'), 404, Exception::NOTFOUND);
}

Application::getRequest()->redirect(Url::relative('examples/contacts/index'));
