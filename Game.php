<?php
    class UserProfile
    {
        private $databaseConnection;

        function __construct($databaseConnection)
        {
            $this->databaseConnection = $databaseConnection;
        }

        function makeGameEntry($userid, $message){
            $query = "INSERT INTO game_entries (userid, message) VALUES (?, ?)";
            $prepare = $this->databaseConnection->prepare($query);
            $prepare->execute([$userid, $message]);
        }

        function getAllGameEntries(){
            $sql = "SELECT users.username, users.imagepath, game_entries.timestamp, game_entries.message FROM game_entries LEFT JOIN users ON game_entries.userid = users.id";
            return $sql;
        }

    }
?>