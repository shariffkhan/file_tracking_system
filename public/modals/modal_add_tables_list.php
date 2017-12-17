<div class="modal fade" id="mytable_list" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                           <input type="text" name="header_office_list" class = "form-control" placeholder="Section Header">
                                          
                                 </div>
                                  <div class="control-group">
                                      <label class="control-label" for="inputPassword">Office:</label>
                                      <div class="controls">
                                          <select type="text" name="level_office_list" class = "form-control"  >
                                              <option></option>
                                              <?php
                                              $section_level = new Sections_level();
                                              foreach ($section_level->select_section_level() as $section_level4){?>
                                                  <option value="<?php echo $section_level4['section_levels_id'];?>"><?php echo $section_level4['name'];?></option>
                                              <?php  }
                                            ?>
                                          </select>
                                      </div>
                                  </div>
								<div class = "modal-footer">
											 <button name = "table_list_go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
                              </form>
                                        </div>
                                     
                                          
                                      
                                    </div>
									

									  
									   <?php 
                            if (isset($_POST['table_list_go'])) {
                                $name = $_POST['header_office_list'];
                                $level_office = $_POST['level_office_list'];
                                $section_level = new Sections_level();
                                $new_level = $section_level->select_section_level_by_id($level_office);
                                $level = $new_level['level'];
                                if((!empty($name)) and (!empty($level)) and (!empty($level_office))){
                                    $section_level_list = new Section_levels_list();
                                    $section_level_list->insert_List($name,$level,$level_office);
                                }else{?>
                                            <script>
                                                        alert('please input something');
                                            </script>
                              <?php  }
                            }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>