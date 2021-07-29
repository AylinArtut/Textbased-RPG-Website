<?php
    session_start();

	require_once("Registration.php");
	require_once("Login.php");
	require_once("DatabaseConnection.php");
    require_once("UserProfile.php");
	
	$databaseConnection = new DatabaseConnection();
		
	if (isset($_POST['submit_registration'])){	
		$registration = new Registration($databaseConnection->getConnectionToDatabase());
		echo $registration->storeDataInDatabase();
	}	

	if(isset($_POST['user_name'])){
        $registration = new Registration($databaseConnection->getConnectionToDatabase());
		echo $registration->checking_CharakterVorname_Username_Availability();
	}
	
	if(isset($_POST['submit_login'])){
		$login = new Login($databaseConnection->getConnectionToDatabase());
		echo $login->userLogin($_POST['email_forLogin']);
        echo header("Location: index.php");
	}

    if(isset($_POST['updateVorname'])){
        $userProfile = new UserProfile($databaseConnection->getConnectionToDatabase());
	    echo $userProfile->updateProfileData($_POST['Vorname'], $_SESSION['id']);
        echo header("Location: index.php");
    }
?>