<div class="col-lg-6">
	<button class="btn btn-lg" data-toggle="modal" data-target="#mytable_list">
								 New Table List
							 </button>

                                <div class="panel">
                  <div class="panel-heading bg-white touch">

                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group5"><h6 class="panel-title text-teal">Inside Section Contents List</h6></a>

                  </div>
                  <div id="accordion-styled-group5" class="panel-collapse collapse">
                          <div class="table-responsive" >

														<table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Section List</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $section_level_list = new Section_levels_list();
                                  foreach ($section_level_list->select_section_level_list() as $section_level_list4){ ?>
                                  <tr>
                                            <td><?php echo $section_level_list4['sections_levels_list_id'];?></td>
                                            <td><?php echo $section_level_list4['name'];?></td>
                                      <td><?php echo $section_level_list4['level'];?></td>
                                      <td>
                                          <a href="../delete/delete_section_level_table_list.php?office_id=<?php echo $section_level_list4['sections_levels_list_id'];?>" role="button" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                          <button class="btn btn-success icon-large edit-user-info-link" data-toggle="modal" data-target="<?php echo '#table_list'.$section_level_list4['sections_levels_list_id'];?>">Edit
                                          </button>
                                      </td>
                                  </tr>
                          <?php

                                      $new_table_list  = $section_level_list->select_section_level_list_id($section_level_list4['sections_levels_list_id']);
                                  include 'modals/modal_add_tables_list_edit.php';
                                  } ?>
                              </tbody>
                            </table>
                          </div>
                  </div>
                </div>
                              </div>
