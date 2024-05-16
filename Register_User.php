<?php 
include('include/Connection.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <title>Register_User</title>
        <style>
            .head{
                font-size: 2rem;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }
        </style>
    </head>
    <body>
        <div>
            <div class="head p-4 text-white text-center bg-secondary">Register User</div>
                <div class="table p-5">
                    <a href="../index.php">
                        <button class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">Back</button>
                    </a>
                    <table class="table table-hover table-bordered table-striped mt-3">
                        <thead>
                            <th>Seller_Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Mobile Number</th>
                            <th>Address</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
        </div>

    </body>
</html>