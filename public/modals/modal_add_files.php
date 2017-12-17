<div class="modal animated zoomIn" id="myFiles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                        <input type="text" class = "form-control"  name="id"  placeholder="File Id" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">File Name:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="name"  placeholder="File Name" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Volume:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="volume"  placeholder="Volume" value="1" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">File Type:</label>
                                    <div class="controls">
                                        <select type="text" name="file_type" id="file_type-list" class = "form-control" onChange="get_cabinet(this.value);" >
                                            <option value="">Select File type...</option>
                                            <?php
                                            $filetype = new FileType();
                                            foreach ($filetype->select_filetype() as $filetype2){?>
                                                <option value="<?php echo $filetype2['filetype_id'];?>"><?php echo $filetype2['name'];?></option>
                                            <?php  }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Cabinet:</label>
                                    <div class="controls">
                                        <select type="text" name="cabinet" id="cabinet-list" class = "form-control" placeholder="Category" onChange="get_shelf(this.value);" >
                                            <option value="">Select cabinet...</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Shelf:</label>
                                    <div class="controls">
                                        <select type="text" name="shelf" id="shelf-list" class = "form-control" placeholder="Category" >
                                            <option value="">Select Shelf...</option>

                                        </select>
                                    </div>
                                </div>

								<div class = "modal-footer">
											 <button name = "file_go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


								</div>
                                </form>

									   </div>



                                    </div>



									   <?php
                            if (isset($_POST['file_go'])) {
                                $id = $_POST['id'];
                                $name = $_POST['name'];
                                $volume = $_POST['volume'];
                                $file_type = $_POST['file_type'];
                                $cabinet = $_POST['cabinet'];
                                $shelf = $_POST['shelf'];
                                if((!empty($id)) and (!empty($volume)) and (!empty($file_type))and(!empty($cabinet)) and (!empty($shelf))){
                                $file = new Files();
                                $file->insert_file($id, $name, $volume, $file_type, $cabinet, $shelf);
                                }  else {?>
                                            <script>
                                                        alert('please input in all boxes');
                                            </script>
                              <?php  }
                            }
                            ?>




                                </div>
                            </div>
