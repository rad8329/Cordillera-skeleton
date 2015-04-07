<?php
use cordillera\base\Application;

/** @var \cordillera\middlewares\View $this */

$this->layout->registerJsFile("//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js");
$this->layout->registerJsFile(Application::getRequest()->base_url . "/media/modules/examples/contacts/js/contacts.js");
$this->layout->registerCssFile(Application::getRequest()->base_url . "/media/modules/examples/contacts/css/contacts.css");
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading c-list">
                    <span class="title"><?php echo Application::getLang()->translate('Contacts') ?></span>
                    <ul class="pull-right c-controls">
                        <?php if (Application::getAuth()->id): ?>
                        <li><a href="#add-contact" data-toggle="tooltip" data-placement="top" title="<?php echo Application::getLang()->translate('Add Contact') ?>"><i class="glyphicon glyphicon-plus"></i></a></li>
                        <?php endif; ?>
                        <li><a href="#" class="hide-search" data-command="toggle-search" data-toggle="tooltip" data-placement="top" title="<?php echo Application::getLang()->translate('Toggle Search') ?>"><i class="fa fa-ellipsis-v"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="row" style="display: none;">
                    <div class="col-xs-12">
                        <div class="input-group c-search">
                            <input type="text" class="form-control" id="contact-list-search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search text-muted"></span></button>
                            </span>
                        </div>
                    </div>
                </div>

                <ul class="list-group" id="contact-list">
                    <li class="list-group-item">
                        <div class="col-xs-12 col-sm-3">
                            <img src="http://api.randomuser.me/portraits/men/80.jpg" alt="Scott Stevens" class="img-responsive img-circle"/>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <span class="name">Camilo Ossa</span><br/>
                            <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="5842 Hillcrest Rd"></span>
                            <span class="text-muted">5842 Hillcrest Rd</span><br/>
                            <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(870) 288-4149"></span>
                            <span class="text-muted">(870) 288-4149</span><br/>
                            <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="scott.stevens@example.com"></span>
                            <span class="text-muted">scott.stevens@example.com</span><br/>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <li class="list-group-item">
                        <div class="col-xs-12 col-sm-3">
                            <img src="http://api.randomuser.me/portraits/men/33.jpg" alt="Seth Frazier" class="img-responsive img-circle"/>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <span class="name">Seth Frazier</span><br/>
                            <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="7396 E North St"></span>
                            <span class="text-muted">7396 E North St</span><br/>
                            <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(560) 180-4143"></span>
                            <span class="text-muted">(560) 180-4143</span><br/>
                            <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="seth.frazier@example.com"></span>
                            <span class="text-muted">seth.frazier@example.com</span><br/>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <li class="list-group-item">
                        <div class="col-xs-12 col-sm-3">
                            <img src="http://api.randomuser.me/portraits/women/90.jpg" alt="Jean Myers" class="img-responsive img-circle"/>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <span class="name">Jean Myers</span><br/>
                            <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="4949 W Dallas St"></span>
                            <span class="text-muted">4949 W Dallas St</span><br/>
                            <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(477) 792-2822"></span>
                            <span class="text-muted">(477) 792-2822</span><br/>
                            <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="jean.myers@example.com"></span>
                            <span class="text-muted">jean.myers@example.com</span><br/>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <li class="list-group-item">
                        <div class="col-xs-12 col-sm-3">
                            <img src="http://api.randomuser.me/portraits/men/2.jpg" alt="Todd Shelton" class="img-responsive img-circle"/>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <span class="name">Todd Shelton</span><br/>
                            <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="5133 Pecan Acres Ln"></span>
                            <span class="text-muted">5133 Pecan Acres Ln</span><br/>
                            <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(522) 991-3367"></span>
                            <span class="text-muted">(522) 991-3367</span><br/>
                            <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="todd.shelton@example.com"></span>
                            <span class="text-muted">todd.shelton@example.com</span><br/>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <li class="list-group-item">
                        <div class="col-xs-12 col-sm-3">
                            <img src="http://api.randomuser.me/portraits/women/6.jpg" alt="Rosemary Porter" class="img-responsive img-circle"/>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <span class="name">Rosemary Porter</span><br/>
                            <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="5267 Cackson St"></span>
                            <span class="text-muted">5267 Cackson St</span><br/>
                            <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(497) 160-9776"></span>
                            <span class="text-muted">(497) 160-9776</span><br/>
                            <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="rosemary.porter@example.com"></span>
                            <span class="text-muted">rosemary.porter@example.com</span><br/>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <li class="list-group-item">
                        <div class="col-xs-12 col-sm-3">
                            <img src="http://api.randomuser.me/portraits/women/15.jpg" alt="Debbie Schmidt" class="img-responsive img-circle"/>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <span class="name">Debbie Schmidt</span><br/>
                            <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="3903 W Alexander Rd"></span>
                            <span class="text-muted">3903 W Alexander Rd</span><br/>
                            <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(867) 322-1852"></span>
                            <span class="text-muted">(867) 322-1852</span><br/></span>
                            <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="debbie.schmidt@example.com"></span>
                            <span class="text-muted">debbie.schmidt@example.com</span><br/>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <li class="list-group-item">
                        <div class="col-xs-12 col-sm-3">
                            <img src="http://api.randomuser.me/portraits/women/50.jpg" alt="Glenda Patterson" class="img-responsive img-circle"/>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <span class="name">Glenda Patterson</span><br/>
                            <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="5020 Poplar Dr"></span>
                            <span class="text-muted">5020 Poplar Dr</span><br/>
                            <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(538) 718-7548"></span>
                            <span class="text-muted">(538) 718-7548</span><br/>
                            <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="glenda.patterson@example.com"></span>
                            <span class="text-muted">glenda.patterson@example.com</span><br/>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php if (Application::getAuth()->id): ?>
    <div id="add-contact" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="modal-label"><?php echo Application::getLang()->translate('Add a contact') ?></h4>
                </div>
                <div class="modal-body">
                    <p>I am being lazy and do not want to program an "Add User" section into this snippet... So it looks like you'll have to do that for yourself.</p><br/>

                    <p><strong>Sorry<br/>
                            ~ Mouse0270</strong></p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery("#link_2").addClass("active"); //Active link
    });
</script>