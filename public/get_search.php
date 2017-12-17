<?php

require_once '../Core/init.php';
include 'login_include.php';
$connection = new Connection;
if(isset($_POST['query'])){
    
    $output = '';
    
    $query = $connection->mysqli_query("select * from staffs where staff_id LIKE '".$_POST['query']."'");
    $output = '<ul>';
    if($connection->num_rows($query) > 0){
        while ($row = $connection->fetch_array($query)) {
            $output .= "<li>".$row['staff_id']."</li>";
        }
    }else{
        $output = '<li>Sorry result not found</li>';
    }
    
    $output .='</ul>';
    echo $output;
}

