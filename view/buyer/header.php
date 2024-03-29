<?php
$name = preg_split('/\s+/', $_SESSION['buyer_name']);
$buyer_name = $name[0];
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<nav class="navbar navbar-expand-md bg-dark navbar-dark py-3">
        <div class="container">
            <a href="homepage.php" class="navbar-brand">Demo Shop</a>

           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu" >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-4">
                        <a href="about.php" class="nav-link">About</a>
                    </li>
                    <li class="nav-item px-4">
                        <a href="cart.php" class="nav-link"><i class="fas fa-shopping-cart"></i> Cart</a>
                    </li>
                    <li class="nav-item ps-4">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $buyer_name; ?></button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="settings.php"><i class="fas fa-cogs"></i> Settings</a></li>
                                <li><a class="dropdown-item" href="transaction.php"><i class="fas fa-history"></i> Transaction History</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../seller/homepage.php"><i class="fas fa-cash-register"></i> Become a Seller</a></li>
                                <li><a class="dropdown-item" href="../admin/homepage.php"><i class="fas fa-user-shield"></i> Admin Access</a></li>
                                <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

