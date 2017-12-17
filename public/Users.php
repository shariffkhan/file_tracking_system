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
<?php
$staff = new Staff();
$sec = new security();
include 'modals/modal_add_user.php';?>

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
                          <header class="panel-heading" style="display:flex;">
													<div style="width:80%">
														Users List
													</div>
													<div style="width:20%">
													<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myuser">
																			Add Users
																		</button>
													</div>


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
                              <tbody id="changes">
                                  <?php

                                  foreach($staff->select_staff() as $staff1){
                                  $depid = $staff1['inside_section_list_id'];
                                  $secid = $staff1['security_level_id'];
                                  ?>
                                  <tr>
                                  <td><?php echo $staff1['id']; ?></td>
                                  <td><?php echo $staff1['fname']; ?></td>
                                  <td><?php echo $staff1['middle']; ?></td>
                                  <td><?php echo $staff1['lname']; ?></td>
                                <td>  <?php
                                  $dep = new Section_levels_list();
                                    $dep1 = $dep->select_section_level_list_id($depid);
                               				echo $dep1['name'];
                                            ?></td>
                                  <?php
                                        foreach ($sec->select_sec_id($secid) as $sec1){?>
                              <td> <?php echo $sec1['levels']; ?></td>
                                       <?php }
                                            ?>
                                 <td>

                                     <a href="#" role="button" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                     <button class="btn btn-success icon-large edit-user-info-link" data-toggle="modal" data-target="<?php echo '#mypermission'.$staff1['id'];?>">
                                         Permission
                                     </button>
                                 </td>
                                </tr>
                            <?php
                                $new_permission = $staff->staff_id($staff1['id']);
                                  include 'modals/modal_add_permission.php';
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
				function get_section2(val){
            $.ajax({
                type:"POST",
                url:"get_section1.php",
                data:"organisation_id="+val,
                success:function(data){
                    $("#section2").html(data);
                }
            });
        }
				function get_section_list2(val){
            $.ajax({
                type:"POST",
                url:"get_section_list1.php",
                data:"section_id="+val,
                success:function(data){
                    $("#section_list2").html(data);
                }
            });
        }
				function get_inside_section1(val){
						$.ajax({
								type:"POST",
								url:"get_inside_section1.php",
								data:"section_list_id="+val,
								success:function(data){
										$("#inside_section1").html(data);
								}
						});
				}
				function get_inside_section_list1(val){
            $.ajax({
                type:"POST",
                url:"get_inside_section_list.php",
                data:"inside_section_id="+val,
                success:function(data){
                    $("#inside_section_list_get2").html(data);
                }
            });
        }

				$(document).ready(function(){
					$.ajax({
						type:"POST",
						url:"changed_permission.php",
						success:function(data){
							$("#changes").html(data)
						}
					})
				})
        </script>
</body>
</html>
