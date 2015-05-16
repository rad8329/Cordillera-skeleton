<?php
use cordillera\base\Cordillera;
use cordillera\helpers\Url;

/* @var \modules\examples\site\models\LoginForm $model */
/* @var string $loginForm */
/* @var \cordillera\middlewares\View $this */
?>
<div id="login-box">
    <form action="<?= Url::relative('examples/site/login') ?>" method="post" id="loginform">
        <input type="hidden" name="<?= $model->field(Cordillera::app()->request->csrf_id) ?>"
               value="<?= Cordillera::app()->request->csrf_value ?>">

        <div class="clearfix field-loginform-username required <?= $model->hasError('username') ? 'has-error' : '' ?>">
            <div class="form-group has-feedback clearfix">
                <input type="text" id="loginform-username" class="form-control"
                       name="<?= $model->field('username') ?>"
                       placeholder="<?= translate('Username') ?>"
                       value="<?= $model->username ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <?php if ($model->hasError('username')): ?>
                <div class="help-block">
                    <?php foreach ($model->getErrors('username') as $error): ?>
                        <div class="clearfix"><?= $error ?></div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </div>
        <div class="clearfix field-loginform-password required <?= $model->hasError('password') ? 'has-error' : '' ?>">
            <div class="form-group has-feedback clearfix">
                <input type="password" id="loginform-password" class="form-control"
                       name="<?= $model->field('password') ?>"
                       placeholder="<?= translate('Password') ?>"
                       value="<?= $model->password ?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <?php if ($model->hasError('password')): ?>
                <div class="help-block">
                    <?php foreach ($model->getErrors('password') as $error): ?>
                        <div class="clearfix"><?= $error ?></div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </div>
        <div class="row">
            <div class="col-xs-8">
            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat"
                        name="<?= $model->field('login-button') ?>"
                        value="login"><?= translate('Login') ?>
                </button>
            </div>
        </div>
        <div class="bs-docs-section">
            <div class="bs-callout bs-callout-info">
                <h4>Example data</h4>

                <p>For login use <code>rdiaz/rdiaz</code> or <code>admin/admin</code></p>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery("#link_3").addClass("active"); //Active link
    });
</script>
