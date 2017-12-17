<!DOCTYPE html>
<?php require_once '../Core/init.php';
include 'login_include.php';
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>
        <link href="../js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
        <?php    include D_TEMPLATE.'/header.php';?>

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

			<div class="content-wrapper">
                            <?php include D_TEMPLATE.'/sub_header.php';?>
                            <section id="container" class="">
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="col-lg-12">

				<!-- /page header -->

                      <section class="panel">
                          <header class="panel-heading">
                              Users List
                          </header>
                          <div class="table-responsive" >
                            <table class="table datatable-basic">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>File Id</th>
                                    <th>File Name</th>
                                    <th>Folio Name</th>
                                  <th>Sender</th>
                                  <th>Receiver</th>
                                  <th>Time</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
																	$track = new Track();
																	$section_level_list = new Section_levels_list();
                                  foreach($track->select_track_received() as $track1){
																		$track_file_id = $track1['file_id'];
																		$track_sender = $track1['sender_id'];
																		$track_receiver = $track1['receiver_id'];
                                  ?>
																	<tr>
                                  <td><?php echo $track1['id']; ?></td>
                                  <td><?php
																		$file = new Files();
																		$file_id_track = $file->files_id($track_file_id);
																		echo $file_id_track['file_id'];
																	?></td>
																	<td><?php
																		$file = new Files();
																		$file_name_track = $file->files_id($track_file_id);
																		echo $file_name_track['name'];
																	?></td>
                                                                        <td>
                                                                            <?php
                                                                            $folio = new Folio();
                                                                            $folio4 = $folio->select_folio_fileid($track1['file_id']);
                                                                            echo $folio4['name'];
                                                                            ?>
                                                                        </td>
                                  <td><?php
																	 $sender_track = $section_level_list->select_section_level_list_id($track_sender);
																	 echo $sender_track['name'];
																	 ?></td>

                                  <td><?php
																	 $receiver_track = $section_level_list->select_section_level_list_id($track_receiver);
																	 echo $receiver_track['name'];
																	 ?></td>
                                  <td><?php echo $track1['time']; ?></td>
                                </tr>
                            <?php  }
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
        <script>
        function get_cabinet(val){
            $.ajax({
                type:"POST",
                url:"get_cabinet.php",
                data:"filetype_id="+val,
                success:function(data){
                    $("#cabinet-list").html(data);
                }
            });
        }
        function get_shelf(val){
            $.ajax({
                type:"POST",
                url:"get_shelf.php",
                data:"cabinet_id="+val,
                success:function(data){
                    $("#shelf-list").html(data);
                }
            });
        }
        </script>
</body>
</html>
