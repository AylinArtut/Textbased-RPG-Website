<?php
session_start();

require_once("DatabaseConnection.php");
require_once("UserProfile.php");

$databaseConnection = new DatabaseConnection();
$userProfile = $databaseConnection->getConnectionToDatabase();

$sql = new UserProfile($userProfile);

// I detect if user is logged in or not via Sessions & then I get navigation for correct access (stored in db):
if((isset($_SESSION['login'])) && (!empty(session_id()))){
    //getting navigation for both (logged in + not logged in):
    echo "<p>Liste der Mitspieler:</p>";
    foreach ($userProfile->query($sql->getAllPlayer()) as $row) {
        // I will of course improve this later:
        echo "<p> - " . $row["username"] . "</p>";
    }
}
?>