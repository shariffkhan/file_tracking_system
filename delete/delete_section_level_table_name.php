<?php
//file contains the codes for deleting cabinet
require_once '../Core/init.php';

if (isset($_GET['table_id'])){
    $get_id = $_GET['table_id'];
    $section_level  = new Sections_level();
    $section_level->delete_table($get_id);
    header("Location: ../public/tables_input.php");
}

