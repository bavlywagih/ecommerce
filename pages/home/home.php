<?php
    session_start();
    include "../../Includes/Initialization/Init.php";
    include '../../' .$Connect;
    include '../../' .$navbar;
    include '../../' .$Header;
    include '../../' .$English;
    if (!isset($_SESSION['Email'])) {
        header ('location: http://localhost/e-commerce%20shop/index.php');
        exit();
    }
    echo $_SESSION['Email'] ;
?>