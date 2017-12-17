<?php

require_once '../Core/init.php';
require_once 'login_include.php';
?>
<html>
<head>
    </head>
<body>
    <?php
// notification codes in php oop
$staff = new Staff();
$file = new Files();
$track = new Track();
    $receiver = $staff->staff_one($session->staff_email);
    $receiver_id = $receiver['inside_section_list_id'];
    foreach ($track->track_receiver($receiver_id) as $track2) {
        $myid = $track2['file_id'];
        ?>
        <tr data-toggle="modal" data-target="<?php echo '#file_sent'.$myid; ?>" title="Click to send this file..">
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
        <?php
        include ('modals/modal_send_profile_file.php');
    }

?>
    </body>
</html>
