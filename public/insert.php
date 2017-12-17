
<?php
require_once '../Core/init.php';
require_once 'login_include.php';
$staff = new Staff();
$track = new Track();
if (isset($_POST["sent_files"])) {
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
