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
        </style>
    </head>
    <body>
    <div class="card">
        <div class="card-header  mb-3 p-4 text-white text-center bg-secondary">
            <h5>Register Product</h5>
        </div>
        <a href="index.php">
            <button class="back btn btn-primary">Back</button>
        </a>
        <div class=" p-5 mb-5border border-1px-red card-body">
            <form action="./products/add-product.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="Product_Name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="Product_Name" name="product_name">
                </div>
                <div class="mb-3">
                    <label for="Product_Image" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="Product_Image" name="product_img">
                </div>
                <div class="mb-3">
                    <label for="Product_Price" class="form-label">Product Price</label>
                    <input type="number" class="form-control" id="Product_Price" name="product_price">
                </div>
                <div class="mb-3">
                    <label for="Product_Stock" class="form-label">Product Stock</label>
                    <input type="number" class="form-control" id="Product_Stock" name="product_stock">
                </div>
                <div>
                    <label for="category">Category</label>
                    <select name="category_id" id="category">
                        <?php
                        include_once('./category/get-categories.php');
                        foreach($data as $row):?>
                        <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-success">Save</button>
            </form>
            <div>
                <form action="./category/add-category.php" method="post">
                    <input type="text" name="category_name" placeholder="Enter Category">
                    <button type="submit" class="btn btn-success">Add</button>
                </form>
            </div>
        </div>
    </div>

    <div class="card  m-5">
        <table>
            <thead>
                <th>Product Id</th>
                <th>Category Id</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Stock</th>
                <th>Product Date</th>
                <th>Update</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <?php 
                include_once('./products/get-products.php');
                foreach ($data as $row):?>
                <tr data-product-id="<?= $row['Product_Id'] ?>" data-category-id="<?= $row['Category_Id'] ?>">
                    <td><?php echo $row['Product_Id']; ?></td>
                    <td><?php echo $row['Category_Id'];  ?></td>
                    <td><?php 
                        // Assuming Product_Img is stored as a blob in the database
                        $imgData = base64_encode($row['Product_Img']);
                        $imgType = 'image/jpeg'; // Change this if your image is of a different type
                        echo '<img src="data:' . $imgType . ';base64,' . $imgData . '" alt="Product Image" style="width: 100px; height: auto;" />';
                        ?></td>
                    <td><?php echo $row['Product_Name']; ?></td>
                    <td><?php echo $row['Product_Price']; ?></td>
                    <td><?php echo $row['Product_Stock']; ?></td>
                    <td><?php echo $row['Product_date']; ?></td>
                    <td>
                    <button type="button" data-row-id="<?php echo $row['Id']?>" class="btn btn-success update-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Update
                    </button>
                    </td>
                    <td>
                        <a href="Delete.php?Id=<?php echo $row['Id']?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>  
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </body>
</html>

