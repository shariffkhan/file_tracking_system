<div class="modal fade" id="<?php echo 'table_name'.$section_level3['section_levels_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <div class="alert alert-info"><strong><center>New Office </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">

                                <hr>

				<div class="control-group">
                                           <label class="control-label" for="inputEmail">Office name:</label>
                                           <input type="text" name="header_office_edit" class = "form-control" value="<?php echo $new_section_level['name'];?>">

                                 </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">level:</label>
                                    <div class="controls">
                                        <select type="text" name="level_edit" id="level_edit" class = "form-control">
                                             <option value="<?php echo $new_section_level['level'];?>"><?php
                                                 $level = new levels();
                                                 $section_level_filter1 = $level->levels_by_id($new_section_level['level']);
                                                        echo $section_level_filter1['name'];
                                                 ?></option>
                                            <?php
                                            foreach ($level->select_level_not_in($new_section_level['level']) as $section_level_filter){?>
                                                <option value="<?php echo $section_level_filter['level_id'];?>"><?php echo $section_level_filter['name'];?></option>
                                          <?php  }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                  <div class="control-group">
                                      <label class="control-label" for="inputPassword">Within which Office:</label>
                                      <div class="controls">
                                          <select type="text" name="level_office_edit" id="display_table_values_edit" class = "form-control" onchange="get_new_table_name(this.value);" >
                                                <?php
                                                    $section_level_list = new Section_levels_list();
                                                    if($new_section_level['upper_office_id'] != 0) {
                                                        foreach ($section_level_list->select_section_level_id_by_section_level($new_section_level['upper_office_id']) as $section_level_list11) {
                                                            ?>

                                                            <option value="<?php echo $section_level_list11['section_levels_id']; ?>"><?php echo $section_level_list11['name']; ?></option>
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                        <option value="0"><?php echo 'none'; ?></option>
                                              <?php
                                                    }

                                                    ?>
                                          </select>
                                      </div>
                                  </div>
								<div class = "modal-footer">
											 <button name = "table_name_go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


								</div>
                              </form>
                                        </div>



                                    </div>



									   <?php
                            if (isset($_POST['table_name_go'])) {

                                $header = $_POST['header_office'].'-'.'Table';
                                $name = $_POST['header_office'];
                                $level = $_POST['level'];
                                $level_office = $_POST['level_office'];
                                if((!empty($header)) and (!empty($name)) and (!empty($level))){
                                    $section_level = new Sections_level();
                                    $section_level->insert_Headers($header,$name,$level,$level_office);
                                }else{?>
                                            <script>
                                                        alert('please input something');
                                            </script>
                              <?php  }
                            }
                            ?>




                                </div>
                            </div>
