<?php
    class Navigation{

        private $databaseConnection;

        function __construct($databaseConnection){
            $this->databaseConnection = $databaseConnection;
        }

        function getNavigation($status){
            // I will seperate database stuff later:
            $sql = "SELECT Bezeichnung FROM navigation WHERE Status=" . $status;
            return $sql;
        }
    }
?>