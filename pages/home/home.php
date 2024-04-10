<?php

    session_start();

    if (!isset($_SESSION['email'])) {
        header ('location: ../../index.php');
        exit();
    }

    include "../../Includes/Initialization/Init.php";
    include '../../' .$Connect;

    ob_start(); 
        echo 'home' ;
    $class = ob_get_clean(); 

    ob_start(); 
        echo 'home-page' ;
    $title = ob_get_clean(); 
    
    ob_start(); 
        echo '../../Layout/Css/All/All.css';
    $css = ob_get_clean(); 
    
    ob_start(); 
        echo '../../Layout/js/All/All.js';
    $js = ob_get_clean(); 

    include '../../' .$Header;
    include '../../' .$English;
    include '../../' .$navbar;

    echo "your Full Name is " . $_SESSION['fullname'] . " and your Arabic Full Name is " . $_SESSION['FullNameArabic'] . "and your group id " . $_SESSION['groupid'] . "and your trust status" . $_SESSION['truststatus'] . "and your red status" . $_SESSION['redstatus'] . "and youe email " . $_SESSION['email'];

    include '../../' . $Footer;

?>