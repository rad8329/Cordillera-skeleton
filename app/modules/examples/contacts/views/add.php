<?php
use cordillera\helpers\Url;
use cordillera\base\Application;

/** @var \cordillera\middlewares\View $this */
/** @var \modules\examples\contacts\models\Contact $model */
/** @var string $contactForm */

$contactForm = $model->fieldName("Contact");
?>
<form id="add-contact-form" class="form-horizontal" method="post"
      action="<?php echo Url::relative("examples/contacts/add") ?>" onsubmit="return contact.submit(this);">
    <input type="hidden" name="<?php echo $model->fieldName(Application::getRequest()->csrf_id) ?>"
           value="<?php echo Application::getRequest()->csrf_value ?>">

    <div id="field-firstname" class="clearfix required <?php echo $model->hasError('firstname') ? 'has-error' : '' ?>">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input class="form-control" type="text"
                       name="<?php echo $contactForm . "[" . $model->fieldName("firstname") . "]" ?>"
                       placeholder="<?php echo translate("First name") ?>" value="<?php echo $model->firstname ?>">
            </div>
        </div>
        <?php if ($model->hasError('firstname')): ?>
            <div class="help-block">
                <?php foreach ($model->getErrors('firstname') as $error): ?>
                    <div class="clearfix"><?php echo $error ?></div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </div>
    <div id="field-lastname" class="clearfix required <?php echo $model->hasError('lastname') ? 'has-error' : '' ?>">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input class="form-control" type="text"
                       name="<?php echo $contactForm . "[" . $model->fieldName("lastname") . "]" ?>"
                       placeholder="<?php echo translate("Last name") ?>" value="<?php echo $model->lastname ?>">
            </div>
        </div>
        <?php if ($model->hasError('lastname')): ?>
            <div class="help-block">
                <?php foreach ($model->getErrors('lastname') as $error): ?>
                    <div class="clearfix"><?php echo $error ?></div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </div>
    <div id="field-email" class="clearfix required <?php echo $model->hasError('email') ? 'has-error' : '' ?>">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input class="form-control" type="text"
                       name="<?php echo $contactForm . "[" . $model->fieldName("email") . "]" ?>"
                       placeholder="<?php echo translate("Email") ?>" value="<?php echo $model->email ?>">
            </div>
        </div>
        <?php if ($model->hasError('email')): ?>
            <div class="help-block">
                <?php foreach ($model->getErrors('email') as $error): ?>
                    <div class="clearfix"><?php echo $error ?></div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </div>
    <div id="field-address" class="clearfix required <?php echo $model->hasError('address') ? 'has-error' : '' ?>">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input class="form-control" type="text"
                       name="<?php echo $contactForm . "[" . $model->fieldName("address") . "]" ?>"
                       placeholder="<?php echo translate("Address") ?>" value="<?php echo $model->address ?>">
            </div>
        </div>
        <?php if ($model->hasError('address')): ?>
            <div class="help-block">
                <?php foreach ($model->getErrors('address') as $error): ?>
                    <div class="clearfix"><?php echo $error ?></div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </div>
    <div id="field-phone" class="clearfix required <?php echo $model->hasError('phone') ? 'has-error' : '' ?>">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input class="form-control" type="text"
                       name="<?php echo $contactForm . "[" . $model->fieldName("phone") . "]" ?>"
                       placeholder="<?php echo translate("Phone") ?>" value="<?php echo $model->phone ?>">
            </div>
        </div>
        <?php if ($model->hasError('phone')): ?>
            <div class="help-block">
                <?php foreach ($model->getErrors('phone') as $error): ?>
                    <div class="clearfix"><?php echo $error ?></div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </div>
    <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat"
                    name="<?php echo $model->fieldName("save-button") ?>"
                    value="login"><?php echo translate('Save') ?></button>
        </div>
    </div>
</form>