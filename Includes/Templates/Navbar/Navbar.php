
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-shop"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-justify-between"  id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if($class == 'home') echo 'active'; ?>" href="#"> <?PHP echo $lang['home'] ?> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?PHP echo $lang['categories'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?PHP echo $lang['items'] ?></a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?PHP echo $lang['member'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?PHP echo $lang['statistics'] ?></a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?PHP echo $lang['logs'] ?></a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown navbar-dropdown-margin-right" >
                        <a class="nav-link dropdown-toggle navbar-dropdown-margin-left"  href="#" role="button" data-bs-toggle="dropdown"><?php echo $authname['name']?></a>
                        <ul class="dropdown-menu navbar-dropdown-margin-top ">
                            <li><a class="dropdown-item" href="#"><?PHP echo $lang['profile'] ?></a></li>
                            <li><a class="dropdown-item" href="#"><?PHP echo $lang['edit'] ?></a></li>
                            <li><a class="dropdown-item" href="#"><?PHP echo $lang['settings'] ?></a></li>
                            <li><a class="dropdown-item" href="#"><?PHP echo $lang['logout'] ?></a></li>
                        </ul>
                    </li>
                </ul>       
            </div>
        </div>
    </nav>

<div class="container-fluid mt-3">
  <h3>Navbar With Dropdown</h3>
  <p>This example adds a dropdown menu in the navbar.</p>
</div>
