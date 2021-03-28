<?php
	require_once("Registration.php");

	if (isset($_POST['submit_registration'])){
		$registration = new Registration;
		echo $registration->storeDataInDatabase();
	}	
?>