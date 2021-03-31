<?php
	require_once("Registration.php");

	$registration = new Registration;
	
	if (isset($_POST['submit_registration'])){	
		echo $registration->storeDataInDatabase();
	}	
	
	if(isset($_POST['user_name'])){
		echo $registration->checking_CharakterVorname_Username_Availability();
	}
?>