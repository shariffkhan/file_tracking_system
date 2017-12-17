<div class="modal fade" id="myfolio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>New Folio </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                                            <form action=""  method="post" enctype="multipart/form-data">
                                
                                <hr>
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">Folio:</label>
                                           <input type="text" name="folio" class = "form-control" placeholder="Folio Name">
                                          
                                 </div>
                                
								<div class = "modal-footer">
											 <button name = "folio_go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							</form> 
									   </div>
                                     
                                          
                                      
                                    </div>
									
									   
									  
									   <?php
                                                if(isset($_GET['page'])){
                                                    $pageid = $_GET['page'];
                                                }
                            if (isset($_POST['folio_go'])) {
                                $file = new Files();
                                $file_id = $file->files_id($pageid);
                                $folio1 = $_POST['folio'];
                                if(!empty($folio1)){
                                    $folio = new Folio();
                                    $folio->insert_folio($folio1, $file_id['id']);
                                }else{
                                    ?>
                                            <script>
                                                        alert('please input something');
                                            </script>
                              <?php } 
                            }
                            ?>		  
                                </div>
                            </div>