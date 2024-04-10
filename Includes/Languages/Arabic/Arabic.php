<?php
if (isset($_SESSION['email'])) {
    $name = explode(" ", $_SESSION['FullNameArabic']);
    $username = $name[0];
    $authname = array(
        'name' => $username  ,
    );
}
$lang = array(
    // start a login pages Arabic languages 
    'Login' => 'تسجيل الدخول',
    'Email' => 'البريد الإلكتروني',
    'Password' => 'كلمة المرور',
    'Signup' => 'انشاء حساب',
    'Reset' => 'إعادة تعيين كلمة المرور',
    
    // end   a login pages Arabic languages 
    
    // start a navbar Arabic languages 
    
    'home' => 'الصفحة الرئيسية' ,
    'categories' => 'الفئات' ,
    'items' => 'أغراض' ,
    'member' => 'أعضاء' ,
    'statistics' => 'إحصائيات' ,
    'logs' => 'السجلات' ,    
    'profile' => ' الملف الشخصي' ,    
    'edit' => 'تعديل الملف الشخصي' ,    
    'settings' => 'إعدادات' ,    
    'logout' => 'تسجيل الخروج' ,    

    // end   a navbar Arabic languages 
);

?>