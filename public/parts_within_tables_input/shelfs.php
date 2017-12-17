<div class="col-lg-4">
							 <button class="btn btn-lg" data-toggle="modal" data-target="#myshelf">
                              New Shelf
                            </button>

                                <div class="panel">
                  <div class="panel-heading bg-white touch">

                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group3"><h6 class="panel-title text-teal">Shelf List</h6></a>

                  </div>
                  <div id="accordion-styled-group3" class="panel-collapse collapse">
<div class="table-responsive" >

	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Shelf</th>
					<th>Action</th>
			</tr>
		</thead>
		<tbody>
				<?php
				$shelf = new Shelf();
				foreach ($shelf->select_shelf() as $shelf3){ ?>
				<tr>
									<td><?php echo $shelf3['shelf_id'];?></td>
									<td><a href="files_in_shelf.php?page=<?php echo $shelf3['shelf_id']; ?>"><?php echo $shelf3['name'];?></a></td>
						<td>
								<a href="../delete/delete_shelf.php?shelf_id=<?php echo $shelf3['shelf_id'];?>" role="button" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
								<button class="btn btn-success icon-large edit-user-info-link" data-toggle="modal" data-target="<?php echo '#shel'.$shelf3['shelf_id'];?>">Edit
								</button>
						</td>
				</tr>
<?php
						$new_shelf =  $shelf->open_shelfs($shelf3['shelf_id']);
						$filetype = new FileType();
						$cab = new cabinet();
						include 'modals/modal_add_shelf_edit.php';

				} ?>
		</tbody>
	</table>
                          </div>
                  </div>
                </div>
                              </div>
