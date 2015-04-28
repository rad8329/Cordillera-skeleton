<?php
use cordillera\base\Application;
use cordillera\helpers\Url;

/* @var \modules\examples\site\models\LoginForm $model */
/* @var string $loginForm */
/* @var \cordillera\middlewares\View $this */
?>
<div id="login-box">
    <form action="<?php echo Url::relative('examples/site/login') ?>" method="post" id="loginform">
        <input type="hidden" name="<?php echo $model->field(Application::getRequest()->csrf_id) ?>"
               value="<?php echo Application::getRequest()->csrf_value ?>">

        <div class="clearfix field-loginform-username required <?php echo $model->hasError('username') ? 'has-error' : '' ?>">
            <div class="form-group has-feedback clearfix">
                <input type="text" id="loginform-username" class="form-control"
                       name="<?php echo $model->field('username') ?>"
                       placeholder="<?php echo translate('Username') ?>"
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
        <div class="clearfix field-loginform-password required <?php echo $model->hasError('password') ? 'has-error' : '' ?>">
            <div class="form-group has-feedback clearfix">
                <input type="password" id="loginform-password" class="form-control"
                       name="<?php echo $model->field('password') ?>"
                       placeholder="<?php echo translate('Password') ?>"
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
                        name="<?php echo $model->field('login-button') ?>"
                        value="login"><?php echo translate('Login') ?>
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
