<?php
if (isset($_SESSION['username'])) {
    $name = explode(" ", $_SESSION['fullname']);
    $username = $name[0];
    $authname = array(
        'name' => $username  ,
    );
}
$lang = array(
    // start a login pages English languages 
    'Login' => 'Login',
    'signin' => 'signin',
    'username' => 'username',
    'fullname' => 'fullname',
    'FullNameArabic' => 'FullNameArabic',
    'user-name-inform-input' => 'Username cannot be modified and must be retained as it is required for login.',
    'Password' => 'Password',
    'Oops' => 'Oops...',
    'Signup' => 'Signup',
    'Reset' => 'Reset Password',


    // end a login pages English languages 
        
    // start a navbar English languages 
    
    'home' => 'Home' ,
    'categories' => 'Categories' ,
    'items' => 'Items' ,
    'member' => 'Member' ,
    'statistics' => 'Statistics' ,
    'logs' => 'Logs' ,    
    
    'profile' => 'Profile' ,    
    'edit' => 'Edit Profile' ,    
    'settings' => 'Settings' ,    
    'logout' => 'Logout' ,       
    'signup' => 'Signup' ,    
    'login' => 'login' ,    
    // end   a navbar English languages 
);



?>