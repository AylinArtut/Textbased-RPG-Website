<div id="Page_Navigation">
    <ul>
        <?php
            $databaseConnection = new DatabaseConnection();
            $navigation = $databaseConnection->getConnectionToDatabase();

            $sql = new Navigation($navigation);

            // I detect if user is logged in or not via Sessions & then I get navigation for correct access (stored in db):
            if((isset($_SESSION['Login.class'])) && (!empty(session_id()))){
                //getting navigation for both (logged in + not logged in):
                foreach ($navigation->query($sql->getNavigation(0)) as $row){
        ?>
                    <li>
                        <a id= <?php echo $row["filename"] ?> ".php"> <?php echo $row["menuname"] ?> </a>
                    </li>
        <?php
                }
                foreach ($navigation->query($sql->getNavigation(1)) as $row){
        ?>
                    <li>
                        <a id= <?php echo $row["filename"] ?> ".php"> <?php echo $row["menuname"] ?> </a>
                    </li>
        <?php
                }
            }else{
                //getting navigation for "not logged" in user (with ID = 0):
                foreach ($navigation->query($sql->getNavigation(0)) as $row){
        ?>
                    <li>
                        <a id= <?php echo $row["filename"] ?> ".php"> <?php echo $row["menuname"] ?> </a>
                    </li>
        <?php
                }
            }
        ?>
    </ul>
</div>
<div id="Left_Page_Content">

</div>