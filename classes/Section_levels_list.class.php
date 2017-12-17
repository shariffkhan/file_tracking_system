<?php

class Section_levels_list{

    public function select_section_levels_list_by_section_levels_id($get_id,$table){
        $select = new Connection();
        $row = $select->select_query("select * from sections_levels_list where level = $get_id and section_levels_id = $table");
        return $row;
    }

    public function select_section_level($id){
        $select = new Connection();
        $row = $select->query("select * from sections_levels_list where level = $id");
        return $row;
    }
    public function select_section_level_list(){
        $select = new Connection();
        $row = $select->select_query("select * from sections_levels_list");
        return $row;
    }
    public function select_section_level_list_by_level($level){
        $select = new Connection();
        $row = $select->select_query("select * from sections_levels_list where level = $level");
        return $row;
    }
    public function select_section_level_list_id($pageid){
        $select = new Connection();
        $row = $select->query("select * from sections_levels_list where sections_levels_list_id = $pageid");
        return $row;
    }

    public function insert_List($name,$level,$section_levels_id){
        $insert = new Connection();
        $row = $insert->insert_query("insert into sections_levels_list(name,level,section_levels_id) values('$name',$level,$section_levels_id)");
        return $row;
    }

    public function select_office_dropdown($list_id){
        $select = new Connection();
        $row = $select->select_query("select * from sections_levels_list  where sections_levels_list_id not in (select sections_levels_list_id from sections_levels_list where sections_levels_list_id = $list_id)");
        return $row;
    }

    public function delete_office($id){
        $delete = new Connection();
        $row = $delete->delete_query("DELETE FROM sections_levels_list where sections_levels_list_id = $id");
        return $row;
    }
    
    public function update_table_list($name,$level,$section_levels_id,$id){
        $select = new Connection();
        $row = $select->mysql_query("update sections_levels_list SET name = '$name',level = $level,section_levels_id = $section_levels_id where sections_levels_list_id = $id");
        return $row;
    }

    public function select_section_level_id_by_section_level($id){
        $select = new Connection();
        $row = $select->select_query("select * from sections_levels_list where section_levels_id = $id");
        return $row;
}
}