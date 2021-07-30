<?php
session_start();

require_once("DatabaseConnection.php");
require_once("Navigation.php");
require_once("UserProfile.php");
?>
<html>
<head>
	<!-- I will improve everything on that cute page later! -->
	<meta charset="utf-8"/>
	<title>Schlechteste Website im I-net</title>
	<link rel="stylesheet" href="CSS_Files/main.css">
	<link rel="stylesheet" href="CSS_Files/ClientSideValidation.css">
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script language="javascript" type="text/javascript" src="LoadWebsiteContent.js"></script>
	<script language="javascript" type="text/javascript" src="ClientSideValidation.js"></script>
</head>
<body>
<div class="pageContainer">
    <div class="header">
        <?php
        if(!(isset($_SESSION['login'])) || (empty(session_id()))) {
            ?>
            <div id="login">
                <form id="login_formular" action="Main.php" method="POST">
                    E-Mail:
                    <input type="email" id="email_forLogin" name="email_forLogin">

                    Passwort:
                    <input type="password" id="password_forLogin" name="password_forLogin">

                    <input type="submit" id="submit_login" name="submit_login" value="Login">

                </form>
            </div>
            <?php
        }
        ?>
    </div>

    <div class="content">
        <div class="leftSide">
        <div class="navigation">
            <ul>
                <?php
                $databaseConnection = new DatabaseConnection();
                $navigation = $databaseConnection->getConnectionToDatabase();

                $sql = new Navigation($navigation);

                // I detect if user is logged in or not via Sessions & then I get navigation for correct access (stored in db):
                if((isset($_SESSION['login'])) && (!empty(session_id()))){
                    //getting navigation for both (logged in + not logged in):
                    foreach ($navigation->query($sql->getNavigation(0)) as $row) {
                        ?>
                        <li><a id= <?php echo $row["menuname"] ?> ".php"> <?php echo $row["menuname"] ?> </a></li>
                        <?php
                    }
                    foreach ($navigation->query($sql->getNavigation(1)) as $row) {
                        ?>
                        <li><a id= <?php echo $row["menuname"] ?> ".php"> <?php echo $row["menuname"] ?> </a></li>
                        <?php
                    }
                }else{
                    //getting navigation for "not logged" in user (with ID = 0):
                    foreach ($navigation->query($sql->getNavigation(0)) as $row) {
                        ?>
                        <li><a id= <?php echo $row["menuname"] ?> ".php"> <?php echo $row["menuname"] ?> </a></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
                <div id="contentMenu">
                    Ich werde das CSS auf jedenfall noch verbessern und die Registrierung kommt auch woanders hin. <br/>

                    <?php
                    if(!(isset($_SESSION['login'])) || (empty(session_id()))) {
                    ?>
                    <!-- I will put registration-stuff somewhere else later. -->
                    <div id="registration">
                        <form id="registration_formular" action="Main.php" method="POST" enctype="multipart/form-data">

                            <h1><b>Registrierung</b></h1>

                            <p>Benutzername:<br>
                            <input type="text" id="username" name="username"></p>
                            <span id="username_errorMessage"></span>
                            <span id="username_errorMessage2"></span>

                            <p>E-Mail*:<br>
                                <input type="email" id="email" name="email"></p>
                            <span id="email_errorMessage"></span>

                            <p>Passwort*:<br>
                                <input type="password" id="password" name="password"></p>
                            <span id="password_errorMessage"></span>

                            <p>Geschlecht:<br>
                                <select id="gender" name="gender">
                                    <option value="maennlich">männlich</option>
                                    <option value="weiblich">weiblich</option>
                                </select></p>

                            <p>Alter (Charakter ältert nicht "bei Zeit"):<br>
                                <input type="text" id="age" name="age"></p>

                            Bild Upload:<br>
                                <input type="file" name="imagepath" id="imagepath">

                            <input type="submit" id="submit_registration" name="submit_registration" value="Submit">
                        </form>
                    </div>
                        <?php
                    }
                    ?>
                </div>
        </div>
        <div class="rightSide">
            <div class="profileBox">
                <?php
                $databaseConnection = new DatabaseConnection();
                $userProfile = $databaseConnection->getConnectionToDatabase();
                $sql = new UserProfile($userProfile);

                // I detect if user is logged in or not via Sessions & then I get navigation for correct access (stored in db):
                if((isset($_SESSION['login'])) && (!empty(session_id()))) {
                    //getting navigation for both (logged in + not logged in):
                    foreach ($userProfile->query($sql->getProfileData($_SESSION['id'])) as $row) {
                        ?>
                         <img src="<?php echo $row["imagepath"] ?>" width="150" height="150">
                         <?php echo $row["username"] ?>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="gameBox">
                <a href="Profile.php">Zum Profil</a>
            </div>
        </div>
    </div>
    <div class="footer">
        Copyright Aylin Artut
    </div>
</div>
</body>
</html>