<div class="modal fade" id="mycab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <div class="alert alert-info"><strong><center>New Cabinet </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">

                                <hr>
		                                <div class="control-group">
                                           <label class="control-label" for="inputEmail">Cabinet:</label>
                                           <input type="text" name="new_cabinet" class = "form-control" placeholder="Cabinet Number">

                                 </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">File Type:</label>
                                    <div class="controls">
                                        <select type="text" name="filetypeid" class = "form-control"  >
                                             <option></option>
                                            <?php
                                            $filetype = new FileType();
                                            foreach ($filetype->select_filetype() as $filetype4){?>
                                                <option value="<?php echo $filetype4['filetype_id'];?>"><?php echo $filetype4['name'];?></option>
                                            <?php  }
                                            ?>
                                        </select>
                                    </div>
                                </div>
			<div class = "modal-footer">
				 <button name = "cabinet_go" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


								</div>
							</form>
									   </div>



                                    </div>



									   <?php
                            if (isset($_POST['cabinet_go'])) {

                                $new_cabinet = $_POST['new_cabinet'];
                                $filetypeid = $_POST['filetypeid'];

                                if(!empty($new_cabinet) and !empty($filetypeid)){
                                $cabinet = new cabinet();
                                $cabinet->insert_cabinet($new_cabinet, $filetypeid);
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
