<?php
$session = new Session();

if(!$session->logged()){
    header("Location: login.php");
}
 ?>
