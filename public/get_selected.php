<?php
require_once '../Core/init.php';
if(isset($_POST['mydata'])) {

    $receiver = $staff->staff_one($session->staff_email);
    $receiver_id = $receiver['inside_section_list_id'];
    foreach ($track->track_receiver($receiver_id) as $track2) {
        $myid = $track2['file_id'];
        ?>
        <tr data-toggle="modal" data-target="<?php echo '#' . $myid; ?>" title="Click to send this file..">
            <td>
                <div class="media-body">
                    <div class="media-heading">
    															<span class="letter-icon-title"><?php

                                                                    $file_sent = $track2['file_id'];
                                                                    $file = new Files();
                                                                    $file_sent2 = $file->files_id($file_sent);
                                                                    echo $file_sent2['name'];
                                                                    ?></span>
                    </div>
                </div>
            </td>
            <td>
                <h6 class="text-semibold no-margin"><?php

                    $staff_sender = $track2['sender_id'];
                    $section_level_list = new Section_levels_list();
                    $num = $section_level_list->select_section_level_list_id($staff_sender);
                    echo $num['name'];
                    ?></h6>
            </td>
            <td>
                <span class="text-muted text-size-small"><?php echo $track2['time']; ?></span>
            </td>
        </tr>
        <!-- modal start-->
        <div id="<?php echo $myid; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">

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
    }
}
                                        ?>

