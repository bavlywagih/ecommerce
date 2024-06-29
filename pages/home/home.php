<?php

    session_start();

    if (!isset($_SESSION['username'])) {
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
    echo "your Full Name is " . $_SESSION['fullname'] . " and your Arabic Full Name is " . $_SESSION['FullNameArabic'] . "and youe username " . $_SESSION['username'] . " and your group id = " .$_SESSION['groupid']  ;

    include '../../' . $Footer;

?>
<script>
    localStorage.setItem('titel', 'homepage');
</script>