<?php
//this is the code to delete files
require_once '../Core/init.php';
if(isset($_GET['file_id'])){
    $get_id = $_GET['file_id'];

    $file = new Files();
    $file->delete_file($get_id);
    header("Location: ../public/tables_input.php");
}



