    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style/homepage.css">
        <title>Demo Shop | Admin</title>


    </head>
    <body>
        <?php include("header.php"); ?>

        <div class="sellers my-4">
            <?php for($i = 0; $i < 6; $i++){?>
            <div class="seller card text-wrap m-2 border-warning text-center">
                <i class="fas fa-user fa-5x p-3"></i>
                <div class="card-body">
                    <div class="card-text text-wrap">
                        <h3>Cedy</h3>
                    </div>
                    <a class="btn btn-warning btn-block mt-3" href="view.php">
                        View Seller Details
                    </a>
                    <button class="btn btn-warning btn-block mt-3" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete Seller Details
                    </button>
                </div>
            </div>
            <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-light">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Delete Seller?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <input type="password" name="adminPassword" placeholder="Enter Password" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-dark" value="Submit">
                    </form>
                </div>
                </div>
            </div>
        </div>
            <?php }?>
        </div>
        
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>