<?php
use cordillera\helpers\Url;
use cordillera\base\Application;

/** @var \cordillera\middlewares\View $this */
/** @var \modules\examples\contacts\models\Contact $model */
/** @var string $contactForm */

$contactForm = $model->fieldName("Contact");
?>
<form id="context-form-contact" class="form-horizontal" method="post" onsubmit="return contact.form.submit(this);">
    <input type="hidden" name="<?php echo $model->fieldName(Application::getRequest()->csrf_id) ?>"
           value="<?php echo Application::getRequest()->csrf_value ?>">

    <div id="field-gender" class="clearfix required">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <select class="form-control"
                        name="<?php echo $contactForm . "[" . $model->fieldName("gender") . "]" ?>">
                    <option
                        value="<?php echo translate("female") ?>" <?php echo $model->gender == 'female' ? 'selected' : '' ?>>
                        <?php echo translate("Female") ?>
                    </option>
                    <option
                        value="<?php echo translate("male") ?>" <?php echo $model->gender == 'male' ? 'selected' : '' ?>>
                        <?php echo translate("Male") ?>
                    </option>
                </select>
            </div>
        </div>
    </div>
    <div id="field-firstname" class="clearfix required">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input class="form-control" type="text"
                       name="<?php echo $contactForm . "[" . $model->fieldName("firstname") . "]" ?>"
                       placeholder="<?php echo translate("First name") ?>" value="<?php echo $model->firstname ?>">
            </div>
        </div>
    </div>
    <div id="field-lastname" class="clearfix required">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input class="form-control" type="text"
                       name="<?php echo $contactForm . "[" . $model->fieldName("lastname") . "]" ?>"
                       placeholder="<?php echo translate("Last name") ?>" value="<?php echo $model->lastname ?>">
            </div>
        </div>
    </div>
    <div id="field-email" class="clearfix required">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input class="form-control" type="text"
                       name="<?php echo $contactForm . "[" . $model->fieldName("email") . "]" ?>"
                       placeholder="<?php echo translate("Email") ?>" value="<?php echo $model->email ?>">
            </div>
        </div>
    </div>
    <div id="field-address" class="clearfix required">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input class="form-control" type="text"
                       name="<?php echo $contactForm . "[" . $model->fieldName("address") . "]" ?>"
                       placeholder="<?php echo translate("Address") ?>" value="<?php echo $model->address ?>">
            </div>
        </div>
    </div>
    <div id="field-phone" class="clearfix required">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input class="form-control" type="text"
                       name="<?php echo $contactForm . "[" . $model->fieldName("phone") . "]" ?>"
                       placeholder="<?php echo translate("Phone") ?>" value="<?php echo $model->phone ?>">
            </div>
        </div>
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