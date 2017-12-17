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
                            <table class="table datatable-basic">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>First Name</th>
                                  <th>Middle Name</th>
                                  <th>Last Name</th>
                                  <th>Office</th>
                                  <th>Security level</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              $inside_section_list = new Inside_section_list();
                              $inside_section_list_id = $inside_section_list->inside_section_list_id($pageid);
                              $staff = new Staff();
                              foreach ($staff->staff_inside_section_list_id($inside_section_list_id['inside_section_list_id']) as $staff2){
                              $staff_inside_section_list_id = $staff2['inside_section_list_id'];
                              $sec_id = $staff2['security_level_id'];
                              ?>
                              <tr>
                              <td><?php echo $staff2['id']; ?></td>
                              <td><?php echo $staff2['fname']; ?></td>
                              <td><?php echo $staff2['middle']; ?></td>
                              <td><?php echo $staff2['lname']; ?></td>
                            <td>  <?php
                                    $inside_section_list3 = $inside_section_list->inside_section_list_id($staff_inside_section_list_id);
                                 echo $inside_section_list3['name'];
                                        ?>
                                </td>
                              <?php
                                        $sec = new security();
                                        foreach ($sec->select_sec_id($sec_id) as $sec3){ ?>
                                            <td><?php echo $sec3['levels']; ?></td>
                                       <?php }
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
