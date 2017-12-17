<?php

require_once '../Core/init.php';

if(isset($_GET['filetype_id'])){
    $get_id = $_GET['filetype_id'];
    $filetype = new FileType();
    $filetype->delete_file_type($get_id);
    header("Location: ../public/tables_input.php");
}

