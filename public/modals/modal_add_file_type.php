<div class="modal fade" id="myfiletype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <div class="alert alert-info"><strong><center>New File Type </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">

                                <hr>

								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">File Type:</label>
                                           <input type="text" name="file_type" class = "form-control" placeholder="file type">

                                 </div>
								<div class = "modal-footer">
											 <button name = "file_type_go" id="sweet_basic"class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


								</div>

									   </div>



                                    </div>

									  </form>

									   <?php
                            if (isset($_POST['file_type_go'])) {

                                $file_type = $_POST['file_type'];
                                if(!empty($file_type)){
                                $filetype = new FileType();
                                $filetype->insert_filetype($file_type);
                                }else{
                                    ?>
                                            <script>
                                     $('#sweet_basic').on('click', function() {
                                       swal({
                                       title: "Here's a message!",
                                       confirmButtonColor: "#2196F3"
                                    });
                                    });
                                            </script>
                              <?php  }
                            }
                            ?>




                                </div>
                            </div>
