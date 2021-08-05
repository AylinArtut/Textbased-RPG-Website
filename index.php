<?php
    session_start();

    include("Includes/Autoloader.php");

    include("HTML_Files/Header.html");
    include("HTML_Files/DIV_Pages/Page_Header.php");
?>
    <div id="Page_Wrapper">
        <?php
            include("HTML_Files/DIV_Pages/Left_Page_Content.php");
            include("HTML_Files/DIV_Pages/Right_Page_Content.php");
            include("HTML_Files/Footer.html");
        ?>
    </div>