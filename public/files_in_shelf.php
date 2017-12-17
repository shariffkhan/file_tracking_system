<!DOCTYPE html>
<?php
require_once '../Core/init.php';
include 'login_include.php';

if(isset($_GET['page'])){
    $pageid = $_GET['page'];
}
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

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
                        <?php include 'modals/modal_add_files.php';?>
			<div class="content-wrapper">
                            <?php include D_TEMPLATE.'/sub_header.php'?>
                            <section id="container" class="">
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="col-lg-12">
                   <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myFiles">
                              Add File
                            </button>
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
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php

                                  $shelf = new Shelf();
                                  $shelf4 = $shelf->open_shelfs($pageid);
                                  $file = new Files();
                                  foreach ($file->files_shelf_id($shelf4['shelf_id']) as $file1){
                                  ?>
                                  <tr>
                                      <td><?php echo $file1['id']; ?></td>
                                      <td><?php echo $file1['file_id']; ?></td>
                                      <td><?php echo $file1['name']; ?></td>
                                  <td><?php echo $file1['volume']; ?></td>
                                  <td><?php
                                  if($file1['is_open'] == 0){
                                      echo "Closed";
                                  }else if($file1['is_open'] == 1){
                                    if($file1['status'] == 0){
                                      echo 'Onprocess ';
                                    }else if($file1['status'] == 1){
                                      echo 'Available ';
                                    }
                                  }

                                    ?></td>
                                 <td width="160">
                                     <a href="inside_file.php"><button class="btn btn-success icon-large edit-user-info-link">Open
                            </button> </a>
                                       </td>
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
        <?php include 'script.php';?>
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
