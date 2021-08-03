<div class="Right_Page_Content">

    <div class="FirstSideBox_Right_Page_Content">
        <?php
        $databaseConnection = new DatabaseConnection();
        $userProfile = $databaseConnection->getConnectionToDatabase();
        $sql = new User($userProfile);

        // I detect if user is logged in or not via Sessions & then I get navigation for correct access (stored in db):
        if((isset($_SESSION['Login.class'])) && (!empty(session_id()))){
            //getting navigation for both (logged in + not logged in):
            foreach ($userProfile->query($sql->getProfileData($_SESSION['id'])) as $row){
                ?>
                <img src="<?php echo $row["imagepath"] ?>" width="200" height="160">
                <?php
                echo "<b> Benutzer: " . $row["username"] . "</b>";
            }
        }
        ?>
    </div>

    <div class="SecondSideBox_Right_Page_Content">
        <?php
        if((isset($_SESSION['Login.class'])) || (empty(session_id()))){
            echo "<a href='Profile.php'> Zum Profil </a>";
        }
        ?>
    </div>

</div>