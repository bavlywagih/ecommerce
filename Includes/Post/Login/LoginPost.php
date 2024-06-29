<?php
session_start();
if (isset($_SESSION['username'])) {
    header('location: ../../../pages/home/home.php');    // إعادة توجيه المستخدم إلى صفحة تسجيل الدخول إذا لم يكن هناك جلسة
    exit();
}else{

    include "../../Connect/Conf.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['Password'];
        $hashPassword = sha1($password);

        $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute(array($username));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($row) {
            
            if ($row['password'] == $hashPassword) {
            
                if (isset($row['fullname'], $row['FullNameArabic'], $row['id'])) {
                    $_SESSION['username'] = $username;
                    $_SESSION['fullname'] = $row['fullname'];
                    $_SESSION['FullNameArabic'] = $row['FullNameArabic'];
                    $_SESSION['groupid'] =  $row['groupid'];
                    $_SESSION['id'] = $row['id'];
                    header('Location: ../../../pages/home/home.php');
                    exit();
                } else {
                    echo "<h2>Error: Incomplete user data</h2>";
                }
            } else {
                echo "<h2>Incorrect Password</h2>";
            }
        } else {
            echo "<h2>Username Not Found</h2>";
        }
    }
    
    
    
    
}

// <body onload="redirectAfterTimeout()">
// <h2  >User Not Found</h2>
// <script type="text/javascript"> function redirectAfterTimeout() { setTimeout(function() { window.location.href = "../../../signup.php"; }, 2000);  }</script>
// </body>


// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $username = $_POST['username'];
//     $password = $_POST['Password'];
//     $hashPassword = sha1($password);

//     // Check If The User Exists In Database
//     $stmt = $con->prepare("SELECT username, password, fullname, FullNameArabic, groupid FROM users WHERE username = ? AND password = ?");
//     $stmt->execute(array($username, $hashPassword));
//     $count = $stmt->rowCount();

//     if ($count == 0) {
//         $result = $stmt->fetch(PDO::FETCH_ASSOC);

//         if ($result) {
//             $_SESSION['username'] = $result['username'];
//             $_SESSION['fullname'] = $result['fullname'];
//             $_SESSION['FullNameArabic'] = $result['FullNameArabic'];
//             $_SESSION['groupid'] = 0;


//             // echo "your Full Name is " . $_SESSION['fullname'] . " and your Arabic Full Name is " . $_SESSION['FullNameArabic'] . "and your group id " . $_SESSION['groupid'] . "and your trust status" . $_SESSION['truststatus'] . "and your red status" . $_SESSION['redstatus'];
            
//             header('Location: ../../../pages/home/home.php');
//             exit();
//         }
//     } else {
//         header('Location: ../../../index.php');
//         exit();
//     }
// }
?>
