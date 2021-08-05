<?php
    class Navigation{

        private $databaseConnection;

        function __construct($databaseConnection){
            $this->databaseConnection = $databaseConnection;
        }

        function getNavigation($status){
            $sql = "SELECT menuname, filename, role FROM website_navigation WHERE role=" . $status;
            return $sql;
        }
    }
?>