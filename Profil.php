<?php
    session_start();

    require_once("DatabaseConnection.php");
    require_once("UserProfile.php");

    $databaseConnection = new DatabaseConnection();
    $userProfile = $databaseConnection->getConnectionToDatabase();

    $sql = new UserProfile($userProfile);

if((isset($_SESSION['login'])) && (!empty(session_id()))) {
    foreach ($userProfile->query($sql->getProfileData($_SESSION['id'])) as $row) {
        ?>
        <form action="Main.php" method="POST">
            <p> <b>Vorname:</b> <?php echo $row['Vorname'] ?> </p>
            <p> <b>Vornamen ändern:</b> <input type="text" name="Vorname" id="<?php $_SESSION['id'] ?>"> <input type="submit" value="Speichern" name="updateVorname"> </p>
        </form>

        <p> P.S.: Wird optisch natürlich viel besser mit mehr Attributen und über Buttons etc. </p>

        <?php
    }
}
?>