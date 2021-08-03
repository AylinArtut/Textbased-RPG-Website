<div class="Left_Page_Content">

    <div class="Page_Navigation">
        <ul>
            <?php
            $databaseConnection = new DatabaseConnection();
            $navigation = $databaseConnection->getConnectionToDatabase();

            $sql = new Navigation($navigation);

            // I detect if user is logged in or not via Sessions & then I get navigation for correct access (stored in db):
            if((isset($_SESSION['Login.class'])) && (!empty(session_id()))){
                //getting navigation for both (logged in + not logged in):
                foreach ($navigation->query($sql->getNavigation(0)) as $row){
                    ?>
                    <li>
                        <a id= <?php echo $row["filename"] ?> ".php"> <?php echo $row["menuname"] ?> </a>
                    </li>
                    <?php
                }
                foreach ($navigation->query($sql->getNavigation(1)) as $row){
                    ?>
                    <li>
                        <a id= <?php echo $row["filename"] ?> ".php"> <?php echo $row["menuname"] ?> </a>
                    </li>
                    <?php
                }
            }else{
                //getting navigation for "not logged" in user (with ID = 0):
                foreach ($navigation->query($sql->getNavigation(0)) as $row){
                    ?>
                    <li>
                        <a id= <?php echo $row["filename"] ?> ".php"> <?php echo $row["menuname"] ?> </a>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>

    <div id="Main_Text_Content">
        <?php
        if(!(isset($_SESSION['Login.class'])) || (empty(session_id()))){
            ?>
            <div id="Register_Form">
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
                    <input type="file" name="imagepath" id="imagepath">

                    <!-- ---------------------------------------------------------------------------------- -->

                    <input type="submit" id="submit_registration" name="submit_registration" value="Submit">
                </form>
            </div>
            <?php
        }
        ?>
    </div>

</div>