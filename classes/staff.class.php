<?php
class Staff{
    	public $staff_email;
 	public $fname;
 	public $lname;
 	public $email;
    public $password;

    public function select_staff(){
        $select = new Connection();
        $row = $select->select_query("select * from staffs");
        return $row;
    }
    public function select_staff_dropdown($id){
        $select = new Connection();
        $row = $select->query("select * from staffs where id not in(select id from staffs where id=$id)");
        return $row;
    }
    /*


    public function select_office_dropdown($id){
        $select = new Connection();
        $row = $select->select_query("select * from staffs  join inside_section_list ON staffs.inside_section_list_id = inside_section_list.inside_section_list_id join inside_section ON inside_section.inside_section_id = inside_section_list.inside_section_id join section_list ON inside_section.section_list_id = section_list.parts_id where staffs.inside_section_list_id not in(select staffs.inside_section_list_id from staffs where staffs.inside_section_list_id=$id)");
        return $row;
    }*/
    public function select_staff_for_session(){
        $session = new Session();
        $select = new Connection();
        $sessi = $session->staff_email;
        $row = $select->query("select id from staffs where email= $sessi ");
        return $row;
    }
    public static function full_name($fname, $lname) {
        if ($fname <> '' && $lname <> '') {
            return $fname ." ". $lname;
        } else {
            return 'System user';
        }
    }
    public function search_staff($search){
        $select = new Connection();
        $row = $select->select_query("select * from staffs where staff_id LIKE '%".$search."%'");
        return $row;
    }
     public function insert_staff($staff_id,$fname,$middle,$lname,$department,$email,$phone,$username,$password,$security){
        $insert = new Connection();
        $row = $insert->insert_query("insert into staffs(staff_id,fname,middle,lname,inside_section_list_id,email,phone,username,password,security_level_id)
                            	values ('$staff_id','$fname','$middle','$lname',$department,'$email',$phone,'$username',sha1('$password'),$security)");
        return $row;
    }

    public function staff_one($email){
        $select = new Connection();
        $row = $select->query("select * from staffs where email = '$email'");
        return $row;
    }

    public static function login_staff($email, $password){
		$db = new Connection();
		// check if email exists
		$sql = "SELECT * FROM staffs WHERE email = '$email' AND password = sha1('$password')";
		$result_set = $db->login_query($sql);
		$count = $db->num_rows($result_set);
		// if yes log in the user
		if ($count == 1) {
			$staff = $db->fetch_array($result_set);
            $staff_email = $staff['email'];
            $session = new Session();
            $session->login($staff_email);
		} else {
			return "invalid email or password";
		}
		//if no five error
	}

  public function staff_id($id){
    $select = new Connection();
    $row = $select->query("select * from staffs where id = $id");
    return $row;
  }
  public function staff_section_level_list_id($id){
    $select = new Connection();
    $row = $select->select_query("select * from staffs where inside_section_list_id = $id");
    return $row;
  }

    public function check_staff(){
      $select = new Connection();
      $row = $select->query("select * from staffs");
      return $row;
    }

    function update_password($new,$current){
        $update = new Connection();
        $row = $update->insert_query("update  staffs SET password = sha1('$new') where password = sha1('$current')");
        return $row;
    }

    function update_security($new,$staff_id){
        $update = new Connection();
        $row = $update->insert_query("update  staffs SET security_level_id = $new where id = $staff_id");
        return $row;
    }
}
