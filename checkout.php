<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <title>Order Summary</title>
        <style>
            /* Logo */
            .shine {
                font-size: 2em;
                font-weight: 900;
                color: rgba(255, 255, 255, 0.3);
                background: #222 -webkit-gradient(
                    linear,
                    left top,
                    right top,
                    from(#222),
                    to(#222),
                    color-stop(0.5, #fff)
                    ) 0 0 no-repeat;
                background-image: -webkit-linear-gradient(
                    -40deg,
                    transparent 0%,
                    transparent 40%,
                    #fff 50%,
                    transparent 60%,
                    transparent 100%
                );
                -webkit-background-clip: text;
                -webkit-background-size: 50px;
                -webkit-animation: zezzz;
                -webkit-animation-duration: 5s;
                -webkit-animation-iteration-count: infinite;
                }
                @-webkit-keyframes zezzz {
                0%,
                10% {
                    background-position: -200px;
                }
                20% {
                    background-position: top left;
                }
                100% {
                    background-position: 200px;
                }
                }
                /* Place Order */
                .placeOrder-btn{
                    font-family: Arial, Helvetica, sans-serif;
                    font-weight: bold;
                    color: white;
                    background-color: #1c4b49;
                    padding: 1em 2em;
                    border: none;
                    border-radius: .6rem;
                    position: relative;
                    cursor: pointer;
                    overflow: hidden;
                    margin-top: 10px;
                    width: 250px;
                    }

                    .placeOrder-btn span:not(:nth-child(6)) {
                    position: absolute;
                    left: 50%;
                    top: 50%;
                    transform: translate(-50%, -50%);
                    height: 30px;
                    width: 30px;
                    background-color: #236764;
                    border-radius: 50%;
                    transition: .6s ease;
                    }

                    .placeOrder-btn span:nth-child(6) {
                    position: relative;
                    }

                    .placeOrder-btn span:nth-child(1) {
                    transform: translate(-3.3em, -4em);
                    }

                    .placeOrder-btn span:nth-child(2) {
                    transform: translate(-6em, 1.3em);
                    }

                    .placeOrder-btn span:nth-child(3) {
                    transform: translate(-.2em, 1.8em);
                    }

                    .placeOrder-btn span:nth-child(4) {
                    transform: translate(3.5em, 1.4em);
                    }

                    .placeOrder-btn span:nth-child(5) {
                    transform: translate(3.5em, -3.8em);
                    }

                    .placeOrder-btn:hover span:not(:nth-child(6)) {
                    transform: translate(-50%, -50%) scale(4);
                    transition: 1.5s ease;
                    }
                    /* Back */
                    .Back-Button ,.Edit-Button{
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        outline: none;
                        cursor: pointer;
                        width: 90px;
                        height: 35px;
                        background-image: linear-gradient(to top, #D8D9DB 0%, #fff 80%, #FDFDFD 100%);
                        border-radius: 10px;
                        border: 1px solid black;
                        transition: all 0.2s ease;
                        font-family: "Source Sans Pro", sans-serif;
                        font-size: 14px;
                        font-weight: 600;
                        color: black;
                        text-shadow: 0 1px #fff;
                    }
                    .Back-Button{
                        margin: 20px 0 0 20px;
                        }
                    .Edit-Button{
                        margin: 20px 20px 0 0;
                    }
                    .back ,.Edit-Button{
                        text-decoration: none;
                    }
                    .Back-Button:hover ,.Edit-Button:hover{
                        box-shadow: 0 4px 3px 1px gray, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 3px 3px #CECFD1;
                    }

                    .Back-Button:active ,.Edit-Button:active{
                        box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 5px 3px #999, inset 0 0 30px #aaa;
                    }

                    .Back-Button:focus ,.Edit-Button:focus{
                        /* CSS styles for focus state */
                        box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 5px 3px #999, inset 0 0 30px #aaa;
                    }
                    /* Modal-Edit */
                    .Update_btn {
                            position: relative;
                            display: flex;
                            align-items: center;
                            justify-content: flex-start;
                            width: 110px;
                            height: 40px;
                            border: none;
                            padding: 0px 20px;
                            background-color: green;
                            color: white;
                            font-weight: 500;
                            cursor: pointer;
                            border-radius: 10px;
                            box-shadow: 5px 5px 0px gray;
                            transition-duration: .3s;
                            }

                            .svg {
                            width: 13px;
                            position: absolute;
                            right: 0;
                            margin-right: 20px;
                            fill: white;
                            transition-duration: .3s;
                            }

                            .Update_btn:hover {
                            color: transparent;
                            }

                            .Update_btn:hover svg {
                            right: 43%;
                            margin: 0;
                            padding: 0;
                            border: none;
                            transition-duration: .3s;
                            }

                            .Update_btn:active {
                            transform: translate(3px , 3px);
                            transition-duration: .3s;
                            box-shadow: 2px 2px 0px rgb(140, 32, 212);
                            }
                            /* Close-Btn */
                                .Close-button {
                                    position: relative;
                                    width: 40px;
                                    height: 40px;
                                    border: none;
                                    background: rgba(180, 83, 107, 0.11);
                                    border-radius: 5px;
                                    transition: background 0.5s;
                                    }

                                    .X {
                                    content: "";
                                    position: absolute;
                                    top: 50%;
                                    left: 50%;
                                    width: 2em;
                                    height: 1.5px;
                                    background-color: rgb(255, 255, 255);
                                    transform: translateX(-50%) rotate(45deg);
                                    }

                                    .Y {
                                    content: "";
                                    position: absolute;
                                    top: 50%;
                                    left: 50%;
                                    width: 2em;
                                    height: 1.5px;
                                    background-color: #fff;
                                    transform: translateX(-50%) rotate(-45deg);
                                    }

                                    .close {
                                    position: absolute;
                                    display: flex;
                                    padding: 0.8rem 1.5rem;
                                    align-items: center;
                                    justify-content: center;
                                    transform: translateX(-50%);
                                    top: -70%;
                                    left: 50%;
                                    width: 3em;
                                    height: 1.7em;
                                    font-size: 12px;
                                    background-color: rgb(19, 22, 24);
                                    color: rgb(187, 229, 236);
                                    border: none;
                                    border-radius: 3px;
                                    pointer-events: none;
                                    opacity: 0;
                                    }

                                    .Close-button:hover {
                                    background-color: rgb(211, 21, 21);
                                    }

                                    .Close-button:active {
                                    background-color: rgb(130, 0, 0);
                                    }

                                    .Close-button:hover > .close {
                                    animation: close 0.2s forwards 0.25s;
                                    }

                                    @keyframes close {
                                    100% {
                                        opacity: 1;
                                    }
                                    }

        </style>
    </head>
    <body>
    <div class="card text-center">
        <div class="card-header pt-4">
            <div class="shine">Order Summary</div>
        </div>  
        <div class="d-flex justify-content-between ">
            <div>
                <a class="back" href="cart.php">
                    <button class="Back-Button">Cancel</button>     
                </a>
            </div>
        </div>
        <div class="d-flex justify-content-around align-items-center" style="height: 30vh;" >
            <div >
                <div class="shine">ITshoeStore</div>
            </div>
            
            <?php
            include('./include/Connection.php');
            $stmt = $connect->prepare("SELECT customer_id id, name, address, contactno, email FROM Customer WHERE Customer_ID = ?");
            $stmt->execute([$_POST['cart_id']]);
            $customers = $stmt->get_result()->fetch_assoc();
            ?>
            <div >
                <h4>Invoice / Receipt</h4>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <strong>
                                Customer_Id: 
                                </strong>
                            </td>
                            <td><?php echo $customers['id'] ?></td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                Name: 
                                </strong>
                            </td>
                            <td><?php echo $customers['name']?></td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Address:
                                </strong>
                            </td>
                            <td> <?php echo $customers['address'] ?></td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Contact Number: 
                                </strong>
                            </td>
                            <td><?php echo $customers['contactno'] ?></td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Email: 
                                </strong>
                            </td>
                            <td><?php echo $customers['email'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-table m-3">
            <table class="table border border-secondary">
                <thead>
                    <tr>
                        <th scope="col">Product Id</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Product Price</th>
                    </tr>
                </thead>
                <?php $totalAmount = 0; ?>
                <tbody id="receipt">
                    <?php
                    include('./products/get-product-by-id.php');
                    $products = json_decode($_POST['products_id_list']);
                    $cart_id = $_POST["cart_id"];
                    foreach ($products as $product) {
                        $data = getProductById($product, $cart_id);
                        $p = base64_encode($data['Product_Img']);
                        echo "<tr>";
                        echo "<td>{$data['Product_Id']}</td>";
                        echo "<td><img style=\"width: 50px; height: 50px;\" src=\"data:image/jpeg;base64,{$p}\"></td>";
                        echo "<td>{$data['Product_Name']}</td>";
                        echo "<td>{$data['Quantity']}</td>";
                        echo "<td>{$data['Product_Price']}</td>";
                        echo "</tr>";
                        // echo "<h1>{$_POST['quant']} => {$data['Product_Price']}</h1>";
                        $totalAmount += $data['Quantity'] * $data['Product_Price'];
                    }
                    ?>
                </tbody>
                <caption>
                </caption>
            </table>
            <div class="total d-flex justify-content-around align-items-end p-1">
                <b>Total Amount:</b> 
                <b id="totalAmount">
                    <?php echo $totalAmount; ?>
                </b>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button class="placeOrder-btn" type="button" id="placeOrder_button">
            <span class="circle1"></span>
            <span class="circle2"></span>
            <span class="circle3"></span>
            <span class="circle4"></span>
            <span class="circle5"></span>
            <span class="text">Place Order</span>
        </button>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let placeOrder_button = document.querySelector('#placeOrder_button');
            placeOrder_button.addEventListener('click', function() {
                alert('Order Success');
                window.location.href = 'cart.php';
            });
        });
    </script>

    </body>
</html>