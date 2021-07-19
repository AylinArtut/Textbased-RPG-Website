<?php
    class UserProfile{

        private $databaseConnection;

        function __construct($databaseConnection){
            $this->databaseConnection = $databaseConnection;
        }

        function getProfileData($id){
            // I will change "Vorname" to something else later:
            $sql = "SELECT * FROM persoenliche_daten WHERE ID='$id'";
            return $sql;
        }

        function updateProfileData($value, $id){
            $statement = $this->databaseConnection->prepare("UPDATE persoenliche_daten SET Vorname = ? WHERE ID = ?");
            $sql = $statement->execute(array($value, $id));
            return $sql;
        }
    }
?>