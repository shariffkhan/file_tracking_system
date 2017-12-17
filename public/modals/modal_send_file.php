<div class="modal fade" id="<?php echo 'send'.$modal_track_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <div class="alert alert-info"><strong><center>Send File </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data" class="sent_form">

                                <hr>

				<div class="control-group">
                                           <label class="control-label" for="inputEmail">File Name:</label>
                                           <input type="text" name="sent_file" id="sent_file" class = "form-control" value="<?php echo $new_sent['name'];
                                           ?>
                                           &nbsp;<?php
                                                    $folio = new Folio();
                                           $folio_id1 = $folio->select_folio_desc_id($modal_track_id);
                                           echo $folio_id1['name'];
                                           ?>
                                           <?php
                                           ?>" disabled="true">

                                 </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Office:</label>
                                    <div class="controls">
                                        <select type="text" name="inside_section_list" id="offices_id" class = "form-control" >
                                             <option></option>
                                            <?php
                                            $staff = new Staff();
                                            $section_level = new Sections_level();
                                            $section_level_list = new Section_levels_list();
                                            $office3 = $staff->staff_one($session->staff_email);
                                            foreach ($section_level_list->select_office_dropdown($office3['inside_section_list_id']) as $office4){?>
                                                <option value="<?php echo $office4['sections_levels_list_id']?>"><?php echo $office4['name'];?></option>
                                            <?php  }?>

                                        </select>
                                    </div>
                                </div>
								<div class = "modal-footer">
											 <button name = <?php echo "send_go".$modal_track_id;?> class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


								</div>

									   </div>



                                    </div>

									  </form>

                                    <?php
                                        if (isset($_POST["send_go".$modal_track_id])) {
                                            $send = $staff->staff_one($session->staff_email);
                                            $sender_id = $office3['inside_section_list_id'];
                                            $file_name = $new_sent['id'];
                                            $user = $_POST['inside_section_list'];
                                            if (!empty($sender_id) and !empty($user) and !empty($file_name)) {
                                                $track = new Track();
                                                $track->insert_sent_file($sender_id, $user, $file_name);
                                                $file = new Files();
                                                $file->status(0, $file_name);
                                            } else {
                                                echo 'Sorry file did not sent ';
                                            }
                                        }
                                        ?>




                                </div>
                            </div>
