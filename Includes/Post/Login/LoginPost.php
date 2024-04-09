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
    
        $stmt = $con->prepare("SELECT email , password , fullname , FullNameArabic , groupid , truststatus , redstatus FROM users WHERE email = ? AND password = ? ");
        $stmt->execute(array($Email, $HashPassword ));
        $count = $stmt->rowCount();

        if ($count > 0) {

            $result  = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result && array_key_exists('fullname', $result)) {

                $_SESSION['email'] = $result['email'];
                $_SESSION['fullname'] = $result['fullname'];
                $_SESSION['FullNameArabic'] = $result['FullNameArabic'];
                $_SESSION['groupid'] = $result['groupid'];
                $_SESSION['truststatus'] = $result['truststatus'];
                $_SESSION['redstatus'] = $result['redstatus'];

                // echo "your Full Name is " . $_SESSION['fullname'] . " and your Arabic Full Name is " . $_SESSION['FullNameArabic'] . "and your group id " . $_SESSION['groupid'] . "and your trust status" . $_SESSION['truststatus'] . "and your red status" . $_SESSION['redstatus'];
            } 

            header ('location: ../../../pages/home/home.php');
            

        }
        else {

            header ('location: ../../../index.php' );

        };
    
    }
