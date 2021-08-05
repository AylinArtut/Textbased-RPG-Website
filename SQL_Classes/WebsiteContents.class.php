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

        function getAllWebsiteContents(){
            $sql = "SELECT website_navigation.menuname, website_contents.text FROM website_navigation RIGHT JOIN  website_contents ON website_contents.website_navigation_name = website_navigation.id";
            return $sql;
        }

        function updateWebsiteContent($text, $id){
            $statement = $this->databaseConnection->prepare("UPDATE website_contents SET text = ? WHERE website_navigation_name = ?");
            $sql = $statement->execute(array($text, $id));
            return $sql;
        }
    }
?>