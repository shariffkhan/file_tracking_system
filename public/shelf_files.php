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
                            <?php include D_TEMPLATE.'/sub_header.php'?>
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
                            <table class="table" id="dataTables-example">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>First Name</th>
                                  <th>Middle Name</th>
                                  <th>Last Name</th>
                                  <th>Departments</th>
                                  <th>Security level</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $tab_q = "select * from staffs where Departments_id = '$page[id]'";
                              $tab_r = mysqli_query($db, $tab_q);
                              while ($tab_row = mysqli_fetch_assoc($tab_r)) {
                                  $dep_id = $tab_row['Departments_id'];
                                  $sec_id = $tab_row['security_level_id'];
                                  ?>
                                  <tr>
                                  <td><?php echo $tab_row['id']; ?></td>
                                  <td><?php echo $tab_row['fname']; ?></td>
                                  <td><?php echo $tab_row['middle']; ?></td>
                                  <td><?php echo $tab_row['lname']; ?></td>
                                  <?php 
                                           department_table($db, $dep_id);
                                            ?>
                                  <?php 
                                            security_table($db, $sec_id);
                                            ?>
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

</body>
</html>


