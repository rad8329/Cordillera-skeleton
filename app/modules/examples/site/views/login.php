<?php
use cordillera\base\Application;
use cordillera\helpers\Url;

/** @var \modules\examples\site\models\LoginForm $model */
/** @var string $loginForm */
/** @var \cordillera\middlewares\View $this */

$loginForm = $model->fieldName("LoginForm");
?>
<div id="login-box">
    <form action="<?php echo Url::relative("examples/site/login") ?>" method="post" id="loginform">
        <input type="hidden" name="<?php echo $model->fieldName(Application::getRequest()->csrf_id) ?>"
               value="<?php echo Application::getRequest()->csrf_value ?>">

        <div
            class="clearfix field-loginform-username required <?php echo $model->hasError('username') ? 'has-error' : '' ?>">
            <div class="form-group has-feedback clearfix">
                <input type="text" id="loginform-username" class="form-control"
                       name="<?php echo $loginForm . "[" . $model->fieldName("username") . "]" ?>"
                       placeholder="<?php echo Application::getLang()->translate('Username') ?>"
                       value="<?php echo $model->username ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <?php if ($model->hasError('username')): ?>
                <div class="help-block">
                    <?php foreach ($model->getErrors('username') as $error): ?>
                        <div class="clearfix"><?php echo $error ?></div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </div>
        <div
            class="clearfix field-loginform-password required <?php echo $model->hasError('password') ? 'has-error' : '' ?>">
            <div class="form-group has-feedback clearfix">
                <input type="password" id="loginform-password" class="form-control"
                       name="<?php echo $loginForm . "[" . $model->fieldName("password") . "]" ?>"
                       placeholder="<?php echo Application::getLang()->translate('Password') ?>"
                       value="<?php echo $model->password ?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <?php if ($model->hasError('password')): ?>
                <div class="help-block">
                    <?php foreach ($model->getErrors('password') as $error): ?>
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
                        name="<?php echo $model->fieldName("login-button") ?>"
                        value="login"><?php echo Application::getLang()->translate('Login') ?></button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery("#link_3").addClass("active"); //Active link
    });
</script>