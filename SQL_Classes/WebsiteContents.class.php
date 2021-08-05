<?php
    class WebsiteContents{

        private $databaseConnection;

        function __construct($databaseConnection){
            $this->databaseConnection = $databaseConnection;
        }

        function getWebsiteContent($menuname){
            $sql = "SELECT text FROM website_contents WHERE website_navigation_name=" . $menuname;
            return $sql;
        }
    }
?>