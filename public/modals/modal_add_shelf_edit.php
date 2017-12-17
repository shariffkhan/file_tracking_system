<div class="modal fade" id="<?php echo 'shel'.$shelf3['shelf_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>New Shelf </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                                            <form action=""  method="post" enctype="multipart/form-data">
                                
                                <hr>
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">Shelf:</label>
                                           <input type="text" name="shelf_edit" class = "form-control" value="<?php echo $new_shelf['name']?>">
                                          
                                 </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">File Type:</label>
                                    <div class="controls">
                                        <select type="text" name="file_type_shelf_edit" id="file_type-list_edit" class = "form-control" >
                                            <option value="<?php
                                            $cab_shelf = $cab->open_cabinets($new_shelf['cabinet_id']);
                                            echo $cab_shelf['file_type_id'];?>">
                                                <?php
                                                $filetype6 = $filetype->filetype_id($cab_shelf['file_type_id']);
                                                echo $filetype6['name'];
                                                ?>
                                            </option>
                                            <?php

                                            foreach ($filetype->filetype_id_edit($cab_shelf['file_type_id']) as $filetype7){?>
                                                <option value="<?php echo $filetype7['filetype_id'];?>"><?php echo $filetype7['name'];?></option>
                                            <?php  }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Cabinet:</label>
                                    <div class="controls">
                                        <select type="text" name="cabinet_edit" id="cabinet-list_edit" class = "form-control" placeholder="Category" <!--onChange="get_shelf(this.value);-->" >
                                            <option value="<?php echo $new_shelf['cabinet_id']?>">
                                                <?php

                                                $cab_shelf2 = $cab->open_cabinets($new_shelf['cabinet_id']);
                                                echo $cab_shelf2['name'];
                                                ?>
                                            </option>

                                        </select>
                                    </div>
                                </div>
								<div class = "modal-footer">
											 <button name = "shelfs_go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							</form> 
									   </div>
                                     
                                          
                                      
                                    </div>
									
									   
									  
									   <?php 
                            if (isset($_POST['shelfs_go'])) {
                                $shelf_post = $_POST['shelf_edit'];
                                $cab_id = $_POST['cabinet_edit'];
                                if(!empty($shelf_post) and !empty($cab_id)){
                                     $shelf = new Shelf();
                                     $shelf->insert_shelf($shelf_post, $cab_id);
                                 
                                }else{
                                    ?>
                                            <script>
                                                        alert('please input something');
                                            </script>
                              <?php  }
                            }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>