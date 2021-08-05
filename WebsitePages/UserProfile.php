<?php
    session_start();

    if((isset($_SESSION['Login.class'])) && (!empty(session_id()))){
?>
        <!-- I will improve this later! -->

        <form action="Main.php" method="POST">
            <p>
                <b>Benutzernamen ändern:</b> <br/>
                <input type="text" name="changeAttribute"> <input type="submit" value="Speichern" name="username"> <br/> <br/> <br/>
            </p>
        </form>

        <form action="Main.php" method="POST">
            <p>
                <b>E-Mail ändern:</b> <br/>
                <input type="text" name="changeAttribute"> <input type="submit" value="Speichern" name="email"> <br/> <br/> <br/>
            </p>
        </form>

        <form action="Main.php" method="POST">
            <p>
                <b>Geschlecht ändern:</b> <br/>
                <select id="gender" name="changeAttribute">
                    <option value="maennlich"> männlich </option>
                    <option value="weiblich"> weiblich </option>
                </select>
                <input type="submit" value="Speichern" name="gender"> <br/> <br/> <br/>
            </p>
        </form>

        <form action="Main.php" method="POST">
            <p>
                <b>Alter ändern:</b> <br/>
                <input type="text" name="changeAttribute">
                <input type="submit" value="Speichern" name="age"> <br/> <br/> <br/>
            </p>
        </form>

        <form action="Main.php" method="POST" enctype="multipart/form-data">
            <p>
                <b>Profilbild ändern:</b> <br/>
                <input type="file" name="imagepath" id="imagepath">
                <input type="submit" id="submit" name="imagepath" value="Speichern"> <br/> <br/> <br/>
            </p>
        </form>

        <!-- Password verification will be added later. -->
        <form action="Main.php" method="POST">
            <p>
                <b>Passwort ändern:</b> <br/>
                <input type="text" name="changeAttribute"> <input type="submit" value="Speichern" name="password"> <br/> <br/> <br/>
            </p>
        </form>
<?php
    }
?>