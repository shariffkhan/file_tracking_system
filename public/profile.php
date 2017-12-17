<!DOCTYPE html>
<?php
require_once '../Core/init.php';
include 'login_include.php';


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

<!-- Main navbar -->
<?php include D_TEMPLATE.'/navigation.php'?>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <?php include D_TEMPLATE.'/sidebar.php'?>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">
            <?php
            if(!$permission->haspermission('admin',$receiver['security_level_id'])){ ?>
                <div class="col-lg-5">
                    <!-- Traffic sources -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h4><span class="text-bold text-orange-600">RECEIVED FILES </span></h4>
                        </div>

                        <div class="container-fluid">

                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table text-nowrap">
                                        <thead>
                                        <tr class="text-orange-600">
                                            <th>File Name</th>
                                            <th>From</th>
                                            <th>Time</th>
                                        </tr>
                                        </thead>
                                        <tbody id="received">
                                          <?php
                                      // notification codes in php oop
                                      $staff = new Staff();
                                      $file = new Files();
                                      $track = new Track();
                                          $receiver = $staff->staff_one($session->staff_email);
                                          $receiver_id = $receiver['inside_section_list_id'];
                                          foreach ($track->track_receiver($receiver_id) as $track2) {
                                              $myid = $track2['file_id'];
                                              ?>
                                              <tr data-toggle="modal" data-target="<?php echo '#file_sent'.$myid; ?>" title="Click to send this file..">
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
                                                          $section_level_list = new Section_levels_list();
                                                          $num = $section_level_list->select_section_level_list_id($staff_sender);
                                                          echo $num['name'];
                                                          ?></h6>
                                                  </td>
                                                  <td>
                                                      <span class="text-muted text-size-small"><?php echo $track2['time']; ?></span>
                                                  </td>
                                              </tr>
                                              <?php
                                              include ('modals/modal_send_profile_file.php');
                                          }

                                      ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="content-group" id="new-visitors"></div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- /traffic sources -->
                </div>
            <?php  }
            ?>

            <div class="col-lg-6">
                <!-- Traffic sources -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h4><span class="text-bold text-blue-600">SENT FILES </span></h4>
                    </div>

                    <div class="container-fluid">

                        <div class="col">
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                    <tr class="text-blue-600">
                                        <th>File Name</th>
                                        <th>To</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody id="sent">
                                    <?php

                                    $track = new Track();
                                    $send2 = $staff->staff_one($session->staff_email);
                                    foreach ($track->select_track_sent($send2['inside_section_list_id']) as $track3) {
                                        $recever_fileid = $track3['id'];
                                        ?>
                                        <tr >
                                            <td>
                                                <div class="media-body">
                                                    <div class="media-heading">
															<span class="letter-icon-title">
                                                            <?php

                                                            $file_sent3 = $track3['file_id'];
                                                            $file_sent4 = $file->files_id($file_sent3);
                                                            echo $file_sent4['name'];
                                                            ?>
                                                            </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="text-semibold no-margin">
                                                    <?php

                                                    $staff_receiver = $track3['receiver_id'];
                                                    $section_level_list = new Section_levels_list();
                                                    $num1 = $section_level_list->select_section_level_list_id($staff_receiver);
                                                    echo $num1['name'];
                                                    ?>
                                                </h6>
                                            </td>
                                            <td>
                                                <span class="text-muted text-size-small"><?php echo $track3['time'];?></span>
                                            </td>
                                            <td>
                                                <h6 class="text-semibold no-margin"><span class="label bg-grey-400">
                                                        <?php
                                                        if($track3['is_notified']== 0){
                                                            echo "Pending";
                                                        }
                                                        ?></span></h6>
                                            </td>
                                        </tr>

                                    <?php }
                                    ?>


                                    </tbody>
                                </table>
                            </div>

                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="content-group" id="new-visitors"></div>
                            </div>
                        </div>


                    </div>
                </div>


                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->
<script>
    $(document).ready(function () {
            $.ajax({
                url:'fetch.php',
                type:'POST',
                success:function (data) {
                    $("#received").html(data);
                }
            });
    });
    </script>
</body>
</html>
