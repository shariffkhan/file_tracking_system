<?php
require_once '../Core/init.php';

if (isset($_GET['shelf_id'])){
    $get_id = $_GET['shelf_id'];

    $shelf = new Shelf();
    $shelf->delete_shelf($get_id);
    header("Location: ../public/tables_input.php");
}

