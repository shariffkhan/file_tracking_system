
<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">INSTITUTE OF FINANCE MANAGEMENTS</a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">


			<ul class="nav navbar-nav navbar-right">


				<li class="dropdown" id="notification">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bubbles4"></i>
						<span class="visible-xs-inline-block position-right">Messages</span>
						<span class="badge bg-warning-400" id="testing"><?php


                           // notification codes in php oop

						$staff = new Staff();
						$track = new Track();

                            $permission = new permission();


						$receiver = $staff->staff_one($session->staff_email);
					 		$receiver_id =  $receiver['inside_section_list_id'];
						$count = $track->count_before_receiver($receiver_id);
						if($count['count'] != 0){
                            echo $count['count'];   //code for counting how many files are sent
                        }

						?></span>
					</a>

					<div class="dropdown-menu dropdown-content width-350">
						<div class="dropdown-content-heading">
						NOTIFICATIONS
						</div>

						<ul class="media-list dropdown-content-body" id="check">
							<?php

							foreach ($track->track_before_receiver($receiver_id) as $track4) {
								$myid = $track4['file_id'];
								 ?>
								<li class="media">
									<div class="media-body">
											<span class="text-semibold"><?php
											 $staff_sender = $track4['sender_id'];
											 $section_level_list = new Section_levels_list();
											$num = $section_level_list->select_section_level_list_id($staff_sender);
												echo 'From :'.' &nbsp;'.$num['name'];
												?></span><br>
										<span class="text-muted"><?php
										$file_sent = $track4['file_id'];
										$file = new Files();
										$file_sent2 = $file->files_id($file_sent);
											 echo 'File :'.'&nbsp;'.$file_sent2['name'];
										?></span>
										  <a href="profile.php<?php echo '?id=' . $myid; ?>" class="btn btn-success bg-blue-400 " style="float: right;" data-action="close1";>ACCEPT</a>
									</div>
								</li>
						<?php
					}?>

						</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/placeholder.jpg" alt="">

						<span>
							<?php
							$staff = new Staff();
							$row = $staff->staff_one($session->staff_email);
							$fname = $row['fname'];
							$lname = $row['lname'];
							$office_id = $row['inside_section_list_id'];
							$section_level_list = new Section_levels_list();
							$office = $section_level_list->select_section_level_list_id($office_id);
							$row1 = Staff::full_name($fname,$lname);
							echo $office['name'].' : '.$row1;
							?>
							</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="profile_new.php"><i class="icon-user-plus"></i> Profile</a></li>
						<li><a href="logout.php"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
<script>
$(document).ready(function(){
	function load_unseen_notification(view=''){
		$.ajax({
			url:"sent_files.php",
			method:"POST",
			data:{view:view},
			success:function(data){
				$("#check").html(data);
			}
		});
	}

	load_unseen_notification();

	$("#sent_form").on("submit",function(event){
		event.preventDefault();
		if($("#sent_file").val() != '' && $("#offices_id").val() != ''){

			var form_data = $(this).serialize();
			$.ajax({
				url:"insert.php",
				method:"POST",
				data:form_data,
				success:function(data){
					$("#sent_form")[0].reset();
					load_unseen_notification();
				}
			});

		}else{
			alert('Both Fields are required');
		}
	});
});*/

/*$(document).ready(function(){

	setTimeout(function refresh(){
		$("#notification").fadeout('slow').load('sent_files.php').fadein('slow');
		refresh();
	}
	,200);
});*/
</script>
