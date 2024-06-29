<?php
session_start();
include "../../Connect/Conf.php";
$errors = [];
// التحقق من أن الطلب هو POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // استقبال وتنظيف البيانات المُرسلة
    $username = trim($_POST['username']);
    $password = trim($_POST['Password']);
    $fullname = trim($_POST['fullname']);
    $fullNameArabic = trim($_POST['FullNameArabic']);

    // التحقق من أن جميع الحقول موجودة وليست فارغة
    if (!empty($username) && !empty($password) && !empty($fullname) && !empty($fullNameArabic)) {
        // تشفير كلمة المرور
        $hashPassword = sha1($password);

        // التحقق مما إذا كان المستخدم موجود بالفعل
        $stmt = $con->prepare("SELECT username FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $count = $stmt->rowCount();

        if ($count == 0) {
            // إنشاء حساب جديد إذا لم يكن المستخدم موجودًا
            $stmt = $con->prepare("INSERT INTO users (username, password, fullname, FullNameArabic) VALUES (?, ?, ?, ?)");
            $stmt->execute([$username, $hashPassword, $fullname, $fullNameArabic]);

            // تعيين المتغيرات للجلسة
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $fullname;
            $_SESSION['FullNameArabic'] = $fullNameArabic;
            $_SESSION['groupid'] = 0;

            // التوجيه إلى الصفحة الرئيسية بعد الإنشاء الناجح
            header('location: ../../../pages/home/home.php');
            exit();
        } 
        else {
            // إظهار رسالة بأن المستخدم موجود بالفعل
            header('location: ../../../signup.php?error=exists');
        }
    } else {
        // إظهار رسالة بأن جميع الحقول مطلوبة
        header('location: ../../../signup.php?error=empty');
    }
}
?>
