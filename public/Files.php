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
<?php include 'modals/modal_add_user.php';?>

			<div class="content-wrapper">
                            <?php include D_TEMPLATE.'/sub_header.php'?>
                            <section id="container" class="">
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="col-lg-12">

				<!-- /page header -->
                  <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                              Add Users
                            </button>

                      <section class="panel">
                          <header class="panel-heading">
                              Users List
                          </header>
                          <div class="table-responsive" >
                            <table class="table" id="dataTables-example">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>First Number</th>
                                  <th>File Name</th>
                                  <th>Volume</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
																	$files = new Files();
																	foreach ($files->select_files as $files5){
                                  ?>
                                  <tr>
                                  <td><?php echo $files5['id']; ?></td>
                                  <td><?php echo $files5['file_id']; ?></td>
                                  <td><?php echo $files5['volume']; ?></td>
                                  <td><?php echo $files5['shelf_id']; ?></td>
                                 <td width="160">
                                     <button class="btn btn-success icon-large edit-user-info-link" data-toggle="modal" data-target="#myEdit">
                             Edit
                            </button>   </td>
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
</body>
</html>
