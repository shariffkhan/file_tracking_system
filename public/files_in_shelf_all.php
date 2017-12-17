<!DOCTYPE html>
<?php
require_once '../Core/init.php';
include 'login_include.php';
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IFM | FILE TRACKING SYSTEM</title>


        <?php    include D_TEMPLATE.'/header.php';?>
</head>

<body class="back">

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
                        <?php include 'modals/modal_add_files.php';?>
			<div class="content-wrapper">
                            <?php include D_TEMPLATE.'/sub_header.php'?>
                            <section id="container" class="">
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="col-lg-12">
                  <?php
                  if($permission->haspermission('admin',$receiver['security_level_id'])){ ?>

                      <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myFiles">
                          Add File
                      </button>
                  <?php }
                  ?>

				<!-- /page header -->


                      <section class="panel">
                          <header class="panel-heading">
                              Files List
                          </header>
                          <div class="table-responsive" >
                            <table class="table" id="dataTables-example">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>File Number</th>
                                  <th>File Name</th>
                                  <th>Volume</th>
                                  <th>Status</th>
                                    <th>Location</th>
                                    <?php
                                    if($permission->haspermission('admin',$receiver['security_level_id'])){ ?>
                                        <th>Actions</th>
                                       <?php }
                                    ?>

                                </tr>
                              </thead>
                              <tbody id="status">
                                  <?php
                                  $file = new Files();
                                  foreach ($file->select_files() as $file2) {
                                      $modal_track_id = $file2['id'];
                                      ?>
                                      <tr id="status">
                                          <td><?php echo $file2['id']; ?></td>
                                          <td><a href="inside_file.php?page=<?php echo $file2['id'];?>" title="Click to Open File"><?php echo $file2['file_id']; ?></a></td>
                                          <td><?php echo $file2['name']; ?></td>
                                          <td><?php echo $file2['volume']; ?></td>
                                          <td ><?php
                                              if($file2['is_open'] == 0){
                                                  echo "Closed";
                                              }else if($file2['is_open'] == 1){
                                                  if($file2['status'] == 0){
                                                      echo 'Onprocess ';
                                                  }else if($file2['status'] == 1){
                                                      echo 'Available ';
                                                  }
                                              }

                                              ?></td>
                                          <td>
                                              <button class="btn btn-success icon-large edit-user-info-link" data-toggle="modal" data-target="<?php echo '#'.$modal_track_id;?>">Location
                                              </button>
                                          </td>
                                          <?php
                                          if($permission->haspermission('admin',$receiver['security_level_id'])){ ?>

                                              <td>
                                                  <button class="btn btn-success icon-large edit-user-info-link" data-toggle="modal" data-target="<?php echo '#edit'.$modal_track_id; ?>">Edit
                                                  </button>
                                                  <a href="../delete/delete_file.php?file_id=<?php echo $modal_track_id;?>" role="button" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                                  <button class="btn btn-success icon-large edit-user-info-link" data-toggle="modal" data-target="<?php echo '#send'.$modal_track_id; ?>">Send
                                                  </button>

                                              </td>
                                          <?php }
                                          ?>

                                      </tr>
                                      <?php
                                      $new_sent = $file->files_id($modal_track_id);
                                      include 'modals/modal_send_file.php';


                                      if($file2['is_open'] == 0){ ?>
                                          <div id="<?php echo $modal_track_id; ?>" class="modal fade">
                                              <div class="modal-dialog">
                                                  <div class="modal-content">
                                                      <div class="modal-body">
                                                          <div class="alert alert-info alert-styled-left text-blue-800 content-group">
						                <span class="text-semibold">Current Location of The File
						                <button type="button" class="close" data-dismiss="alert">×</button>
                                                          </div>

                                                          <h6 class="text-semibold">File Name:</h6>
                                                          <p><?php
                                                              echo $file2['file_id'].'&nbsp;-&nbsp;'.$file2['name'];
                                                              ?>
                                                          </p>

                                                          <hr>
                                                          <h6 class="text-semibold"></h6>
                                                          <p>
                                                              File Location:&nbsp;<?php
                                                              echo 'Closed';
                                                              ?>
                                                          </p>
                                                      </div>

                                                      <div class="modal-footer">
                                                          <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Close</button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      <?php }else if($file2['is_open'] == 1){
                                          if($file2['status'] == 0){ ?>
                                              <!-- start modal -->
                                              <div id="<?php echo $modal_track_id; ?>" class="modal fade">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-body">
                                                              <div class="alert alert-info alert-styled-left text-blue-800 content-group">
						                <span class="text-semibold">Current Location of The File
						                <button type="button" class="close" data-dismiss="alert">×</button>
                                                              </div>

                                                              <h6 class="text-semibold">File Name:</h6>
                                                              <p><?php
                                                                  echo $file2['file_id'].'&nbsp;-&nbsp;'.$file2['name'];
                                                                  ?>
                                                                  &nbsp; Folio:<?php
                                                                  $folio = new Folio();
                                                                  $folio3 = $folio->select_folio_fileid($file2['id']);
                                                                  echo $folio3['id'].' - '.$folio3['name'];
                                                                  ?>
                                                              </p>

                                                              <hr>
                                                              <h6 class="text-semibold"></h6>
                                                              <p>
                                                                  File Location:&nbsp;<?php
                                                                  $track = new Track();
                                                                  $max_me = $track->track_file_with_maxfile_id($modal_track_id);
                                                                  $tracked = $track->track_file_with_file_id($modal_track_id,$max_me['myid']);
                                                                  $staff = new Staff();
                                                                  $section_level_list = new Section_levels_list();
                                                                  $display = $section_level_list->select_section_level_list_id($tracked['receiver_id']);
                                                                  echo $display['name'];

                                                                  ?>

                                                                  &nbsp;&nbsp;Time sent:&nbsp;
                                                                  <?php   echo $tracked['time'];?>
                                                              </p>
                                                          </div>

                                                          <div class="modal-footer">
                                                              <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Close</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <!-- end modal -->
                                          <?php }else if($file2['status'] == 1){?>
                                              <div id="<?php echo $modal_track_id; ?>" class="modal fade">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-body">
                                                              <div class="alert alert-info alert-styled-left text-blue-800 content-group">
						                <span class="text-semibold">Current Location of The File
						                <button type="button" class="close" data-dismiss="alert">×</button>
                                                              </div>

                                                              <h6 class="text-semibold">File Name:</h6>
                                                              <p><?php
                                                                  echo $file2['file_id'].'&nbsp;-&nbsp;'.$file2['name'];
                                                                  ?>
                                                                  &nbsp;
                                                                  Folio:<?php
                                                                  $folio = new Folio();
                                                                  $folio3 = $folio->select_folio_fileid($file2['id']);
                                                                  echo $folio3['id'].' - '.$folio3['name'];
                                                                  ?>
                                                              </p>

                                                              <hr>
                                                              <h6 class="text-semibold"></h6>
                                                              <p>
                                                                  File Location:&nbsp;<?php echo 'Registry Office'?>
                                                                  &nbsp; Cabinet:
                                                                  <?php
                                                                  $cab = new cabinet();
                                                                  $locate_cab = $cab->open_cabinets($file2['cabinet_id']);
                                                                  echo $locate_cab['name'];
                                                                  ?>
                                                                  &nbsp; Shelf:
                                                                  <?php
                                                                  $shelf = new Shelf();
                                                                  $locate_shelf= $shelf->open_shelfs($file2['shelf_id']);
                                                                  echo $locate_shelf['name'];
                                                                  ?>
                                                              </p>
                                                          </div>

                                                          <div class="modal-footer">
                                                              <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Close</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          <?php }
                                      }
                                      $new = $file->files_id($file2['id']);
                                      include('modals/modal_edit_files.php');
                                  }
                                  ?>
                              </tbody>
                            </table>
                          </div>
                      </section>
                  </div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
					</div>
				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
        <?php include 'script.php';?>
<script>
        function get_cabinet_edit(val){
            $.ajax({
                type:"POST",
                url:"get_cabinet_edit.php",
                data:"filetype_id="+val,
                success:function(data){
                    $("#cabinet-list_edit").html(data);
                }
            });
        }
        function get_shelf_edit(val){
            $.ajax({
                type:"POST",
                url:"get_shelf_edit.php",
                data:"cabinet_id="+val,
                success:function(data){
                    $("#shelf-list_edit").html(data);
                }
            });
        }

        $(document).ready(function () {
            $.ajax({
                url:'change_status.php',
                type:'POST',
                success:function (data) {
                    $('#status').html(data);
                }
            });
        });



        </script>
<?php
if(isset($_GET['this_id'])){
    $get_this = $_GET['this_id'];
    ?>
<?php
}

?>


</body>
</html>
