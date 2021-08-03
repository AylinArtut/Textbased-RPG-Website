<?php
    session_start();

    include("Includes/Autoloader.php");

    $databaseConnection = new DatabaseConnection();
    $userProfile = $databaseConnection->getConnectionToDatabase();

    $sql = new User($userProfile);

    if((isset($_SESSION['Login.class'])) && (!empty(session_id()))){
        foreach ($userProfile->query($sql->getProfileData($_SESSION['id'])) as $row){
?>
            <!-- I will improve this later! -->

            <form action="Main.php" method="POST">
                <p>
                    <b>Benutzernamen ändern:</b>
                    <input type="text" name="changeAttribute"> <input type="submit" value="Speichern" name="username">
                </p>
            </form>

            <form action="Main.php" method="POST">
                <p>
                    <b>E-Mail ändern:</b>
                    <input type="text" name="changeAttribute"> <input type="submit" value="Speichern" name="email">
                </p>
            </form>

            <form action="Main.php" method="POST">
                <p>
                    <b>Geschlecht ändern:</b>
                    <select id="gender" name="changeAttribute">
                        <option value="maennlich"> männlich </option>
                        <option value="weiblich"> weiblich </option>
                    </select>
                    <input type="submit" value="Speichern" name="gender">
                </p>
            </form>

            <form action="Main.php" method="POST">
                <p>
                    <b>Alter ändern:</b>
                    <input type="text" name="changeAttribute">
                    <input type="submit" value="Speichern" name="age">
                </p>
            </form>

            <form action="Main.php" method="POST" enctype="multipart/form-data">
                <p>
                    <b>Profilbild ändern:</b>
                    <input type="file" name="imagepath" id="imagepath">
                    <input type="submit" id="submit" name="imagepath" value="Speichern">
                </p>
            </form>

            <!-- Password verification will be added later. -->
            <form action="Main.php" method="POST">
                <p>
                    <b>Passwort ändern:</b>
                    <input type="text" name="changeAttribute"> <input type="submit" value="Speichern" name="password">
                </p>
            </form>
<?php
    }
}
?>