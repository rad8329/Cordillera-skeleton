<?php
use cordillera\base\Application;

/* @var \cordillera\middlewares\View $this */
/* @var \modules\examples\contacts\models\Contact $model */
/* @var string $contactForm */
?>
<form id="context-form-contact" class="form-horizontal" method="post" onsubmit="return Contact.form.submit(this);">
    <input type="hidden" name="<?= $model->field(Application::getRequest()->csrf_id) ?>"
           value="<?= Application::getRequest()->csrf_value ?>">
    <div id="field-gender" class="clearfix required">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <select class="form-control" name="<?= $model->field('gender') ?>">
                    <option value="<?= translate('female') ?>" <?= $model->gender == 'female' ? 'selected' : '' ?>>
                        <?= translate('Female') ?>
                    </option>
                    <option value="<?= translate('male') ?>" <?= $model->gender == 'male' ? 'selected' : '' ?>>
                        <?= translate('Male') ?>
                    </option>
                </select>
            </div>
        </div>
    </div>
    <div id="field-firstname" class="clearfix required">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input class="form-control" type="text"
                       name="<?= $model->field('firstname') ?>"
                       placeholder="<?= translate('First name') ?>" value="<?= $model->firstname ?>">
            </div>
        </div>
    </div>
    <div id="field-lastname" class="clearfix required">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input class="form-control" type="text"
                       name="<?= $model->field('lastname') ?>"
                       placeholder="<?= translate('Last name') ?>" value="<?= $model->lastname ?>">
            </div>
        </div>
    </div>
    <div id="field-email" class="clearfix required">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input class="form-control" type="text"
                       name="<?= $model->field('email') ?>"
                       placeholder="<?= translate('Email') ?>" value="<?= $model->email ?>">
            </div>
        </div>
    </div>
    <div id="field-address" class="clearfix required">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input class="form-control" type="text"
                       name="<?= $model->field('address') ?>"
                       placeholder="<?= translate('Address') ?>" value="<?= $model->address ?>">
            </div>
        </div>
    </div>
    <div id="field-phone" class="clearfix required">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input class="form-control" type="text"
                       name="<?= $model->field('phone') ?>"
                       placeholder="<?= translate('Phone') ?>" value="<?= $model->phone ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat"
                    name="<?= $model->field('save-button') ?>"
                    value="login"><?= translate('Save') ?>
            </button>
        </div>
    </div>
</form>
