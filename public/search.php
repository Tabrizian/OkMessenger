<?php require_once('../includes/initialize.php'); ?>
<?php include_layout_template('search-header.php'); ?>


<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-offset-3 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading c-list">
                    <span class="title">Users</span>
                    <ul class="pull-right c-controls">
                        <li><a href="#add-to-contacts" data-toggle="tooltip" data-placement="top" title="Add Contact"><i class="glyphicon glyphicon-plus"></i></a></li>
                        <li><a href="#" class="hide-search" data-command="toggle-search" data-toggle="tooltip" data-placement="top" title="Toggle Search"><i class="fa fa-ellipsis-v"></i></a></li>
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
                            <img src="https://avatars1.githubusercontent.com/u/10105175?v=3&s=400" alt="Scott Stevens" class="img-responsive img-circle" />
                        </div>
                        <div class="col-xs-12 col-sm-9">

                            <span class="name">Iman Tabrizian</span><br/>
                            <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="Tehran iran"></span>
                            <span class="visible-xs"> <span class="text-muted">Tehran Iran</span><br/></span>
                            <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="09371234567"></span>
                            <span class="visible-xs"> <span class="text-muted">09371234567</span><br/></span>
                            <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="iman.tabrizian@gmail.com"></span>
                            <span class="visible-xs"> <span class="text-muted">iman.tabrizian@gmail.com</span><br/></span>

                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <li class="list-group-item">
                        <div class="col-xs-12 col-sm-3">
                            <img src="https://avatars1.githubusercontent.com/u/11219480?v=3&s=400" alt="aliakbar" class="img-responsive img-circle" />
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <span class="name">aliAkbar</span><br/>
                            <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="Qom iran"></span>
                            <span class="visible-xs"> <span class="text-muted">Qom Iran</span><br/></span>
                            <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="09101234567"></span>
                            <span class="visible-xs"> <span class="text-muted">09101234567</span><br/></span>
                            <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="badri@example.com"></span>
                            <span class="visible-xs"> <span class="text-muted">badri@example.com</span><br/></span>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <li class="list-group-item">
                        <div class="col-xs-12 col-sm-3">
                            <img src="https://avatars2.githubusercontent.com/u/11619295?v=3&s=400" alt="Emran Batman" class="img-responsive img-circle" />
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <span class="name">Emran Batman</span><br/>
                            <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="Tehran Iran"></span>
                            <span class="visible-xs"> <span class="text-muted">Tehran Iran</span><br/></span>
                            <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="09131234567"></span>
                            <span class="visible-xs"> <span class="text-muted">09131234567</span><br/></span>
                            <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="emran.batman@example.com"></span>
                            <span class="visible-xs"> <span class="text-muted">emran.batman@example.com</span><br/></span>
                        </div>
                        <div class="clearfix"></div>
                    </li>

                    <li class="list-group-item">
                        <div class="col-xs-12 col-sm-3">
                            <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/17241-200.png" alt="user4" class="img-responsive img-circle" />
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <span class="name">user4</span><br/>
                            <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="tehran Iran"></span>
                            <span class="visible-xs"> <span class="text-muted">Tehran Iran</span><br/></span>
                            <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="09130917151"></span>
                            <span class="visible-xs"> <span class="text-muted">09130917151</span><br/></span>
                            <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="user4@example.com"></span>
                            <span class="visible-xs"> <span class="text-muted">user4@example.com</span><br/></span>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="add-to-contacts" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">add freind!</h4>
                </div>
                <div class="modal-body">
                    <p>your selected user added to your friends</p><br/>


                </div>
            </div>
        </div>
    </div>

    <!-- JavaScrip Search Plugin -->
    <script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>
    <script type="text/javascript" src="js/search.js"></script>
</div>
<?php include_layout_template('login-footer.php'); ?>
