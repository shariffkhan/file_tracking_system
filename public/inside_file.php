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


			<!-- Main content -->
			<div class="content-wrapper">
                            <?php include D_TEMPLATE.'/sub_header_faculty.php'?>
                            <section id="container" class="">
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="col-lg-12">
                  <section class="wrapper">

              <!-- page start-->
              <div class="col-lg-12">
                  <section class="wrapper">

              <!-- page start-->
              <div class="col-lg-12">
                  <?php include 'modals/modal_add_folio.php';?>
                  <?php include 'modal_page/folio.php';?>

                  </div>

              <!-- page end-->
          </section>

                  </div>

              <!-- page end-->
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
