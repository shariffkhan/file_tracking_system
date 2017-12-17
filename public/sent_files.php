<?php

require_once '../Core/init.php';
$track = new track();
if(isset($_POST['view'])){ ?>
    <ul class="media-list dropdown-content-body" id="check">
        <?php

        foreach ($track->track_before_receiver($receiver_id) as $track4) {
            $myid = $track4['file_id'];
            ?>
            <li class="media">
                <div class="media-body">
											<span class="text-semibold"><?php
                                                $staff_sender = $track4['sender_id'];
                                                $section_level_list = new Section_levels_list();
                                                $num = $section_level_list->select_section_level_list_id($staff_sender);
                                                echo 'From :'.' &nbsp;'.$num['name'];
                                                ?></span><br>
                    <span class="text-muted"><?php
                        $file_sent = $track4['file_id'];
                        $file = new Files();
                        $file_sent2 = $file->files_id($file_sent);
                        echo 'File :'.'&nbsp;'.$file_sent2['name'];
                        ?></span>
                    <a href="profile.php<?php echo '?id=' . $myid; ?>" class="btn btn-success bg-blue-400 " style="float: right;" data-action="close1";>ACCEPT</a>
                </div>
            </li>
            <?php
        }?>

    </ul>
<?php
}
?>