<?php
session_start();

require_once("DatabaseConnection.php");
require_once("Navigation.php");

?>
<html>
<head>
	<!-- I will improve everything on that cute page later! -->
	<meta charset="utf-8"/>
	<title>Schlechteste Website im I-net</title>
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="ClientSideValidation.css">
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script language="javascript" type="text/javascript" src="LoadWebsiteContent.js"></script>
	<script language="javascript" type="text/javascript" src="ClientSideValidation.js"></script>
</head>
<body>
<div class="pageContainer">
    <div class="header">

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
                        <li><a id= <?php echo $row["Bezeichnung"] ?> ".php"> <?php echo $row["Bezeichnung"] ?> </a></li>
                        <?php
                    }
                    foreach ($navigation->query($sql->getNavigation(1)) as $row) {
                        ?>
                        <li><a id= <?php echo $row["Bezeichnung"] ?> ".php"> <?php echo $row["Bezeichnung"] ?> </a></li>
                        <?php
                    }
                }else{
                    //getting navigation for "not logged" in user (with ID = 0):
                    foreach ($navigation->query($sql->getNavigation(0)) as $row) {
                        ?>
                        <li><a id= <?php echo $row["Bezeichnung"] ?> ".php"> <?php echo $row["Bezeichnung"] ?> </a></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
                <div id="contentMenu">
                    Ich werde das CSS auf jedenfall noch verbessern.
                </div>
        </div>
        <div class="rightSide">
            <div class="profileBox"></div>
            <div class="gameBox"></div>
        </div>
    </div>

    <div class="footer">
        Copyright Aylin Artut
    </div>
</div>
</body>
</html>