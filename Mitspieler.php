<?php
session_start();

require_once("DatabaseConnection.php");
require_once("UserProfile.php");

$databaseConnection = new DatabaseConnection();
$userProfile = $databaseConnection->getConnectionToDatabase();

$sql = new UserProfile($userProfile);

// I detect if user is logged in or not via Sessions:
if((isset($_SESSION['login'])) && (!empty(session_id()))){
    echo "<p>Liste der Mitspieler:</p>";
    foreach ($userProfile->query($sql->getAllPlayer()) as $row) {
        // I will of course improve this later:
        echo "<p> - " . $row["username"] . "</p>";
    }
}
?>