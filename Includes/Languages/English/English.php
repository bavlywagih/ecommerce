<?php
if (isset($_SESSION['email'])) {
    $name = explode(" ", $_SESSION['fullname']);
    $username = $name[0];
    $authname = array(
        'name' => $username  ,
    );
}
$lang = array(
    // start a login pages English languages 
    'Login' => 'Login',
    'Email' => 'Email',
    'Password' => 'Password',
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
    // end   a navbar English languages 
);



?>