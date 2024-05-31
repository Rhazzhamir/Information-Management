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
        <link rel="stylesheet" href="Style/cart.css">
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

