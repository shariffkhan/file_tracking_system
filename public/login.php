<?php
require_once '../Core/init.php';

 $session = new session();

  if ($session->logged()) {
      header("Location: index.php");
  }

  if (isset($_POST['submitted'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // login the user?>
<script>
    
    alert(<?php
        Staff::login_staff($email, $password)
?>);
</script>
    
    
    <?php
    
  }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FILE TRACKING</title>

	<!-- Global stylesheets -->
	<?php include D_TEMPLATE.'/header.php'?>

	<!-- Theme JS files -->
	<script type="text/javascript" src="../assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="../assets/js/core/app.js"></script>
	<script type="text/javascript" src="../assets/js/pages/login_validation.js"></script>
	<!-- /theme JS files -->

</head>

<body class="login-cover">
    
    <?php
    
    ?>
	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

                    <div class="center-block" style="margin-right: 100px; margin-left: 100px;">
                        <!-- welcom div -->
                        <div class="panel" style="background-color: rgba(255,255,255,0.5);">
                            <div class="text-black" style="margin-top:20px; text-align:center; color:white; font-size:29px">
                                WELCOME TO <span style="color: #0091cd">(IFM) INSTITUTE OF FINANCE MANAGEMENT</span>
                            </div>

                            <div class="table-responsive">
                                <img src="assets/images/logo-lg.png" class="center-block">
                            </div>
                            <span class="btn center-block" style=" margin-right: 420px; margin-left: 420px; margin-bottom: 20px"><a href="#mylog" style="color:white;" class="text-bold" data-toggle="modal" data-target="#mylog">LOGIN </a> </span>
                        </div>

                        <!-- /welcome div -->
                    </div>
					<!-- Form with validation -->
                                       <?php include 'modals/modal_login.php';?>
					<!-- /form with validation -->


					<!-- Footer -->
					<div class="footer text-white">
                                            &copy; <?php echo date('Y',time());?>. <a href="#" class="text-white">FILE TRACKING SYSTEM</a>  <a href="http://themeforest.net/user/Kopyov" class="text-white" target="_blank"></a>
					</div>
					<!-- /footer -->

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
