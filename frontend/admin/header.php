<nav class="navbar navbar-expand-md bg-warning navbar-light py-3 ">
        <div class="container">
            <a href="homepage.php" class="navbar-brand fw-bold">Demo Shop</a>

           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu" >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-4">
                        <a href="about.php" class="nav-link">About</a>
                    </li>
                    <li class="nav-item px-4">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                USERNAME</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="settings.php"><i class="fas fa-cogs"></i> Settings</a></li>
                                <li><a class="dropdown-item" href="transactions.php"><i class="fas fa-history"></i> Transaction History</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../buyer/homepage.php"><i class="fas fa-shopping-bag"></i> Become a Buyer</a></li>
                                <li><a class="dropdown-item" href="../seller/homepage.php"><i class="fas fa-cash-register"></i> Become a Seller</a></li>
                                <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>