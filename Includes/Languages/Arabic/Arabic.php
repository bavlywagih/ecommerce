<?php
if (isset($_SESSION['username'])) {
    $name = explode(" ", $_SESSION['FullNameArabic']);
    $username = $name[0];
    $authname = array(
        'name' => $username  ,
    );
}
$lang = array(
    // start a login pages Arabic languages 
    'Login' => 'تسجيل الدخول',
    'signin' => 'انشاءحساب',
    'username' => 'اسم المستخدم',
    'fullname' => ' اسم المستخدم كامل',
    'FullNameArabic' => '  اسم المستخدم كامل بالعربي',
    'user-name-inform-input' => 'لا يمكن التعديل علي اسم المستخدم ويجب الاحتفاظ به لانه المطلوب في تسجيل الدخول .',
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
    'Signup' => 'انشاء حساب' ,    
    'login' => 'تسجيل دخول' ,    

    // end   a navbar Arabic languages 
);

?>