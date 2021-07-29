<?php
    class Navigation{

        private $databaseConnection;

        function __construct($databaseConnection){
            $this->databaseConnection = $databaseConnection;
        }

        function getNavigation($status){
            // I will seperate database stuff later:
            $sql = "SELECT menuname FROM website_navigation WHERE logged_in=" . $status;
            return $sql;
        }
    }
?>