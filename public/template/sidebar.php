<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="assets/images/file.png" class="img-circle img-sm" alt=""></a>
								<div class="media-body">

									<div class="text-size-mini text-muted">
										<span class="media-heading text-bold">File Tracking System</span>
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="active"><a href="index.php"><i class="icon-home4"></i> <span>Home</span></a></li>
                                <?php
                                if($permission->haspermission('admin',$receiver['security_level_id'])) { ?>

                                    <li><a href="tables_input.php"><i class="icon-home4"></i> <span>Users and Files Location List</span></a></li>

                                    <li>
                                        <a href="#"><i class="icon-accessibility"></i> <span>Users</span></a>
                                        <ul>
                                            <li><a href="Users.php">Users</a></li>
                                            <li><a href="tables.php?level=1&upper_office=0">Organisation Structure</a></li>
                                        </ul>
                                    </li>
                                    <?php
                                }
                                ?>

								<li>
									<a href="#"><i class="icon-copy"></i> <span>Files</span></a>
									<ul>
										<li><a href="files_in_shelf_all.php" id="layout1">Files </a></li>
                                        <?php
                                        if($permission->haspermission('admin',$receiver['security_level_id'])) { ?>

                                            <li><a href="table_files_type.php" id="layout2">Files Locations</a></li>

                                            <?php
                                        }
                                        ?>

									</ul>
								</li>

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
