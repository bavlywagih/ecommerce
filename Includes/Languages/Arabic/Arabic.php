<?php
if (isset($_SESSION['email'])) {
    $name = explode(" ", $_SESSION['FullNameArabic']);
}
$lang = array(
    // start a login pages Arabic languages 
    'Login' => 'تسجيل الدخول',
    'Email' => 'البريد الإلكتروني',
    'Password' => 'كلمة المرور',
    'Signup' => 'انشاء حساب',
    'Reset' => 'إعادة تعيين كلمة المرور',
    'name' => $name[0] ,

    // end a login pages Arabic languages 
);

?>