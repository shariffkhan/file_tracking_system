<div class="modal fade" id="myshelf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                           <input type="text" name="shelf_me" class = "form-control" placeholder="Shelf Number">
                                          
                                 </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">File Type:</label>
                                    <div class="controls">
                                        <select type="text" name="file_type_shelf" id="file_type-list" class = "form-control" onChange="get_cabinet(this.value);" >
                                            <option value="">Select File type...</option>
                                            <?php
                                           $file_type = new FileType();
                                            foreach ($file_type->select_filetype() as $file_type1){?>
                                                <option value="<?php echo $file_type1['filetype_id'];?>"><?php echo $file_type1['name'];?></option>
                                            <?php  }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Cabinet:</label>
                                    <div class="controls">
                                        <select type="text" name="cabinet_shelf" id="cabinet-list" class = "form-control" <!--onChange="get_shelf(this.value);-->" >
                                            <option value="">Select cabinet...</option>

                                        </select>
                                    </div>
                                </div>
								<div class = "modal-footer">
											 <button name = "shelfs_go_me" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							</form> 
									   </div>
                                     
                                          
                                      
                                    </div>
									
									   
									  
									   <?php 
                            if (isset($_POST['shelfs_go_me'])) {
                                $shelf_post_me = $_POST['shelf_me'];
                                $cab_shelf = $_POST['cabinet_shelf'];
                                if(!empty($shelf_post_me) and !empty($cab_shelf)){
                                     $shelf = new Shelf();
                                     $shelf->insert_shelf($shelf_post_me, $cab_shelf);
                                 
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