<!DOCTYPE html>
<?php require_once '../Core/init.php';
include 'login_include.php';
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/materialize.css">

        <?php    include D_TEMPLATE.'/header.php';?>

				<style type="text/css">
				            .touch:hover{
				                background-color: rgba(0,150,136,0.2);
				                border-color: orange;
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
                        <?php include 'modals/modal_add_cabinets.php';?>
                        <?php include 'modals/modal_add_file_type.php';?>
                        <?php include 'modals/modal_add_shelf.php';?>
                        <?php include 'modals/modal_add_tables_name.php';?>
                         <?php include 'modals/modal_add_tables_list.php';?>

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<?php include D_TEMPLATE.'/sub_header.php'?>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">
						<?php include 'parts_within_tables_input/file_type.php';?>

						<?php include 'parts_within_tables_input/cabinets.php';?>

						<?php include 'parts_within_tables_input/shelfs.php';?>

                         <?php include 'parts_within_tables_input/tables_name.php';?>

                        <?php include 'parts_within_tables_input/tables_list.php';?>
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
//        function get_cabinet_edit1(val){
//            $.ajax({
//                type:"POST",
//                url:"get_cabinet_edit.php",
//                data:"filetype_id="+val,
//                success:function(data){
//                    $("#cabinet-list_edit").html(data);
//                }
//            });
//        }

        $("#file_type-list_edit").on("change",function () {
            var file_type_list_edit = $(this).val();
            $.ajax({
                method:"POST",
                url:"get_cabinet_edit.php",
                data:{file_type_list_edit:file_type_list_edit},
                success:function(data){
                    $("#cabinet-list_edit").html(data);
                }
            });
        });


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

       /* $(document).ready(function() {
            // SET AUTOMATIC PAGE RELOAD TIME TO 5000 MILISECONDS (5 SECONDS).
            setInterval('refreshPage()', 20000);
        });

        function refreshPage() {
            location.reload();
        }*/

       function get_table_values(val) {
           $.ajax({
               type:"POST",
               url:"get_table_values.php",
               data:"level_id="+val,
               success:function(data) {
                   $("#display_table_values").html(data);
               }
           });
       }

           $(document).ready(function () {

               $("#level_edit").on("change",function () {

                   var level = $(this).val();
                   $.ajax({
                      url:"get_edited_table_name.php",
                       type:"POST",
                       data:{level:level},
                       success:function (data) {
                           $("#display_table_values_edit").html(data);
                       }
                   });
               });
           });

       $(document).ready(function () {
           $.ajax({
               url:'get_file_type_edit.php',
               type:'POST',
               success:function (data) {
                   $('#change').html(data);

               }
           });
       });
			 $(document).ready(function () {
           $.ajax({
               url:'call_cabinet.php',
               type:'POST',
               success:function (data) {
                   $('#cabinet_data').html(data);

               }
           });
       });
        </script>
</body>
</html>
