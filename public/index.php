<!DOCTYPE html>
<?php
require_once '../Core/init.php';
require_once 'login_include.php';

?>
<html lang="en">
<head>


        <?php    include D_TEMPLATE.'/header.php';?>

        <?php include D_TEMPLATE.'/shortcut_css.php';?>

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



				<!-- Content area -->
				<?php include D_TEMPLATE.'/shortcuts.php';?>
				<!-- /content area -->
                                <?php include 'modals/modal_add_files.php';?>
                                <?php include 'modals/modal_add_user.php';?>

                <?php
               /* $permission = new permission();
                if($permission->haspermission('admin',$receiver['security_level_id'])){
                    echo 'your are adminstrator';
                }

                    $permission = new permission();
                    if($permissions = $permission->haspermission($receiver['security_level_id'])){
                        $n = array();
                        $n[] = json_decode($permissions['permissions']);
                                print_r($n);
                    }*/

                ?>
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

  /*$(document).ready(function () {
      $('#file_name').keyup(function () {
          var query = $(this).val()
          if(query != ''){
              $.ajax({
                  url:"search.php",
                  method:"POST",
                  data:{query:query},
                  success:function (data) {

                      $('#file_list').fadeIn();
                      $('#file_list').html(data);
                  }
              });
          }

      });
      $(document).on('click','li',function () {
          $('#file_name').val($(this).text());
          $('#file_list').fadeOut();

      })
  });*/

  </script>
    <script>

    </script>
</body>
</html>
