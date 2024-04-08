<?php
    session_start();
    if (!isset($_SESSION['Email'])) {
        header ('location: ../../../pages/home/home.php');
    }
    include "../../Connect/Conf.php";

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
