<?php
session_start();

include("../Includes/Autoloader.php");

$databaseConnection = new DatabaseConnection();
$userProfile = $databaseConnection->getConnectionToDatabase();

$sql = new User($userProfile);

// I detect if user is logged in or not via Sessions:
if((isset($_SESSION['Login.class'])) && (!empty(session_id()))){
    echo "<p>Liste der Mitspieler:</p>";
    foreach ($userProfile->query($sql->getAllPlayer()) as $row) {
        // I will of course improve this later:
        echo "<p> - " . $row["username"] . "</p>";
    }
}
?>