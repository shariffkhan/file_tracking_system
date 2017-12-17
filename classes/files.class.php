<?php
if(isset($_GET['page5'])){
    $pageid = $_GET['page5'];
}
class Files{

    public function select_files(){
        $select = new Connection();
        $row = $select->select_query("select * from files");
        return $row;
    }
    public function select_one_files(){
        $select = new Connection();
        $row = $select->query("select * from files");
        return $row;
    }

    public function files_id($pageid){
        $select = new Connection();
        $page5 = $select->query("select * from files where id = $pageid");
        return $page5;
    }
    public function files_status(){
        $select = new Connection();
        $row = $select->select_query("select * from files where status = 1");
        return $row;
    }
    public function files_shelf_id($id){
        $select = new Connection();
        $row = $select->select_query("select * from files where shelf_id = $id");
        return $row;
    }
    public function upadate_file($id,$name,$volume,$file_type_id,$cabinet_id,$shelf_id,$set_id){
        $update = new Connection();
        $row = $update->query("UPDATE files SET file_id = '$id',name = '$name',volume = $volume, file_type_id = $file_type_id, cabinet_id =$cabinet_id,shelf_id = $shelf_id where id = $set_id");
        return $row;
    }
    public function insert_file($id,$name,$volume,$file_type,$cabinet,$shelf){
        $insert = new Connection();
        $file_row = $insert->insert_query("insert into files(file_id,name,volume,file_type_id,cabinet_id,shelf_id)  values ('$id','$name',$volume,$file_type,$cabinet,$shelf)");
        return $file_row;
    }

    public function status($now_status,$file_id){
      $update = new Connection();
      $row =mysqli_query($update->connect,"update files set status=$now_status where id = $file_id ");
      return $row;
    }

    public function search_files($name){
        $search = new Connection();
        $row = $search->select_query("select * from files where name LIKE '%".$name."%'");
        return $row;
    }

    public function delete_file($id){
        $delete = new Connection();
        $row = $delete->delete_query("DELETE FROM files where id = $id");
    }
    
    public function get_id_by_file_name($name){
        $select = new Connection();
        $row = $select->query("select * from files where name = '$name'");
        return $row;
    }
}
