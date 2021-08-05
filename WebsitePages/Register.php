<?php
if(!(isset($_SESSION['Login.class'])) || (empty(session_id()))){
    ?>
    <div id="Register">
        <form id="registration_formular" action="Main.php" method="POST" enctype="multipart/form-data">
            <h1><b>Registrierung</b></h1>

            <!-- ---------------------------------------------------------------------------------- -->

            <p>
                Benutzername:<br/>
                <input type="text" id="username" name="username">
            </p>

            <span id="username_errorMessage"></span>
            <span id="username_errorMessage2"></span>

            <!-- ---------------------------------------------------------------------------------- -->

            <p>
                E-Mail*:<br/>
                <input type="email" id="email" name="email">
            </p>

            <span id="email_errorMessage"></span>

            <!-- ---------------------------------------------------------------------------------- -->

            <p>
                Passwort*:<br/>
                <input type="password" id="password" name="password">
            </p>

            <span id="password_errorMessage"></span>

            <!-- ---------------------------------------------------------------------------------- -->

            <p>
                Geschlecht:<br/>
                <select id="gender" name="gender">
                    <option value="maennlich"> männlich </option>
                    <option value="weiblich"> weiblich </option>
                </select>
            </p>

            <!-- ---------------------------------------------------------------------------------- -->

            <p>
                Alter (Charakter ältert nicht "bei Zeit"):<br/>
                <input type="text" id="age" name="age">
            </p>

            <!-- ---------------------------------------------------------------------------------- -->

            Bild Upload:<br/>
            <input type="file" name="imagepath" id="imagepath"> <br/> <br/>

            <!-- ---------------------------------------------------------------------------------- -->

            <input type="submit" id="submit_registration" name="submit_registration" value="Submit">
        </form>
    </div>
    <?php
}
?>