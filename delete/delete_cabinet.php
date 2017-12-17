<?php
//file contains the codes for deleting cabinet
require_once '../Core/init.php';

if (isset($_GET['cabinet_id'])){
    $get_id = $_GET['cabinet_id'];
    $cabinet = new cabinet();
    $cabinet->delete_cabinet($get_id);
    header("Location: ../public/tables_input.php");
}

