<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ./login");
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <title>Manage_product</title>
        <style>
            .back{
                margin: 20px 0 0 50px;
            }
            form.mb-3 > input{
                width: 500px;
            }
            .category-container {
                display: flex;
                align-items: center;
            }
            #category {
                max-width: 200px;
                margin-left: 10px;
                margin-right: 20px;
                height: 38px;
            }
            .product-img {
                width: 80px;
                height: 80px;
                object-fit: cover;
                object-position: center;
            }

            /* backButton */
            .box {
              width: 100px;
              height: 35px;
              float: left;
              transition: .5s linear;
              position: relative;
              display: block;
              overflow: hidden;
              padding: 5px;
              text-align: center;
              margin: 0 5px;
              background: transparent;
              text-transform: uppercase;
              font-weight: 900;
            }

            .box:before {
              position: absolute;
              content: '';
              left: 0;
              bottom: 0;
              height: 4px;
              width: 100%;
              border-bottom: 4px solid transparent;
              border-left: 4px solid transparent;
              box-sizing: border-box;
              transform: translateX(100%);
            }

            .box:after {
              position: absolute;
              content: '';
              top: 0;
              left: 0;
              width: 100%;
              height: 4px;
              border-top: 4px solid transparent;
              border-right: 4px solid transparent;
              box-sizing: border-box;
              transform: translateX(-100%);
            }

            .box:hover {
              box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            }

            .box:hover:before {
              border-color: #262626;
              height: 100%;
              transform: translateX(0);
              transition: .3s transform linear, .3s height linear .3s;
            }

            .box:hover:after {
              border-color: #262626;
              height: 100%;
              transform: translateX(0);
              transition: .3s transform linear, .3s height linear .5s;
            }

            button {
              color: black;
              text-decoration: none;
              cursor: pointer;
              outline: none;
              border: none;
              background: transparent;
            }


            /* checkbox */
            .checkbox-wrapper-12 {
              position: relative;
            }

            .checkbox-wrapper-12 > svg {
              position: absolute;
              top: -130%;
              left: -170%;
              width: 110px;
              pointer-events: none;
            }

            .checkbox-wrapper-12 * {
              box-sizing: border-box;
            }

            .checkbox-wrapper-12 input[type="checkbox"] {
              -webkit-appearance: none;
              -moz-appearance: none;
              appearance: none;
              -webkit-tap-highlight-color: transparent;
              cursor: pointer;
              margin: 0;
            }

            .checkbox-wrapper-12 input[type="checkbox"]:focus {
              outline: 0;
            }

            .checkbox-wrapper-12 .cbx {
              width: 24px;
              height: 24px;
              top: calc(100px - 12px);
              left: calc(100px - 12px);
            }

            .checkbox-wrapper-12 .cbx input {
              position: absolute;
              top: 0;
              left: 0;
              width: 24px;
              height: 24px;
              border: 2px solid #bfbfc0;
              border-radius: 50%;
            }

            .checkbox-wrapper-12 .cbx label {
              width: 24px;
              height: 24px;
              background: none;
              border-radius: 50%;
              position: absolute;
              top: 0;
              left: 0;
              transform: trasnlate3d(0, 0, 0);
              pointer-events: none;
            }

            .checkbox-wrapper-12 .cbx svg {
              position: absolute;
              top: 5px;
              left: 4px;
              z-index: 1;
              pointer-events: none;
            }

            .checkbox-wrapper-12 .cbx svg path {
              stroke: #fff;
              stroke-width: 3;
              stroke-linecap: round;
              stroke-linejoin: round;
              stroke-dasharray: 19;
              stroke-dashoffset: 19;
              transition: stroke-dashoffset 0.3s ease;
              transition-delay: 0.2s;
            }

            .checkbox-wrapper-12 .cbx input:checked + label {
              animation: splash-12 0.6s ease forwards;
            }

            .checkbox-wrapper-12 .cbx input:checked + label + svg path {
              stroke-dashoffset: 0;
            }

            @-moz-keyframes splash-12 {
              40% {
                background: #866efb;
                box-shadow: 0 -18px 0 -8px #866efb, 16px -8px 0 -8px #866efb, 16px 8px 0 -8px #866efb, 0 18px 0 -8px #866efb, -16px 8px 0 -8px #866efb, -16px -8px 0 -8px #866efb;
              }

              100% {
                background: #866efb;
                box-shadow: 0 -36px 0 -10px transparent, 32px -16px 0 -10px transparent, 32px 16px 0 -10px transparent, 0 36px 0 -10px transparent, -32px 16px 0 -10px transparent, -32px -16px 0 -10px transparent;
              }
            }

            @-webkit-keyframes splash-12 {
              40% {
                background: #866efb;
                box-shadow: 0 -18px 0 -8px #866efb, 16px -8px 0 -8px #866efb, 16px 8px 0 -8px #866efb, 0 18px 0 -8px #866efb, -16px 8px 0 -8px #866efb, -16px -8px 0 -8px #866efb;
              }

              100% {
                background: #866efb;
                box-shadow: 0 -36px 0 -10px transparent, 32px -16px 0 -10px transparent, 32px 16px 0 -10px transparent, 0 36px 0 -10px transparent, -32px 16px 0 -10px transparent, -32px -16px 0 -10px transparent;
              }
            }

            @-o-keyframes splash-12 {
              40% {
                background: #866efb;
                box-shadow: 0 -18px 0 -8px #866efb, 16px -8px 0 -8px #866efb, 16px 8px 0 -8px #866efb, 0 18px 0 -8px #866efb, -16px 8px 0 -8px #866efb, -16px -8px 0 -8px #866efb;
              }

              100% {
                background: #866efb;
                box-shadow: 0 -36px 0 -10px transparent, 32px -16px 0 -10px transparent, 32px 16px 0 -10px transparent, 0 36px 0 -10px transparent, -32px 16px 0 -10px transparent, -32px -16px 0 -10px transparent;
              }
            }

            @keyframes splash-12 {
              40% {
                background: #866efb;
                box-shadow: 0 -18px 0 -8px #866efb, 16px -8px 0 -8px #866efb, 16px 8px 0 -8px #866efb, 0 18px 0 -8px #866efb, -16px 8px 0 -8px #866efb, -16px -8px 0 -8px #866efb;
              }

              100% {
                background: #866efb;
                box-shadow: 0 -36px 0 -10px transparent, 32px -16px 0 -10px transparent, 32px 16px 0 -10px transparent, 0 36px 0 -10px transparent, -32px 16px 0 -10px transparent, -32px -16px 0 -10px transparent;
              }
            }
            /* Back-Button */
                      .Back-Button {
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
                        .back{
                            text-decoration: none;
                        }
                        .Back-Button{
                            margin: 5px 0 0 45px;
                        }
                        .Back-Button:hover{
                            box-shadow: 0 4px 3px 1px gray, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 3px 3px #CECFD1;
                        }

                        .Back-Button:active{
                            /* CSS styles for active state */
                            box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 5px 3px #999, inset 0 0 30px #aaa;
                        }

                        .Back-Button:focus {
                            /* CSS styles for focus state */
                            box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 5px 3px #999, inset 0 0 30px #aaa;
                        }
                        .total{
                          text-align: center;
                        }
                        /* Delete-Btn */
                    .Delete-btn {
                        background-color: transparent;
                        position: relative;
                        border: none;
                        }

                        .Delete-btn::after {
                        content: 'delete';
                        position: absolute;
                        top: -130%;
                        left: 50%;
                        transform: translateX(-50%);
                        width: fit-content;
                        height: fit-content;
                        background-color: rgb(168, 7, 7);
                        padding: 4px 8px;
                        border-radius: 5px;
                        transition: .2s linear;
                        transition-delay: .2s;
                        color: white;
                        text-transform: uppercase;
                        font-size: 12px;
                        opacity: 0;
                        visibility: hidden;
                        }

                        .icon {
                        transform: scale(1.2);
                        transition: .2s linear;
                        }

                        .Delete-btn:hover > .icon {
                        transform: scale(1.5);
                        }

                        .Delete-btn:hover > .icon path {
                        fill: rgb(168, 7, 7);
                        }

                        .Delete-btn:hover::after {
                        visibility: visible;
                        opacity: 1;
                        top: -160%;
                        }
        </style>
    </head>
    <body data-customer-id="<?php echo $_SESSION['id']?>" data-cart-id="<?php echo $_SESSION["cart_id"]?>">
      <div>
          <div class="mb-2 p-4 text-white d-flex align-items-center bg-secondary">
            <h5 class="m-auto">Shopping Cart</h5>
          </div>
        </div>
        <div class="m-4">
          <a class="back" href="./index.php">
            <button class="Back-Button">Back</button>     
          </a>
        </div>
      
      <table class="table m-4">
        <thead>
          <tr>
            <th scope="col">Product ID</th>
            <th scope="col">Product Image</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Quantity</th>
            <th>Select</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody id="products_list">
          <?php
            $totalAmount = 0;
            include('./include/Connection.php');
            $sql ="SELECT
                    Cart_Product.Cart_Id,
                    Product.Product_Id,
                    Product.Product_Name,
                    Product.Product_Price,
                    Product.Product_Img,
                    Cart_Product.Quantity
                  FROM
                    Cart_Product, Customer, Cart, Product
                  WHERE
                    Cart_Product.Cart_Id = Cart.Cart_Id AND
                    Cart_Product.Product_Id = Product.Product_Id AND
                    Cart.Customer_Id = Customer.Customer_Id AND
                    Customer.Customer_Id = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("i", $_SESSION['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($data as $row):?>
              <tr class="product" scope="row" data-product-id="<?php echo $row['Product_Id'] ?>">
                <td><?php echo $row['Product_Id']?></td>
                <td><img class="product-img" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($row['Product_Img'])?>"></td>
                <td><?php echo $row['Product_Name']?></td>
                <td class="price"><?php echo $row['Product_Price']?></td>
                <td><input id="qt" class="qty" type="number" value="<?php echo $row['Quantity']?>" oninput="calculateTotalAmt()"></td>
                <!-- CHECKBOX -->
                <td>
                  <div class="checkbox-wrapper-12">
                    <div class="cbx">
                      <input class="cbx-product" type="checkbox" id="cbx-12">
                      <label for="cbx-12"></label>
                      <svg fill="none" viewBox="0 0 15 14" height="14" width="15">
                        <path d="M2 8.36364L6.23077 12L13 2"></path>
                      </svg>
                    </div>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <filter id="goo-12">
                          <feGaussianBlur result="blur" stdDeviation="4" in="SourceGraphic"></feGaussianBlur>
                          <feColorMatrix result="goo-12" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 22 -7" mode="matrix" in="blur"></feColorMatrix>
                          <feBlend in2="goo-12" in="SourceGraphic"></feBlend>
                        </filter>
                      </defs> 
                    </svg>
                  </div>            
                </td>
                <!-- Delete -->
                <td>
                  <a class="Delete-btn btn-danger delete-button" href="./cart/delete-cart.php?id=<?php echo $row['Product_Id'] ?>">
                      <svg viewBox="0 0 15 17.5" height="17.5" width="15" xmlns="http://www.w3.org/2000/svg" class="icon">
                      <path transform="translate(-2.5 -1.25)" d="M15,18.75H5A1.251,1.251,0,0,1,3.75,17.5V5H2.5V3.75h15V5H16.25V17.5A1.251,1.251,0,0,1,15,18.75ZM5,5V17.5H15V5Zm7.5,10H11.25V7.5H12.5V15ZM8.75,15H7.5V7.5H8.75V15ZM12.5,2.5h-5V1.25h5V2.5Z" id="Fill"></path>
                      </svg>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
        <div class="total"><b>Total Amount:</b> <span id="totalAmount">0.00</span></div>
      <div class="d-flex  justify-content-end">
        <button type="button" id="checkout_btn" class="btn btn-success m-3">Check out</button>
      </div>

      <script>
        function redirectPost(url, data) {
            const form = document.createElement('form');
            document.body.appendChild(form);
            form.method = 'post';
            form.action = url;
            for (let name in data) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = name;
                input.value = data[name];
                form.appendChild(input);
            }
            form.submit();
        }
      
        const checkout_btn = document.getElementById('checkout_btn');
        checkout_btn.addEventListener('click', e => {
          const products = Array.from(document.getElementById('products_list').children);
          const products_list = [];
          const formData = {};
          var qt = document.getElementById('qt');
          formData.customer_id = document.body.getAttribute('data-customer-id');
          formData.cart_id = document.body.getAttribute('data-cart-id');
          products.forEach(element => {
            if(element.querySelector('#cbx-12').checked){
              products_list.push(element.getAttribute('data-product-id'));
            }
          });
          formData.products_id_list = JSON.stringify(products_list);
          var params = {
            quant: qt 
          };
          redirectPost('checkout.php', formData, params);
        });



        function calculateTotalAmt() {
          let total = 0;
            document.querySelectorAll('.cbx-product:checked').forEach(elem => {
              const row = elem.closest('.product[scope="row"]');
              const quantiy = row.querySelector('.qty').value;
              const price = row.querySelector('.price').textContent;
              // console.log(quantiy);
              total += quantiy * price;
              // console.log(total);
            });
            document.getElementById('totalAmount').textContent = total;
        }
        document.addEventListener('click', event => {
          const cbx = event.target.closest('.cbx-product');
          if (cbx) {
            calculateTotalAmt();
          }
        });
      </script>
    </body>
</html>

