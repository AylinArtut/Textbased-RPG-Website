<?php
session_start();

// I will seperate & clean everything here later:

require_once("DatabaseConnection.php");
require_once("UserProfile.php");
?>

<div id="game">
    <form id="game_formular" action="Main.php" method="POST">
        <h1><b>Spielbereich</b></h1><br/>
        <textarea id="game_textarea" name="game_textarea" rows="20" cols="100"></textarea><br/>
        <p><input type="submit" id="submit_game" name="submit_game" value="Text abschicken"></p>
    </form>
</div>

<?php
$databaseConnection = new DatabaseConnection();
$userProfile = $databaseConnection->getConnectionToDatabase();

$sql = new UserProfile($userProfile);

if((isset($_SESSION['login'])) && (!empty(session_id()))){
    foreach ($userProfile->query($sql->getAllGameEntries()) as $row) {
        // I will of course improve this later & make it more pretty:

        echo "<p><img src='" . $row["imagepath"] . "' width='150'" . "height='150'" . "></p>";
        echo "<p> - Benutzername: " . $row["username"] . "</p>";
        echo "<p> - Timestamp: " . $row["timestamp"] . "</p>";
        echo "<p> - Spiel-Eintrag: " . $row["message"] . "</p>";

        echo "-------------------------------------------------";
    }
}
?>