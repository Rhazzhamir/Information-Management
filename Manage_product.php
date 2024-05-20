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
            .product-img img {
                width: 80px;
                height: 80px;
                object-fit: cover;
                object-position: center;
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
                <?php include('./include/product-form.php'); ?>
            </form>
        </div>
    </div>

    <div class="card  m-5">
        <table class="table">
            <thead>
                <th scope="col">Product Id</th>
                <th scope="col">Category Name</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Stock</th>
                <th scope="col">Product Date</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                <?php 
                include_once('./products/get-products.php');
                foreach ($data as $row):?>
                <tr scope="row" data-product-id="<?= $row['Product_Id'] ?>" data-product-name="<?= $row['Product_Name'] ?>" data-category-id="<?= $row['Category_Id'] ?>">
                    <td class="product-id"><?php echo $row['Product_Id']; ?></td>
                    <td class="category-name"><?php echo $row['Category_Name'];  ?></td>
                    <td class="product-img"><img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($row['Product_Img']) ?>"></td>
                    <td class="product-name"><?php echo $row['Product_Name']; ?></td>
                    <td class="product-price"><?php echo $row['Product_Price']; ?></td>
                    <td class="product-stock"><?php echo $row['Product_Stock']; ?></td>
                    <td class="product-date"><?php echo $row['Product_date']; ?></td>
                    <td>
                        <button type="button" class="btn btn-success update-button" data-bs-toggle="modal" data-bs-target="#editModal">
                            Update
                        </button>
                        <button type="button" class="btn btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            Delete
                        </button>
                    </td>
                </tr>  
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- category modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Add Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="./category/add-category.php" method="post">
                        <div class="mb-3">
                            <label for="addCategoryInput" class="form-label">Enter Category:</label>
                            <input id="addCategoryInput" type="text" class="form-control" name="category_name">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Remove Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="products/delete-product.php" method="post">
                        <div class="mb-3">
                            <label for="removeProductButton" class="form-label">Are you sure do you want to remove <span id="productName"></span>?</label>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit" id="removeProductButton">Yes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Edit Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="./products/update-product.php" method="post" enctype="multipart/form-data">
                        <?php include('./include/product-form.php'); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.querySelector('#deleteModal').addEventListener('show.bs.modal', (event) => {
            const row = event.relatedTarget.closest('tr');
            const productName = row.getAttribute('data-product-name');
            const productId = row.getAttribute('data-product-id');
            const form = document.querySelector('#deleteModal form');
            const submit = form.querySelector('[type="submit"]');
            document.querySelector('#deleteModal #productName').textContent = productName;
            submit.setAttribute('name', 'id');
            submit.setAttribute('value', productId);
        });

        document.querySelector('#editModal').addEventListener('show.bs.modal', (event) => {
            const row = event.relatedTarget.closest('tr');
            const productId = row.getAttribute('data-product-id');
            const categoryId = row.getAttribute('data-category-id');
            const form = document.querySelector('#editModal form');
            const submit = form.querySelector('[type="submit"]');
            document.querySelector('#editModal #Product_Name').value = row.querySelector('.product-name').textContent;
            document.querySelector('#editModal #Product_Price').value = row.querySelector('.product-price').textContent;
            document.querySelector('#editModal #Product_Stock').value = row.querySelector('.product-stock').textContent;
            document.querySelector('#editModal #category').value = categoryId;
            submit.setAttribute('name', 'id');
            submit.setAttribute('value', productId);
        });
    </script>
    </body>
</html>

