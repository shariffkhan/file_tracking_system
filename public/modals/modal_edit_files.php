<div class="modal fade" id="<?php echo 'edit'.$modal_track_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <div class="alert alert-info"><strong><center>New File </center></strong></div>
                                        </div>
                                        <div class="modal-body">

                              <form  method="post" enctype="multipart/form-data">

                                <hr>


                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">File Id:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="id_edit"  value="<?php echo $new['file_id']; ?>" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">File Name:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="name_edit" value="<?php echo $new['name']; ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Volume:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="volume_edit" value="<?php echo $new['volume']; ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">File Type:</label>
                                    <div class="controls">
                                        <select type="text" name="file_type_edit" id="file_type-list" class = "form-control" onChange="get_cabinet_edit(this.value);" >
                                            <option value="<?php echo $new['file_type_id']; ?>">
                                                <?php
                                                $filetype = new FileType();
                                                $new_filetype = $filetype->filetype_id($new['file_type_id']);
                                                echo $new_filetype['name'];
                                                ?>
                                            </option>
                                            <?php

                                            foreach ($filetype->filetype_id_edit($new['file_type_id']) as $filetype2){?>
                                                <option value="<?php echo $filetype2['filetype_id'];?>"><?php echo $filetype2['name'];?></option>
                                            <?php  }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Cabinet:</label>
                                    <div class="controls">
                                        <select type="text" name="cabinet_edit" id="cabinet-list_edit" class = "form-control" placeholder="Category" onChange="get_shelf_edit(this.value);" >
                                            <option value="<?php echo $new['cabinet_id']?>">
                                                <?php
                                                $cab = new cabinet();
                                                $new_cab = $cab->open_cabinets($new['cabinet_id']);
                                                echo $new_cab['name'];
                                                ?>
                                            </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Shelf:</label>
                                    <div class="controls">
                                        <select type="text" name="shelf_edit" id="shelf-list_edit" class = "form-control" placeholder="Category" >
                                            <option value="<?php echo $new['shelf_id']?>">
                                                <?php
                                                $shelf = new Shelf();
                                                $new_shelf = $shelf->open_shelfs($new['shelf_id']);
                                                echo $new_shelf['name'];
                                                ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>

								<div class = "modal-footer">
											 <button name = "<?php echo 'files'.$modal_track_id;?>" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


								</div>
                                </form>

									   </div>



                                    </div>



									   <?php
                            if (isset($_POST['files'.$modal_track_id])) {
                                $id = $_POST['id_edit'];
                                $name = $_POST['name_edit'];
                                $volume = $_POST['volume_edit'];
                                $file_type = $_POST['file_type_edit'];
                                $cabinet = $_POST['cabinet_edit'];
                                $shelf = $_POST['shelf_edit'];
                                if((!empty($id)) and (!empty($volume)) and (!empty($file_type))and(!empty($cabinet)) and (!empty($shelf))){
                                $file = new Files();
                                $file->upadate_file($id,$name,$volume,$file_type,$cabinet,$shelf,$new['id']);
                                }  else {?>
                                            <script>
                                                        alert('please input in all boxes');
                                            </script>
                              <?php  }
                            }
                            ?>




                                </div>
                            </div>
