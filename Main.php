<?php
	require_once("Registration.php");
	require_once("DatabaseConnection.php");
	
	$databaseConnection = new DatabaseConnection();
		
	if (isset($_POST['submit_registration'])){	
		$registration = new Registration($databaseConnection->getConnectionToDatabase());
		echo $registration->storeDataInDatabase();
	}	

	if(isset($_POST['user_name'])){
		echo $registration->checking_CharakterVorname_Username_Availability();
	}
?>