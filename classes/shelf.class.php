<?php
if(isset($_GET['page4'])){
    $pageid = $_GET['page4'];
}
class Shelf{
    public function shelf_cabinet_id($id){
        $select = new Connection();
        $row = $select->select_query("select * from shelf where cabinet_id = $id");
        return $row;
    }

    public function insert_shelf($shelf,$cabinet_id){
        $insert = new Connection;
        $row = $insert->insert_query("insert into shelf(name,cabinet_id) values ('$shelf',$cabinet_id)");
        return $row;
    }

    public function select_shelf(){
        $select = new Connection();
        $row = $select->select_query("select * from shelf");
        return $row;
    }

    public function open_shelfs($pageid){
         $select = new Connection();
        $page4 = $select->query("select * from shelf where shelf_id = '$pageid'");
        return $page4;
    }

    public function delete_shelf($id){
        $delete = new Connection();
        $row = $delete->delete_query("delete from shelf where shelf_id = $id");
        return $row;
    }
}
