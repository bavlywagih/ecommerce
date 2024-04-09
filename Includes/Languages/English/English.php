<?php
if (isset($_SESSION['email'])) {
    $name = explode(" ", $_SESSION['fullname']);
}
$lang = array(
    // start a login pages English languages 
    'Login' => 'Login',
    'Email' => 'Email',
    'Password' => 'Password',
    'Signup' => 'Signup',
    'Reset' => 'Reset Password',
    'name' => $name[0] ,

    // end a login pages English languages 
);


?>