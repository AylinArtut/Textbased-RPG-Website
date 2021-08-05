<?php
    // IT IS REALLY DIRTY HERE; I WILL & AND HAVE TO CHANGE IT LATER !!!!!!!!!!!! :

    session_start();

    include("../Includes/Autoloader.php");

    $databaseConnection = new DatabaseConnection();
    $websiteContents = $databaseConnection->getConnectionToDatabase();
    $sql = new WebsiteContents($websiteContents);

    // I get the text to show from DB:
    foreach ($websiteContents->query($sql->getWebsiteContent(1)) as $row) {
?>
        <form action="Main.php" method="POST">
            <p>
                <b>Text bei Spielkonzept ändern:</b> <br/>
                <textarea name="changeText" rows="4" cols="50">
                    <?php
                        echo $row["text"];
                    ?>
                </textarea> <br/> <br/>
                <input type="submit" value="Speichern" name="submit_gameConcept"> <br/> <br/> <br/>
            </p>
        </form>
<?php
    }

    // Yes, it's duplicated, I will change it later to only one form & I will iterate through:

    // I get the text to show from DB:
    foreach ($websiteContents->query($sql->getWebsiteContent(2)) as $row) {
        ?>
        <form action="Main.php" method="POST">
            <p>
                <b>Text bei Regelwerk ändern:</b> <br/>
                <textarea name="changeText" rows="4" cols="50">
                        <?php
                            echo $row["text"];
                        ?>
                    </textarea> <br/> <br/>
                <input type="submit" value="Speichern" name="submit_rules"> <br/> <br/> <br/>
            </p>
        </form>
<?php
    }
?>