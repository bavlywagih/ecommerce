<?php
    session_start();
    if (!isset($_SESSION['Email'])) {
        header ('location: http://localhost/e-commerce%20shop/index.php');
        exit();
    }
    echo $_SESSION['Email'] ;
?>