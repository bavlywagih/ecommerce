<?php
    session_start();

    include "../../Includes/Initialization/Init.php";
    include '../../' .$Connect;

    ob_start(); 
        echo 'home-page';
    $title = ob_get_clean(); 
    
    ob_start(); 
        echo '../../Layout/Css/All/All.css';
    $css = ob_get_clean(); 
    
    ob_start(); 
        echo '../../Layout/Js/All/All.js';
    $js = ob_get_clean(); 

    include '../../' .$Header;
    include '../../' .$English;
    include '../../' .$navbar;

    if (!isset($_SESSION['Email'])) {
        header ('location: http://localhost/e-commerce%20shop/index.php');
        exit();
    }

    echo $_SESSION['Email'] ;

    include '../../' . $Footer;
?>