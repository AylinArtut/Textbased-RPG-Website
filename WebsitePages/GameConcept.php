<?php
    include("../Includes/Autoloader.php");
    // Maybe I will change those "WebsitePages" section later to get information via onclick-event, to have only one page to show everything:

    $databaseConnection = new DatabaseConnection();
    $websiteContents = $databaseConnection->getConnectionToDatabase();
    $sql = new WebsiteContents($websiteContents);

    // I get the text to show from DB:
    foreach ($websiteContents->query($sql->getWebsiteContent(1)) as $row){
        echo $row["text"];
    }
?>