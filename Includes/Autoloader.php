<?php
    function load_Classes($class)
    {
        include("C:/xampp/htdocs/" . $class . ".class.php");
    }

    function load_SQL_Classes($class)
    {
        include("C:/xampp/htdocs/SQL_Classes/" . $class . ".class.php");
    }

    spl_autoload_register( 'load_SQL_Classes');
    spl_autoload_register( 'load_Classes');
?>