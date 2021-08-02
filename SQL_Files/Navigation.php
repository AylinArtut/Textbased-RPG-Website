<?php
    class Navigation{

        private $databaseConnection;

        function __construct($databaseConnection){
            $this->databaseConnection = $databaseConnection;
        }

        function getNavigation($status){
            $sql = "SELECT menuname, filename FROM website_navigation WHERE logged_in=" . $status;
            return $sql;
        }
    }
?>