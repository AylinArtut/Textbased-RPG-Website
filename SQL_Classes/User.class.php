<?php
    class User{

        private $databaseConnection;

        function __construct($databaseConnection){
            $this->databaseConnection = $databaseConnection;
        }

        function getProfileData($id){
            $sql = "SELECT * FROM users WHERE id ='$id'";
            return $sql;
        }

        function getAllPlayer(){
            $sql = "SELECT username FROM users";
            return $sql;
        }

        function updateProfileData($attribute, $value, $id){
            $statement = $this->databaseConnection->prepare("UPDATE users SET ".$attribute." = ? WHERE id = ?");
            $sql = $statement->execute(array($value, $id));
            return $sql;
        }

        // I will verify password later, too. User.class has to type his password twice etc. ... (but later):
        function updatePassword($value, $id){
            $statement = $this->databaseConnection->prepare("UPDATE users SET password = ? WHERE id = ?");
            // a bit dirty (could use "method" for hashing in Registration.class.class.php"), I know. I will improve later:
            $sql = $statement->execute(array(password_hash($value, PASSWORD_ARGON2ID), $id));
            return $sql;
        }
    }
?>