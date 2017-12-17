<?php

class ranks{
    
    public function select_ranks(){
        $select = new Connection();
        $row = $select->select_query("select * from ranks");
        return $row;
    }
}
