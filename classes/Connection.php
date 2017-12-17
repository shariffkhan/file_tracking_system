<?php

require_once '../Core/Config.php';

class Connection{

    public $connect;
    public function __construct(){
        $this->open_connection();
    }
    public function open_connection() {
        $this->connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
        if(!$this->connect){
            die("database Connection failed:".mysqli_error($this->connect));
        }

    }

    public function select_query($sql){
        $r = $this->connect->query($sql);
        $m = array();
        while($row =$r->fetch_assoc()){
            $m[] = $row;
        }
        return $m;
    }

    public function query($sql){
        $r = mysqli_query($this->connect,$sql);
        $row = mysqli_fetch_assoc($r);
        return $row;
    }
    public function delete_query($sql){
        $r = mysqli_query($this->connect,$sql);
        return $r;
    }
    public function insert_query($sql){
        $result = mysqli_query($this->connect,$sql);
        return $result;
    }
    public function mysql_query($sql){
        $result = mysqli_query($this->connect,$sql);
        return $result;
    }

    public function fetch_array($result){
        return $result->fetch_array();
    }

    public function num_rows($result){
        return $result->num_rows;
    }

      public function msqli_query($sql){
        $result = mysqli_query($this->connect, $sql);
        if(!$result){
            die("Query failed" .mysqli_error($this->connect));
        } else {
            return $result;
        }
        }

        public function login_query($sql){
        $result = mysqli_query($this->connect, $sql);
        if(!$result){
            die("Query failed" .mysqli_error($this->connect));
        } else {
            return $result;
        }
    }

    public function update($table,$values = array()){
            $update = mysqli_query($this->connect,"update  SET {$values} from {$table}");
            return $update;
    }
    public function delete($table,$filed_id,$get_id)
    {
        $result = mysqli_query($this->connect, "delete from {$table} where {$filed_id} =$get_id");
        return $result;
    }

    public function close_connection(){
            if(!isset($this->connect)){
                mysqli_close($this->connect);
                unset($this->connect);
            }
    }
}
