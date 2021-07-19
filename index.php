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
	<div id="website">
		<div id="header">
			No image for header, yet.
		</div>
		 <!-- I will improve this part later. -->
		<div id="navigation">
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
                            <li><a id= <?php echo $row["Bezeichnung"] ?> ".html"> <?php echo $row["Bezeichnung"] ?> </a></li>
                            <?php
                        }
                        foreach ($navigation->query($sql->getNavigation(1)) as $row) {
                            ?>
                            <li><a id= <?php echo $row["Bezeichnung"] ?> ".html"> <?php echo $row["Bezeichnung"] ?> </a></li>
                            <?php
                        }
                    }else{
                        //getting navigation for "not logged" in user (with ID = 0):
                        foreach ($navigation->query($sql->getNavigation(0)) as $row) {
                            ?>
                            <li><a id= <?php echo $row["Bezeichnung"] ?> ".html"> <?php echo $row["Bezeichnung"] ?> </a></li>
                            <?php
                        }
                    }
                ?>
			</ul> 	
		</div>
		<div id="login">
			<form id="login_formular" action="Main.php" method="POST">
				E-Mail:
				<input type="email" id="email_forLogin" name="email_forLogin">
				
				Passwort:
				<input type="password" id="password_forLogin" name="password_forLogin">
				
				<input type="submit" id="submit_login" name="submit_login" value="Login">
				
			</form>
		</div>	
		<div id="content">
			<p id="contentText">Hellow, welcome. You can click sections as much as you want! 
			Yayy, so much usefull content. *-*</p>
		
		    <!-- I will put registration-stuff somewhere else later. -->
			<div id="registration">
				<form id="registration_formular" action="Main.php" method="POST" enctype="multipart/form-data">
			
				<h1><b>Registrierung</b></h1>
				
				<h3>Persönliche Daten</h3>
			
				<p>Vorname:<br>
				<input type="text" id="persoenlicheDaten_vorname" name="persoenlicheDaten_vorname"></p>
				
				<p>E-Mail*:<br>
				<input type="email" id="persoenlicheDaten_email" name="persoenlicheDaten_email"></p>
				<span id="persoenlicheDaten_email_errorMessage"></span>
				
				<p>Passwort*:<br>
				<input type="password" id="persoenlicheDaten_passwort" name="persoenlicheDaten_passwort"></p>
				<span id="persoenlicheDaten_passwort_errorMessage"></span>
				
				<p>Geburtstag:<br>
				<input type="text" id="persoenlicheDaten_geburtstag" name="persoenlicheDaten_geburtstag"></p>
				
				<p>Geschlecht:<br>
				<select id="persoenlicheDaten_geschlecht" name="persoenlicheDaten_geschlecht">
					<option value="1">männlich</option>
					<option value="2">weiblich</option>
				</select></p>
				
				<p>Beziehungsstatus:<br>
				<select id="persoenlicheDaten_beziehungsstatus" name="persoenlicheDaten_beziehungsstatus">
					<option value="1">single</option>
					<option value="2">vergeben</option>
					<option value="3">verlobt</option>
					<option value="4">verheiratet</option>
					<option value="5">geschieden</option>
				</select></p>
				
				<p>Hobbys:<br>
				<input type="text" id="persoenlicheDaten_hobbys" name="persoenlicheDaten_hobbys" size="50"></p>
				
				<p>Discord:<br>
				<input type="text" id="1" name="persoenlicheDaten_discord"></p>
				
				<p>Skype:<br>
				<input type="text" id="2" name="persoenlicheDaten_skype"></p>
				
				<p>Facebook:<br>
				<input type="text" id="3" name="persoenlicheDaten_facebook"></p>
				
				<p>Instagram:<br>
				<input type="text" id="4" name="persoenlicheDaten_instagram"></p>
				
				<p>Twitter:<br>
				<input type="text" id="5" name="persoenlicheDaten_twitter"></p>
				
				<p>Webseite:<br>
				<input type="url" id="6" name="persoenlicheDaten_webseite"></p>
				
				<p>GitHub:<br>
				<input type="text" id="7" name="persoenlicheDaten_github"></p>
				
				<p>Sonstiges:<br>
				<textarea id="persoenlicheDaten_sonstiges" name="persoenlicheDaten_sonstiges" rows="4" cols="50"></textarea></p>
				
				<!-- ------------------------------------------------ -->
				
				<hr/>
				
				<h3>Angaben zum Spiel-Charakter</h3>
				
				<p>Vorname* (wird zum Usernamen):<br>
				<input type="text" id="charakter_vorname" name="charakter_vorname"></p>
				<span id="charakter_vorname_errorMessage"></span>
				<span id="charakter_vorname_errorMessage2"></span>
				
				<p>Nachname:<br>
				<input type="text" id="charakter_nachname" name="charakter_nachname"></p>
				
				<p>Spitzname:<br>
				<input type="text" id="charakter_spitzname" name="charakter_spitzname"></p>
				
				<p>Altersklasse*:<br>
				<select id="charakter_altersklasse" name="charakter_altersklasse">
					<option value="1">Erwachsener</option>
					<option value="2">Teenager</option>
					<option value="3">Kind</option>
				</select></p>
				
				<p>Alter (Charakter ältert nicht "bei Zeit"):<br>
				<input type="text" id="charakter_alter" name="charakter_alter"></p>
				
				<p>Geschlecht*:<br>
				<select id="charakter_geschlecht" name="charakter_geschlecht">
					<option value="1">männlich</option>
					<option value="2">weiblich</option>
				</select></p>
				
				<p>Rasse*:<br>
				<select id="charakter_rasse" name="charakter_rasse">
					<option value="1">Mensch</option>
				</select></p>
				
				<p>Persönlichkeit:<br>
				<input type="text" id="charakter_persoenlichkeit" name="charakter_persoenlichkeit" size="50"></p>
				
				<p>Lebensgeschichte:<br>
				<textarea id="charakter_lebensgeschichte" name="charakter_lebensgeschichte" rows="4" cols="50"></textarea></p>
				
				<p>Aussehen:<br>
				<input type="text" id="charakter_aussehen" name="charakter_aussehen" size="50"></p>
				
				<p>Besondere Merkmale:<br>
				<input type="text" id="charakter_besondereMerkmale" name="charakter_besondereMerkmale" size="50"></p>
				
				<p>Kleidung:<br>
				<input type="text" id="charakter_kleidung" name="charakter_kleidung" size="50"></p>
				
				<p>Bild Upload:<br>
				<input type="file" name="charakter_bildpfad" id="charakter_bildpfad"></p> 
				
				<p>Lebensmotto:<br>
				<input type="text" id="charakter_lebensmotto" name="charakter_lebensmotto" size="50"></p>
				
				<p>Sonstiges:<br>
				<textarea id="charakter_sonstiges" name="charakter_sonstiges" rows="4" cols="50"></textarea></p>
				
				<input type="submit" id="submit_registration" name="submit_registration" value="Submit">				
			</form> 
			</div>			
		</div>
		<div id="footer">
		</div>
	</div>
</div>
</body>
</html>