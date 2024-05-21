<?php include('include/Connection.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        /* btn-cart */
    .btn-cart {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        border-radius: 10px;
        border: none;
        background-color: transparent;
        position: relative;
        }
        
        .btn-cart::after {
        content: attr(data-quantity);
        width: fit-content;
        height: fit-content;
        position: absolute;
        font-size: 15px;
        color: white;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        opacity: 0;
        visibility: hidden;
        transition: .2s linear;
        top: 115%;
        }
        
        .icon-cart {
        width: 24.38px;
        height: 30.52px;
        transition: .2s linear;
        }
        
        .icon-cart path {
        fill: rgb(240, 8, 8);
        transition: .2s linear;
        }
        
        .btn-cart:hover > .icon-cart {
        transform: scale(1.2);
        }
        
        .btn-cart:hover > .icon-cart path {
        fill: rgb(186, 34, 233);
        }
        
        .btn-cart:hover::after {
        visibility: visible;
        opacity: 1;
        top: 105%;
        }
        
        .quantity {
        display: none;
        }
    
        .btn-cart{
            margin-left: 435px;
        }
    </style>

</head>   
    <body>
    <nav class="navbar navbar-expand bg-body-secondary p-1">
        <div class=" m-2">
            <div class="shine">ITshoeStore</div>
        </div>
        <div class="d-flex">
            <div class="product collapse navbar-collapse mb-4 " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto ">
                    <li  class="nav-item dropdown ">
                        <div id="profileNameDisplay" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </div>
                        <ul class="dropdown-menu text-center">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Profile</a></li>
                            <li><a class="dropdown-item" href="./Register_User.php">Register_User</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown align-item-center">
                        <div id="Management" class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Product Management
                        </div>
                        <ul class="dropdown-menu text-center">
                            <li><a class="dropdown-item" href="Manage_product.php" >Manage Product</a></li>
                            <li><a class="dropdown-item" href="Manage_Category.php">Manage Category</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Icon-Cart -->
                <button data-quantity="0" class="btn-cart">
                    <svg class="icon-cart" viewBox="0 0 24.38 30.52" height="30.52" width="24.38" xmlns="http://www.w3.org/2000/svg">
                        <title>icon-cart</title>
                        <path transform="translate(-3.62 -0.85)" d="M28,27.3,26.24,7.51a.75.75,0,0,0-.76-.69h-3.7a6,6,0,0,0-12,0H6.13a.76.76,0,0,0-.76.69L3.62,27.3v.07a4.29,4.29,0,0,0,4.52,4H23.48a4.29,4.29,0,0,0,4.52-4ZM15.81,2.37a4.47,4.47,0,0,1,4.46,4.45H11.35a4.47,4.47,0,0,1,4.46-4.45Zm7.67,27.48H8.13a2.79,2.79,0,0,1-3-2.45L6.83,8.34h3V11a.76.76,0,0,0,1.52,0V8.34h8.92V11a.76.76,0,0,0,1.52,0V8.34h3L26.48,27.4a2.79,2.79,0,0,1-3,2.44Zm0,0"></path>
                    </svg>
                    <span class="quantity"></span>
                </button>
                <form class="search_bar d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    
    <?php include('main.php')?>



    <!--Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="./users/create_user.php"> 
                        <div class="mb-3">
                            <label for="FirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="First_Name" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="LastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="LastName" name="Last_Name" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="MobileNumber" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="MobileNumber" name="Contact_Number" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="Address" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" id="btnProfile" name="Submit_Profile" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../Information Management/script.js"></script>
</html>