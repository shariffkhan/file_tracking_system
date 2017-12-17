<!DOCTYPE html>
<?php/*
require_once ('../Core/init.php');
$track = new Track();
$file = new Files();
if(isset($_GET['id'])){
    $my_id = $_GET['id'];
    $track->notified(1,$my_id);
}

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <?php    include D_TEMPLATE.'/header.php';?>

    <?php include D_TEMPLATE.'/shortcut_css.php';?>
    <style type="text/css">
        .send{
            display: none;
        }
        .div1 tr:hover td{
            background-color:#E8EAA0;
            transition: ease-out 1.5s
        }
        .div tr:hover.send{
            display: inline-block;
        }
    </style>
</head>

<body>

<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">
        <div class="content-wrapper">
            <?php

            $staff = new Staff();
            $session = new Session();
            $track  = new Track();
            $inside_section_list = new Inside_section_list();
            $receiver = $staff->staff_one($session->staff_email);
            $receiver_id =  $receiver['inside_section_list_id'];


            foreach ($track->track_receiver($receiver_id) as $track2) {
            $myid = $track2['file_id'];
            ?>
            <tr data-toggle="modal" data-target="<?php echo '#'.$myid;?>" title="Click to send this file..">
                <td>
                    <div class="media-body">
                        <div class="media-heading">
    															<span class="letter-icon-title"><?php

                                                                    $file_sent = $track2['file_id'];
                                                                    $file = new Files();
                                                                    $file_sent2 = $file->files_id($file_sent);
                                                                    echo $file_sent2['name'];
                                                                    ?></span>
                        </div>
                    </div>
                </td>
                <td>
                    <h6 class="text-semibold no-margin"><?php

                        $staff_sender = $track2['sender_id'];
                        $num = $inside_section_list->inside_section_list_id($staff_sender);
                        echo $num['name'];
                        ?></h6>
                </td>
                <td>
                    <span class="text-muted text-size-small"><?php echo $track2['time'];?></span>
                </td>
            </tr>
            <!-- modal start-->
            <div id="<?php echo $myid; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog" >
                    <div class="modal-content">

                        <div class="modal-body">
                            <form  method="post" action="profile.php">

                                <hr>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">File Name:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="filename" value="<?php echo $file_sent2['name'];   ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Staff:</label>
                                    <div class="controls">
                                        <select type="text" name="office"  class = "form-control">
                                            <option value="">Selection...</option>
                                            <?php
                                            foreach ($inside_section_list->select_office_dropdown($track2['receiver_id']) as $office_return){?>
                                                <option value="<?php echo $office_return['inside_section_list_id']?>"><?php echo $office_return['name'];?></option>
                                            <?php  }?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class = "modal-footer">
                            <button type="submit" class="btn btn-primary btn-xlg" name="<?php echo $myid ?>">SEND</button>
                            <button type="submit" class="btn btn-info" data-dismiss="modal">CANCEL</button></div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- modal end -->
<?php
if(isset($_POST[''.$myid.''])){
    $sender_id =  $receiver['inside_section_list_id'];

    $file_name = $myid;
    $user = $_POST['office'];
    if(!empty($sender_id) and !empty($user) and !empty($file_name)){
        $track = new Track();
        $track->insert_sent_file($sender_id, $user, $file_name);
        $track->notified1(0,$file_name,$track2['id']);
        $check = $permission->check_id($user);
        if($permission->haspermission('admin',$check['security_level_id'])) {
            $file->status(1,$file_name);
        }
    }else{
        echo 'Sorry file did not sent ';
    }
}
}
?>
</div>
</body>
</html>
