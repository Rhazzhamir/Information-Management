<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <title>Order Summary</title>
        <link rel="stylesheet" href="style/checkout.css">
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