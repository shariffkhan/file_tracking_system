<div class="modal fade" id="<?php echo $filetype3['filetype_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <div class="alert alert-info"><strong><center>New File Type </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post"  enctype="multipart/form-data">

                                <hr>

								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">File Type:</label>
                                           <input type="text" name="file_type_edit" id="file_type_edit" class = "form-control" placeholder="file type" value="<?php echo $new_filetype['name'];?>">

                                 </div>
								<div class = "modal-footer">
											 <button name = "<?php echo 'file_type_edit_go'.$filetype3['filetype_id'];?>" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


								</div>

									   </div>


                                    </div>

									  </form>

									   <?php
                            if (isset($_POST[ 'file_type_edit_go'.$filetype3['filetype_id']])) {
                                $file_type_edit = $_POST['file_type_edit'];
                                if(!empty($file_type_edit)){
                                    $filetype->update_filetype($file_type_edit,$filetype3['filetype_id']);
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