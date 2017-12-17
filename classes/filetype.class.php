<?php
class FileType{

    public function select_filetype(){
        $select = new Connection();
        $row = $select->select_query("select * from file_type");
        return $row;
    }

    public function filetype_id($pageid){
        $select = new Connection();
        $page9 = $select->query("select * from file_type where filetype_id = $pageid");
        return $page9;
    }
    public function filetype_id_edit($id){
        $select = new Connection();
        $page9 = $select->select_query("select * from file_type where filetype_id  not in(select filetype_id from file_type where filetype_id = $id)");
        return $page9;
    }

    public function insert_filetype($file_type){
        $insert = new Connection();
        $row = $insert->insert_query("insert into file_type(name) values ('$file_type')");
        return $row;
    }

    public function update_filetype($new,$filetype_id){
        $update = new Connection();
        $row = $update->insert_query("update file_type SET name = '$new'  WHERE filetype_id = $filetype_id");
        return $row;
    }

    public function delete_file_type($id){
        $delete = new Connection();
        $row = $delete->mysql_query("delete from file_type where filetype_id = $id");
        return $row;
    }
}
