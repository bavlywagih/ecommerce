    <?php
        session_start();

        if (isset($_SESSION['username'])) {
            header('Location: pages/home/home.php');
            exit(); 
        }

        include "Includes/Initialization/Init.php";

        function generateRandomUsername($con) {
            $words = array(
                'saint', 'icon', 'cross', 'liturgy', 'bishop', 'priest', 'deacon', 'monk',
                'nun', 'cathedral', 'psalm', 'gospel', 'apostle', 'martyr', 'holy', 'baptism',
                'chrismation', 'eucharist', 'orthodox', 'vespers', 'hymn', 'fasting', 'pascha',
                'nativity', 'trinity', 'resurrection', 'ascension', 'pentecost', 'transfiguration',
                'annunciation', 'theotokos', 'iconostasis', 'clergy', 'divine', 'sacrament'
            );

            $stmt = $con->prepare("SELECT username FROM users WHERE username LIKE 'user-%'");
            $stmt->execute();
            $usernames = $stmt->fetchAll(PDO::FETCH_COLUMN);

            $usedWords = array_map(function($name) {
                return explode('-', $name)[1];
            }, $usernames);

            if (count($usedWords) == count($words)) {
                do {
                    $randomNumber = rand(1000, 9999);
                    $username = 'user-' . $randomNumber;
                    $stmt = $con->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
                    $stmt->execute(array($username));
                    $count = $stmt->fetchColumn();
                }
                while ($count > 0); 
            } 
            else {
                do {
                    $randomWord = $words[array_rand($words)];
                } 
                while (in_array($randomWord, $usedWords));
                $username = 'user-' . $randomWord;
            }

            return $username;
        }

        $errorMessages = [
            'en' => [
                'exists' => 'User is already exist',
                'empty' => 'Fields cannot be left empty.'
            ],
            'ar' => [
                'exists' => 'المستخدم موجود بالفعل',
                'empty' => 'لا يمكن ترك الحقول فارغة.'
            ]
        ];

        $currentLanguage = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'en';
        $lang = isset($errorMessages[$currentLanguage]) ? $errorMessages[$currentLanguage] : $errorMessages['en'];

    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Signup</title>
            <link rel="stylesheet" href="Layout/Css/All/All.css">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>
        <body>
            <?php 
                ob_start(); 
                echo 'signup';
                $class = ob_get_clean();
                include $Connect;
                include $Header;
                include $navbar;
            ?>
        
            <div class="back w-100 top-0 bottom-0 position-absolute">
                <div class="login-form border border-dark border-opacity-25 d-table overflow-auto mw-100 mh-100 m-auto top-0 bottom-0 start-0 end-0 position-absolute" style="margin-top: 78px !important;">
                    <div class="content d-table-cell align-middle">
                        <h3 data-translate="Signup">Signup</h3>
                        <hr/>

                        <form action="Includes/Post/signup/signuppost.php" method="post">
                            
                            <p id="errorMessageExists" style="display: none; color: red;"><?php echo isset($lang['exists']) ? $lang['exists'] : 'User is already exist'; ?></p>
                            <p id="errorMessageEmpty" style="display: none; color: red;"><?php echo isset($lang['empty']) ? $lang['empty'] : 'Fields cannot be left empty.'; ?></p>

                            <div class="form-group py-1">
                                <div class="ps-1">
                                    <label for="username">
                                        <i class="fa-solid fa-envelope"></i>
                                        <span data-translate="username">Username</span>
                                    </label>
                                </div>
                                <input type="text" class="form-control" id="disabledInput" name="username" placeholder="Username" autocomplete="off" readonly value="<?php echo generateRandomUsername($con);?>">
                                <span style="font-size:small; color:red;" data-translate="user-name-inform-input">* Username cannot be modified and must be retained as it is required for login.</span>
                            </div>

                            <div class="form-group py-1">
                                <div class="ps-1">
                                    <label for="Password">
                                        <i class="fa-solid fa-lock"></i>
                                        <span data-translate="Password">Password</span>
                                    </label>
                                </div>

                                <div class="d-flex border border-0">
                                    <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" autocomplete="new-password">
                                    <div class="p-2" type="button" id="togglePassword">
                                        <i id="eyeIcon" class="fa-solid fa-eye"></i>
                                    </div>
                                </div>

                                <div id="password-strength-bar" class="password-strength-bar" style="display: none;">
                                    <div id="password-strength" class="password-strength"></div>
                                </div>

                                <div class="password-strength-text" id="password-strength-text"></div>
                            </div>

                            <div class="form-group py-1">
                                <div class="ps-1">
                                    <label for="fullname">
                                        <i class="fa-solid fa-user"></i>
                                        <span data-translate="fullname">Full Name</span>
                                    </label>
                                </div>
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" autocomplete="off">
                            </div>

                            <div class="form-group py-1">
                                <div class="ps-1">
                                    <label for="FullNameArabic">
                                        <i class="fa-solid fa-user"></i>
                                        <span data-translate="FullNameArabic">Full Name Arabic</span>
                                    </label>
                                </div>
                                <input type="text" class="form-control" id="FullNameArabic" name="FullNameArabic" placeholder="Full Name Arabic" autocomplete="off">
                            </div>

                            <div class="d-flex justify-content-center align-items-center btn btn-primary">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                <button type="submit" class="border-0 bg-transparent text-white" data-translate="Signup">Signup</button>
                            </div>

                            <hr />

                            <a href="index.php">
                                <button type="button" class="btn btn-link" data-translate="Login">Login</button>
                            </a>

                        </form>
                    </div>
                </div>
            </div>
            <script>
                function togglePasswordVisibility() {
                    var passwordField = document.getElementById('Password');
                    var eyeIcon = document.getElementById('eyeIcon');

                    if (passwordField.type === 'password') {
                        passwordField.type = 'text';
                        eyeIcon.classList.remove('fa-eye');
                        eyeIcon.classList.add('fa-eye-slash');
                    } else {
                        passwordField.type = 'password';
                        eyeIcon.classList.remove('fa-eye-slash');
                        eyeIcon.classList.add('fa-eye');
                    }
                }

                document.getElementById('togglePassword').addEventListener('click', togglePasswordVisibility);

                <?php if (isset($_GET['error'])): ?>

                    <?php if ($_GET['error'] === 'exists'): ?>

                        var errorMessageExists = document.getElementById('errorMessageExists');
                        errorMessageExists.textContent = "<?php echo addslashes($lang['exists']) ?>";
                        errorMessageExists.style.display = 'block';
                        setTimeout(function() {
                            errorMessageExists.style.display = 'none';
                            history.replaceState({}, document.title, window.location.pathname);
                        }, 2000);

                    <?php elseif ($_GET['error'] === 'empty'): ?>

                        var errorMessageEmpty = document.getElementById('errorMessageEmpty');
                        errorMessageEmpty.textContent = "<?php echo addslashes($lang['empty']) ?>";
                        errorMessageEmpty.style.display = 'block';
                        setTimeout(function() {
                            errorMessageEmpty.style.display = 'none';
                            history.replaceState({}, document.title, window.location.pathname);
                        }, 2000);

                    <?php endif; ?>
                <?php endif; ?>
            </script>

            <?php include $Footer; ?>
        </body>
    </html>
