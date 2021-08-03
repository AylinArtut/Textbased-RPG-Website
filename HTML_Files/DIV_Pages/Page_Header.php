<div class="Page_Header">
    <?php
            if(!(isset($_SESSION['Login.class'])) || (empty(session_id()))){
        ?>
    <div id="LoginBox">
        <form id="login_formular" action="Main.php" method="POST">

            <!-- ---------------------------------------------------------------------------------- -->

            E-Mail:
            <input type="email" id="email_forLogin" name="email_forLogin">

            <!-- ---------------------------------------------------------------------------------- -->

            Passwort:
            <input type="password" id="password_forLogin" name="password_forLogin">

            <!-- ---------------------------------------------------------------------------------- -->

            <input type="submit" id="submit_login" name="submit_login" value="Login">
        </form>
    </div>

    <div id="RegisterBox">
        <a href='#'> Zur Registrierung </a>
    </div>
    <?php
            }else{
        ?>
    <div id="LogoutBox">
        <form id="logout" action="Main.php" method="POST">
            <input type="submit" id="submit_logout" name="submit_logout" value="Logout">
        </form>
    </div>
    <?php
            }
        ?>
</div>