<?php

class Session{
		public $staff_email;
		private $logged = false;

		function __construct(){
                    session_start();
			$this->checklogin();
		}


		// standard user login status
		public function logged() {
			return $this->logged;
		}



		// standard user login and go to profile page
		public function login($staff_email) {
			if ($staff_email) {
				$this->staff_email = $_SESSION['staff_email'] = $staff_email;
				$this->logged = true;
                                ?>
<script>
    
    alert('you are succesfull logined');
    </script>
<?php
                                header("Location: index.php");
			}
		}
		// standard user logout
		public function logout() {
			unset($_SESSION['staff_email']);
			unset($this->staff_email);
			$this->logged = false;
		}
	

		// check if login
		private function checklogin(){
			if (isset($_SESSION['staff_email'])) {
				$this->staff_email = $_SESSION['staff_email'];
				$this->logged = true;
			} else {
				// user
				unset($this->staff_email);
				$this->logged = false;
			}
		}

	
}