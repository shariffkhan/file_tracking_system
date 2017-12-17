<div class="modal fade" id="<?php echo 'table_list'.$section_level_list4['sections_levels_list_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>New Office </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">
                                
                                <hr>
								
				<div class="control-group">
                                           <label class="control-label" for="inputEmail">Office name:</label>
                                           <input type="text" name="header_office_list_edit" class = "form-control" value="<?php echo $new_table_list['name'];?>">
                                          
                                 </div>
                                  <div class="control-group">
                                      <label class="control-label" for="inputPassword">Office:</label>
                                      <div class="controls">
                                          <select type="text" name="level_office_list_edit" class = "form-control"  >
                                              <option value="<?php 
                                               $section_level_list = new Section_levels_list();
                                                  $section_level = new Sections_level();
                                                  $set = $section_level_list->select_section_level_list_id($new_table_list['sections_levels_list_id']);
                                                  $new_set = $section_level->select_section_level_by_id($set['section_levels_id']);
                                              
                                              echo $new_set['section_levels_id'];?>"><?php
                                                  $new_set1 = $section_level->select_section_level_by_id($set['section_levels_id']);
                                                                        echo $new_set1['name'];
                                                  ?></option>
                                              <?php

                                              foreach ($section_level->select_level_not_ins($set['section_levels_id']) as $office_filter){?>
                                                  <option value="<?php echo $office_filter['section_levels_id'];?>"><?php echo $office_filter['name'];?></option>
                                              <?php  }
                                            ?>
                                          </select>
                                      </div>
                                  </div>
								<div class = "modal-footer">
											 <button name = "<?php echo 'table_list_go'.$section_level_list4['sections_levels_list_id']; ?>" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
                              </form>
                                        </div>
                                     
                                          
                                      
                                    </div>
									

									  
									   <?php 
                            if (isset($_POST['table_list_go'.$section_level_list4['sections_levels_list_id']])) {
                                $name = $_POST['header_office_list_edit'];
                                $level_office = $_POST['level_office_list_edit'];
                                $new_level = $section_level->select_section_level_by_id($level_office);
                                $level = $new_level['level'];
                                if((!empty($name)) and (!empty($level)) and (!empty($level_office))){
                                    $section_level_list->update_table_list($name, $level,$level_office, $new_table_list['sections_levels_list_id']);
                                }else{?>
                                            <script>
                                                        alert('please input something');
                                            </script>
                              <?php  }
                            }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>