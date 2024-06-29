    <?php 
        session_start();

        if (isset($_SESSION['username'])) {
            header('Location: pages/home/home.php');
            exit(); 
        }

        include "Includes/Initialization/Init.php";

        ob_start(); 
            echo 'login';
        $class = ob_get_clean(); 

        ob_start(); 
            echo 'Layout/Css/All/All.css';
        $css = ob_get_clean(); 

        ob_start(); 
            echo 'Layout/js/All/All.js';
        $js = ob_get_clean(); 

        include "Includes/Initialization/Init.php";

        include $Connect;
        include $Header;
        include $Arabic;
        include $navbar;
    ?>

    <div class="back w-100 top-0 bottom-0 position-absolute">
        <div class="login-form border border-dark border-opacity-25 d-table overflow-auto mw-100 mh-100 m-auto top-0 bottom-0 start-0 end-0 position-absolute">
            <div class="content d-table-cell align-middle">
                <h3 data-translate="Login">Login</h3>
                <hr/>
                <form action="Includes/Post/Login/LoginPost.php" method="post">
                    <div class="form-group">
                        <div class="ps-1">
                            <label for="username">
                                <i class="fa-solid fa-envelope"></i>
                                <span data-translate="username">username</span>
                            </label>
                        </div>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username" autocomplete="off" required>
                    </div>
                    <div class="form-group py-3">
                        <div class="ps-1">
                            <label for="Password">
                                <i class="fa-solid fa-lock"></i>
                                <span data-translate="Password">Password</span>
                            </label>
                        </div>
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" autocomplete="new-password" required>
                    </div>
                    <div class="d-flex justify-content-center align-items-center btn btn-primary">
                        <i class="fa-solid fa-right-to-bracket"></i>    
                        <button type="submit" class="border-0 bg-transparent text-white" data-translate="Login">
                            Login
                        </button>
                    </div>
                    <hr />
                    <a href="signup.php">
                        <button type="button" class="btn btn-link" data-translate="Signup">Signup</button>
                    </a>
                    <button type="button" class="btn btn-link" data-translate="Reset">Reset Password</button>
                </form>
            </div>
        </div>
    </div>

    <?php
        include $Footer;
    ?>
