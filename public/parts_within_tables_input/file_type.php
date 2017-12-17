<div class="col-lg-4">
							 <button class="btn btn-lg " data-toggle="modal" data-target="#myfiletype">
                              New File Type
                            </button>


                            <div class="panel">
                  <div class="panel-heading bg-white touch">

                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group1"><h6 class="panel-title text-teal">File Type List</h6></a>

                  </div>
                  <div id="accordion-styled-group1" class="panel-collapse collapse ">
              <div class="table-responsive" >


<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>File Type</th>
												<th>Action</th>
										</tr>
									</thead>
									<tbody id="change">
											<?php
											$filetype = new FileType();
											foreach ($filetype->select_filetype() as $filetype3){ ?>
											<tr >
																<td><?php echo $filetype3['filetype_id'];?></td>
																<td><a href="table_files.php?page=<?php echo $filetype3['filetype_id']?>"><?php echo $filetype3['name'];?></a></td>
													<td>
															<a href="../delete/delete_filetype.php?filetype_id=<?php echo $filetype3['filetype_id'];?>" role="button" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
															<button class="btn btn-success icon-small edit-user-info-link" data-toggle="modal" data-target="<?php echo '#'.$filetype3['filetype_id'];?>">Edit
															</button>
													</td>
											</tr>
							<?php
													$new_filetype = $filetype->filetype_id($filetype3['filetype_id']);

							 include 'modals/modal_file_type_edit.php';
											} ?>
									</tbody>
								</table>
                          </div>
                  </div>
                </div>
</div>
