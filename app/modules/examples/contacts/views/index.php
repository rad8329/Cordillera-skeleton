<?php
use cordillera\base\Application;
use cordillera\helpers\Url;
use cordillera\middlewares\View;
use modules\examples\contacts\models\Contact;

/* @var View $this */
/* @var Contact[] $contacts */
/* @var int $total */

$this->layout->registerJsFile('//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js');
$this->layout->registerJsFile(Application::getRequest()->base_url.'media/modules/examples/contacts/js/contacts.js');
$this->layout->registerCssFile(Application::getRequest()->base_url.'media/modules/examples/contacts/css/contacts.css');
?>
<div class="container" id="contacts-module">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading c-list">
                    <span class="title"><?= translate('Contacts') ?></span>
                    <ul class="pull-right c-controls">
                        <?php if (Application::getAuth()->id): ?>
                            <?php if ($total >= 20): ?>
                                <li>
                                    <span data-toggle="tooltip"
                                          title="<?= translate('Contacts limit (20)') ?>">
                                        <i class="glyphicon glyphicon-exclamation-sign"></i>
                                    </span>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="#form-contact" data-toggle="tooltip" data-placement="top"
                                       data-context-handler="<?= Url::relative('examples/contacts/add') ?>"
                                       data-modal-title="<?= translate('Add a contact') ?>"
                                       title="<?= translate('Add Contact') ?>">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li>
                            <a href="#" class="hide-search" data-command="toggle-search" data-toggle="tooltip"
                               data-placement="top"
                               title="<?= translate('Toggle Search') ?>">
                                <i class="fa fa-ellipsis-v"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="row" style="display: none;">
                    <div class="col-xs-12">
                        <div class="input-group c-search">
                            <input type="text" class="form-control" id="contact-list-search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <span class="glyphicon glyphicon-search text-muted"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <ul class="list-group" id="contact-list">
                    <?php foreach ($contacts as $contact): ?>
                        <li class="list-group-item">
                            <div class="col-xs-12 col-sm-3">
                                <img src="<?= $contact->getAvatar() ?>" alt="<?= $contact->fullName() ?>"
                                     class="img-responsive img-circle"/>
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <?php if (Application::getAuth()->id): ?>
                                    <div class="pull-right options">
                                        <a data-toggle="tooltip" title="<?= translate('Edit contact') ?>"
                                           data-modal-title="<?= translate('Edit a contact') ?>"
                                           class="edit-trigger"
                                           href="<?= Url::relative('examples/contacts/edit', ['id' => $contact->id]) ?>">
                                            <i class="fa fa-pencil-square"></i></a>
                                        <a data-toggle="confirmation"
                                           title="<?= translate('Are you sure to delete this record?') ?>"
                                           class="delete-trigger"
                                           href="<?= Url::relative('examples/contacts/delete', ['id' => $contact->id]) ?>">
                                            <i class="fa fa-trash"></i></a>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <span class="name"><?= $contact->fullName() ?></span>
                                </div>
                                <?php if ($contact->address): ?>
                                    <div class="clearfix">
                                    <span class="fa fa-map-marker text-muted c-info"
                                          data-toggle="tooltip"
                                          title="<?= $contact->address ?>"></span><span
                                            class="text-muted"><?= $contact->address ?></span>
                                    </div>
                                <?php endif; ?>
                                <div class="clearfix">
                                    <span class="fa fa-phone text-muted c-info" data-toggle="tooltip"
                                          title="<?= $contact->phone ?>"></span><span
                                        class="text-muted"><?= $contact->phone ?></span>
                                </div>
                                <div class="clearfix">
                                    <span class="fa fa-comments text-muted c-info" data-toggle="tooltip"
                                          title="<?= $contact->email ?>"></span><span
                                        class="text-muted"><?= $contact->email ?></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php if (Application::getAuth()->id): ?>
        <div id="form-contact" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-label"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="modal-label">
                            <?= translate('Add a contact') ?>
                        </h4>
                    </div>
                    <div class="modal-body" id="form-contact-body">
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<script type="text/javascript">
    Contact.init();
</script>
