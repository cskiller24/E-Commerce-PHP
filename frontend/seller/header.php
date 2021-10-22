<nav class="navbar navbar-expand-md bg-danger navbar-dark py-3">
        <div class="container">
            <a href="homepage.php" class="navbar-brand navv fw-bold">Demo Shop</a>

           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu" >
                <span class="navbar-toggler-icon navv"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-3">
                        <a href="about.php" class="nav-link navv-item">About</a>
                    </li>
                    <li class="nav-item px-3">
                        <a href="add-product.php" class="nav-link navv-item"><i class="fas fa-plus-circle"></i> Add Product</a>
                    </li>
                    <li class="nav-item px-3">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                USERNAME</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="settings.php"><i class="fas fa-cogs"></i> Settings</a></li>
                                <li><a class="dropdown-item" href="transaction.php"><i class="fas fa-history"></i> Order History</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../buyer/homepage.php"><i class="fas fa-shopping-bag"></i> Become a Buyer</a></li>
                                <li><a class="dropdown-item" href="../admin/homepage.php"><i class="fas fa-user-shield"></i> Admin Access</a></li>
                                <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>