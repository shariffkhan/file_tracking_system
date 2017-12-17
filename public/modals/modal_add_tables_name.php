<div class="modal fade" id="mytable_name" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                           <input type="text" name="header_office" class = "form-control" placeholder="Section Header">
                                          
                                 </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">level:</label>
                                    <div class="controls">
                                        <select type="text" name="level" class = "form-control"  onchange="get_table_values(this.value);">
                                             <option></option>
                                            <?php
                                            $levels = new levels();
                                            foreach ($levels->levels() as $levels2){?>
                                                <option value="<?php echo $levels2['level_id'];?>"><?php echo $levels2['name'];?></option>
                                          <?php  }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                  <div class="control-group">
                                      <label class="control-label" for="inputPassword">Within which Office:</label>
                                      <div class="controls">
                                          <select type="text" name="level_office" id="display_table_values" class = "form-control"  >
                                                <option>Select office...</option>
                                          </select>
                                      </div>
                                  </div>
								<div class = "modal-footer">
											 <button name = "table_name_go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
                              </form>
                                        </div>
                                     
                                          
                                      
                                    </div>
									

									  
									   <?php 
                            if (isset($_POST['table_name_go'])) {

                                $header = $_POST['header_office'].'-'.'Table';
                                $name = $_POST['header_office'];
                                $level = $_POST['level'];
                                $level_office = $_POST['level_office'];
                                if((!empty($header)) and (!empty($name)) and (!empty($level))){
                                    $section_level = new Sections_level();
                                    $section_level->insert_Headers($header,$name,$level,$level_office);
                                }else{?>
                                            <script>
                                                        alert('please input something');
                                            </script>
                              <?php  }
                            }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>