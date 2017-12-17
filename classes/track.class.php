<?php

class Track{

    public function select_track(){
        $select = new Connection();
        $row = $select->select_query("select * from track_files");
        return $row;
    }
    public function select_track_received(){
        $select = new Connection();
        $row = $select->select_query("select * from track_files where is_notified = 1");
        return $row;
    }
     public function track_file_with_maxfile_id($id){
        $select = new Connection();
        $row = $select->query("select file_id,MAX(id) as myid from track_files where file_id = $id order by file_id desc");
        return $row;
    }
     public function track_file_with_file_id($id,$max){
        $select = new Connection();
        $row = $select->query("select * from track_files where file_id = $id and id = $max order by id DESC limit 1");
        return $row;
    }
    
    public function select_track_sent($id){
        $select = new Connection();
        $row = $select->select_query("select * from track_files where is_notified = 0 and sender_id = $id");
        return $row;
    }
    public function track_before_receiver($id){
        $select = new Connection();
        $row = $select->select_query("select * from track_files where is_notified=0 and receiver_id = $id");
        return $row;
    }
    public function count_before_receiver($id){
        $select = new Connection();
        $row = $select->query("select count(id) as count from track_files where is_notified=0 and receiver_id = $id");
        return $row;
    }
    public function track_receiver($id){
        $select = new Connection();
        $row = $select->select_query("select * from track_files where is_notified=1 and status=1 and receiver_id = $id ");
        return $row;
    }

    public function insert_sent_file($sender_id,$receiver_id,$file_id){
        $insert = new Connection();
        $row = $insert->insert_query("insert into track_files(sender_id,receiver_id,file_id) values($sender_id,$receiver_id,$file_id)");
        return $row;
    }

    public function notified($now_notified,$file_id){
      $update = new Connection();
      $sql = "update track_files set is_notified={$now_notified} where file_id = {$file_id} ";
      $row =mysqli_query($update->connect, $sql);
    }
    public function notified1($now_status,$file_id,$id){
      $update = new Connection();
      $sql = "update track_files set status={$now_status} where file_id = {$file_id} and id = {$id} ";
      $row =mysqli_query($update->connect, $sql);
    }
    public function notifications($id){
        $select = new Connection();
        $row =$select->msqli_query("select * from track_files where receiver_id = $id ORDER BY  id DESC LIMIT 5");
        return $row;
    }
    public function track_before_receive_num_row($id){
        $select = new Connection();
        $query = $select->msqli_query("select * from track_files where is_notified=0 and receiver_id = $id");
        $row = mysqli_num_rows($query);
        return $row;
    }
}
