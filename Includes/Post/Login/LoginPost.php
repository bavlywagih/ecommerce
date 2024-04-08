<?php
    session_start();
    if (!isset($_SESSION['Email'])) {
        header ('location: ../../../pages/home/home.php');
    }
    include "../../Connect/Conf.php";
    include "../../languages/English/English.php";
    include "../../Templates/Header/Header.php";
    // Check If User Coming From Comming From Http Post Request
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $HashPassword = sha1($Password);
        // Check If The User Exist In Database
    
        $stmt = $con->prepare("SELECT email , password FROM users WHERE email = ? AND password = ? ");
        $stmt->execute(array($Email, $HashPassword ));
        $count = $stmt->rowCount();
    
        if ($count > 0) {
            $_SESSION['Email'] = $Email;
            header ('location: ../../../pages/home/home.php');

        }else {
            echo $HashPassword;
            echo "فاشل ";
        };
    
    }
    // http://localhost/e-commerce%20shop/Includes/Post/Login/LoginPost.php
    // http://localhost/e-commerce%20shop/pages/home/home.php