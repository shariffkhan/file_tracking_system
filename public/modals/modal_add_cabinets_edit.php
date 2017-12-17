<div class="modal fade" id="<?php echo 'cab'.$cab4['cabinet_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                           <input type="text" name="new_cabinet_edit" class = "form-control" placeholder="Cabinet Number" value="<?php echo $new_cabinet['name'];?>">

                                 </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">File Type:</label>
                                    <div class="controls">
                                        <select type="text" name="filetypeid_edit" class = "form-control"  >
                                             <option value="<?php echo $new_cabinet['file_type_id'];?>"><?php
                                                 $filetype = new FileType();
                                                $filetype5 = $filetype->filetype_id($new_cabinet['file_type_id']);
                                                 echo $filetype5['name'];
                                                 ?>
                                             </option>
                                            <?php

                                            foreach ($filetype->filetype_id_edit($new_cabinet['file_type_id']) as $filetype4){?>
                                                <option value="<?php echo $filetype4['filetype_id'];?>"><?php echo $filetype4['name'];?></option>
                                            <?php  }
                                            ?>
                                        </select>
                                    </div>
                                </div>
			<div class = "modal-footer">
				 <button name = "<?php echo 'cabinet'.$cab4['cabinet_id'];?>" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


								</div>
							</form>
									   </div>



                                    </div>



									   <?php
                            if (isset($_POST['cabinet'.$cab4['cabinet_id']])) {

                                $new_cabinet_edit = $_POST['new_cabinet_edit'];
                                $filetypeid_edit = $_POST['filetypeid_edit'];

                                if(!empty($new_cabinet_edit) and !empty($filetypeid_edit)){
                                $cabinet = new cabinet();
                                $cabinet->update_cabinet($new_cabinet_edit,$filetypeid_edit,$new_cabinet['cabinet_id']);
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
