<div class="content-wrapper pull-right">
                            <div class="page-header">


					<div class="breadcrumb-line">
						<div style="padding: 40px 10px 40px 40px;" class="center-block">
                                <?php
                                if($permission->haspermission('admin',$receiver['security_level_id'])){ ?>

                                    <div class=" btn center-block text-center div">

                                        <li class="dropdown dropdown-user">
                                            <i class=" icon-users4 dropdown-toggle " data-toggle="dropdown" style="font-size: 40px;"></i><br>
                                            <span>USERS</span>

                                            <ul class="dropdown-menu">
                                                <li><a href="#myuser" data-toggle="modal" data-target="#myuser"><i class=" icon-user-plus"></i>Add User</a></li>
                                                <li><a href="Users.php"><i class=" icon-users2"></i> Manage User</a></li>
                                            </ul>
                                        </li>

                                    </div>

                             <?php   }
                                ?>
                            <div class=" btn center-block text-center div" >
                                <li class="dropdown dropdown-user">
                                    <i class=" icon-folder-open dropdown-toggle " data-toggle="dropdown" style="font-size: 40px;"></i><br>
                                    <span>FILES</span>

                                    <ul class="dropdown-menu">
                                        <?php
                                        if($permission->haspermission('admin',$receiver['security_level_id'])){ ?>
                                            <li><a href="#myFiles" data-toggle="modal" data-target="#myFiles"><i class="  icon-file-plus"></i>Add File</a></li>

                                        <?php }
                                        ?>
                                         <li><a href="files_in_shelf_all.php"><i class="  icon-file-stats"></i>Files List</a></li>
                                    </ul>
                                </li>
                            </div>
							<div class=" btn center-block text-center div" >
							<li class="dropdown dropdown-user">
							<i class=" icon-office dropdown-toggle " data-toggle="dropdown" style="font-size: 40px;"></i><br>
								<span>ORGANISATION</span>

								<ul class="dropdown-menu">
									<li><a href="tables.php?level=1&upper_office=0"><i class=" icon-cog"></i> Manage Organisation</a></li>
								</ul>
							</li>
							</div>

                            <div class=" btn center-block text-center div" >
							<li>
							<a href="track.php"><i class=" icon-file-stats" style="font-size: 40px;"></i><br>
								<span>TRACK FILES</span></a>
							</li>
							</div>

                            <div class=" btn center-block text-center div" >
							<li >
							<a href="profile.php"><i class=" icon-file-upload"style="font-size: 40px;"></i><br>
								<span>FILE ON-GO</span></a>
							</li>
							</div>

						</div>
					</div>
				</div>
                        </div>
