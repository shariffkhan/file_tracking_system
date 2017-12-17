<?php
if(isset($_GET['page11'])){
    $pageid = $_GET['page11'];
}
class Folio{
    
    public function insert_folio($folio,$file_id){
        $insert = new Connection();
        $row = $insert->insert_query("insert into folio(name,file_id) values ('$folio',$file_id)");
        return $row;
    }
    
    public function select_folio(){
        $select = new Connection();
        $row = $select->select_query("select * from folio");
        return $row;
    }
    public function select_folio_id($pageid){
        $select = new Connection();
        $page11 = $select->select_query("select * from folio where file_id = $pageid");
        return $page11;
    }
    public function select_folio_desc_id($pageid){
        $select = new Connection();
        $page11 = $select->query("select * from folio where file_id = $pageid order by id desc");
        return $page11;
    }
    public function select_folio_fileid($pageid){
        $select = new Connection();
        $page11 = $select->query("select * from folio where file_id = $pageid ORDER BY id DESC limit 1");
        return $page11;
    }

    public function status($now_status,$folio_id){
        $update = new Connection();
        $row =mysqli_query($update->connect,"update folio set status=$now_status where id = $folio_id ");
        return $row;
    }
}