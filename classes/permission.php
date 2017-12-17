<?php


class permission
{
    public function haspermission($key,$id){
        $connectme = new Connection();
        $group = $connectme->query("select * from groups where id = $id");

        if($group){

            $permisssions = json_decode($group['permissions'],true);

            if($permisssions[$key] == true){
                return true;
            }
        }
            return false;
    }

    public function  check_id($id){
        $check = new Connection();
        $row = $check->query("select * from staffs where inside_section_list_id = $id");
        return $row;
    }

    /*public function update_permission($admin_key,$add_key,$id,$admin,$add){

        $connectme = new Connection();
        $group = $connectme->query("select * from groups where id = $id");

        if($group){

            $permisssions = json_decode($group['permissions'],true);

                $permisssions[$admin_key] = $admin;
                $permisssions[$add_key] = $add;

                $update = $connectme->insert_query("update group set permissions = $permisssions where ");

        }
        return false;
    }*/

    
    public function update_group($id,$user_id){
        $select = new Connection();
        $row = $select->query("update staffs set security_level_id = $id where id = $user_id");
            return $row;
    }
}