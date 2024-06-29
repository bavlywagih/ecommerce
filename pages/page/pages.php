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

    $do ='';

    if (isset($_GET['do'])) {

        $do = $_GET['do'];

    }
    else{

        $do = 'Manage';

    }

    if($do == 'Manage'){
        include "../../Includes/pages/manage/manage.php";
    }

    elseif ($do == 'Add') {
        echo 'you are in Add page';
    }

    elseif ($do == 'Insert') {
        echo 'you are in Insert page';
    }

    else{
        echo 'Error';
    }


    include '../../' . $Footer;

?>