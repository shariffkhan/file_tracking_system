<?php
if(isset($_GET['page6'])){
    $pageid = $_GET['page6'];
}
class cabinet{
    public function select_cabinet(){
        $select = new Connection();
        $row = $select->select_query("select * from cabinets");
        return $row;
    }

    public function cabinet_filetype_id($id){
        $select = new Connection();
        $row = $select->select_query("select * from cabinets where file_type_id =$id");
        return $row;
    }

    public function cabinet_filetype_id_edit($id){
        $select = new Connection();
        $row = $select->select_query("select * from cabinets where file_type_id =$id ");
        return $row;
    }

    public function insert_cabinet($cabinet,$filetypeid){
        $insert = new Connection();
        $row = $insert->insert_query("insert into cabinets(name,file_type_id) values ('$cabinet',$filetypeid)");
        return $row;
    }
    public function open_cabinets($pageid){
        $select = new Connection();
        $page6 = $select->query("select * from cabinets where cabinet_id = '$pageid'");
        return $page6;
    }

    public function update_cabinet($name,$file_type_id,$id){
        $update = new Connection();
        $row = $update->mysql_query("update cabinets SET name = '$name',file_type_id = $file_type_id where cabinet_id = $id");
        return $row;
    }

    public function delete_cabinet($id){
        $delete = new Connection();
        $row = $delete->delete_query("delete from cabinets where cabinet_id = $id");
        return $row;
    }
}
