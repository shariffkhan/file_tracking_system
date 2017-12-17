<?php

class Notification{

  public function select_notes_by_id($id){
    $select = new Connection();
    $row = $select->select_query("select * from track_files where receiver_id = $id");
    return $row;
  }
}

?>
