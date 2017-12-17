<?php
//file contains the codes for deleting cabinet
require_once '../Core/init.php';

if (isset($_GET['office_id'])){
    $get_id = $_GET['office_id'];
    $section_level_list  = new Section_levels_list();
    $section_level_list->delete_office($get_id);
    header("Location: ../public/tables_input.php");
}

