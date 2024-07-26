<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <style>
            .navbar-toggler {
                border-color: rgba(244, 31, 255, 1);
            }
            .navbar-toggler-icon {
                background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(244, 31, 255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
            }
            .login-button, .logout-button, .account-button, .admin-button, .wishlist-button {
                background-color: #08aa04;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 5px;
                text-decoration: none;
            }
            .login-button:hover, .logout-button:hover, .account-button:hover, .admin-button:hover, .wishlist-button:hover {
                opacity: 0.8;
            }
        </style>
        <a class="navbar-brand" href="/scsuproject/site/"><span class="concert-one-regular" style="font-size: 30px"><?php echo SITE_NAME; ?></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/scsuproject/site/"><?php echo NAV_ITEM_ONE; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/scsuproject/site/view/inventory.php"><?php echo NAV_ITEM_TWO; ?></a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link" href="/scsuproject/site/view/about.php"><?php echo NAV_ITEM_THREE; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/scsuproject/site/view/contact.php"><?php echo NAV_ITEM_FOUR; ?></a>
                </li>
            </ul>
			<!--
            <form id="form_search" name="form_search" method="get" action="" class="form-inline">
                <div class="form-group">
                    <div class="input-group" style="border: 1px solid green; border-radius: 8px">
                        <input class="form-control" placeholder="Search for..." type="text">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </form>
			-->
            <?php if (isset($_SESSION['loggedin'])): ?>
                <span class="navbar-text" style="padding-left: 10%;">Logged in as <?php echo htmlspecialchars($_SESSION['email']); ?></span>
                <a id="account-link" class="account-button" href="/scsuproject/site/view/account.php">Account</a>
                <a id="logout-link" class="logout-button" href="/scsuproject/site/view/logout.php">Logout</a>
                <?php if (isset($_SESSION['job_role_ID']) && $_SESSION['job_role_ID'] == 1): ?>
                    <a id="admin-link" class="admin-button" href="/scsuproject/site/view/admin/">Admin</a>
                <?php endif; ?>
                <?php if (!isset($_SESSION['job_role_ID'])): ?>
                    <a id="wishlist-link" class="wishlist-button" href="/scsuproject/site/view/wishlist.php">Wishlist</a>
                <?php endif; ?>
            <?php else: ?>
                <a id="login-link" class="login-button" href="/scsuproject/site/view/login.php">Login</a>
                <a id="signup-link" class="login-button" href="/scsuproject/site/view/signup.php">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>