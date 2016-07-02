<?php
/**
 * Created by PhpStorm.
 * User: iman
 * Date: 7/2/16
 * Time: 3:48 PM
 */
require_once ("../includes/initialize.php");
$group = null;
$user = User::find_by_id($session->user_id);
$friends = $user->friends;
if(isset($_GET['id'])) {
    $group = Group::find_by_id($_GET['id']);
}

if(isset($_GET['user_id'])) {
    $group->members[]= $_GET['user_id'];
    $group->update();
    redirect_to("chat.php?id={$_GET['id']}&room_type=g");
}
?>

<?php include_layout_template('search-header.php'); ?>


<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-offset-3 col-sm-4">
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
                    <?php
                    if($friends)
                        foreach($friends as $user_id) {
                            $friend = User::find_by_id($user_id);
                            echo $friend->make_a_add_to_group_list_item($group->_id);
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <div id="add-to-contacts" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">Add to group</h4>
                </div>
                <div class="modal-body">
                    <p>Your selected user will be added to group</p><br/>


                </div>
            </div>
        </div>
    </div>

    <!-- JavaScrip Search Plugin -->
    <script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>
    <script type="text/javascript" src="js/search.js"></script>
</div>
<?php include_layout_template('login-footer.php'); ?>

