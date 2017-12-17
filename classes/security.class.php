<?php

class security{

    public function select_sec_id($secid){
        $select = new Connection();
        $row = $select->select_query("select * from security_level where id = $secid");
        return $row;
    }

    public function select_group(){
        $select = new Connection();
        $row = $select->select_query("select * from groups");
        return $row;
    }
}
