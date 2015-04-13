<?php
use cordillera\base\Application;
use cordillera\helpers\Url;
use cordillera\middlewares\View;
use modules\examples\contacts\models\Contact;

/** @var View $this */
/** @var Contact[] $contacts */
/** @var int $total */

$this->layout->registerJsFile("//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js");
$this->layout->registerJsFile(Application::getRequest()->base_url . "/media/modules/examples/contacts/js/contacts.js");
$this->layout->registerCssFile(Application::getRequest()->base_url . "/media/modules/examples/contacts/css/contacts.css");
?>
<div class="container" id="contacts-module">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading c-list">
                    <span class="title"><?php echo Application::getLang()->translate('Contacts') ?></span>
                    <ul class="pull-right c-controls">
                        <?php if (Application::getAuth()->id): ?>
                            <?php if ($total >= 20): ?>
                                <li>
                                    <span data-toggle="tooltip"
                                          title="<?php echo Application::getLang()->translate('Contacts limit (20)') ?>">
                                        <i class="glyphicon glyphicon-exclamation-sign"></i>
                                    </span>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="#form-contact" data-toggle="tooltip" data-placement="top"
                                       data-context-handler="<?php echo Url::relative("examples/contacts/add") ?>"
                                       data-modal-title="<?php echo translate("Add a contact") ?>"
                                       title="<?php echo Application::getLang()->translate('Add Contact') ?>">
                                        <i class="glyphicon glyphicon-plus"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li>
                            <a href="#" class="hide-search" data-command="toggle-search" data-toggle="tooltip"
                               data-placement="top"
                               title="<?php echo Application::getLang()->translate('Toggle Search') ?>">
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
                                <img src="<?php echo $contact->getAvatar() ?>" alt="<?php echo $contact->fullName() ?>"
                                     class="img-responsive img-circle"/>
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <?php if (Application::getAuth()->id): ?>
                                    <div class="pull-right">
                                        <a data-toggle="tooltip" title="<?php echo translate("Edit contact") ?>"
                                           data-modal-title="<?php echo translate("Edit a contact") ?>"
                                           class="edit-trigger"
                                           href="<?php echo Url::relative("examples/contacts/edit", ['id' => $contact->id]) ?>">
                                            <i class="fa fa-pencil-square"></i>
                                        </a>
                                        <a data-toggle="confirmation"
                                           title="<?php echo translate("Are you sure to delete this record?") ?>"
                                           class="delete-trigger"
                                           href="<?php echo Url::relative("examples/contacts/delete", ['id' => $contact->id]) ?>">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <span class="name"><?php echo $contact->fullName() ?></span><br/>
                                <?php if ($contact->address): ?>
                                    <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip"
                                          title="<?php echo $contact->address ?>"></span>
                                    <span class="text-muted"><?php echo $contact->address ?></span><br/>
                                <?php endif; ?>
                                <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip"
                                      title="<?php echo $contact->phone ?>"></span>
                                <span class="text-muted"><?php echo $contact->phone ?></span><br/>
                                <span class="fa fa-comments text-muted c-info" data-toggle="tooltip"
                                      title="<?php echo $contact->email ?>"></span>
                                <span class="text-muted"><?php echo $contact->email ?></span><br/>
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
                            <?php echo Application::getLang()->translate('Add a contact') ?>
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
