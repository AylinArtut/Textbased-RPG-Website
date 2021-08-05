<?php
    session_start();

    include("../Includes/Autoloader.php");
    // I will seperate & clean everything here later:
?>

<div id="game">
    <form id="game_formular" action="../Main.php" method="POST">
        <h1><b>Spielbereich</b></h1><br/>
        <textarea id="game_textarea" name="game_textarea" rows="10" cols="50"></textarea><br/> <br/> <br/>
        <p><input type="submit" id="submit_game" name="submit_game" value="Text abschicken"></p>
    </form>
</div>

<?php
    $databaseConnection = new DatabaseConnection();
    $gameEntry = $databaseConnection->getConnectionToDatabase();

    $sql = new GameEntry($gameEntry);

    if((isset($_SESSION['Login.class'])) && (!empty(session_id()))){
        foreach ($gameEntry->query($sql->getAllGameEntries()) as $row) {
            // I will of course improve this later & make it more pretty:

            echo "<p><img src='" . $row["imagepath"] . "' width='150'" . "height='150'" . "></p>";
            echo "<p> - Benutzername: " . $row["username"] . "</p>";
            echo "<p> - Timestamp: " . $row["timestamp"] . "</p>";
            echo "<p> - Spiel-Eintrag: " . $row["message"] . "</p>";

            echo "-------------------------------------------------";
        }
    }
?>