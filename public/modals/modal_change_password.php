<div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>New Password </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">
                                
                                <hr>
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">Current Password:</label>
                                           <input type="password" name="current" class = "form-control" placeholder="Password">
                                          
                                 </div>
                                  <div class="control-group">
                                      <label class="control-label" for="inputEmail">New Password:</label>
                                      <input type="password" name="new" class = "form-control" placeholder="Password">

                                  </div>
                                  <div class="control-group">
                                      <label class="control-label" for="inputEmail">Repeat Password:</label>
                                      <input type="password" name="repeat" class = "form-control" placeholder="Password">

                                  </div>
								<div class = "modal-footer">
											 <button name = "change_pass_go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							
									   </div>
                                     
                                          
                                      
                                    </div>
									
									  </form>  
									  
									   <?php 
                            if (isset($_POST['change_pass_go'])) {
                                    $staff = new Staff();
                                    $current = $_POST['current'];
                                    $new = $_POST['new'];
                                    $repeat = $_POST['repeat'];
                                if(!empty($current) and !empty($new) and !empty($repeat)){

                                    if($new == $repeat){
                                        $staff->update_password($repeat,$current);
                                    }else{ ?>

                                    <script>
                                        alert('Sorry Retype new password');
                                    </script>
                                  <?php  }
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