<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="z-index: 10;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-shop"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <?php if(isset($authname['name'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if($class == 'home') echo 'active'; ?>" href="../../pages/home/home.php" data-translate="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/home/home.php" data-translate="...">...</a>
                    </li>
                <?php } ?>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if(isset($authname['name'])){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <?php echo $authname["name"]; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" data-translate="profile">Profile</a></li>
                            <li><a class="dropdown-item" href="#" data-translate="edit">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="#" data-translate="settings">Settings</a></li>
                            <li><a class="dropdown-item" href="../../logout/logout.php" data-translate="logout">Logout</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if($class == 'signup') echo 'active'; ?>" href="signup.php" data-translate="Signup">Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($class == 'login') echo 'active'; ?>" href="index.php" data-translate="login">Login</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <button class="btn btn-secondary" id="toggleLanguageButton">Toggle Language</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    function loadLanguageScript(language) {
        const script = document.createElement('script');
        script.src = `Layout/js/All/${language}.js`;
        document.head.appendChild(script);

        script.onload = function() {
            const lang = language === 'en' ? langEn : langAr;
            applyTranslations(lang);
        };
    }

    function applyTranslations(lang) {
        document.querySelectorAll('[data-translate]').forEach(element => {
            const key = element.getAttribute('data-translate');
            element.textContent = lang[key];
        });
    }

    // التحقق من اللغة في localStorage وتحميل الملف المناسب
    const language = localStorage.getItem('lang') || 'en';
    loadLanguageScript(language);

    // دالة للتحقق من وجود اللغة في localStorage وتبديل اللغة
    function toggleLanguage() {
        let currentLanguage = localStorage.getItem('lang');

        if (currentLanguage === 'en') {
            localStorage.setItem('lang', 'ar');
        } else {
            localStorage.setItem('lang', 'en');
        }

        location.reload();
    }

    document.getElementById('toggleLanguageButton').addEventListener('click', toggleLanguage);
</script>
