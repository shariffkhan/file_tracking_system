<?php

require_once '../Core/init.php';

	$session = new Session();

	// log out user
	if ($session->logged()) {
		$session->logout();
		header("Location: login.php");
	}

		
