<?php
if(isset($_GET['page'])){
    $pageid = $_GET['page'];
}  else {
    $pageid = 1;
}
class Blocks{
    
    public function select_block(){
        $select  = new Connection();
        $row = $select->query("select * form level1");
        return $row;
    }
    public function block_id($pageid){
        $select  = new Connection();
        $row = $select->query("select * form level1 where id = $pageid");
        return $row;
    }
}
