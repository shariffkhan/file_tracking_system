<?php

class group{

  public function update_permission($permissions,$id){
    $update = new Connection();
    $row = $update->insert_query("update groups set permissions = '$permissions' where id = $id ");
    return $row;
  }

  public function select_by_id_not_selected($id){
      $select = new Connection();
      $row = $select->select_query("select * from groups where id not in(select id from groups where id = $id)");
      return $row;
  }
  public function select_by_id($id){
      $select = new Connection();
      $row = $select->query("select * from groups where id = $id");
      return $row;
  }

  
}
