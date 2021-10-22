<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="style/view.css">
    <title>Demo Store | View</title>
</head>
<body>
    <?php include('header.php');?>

    <div class="container mt-3 bg-warning border-4 p-3">
        <div class="card seller-information bg-warning border-0 d-flex justify-content-evenly flex-row flex-wrap mt-3">
            <div class="card p-2 seller-image">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <i class="fas fa-user fa-9x"></i>
                </div>
            </div>
            <div class="card p-2 seller-details">
                <div class="card-body">
                    <div class="card-header">
                        <div class="card-title h3 text-center">Seller Name</div>
                    </div>
                    <div class="email d-flex flex-wrap mb-2">
                        <div class="card-text mx-3 fw-bold">Email</div>
                        <div class="card-text">cadayongcs@gmail.com</div>
                    </div>
                    <div class="contact_number d-flex flex-wrap mb-2">
                        <div class="card-text mx-3 fw-bold">Contact Number</div>
                        <div class="card-text">09281476264</div>
                    </div>
                    <div class="contact_number d-flex flex-wrap">
                        <div class="card-text mx-3 fw-bold">Registered Date</div>
                        <div class="card-text">2021-10-02</div>
                    </div>
                </div>

                <!-- Delete Seller -->
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Delete Seller
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete Seller?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                        <input type="password" name="password" placeholder="Enter Password to Confirm" class="form-control" required>    
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" value="Submit" class="btn btn-warning">
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="table-responsive seller-products mt-4 mx-lg-3">
            <table class="table table-warning table-striped align-middle text-center">
                <thead class="table-dark">
                    <td>Product ID</td>
                    <td>Name</td>
                    <td>Details</td>    
                    <td>Price</td>
                    <td>Action</td>
                </thead>
                <?php for($i = 0; $i < 10; $i++){?>
                <tr>
                    <td>6164d33013a8f</td>                    
                    <td>Zeta 87 Mechanical Keyboard</td>                    
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi reiciendis, tempore provident quas soluta animi aut error adipisci vero accusantium fuga aliquid? Pariatur consequuntur ipsum repellendus modi dolorem numquam excepturi.</td>                    
                    <td>500 PHP</td>                    
                    <td><a href="view-product.php" class="btn btn-warning border-dark">View</a></td>                   
                </tr>
                <?php }?>
            </table>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>