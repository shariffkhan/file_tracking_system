<?php

class levels{

    public function levels(){
        $select = new Connection();
        $row = $select->select_query("select * from levels");
        return $row;
    }

    public function levels_by_id($pageid){
        $select = new Connection();
        $row = $select->query("select * from levels where level_id = $pageid");
        return $row;
    }
    public function select_level_not_in($id){
        $select = new Connection();
        $row = $select->select_query("select * from levels where level_id not in(select  level_id from levels where level_id = $id)");
        return $row;
    }
}