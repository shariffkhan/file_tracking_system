<?php
class Sections_level{

        public function select_level($id,$ids){
            $get = new Connection();
            $row = $get->select_query("select * from section_levels where level = $id and upper_office_id = $ids");
            return $row;
        }

    public function insert_Headers($header,$name,$level,$upper_office_id){
        $insert = new Connection();
        $row = $insert->insert_query("insert into section_levels(header,name,level,upper_office_id) values('$header','$name',$level,$upper_office_id)");
        return $row;
}

    public function select_section_level(){
        $get = new Connection();
        $row = $get->select_query("select * from section_levels");
        return $row;
    }
    public function select_section_level_by_id($pageid){
        $get = new Connection();
        $row = $get->query("select * from section_levels where section_levels_id = $pageid");
        return $row;
    }

    public function select_section_level_by_level($level){
        $select = new Connection();
        $row = $select->select_query("select * from section_levels where level = $level");
        return $row;
    }
    public function delete_table($id){
        $delete = new Connection();
        $row = $delete->delete_query("DELETE FROM section_levels where section_levels_id = $id");
        return $row;
    }
    public function select_level_not_ins($id){
        $select = new Connection();
        $row = $select->select_query("select * from section_levels where section_levels_id not in(select  section_levels_id from section_levels where section_levels_id = $id)");
        return $row;
    }
}