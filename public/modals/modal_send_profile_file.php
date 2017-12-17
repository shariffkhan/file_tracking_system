<div id="<?php echo 'file_sent'.$myid; ?>" class="modal fade" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <form method="post" action="profile.php">

                            <hr>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">File Name:</label>
                                <div class="controls">
                                    <input type="text" class="form-control" name="filename"
                                           value="<?php echo $file_sent2['name']; ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Staff:</label>
                                <div class="controls">
                                    <select type="text" name="office" id="office" class="form-control"
                                            onchange="get_selected(this.value);">
                                        <option value="">Selection...</option>
                                        <?php
                                        $section_level_list = new Section_levels_list();
                                        foreach ($section_level_list->select_office_dropdown($track2['receiver_id']) as $office_return) {
                                            ?>
                                            <option
                                                value="<?php echo $office_return['sections_levels_list_id'] ?>"><?php echo $office_return['name']; ?></option>
                                        <?php } ?>
                                        </option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-xlg" name="<?php echo 'sentfile' . $myid ?>">
                            SEND
                        </button>
                        <button type="submit" class="btn btn-info" data-dismiss="modal">CANCEL</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- modal end -->
        <?php
        if (isset($_POST['sentfile' . $myid])) {
          $track = new Track();
          $permission = new permission();
            $sender_id = $receiver['inside_section_list_id'];

            $file_name = $myid;
            $user = $_POST['office'];
            if (!empty($sender_id) and !empty($user) and !empty($file_name)) {
                $track = new Track();
                $track->insert_sent_file($sender_id, $user, $file_name);
                $track->notified1(0, $file_name, $track2['id']);
                $check = $permission->check_id($user);
                if ($permission->haspermission('admin', $check['security_level_id'])) {
                    $file->status(1, $file_name);
                    $folio = new Folio();
                    $folio_id = $folio->select_folio_desc_id($file_name);
                    $folio->status(0, $folio_id['id']);
                }
            } else {
                echo 'Sorry file did not sent ';
            }
        }
