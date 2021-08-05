<?php
    session_start();

    include("Includes/Autoloader.php");
	
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

    if(isset($_POST['submit_logout'])){
        session_destroy();
        echo header("Location: index.php");
    }

    if(isset($_POST['submit_game'])){
	    // Yes, I know. I have to put it in another class (I will do later):
        $game = new Game($databaseConnection->getConnectionToDatabase());
        echo $game->makeGameEntry($_SESSION['id'], $_POST['game_textarea']);
        //echo header("Location: index.php");
    }

	// ------------------------------------------------------------------------------------------------------
    // I will very sure improve this part down up here later:

    if (isset($_POST['submit_gameConcept'])){
        $websiteContents = new WebsiteContents($databaseConnection->getConnectionToDatabase());
        echo $websiteContents->updateWebsiteContent($_POST['changeText'], 1);
    }

    if (isset($_POST['submit_rules'])){
        $websiteContents = new WebsiteContents($databaseConnection->getConnectionToDatabase());
        echo $websiteContents->updateWebsiteContent($_POST['changeText'], 2);
    }

    if(isset($_POST['username'])){
	    $userProfile = new User($databaseConnection->getConnectionToDatabase());
	    echo $userProfile->updateProfileData("username", $_POST['changeAttribute'], $_SESSION['id']);
        echo header("Location: index.php");
    }

    if(isset($_POST['email'])){
        $userProfile = new User($databaseConnection->getConnectionToDatabase());
        echo $userProfile->updateProfileData("email", $_POST['changeAttribute'], $_SESSION['id']);
        echo header("Location: index.php");
    }

    if(isset($_POST['gender'])){
        $userProfile = new User($databaseConnection->getConnectionToDatabase());
        echo $userProfile->updateProfileData("gender", $_POST['changeAttribute'], $_SESSION['id']);
        echo header("Location: index.php");
    }

    if(isset($_POST['age'])){
        $userProfile = new User($databaseConnection->getConnectionToDatabase());
        echo $userProfile->updateProfileData("age", $_POST['changeAttribute'], $_SESSION['id']);
        echo header("Location: index.php");
    }

    if(isset($_POST['imagepath'])){
        move_uploaded_file($_FILES["imagepath"]["tmp_name"], "Images/Profile_Images/". $_SESSION['name'] . ".jpg");
        echo header("Location: index.php");
    }

    if(isset($_POST['password'])){
        $userProfile = new User($databaseConnection->getConnectionToDatabase());
        echo $userProfile->updatePassword($_POST['changeAttribute'], $_SESSION['id']);
        echo header("Location: index.php");
    }
?>