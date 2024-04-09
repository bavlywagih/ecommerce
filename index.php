<?php 

    session_start();

    if (isset($_SESSION['email'])) {
        header ('location: pages/home/home.php');
    }

    ob_start(); 
        echo 'login-page';
    $title = ob_get_clean(); 

    ob_start(); 
        echo 'Layout/Css/All/All.css';
    $css = ob_get_clean(); 

    ob_start(); 
    echo 'Layout/Js/All/All.js';
    $js = ob_get_clean(); 


    include "Includes/Initialization/Init.php";
    include $Connect;
    include $Header;
    include $English;

?>

    <div class="back w-100 top-0 bottom-0 position-absolute">
        <div class="login-form border border-dark border-opacity-25 d-table overflow-auto mw-100 mh-100 m-auto top-0 bottom-0 start-0 end-0 position-absolute">
            <div class="content d-table-cell align-middle">
                <h3><?php echo $lang['Login'] ?></h3>
                <hr/>
                <form action="<?php  echo  "Includes/Post/Login/LoginPost.php" ?>" method="post">
                    <div class="form-group">
                        <div class="ps-1">
                            <label for="Email">
                                <i class="fa-solid fa-envelope" ></i>
                                <?php echo $lang['Email'] ?>
                            </label>
                        </div>
                        <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" autocomplete="off">
                    </div>
                    <div class="form-group py-3">
                        <div class="ps-1">
                            <label for="Password">
                                <i class="fa-solid fa-lock"></i>
                                <?php echo $lang['Password'] ?>
                            </label>
                        </div>
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" autocomplete="new-password">
                    </div>
                    <div class="d-flex justify-content-center align-items-center btn btn-primary  ">
                        <i class="fa-solid fa-right-to-bracket"></i>    
                        <button type="submit" class=" border-0 bg-transparent text-white ">
                            <?php echo $lang['Login'] ?>
                        </button>
                    </div>
                    <hr />
                    <button type="button" class="btn btn-link"><?php echo $lang['Signup'] ?></button>
                    <button type="button" class="btn btn-link"><?php echo $lang['Reset'] ?></button>
                </form>
            </div>
        </div>
    </div>




<?php
    include $Footer;
?>