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


			<!-- Main content -->
			<div class="content-wrapper">

                <!-- Page header -->
                <?php include D_TEMPLATE.'/sub_header.php'?>
                <!-- /page header -->

                <div class="container">
    <div class="row">
    <div class="col-md-5  toppad  pull-right col-md-offset-3 ">

<p class=" text-info"><?php

    $time = date('D M Y',time());
    echo $time;
    ?> </p>
    </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title"><?php
                $staff = new Staff();
                $staff13 = $staff->staff_one($session->staff_email);
                echo $staff13['fname'].' '.$staff13['lname'];
                ?></h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>

              <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                <dl>
                  <dt>DEPARTMENT:</dt>
                  <dd>Administrator</dd>
                  <dt>HIRE DATE</dt>
                  <dd>11/12/2013</dd>
                  <dt>DATE OF BIRTH</dt>
                     <dd>11/12/2013</dd>
                  <dt>GENDER</dt>
                  <dd>Male</dd>
                </dl>
              </div> -->
              <div class=" col-md-9 col-lg-9 ">
                <table class="table table-user-information">
                  <tbody>
                    <tr>
                      <td>Office:</td>
                      <td><?php
                          $section_level_list = new Section_levels_list();
                          $section_level_list8 = $section_level_list->select_section_level_list_id($staff13['inside_section_list_id']);
                          echo $section_level_list8['name'];
                          ?></td>
                    </tr>
                    <tr>
                        <td>Id:</td>
                        <td><?php echo $staff13['staff_id'];?></td>
                    </tr>
                    <tr>
                      <td>First Name:</td>
                      <td><?php echo $staff13['fname'];?></td>
                    </tr>
                    <tr>
                      <td>Middle:</td>
                      <td><?php echo $staff13['middle'];?></td>
                    </tr>

                       <tr>
                           <tr>
                      <td>Last Name:</td>
                      <td><?php echo $staff13['lname'];?></td>
                    </tr>
                    <tr>
                      <td>Email:</td>
                      <td><a href="<?php echo $staff13['email'];?>"><?php echo $staff13['email'];?></a></td>
                    </tr>
                      <td>Phone Number</td>
                      <td><?php echo '+255-'.$staff13['phone'];?>
                      </td>

                    </tr>
                    </tr>
                    <td>Password:</td>
                    <td>
                        <button class="btn btn-success icon-large edit-user-info-link" data-toggle="modal" data-target="#pass">Change
                        </button>
                    </td>

                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
	</div>
	<!-- /page container -->
            <?php require_once 'modals/modal_change_password.php';?>
</body>
</html>
