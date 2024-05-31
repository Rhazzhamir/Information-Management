<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <title>Manage_product</title>
        <link rel="stylesheet" href="Style/Manage_product.css">
    </head>
    <body>
    <div class="card">
        <div class="card-header  mb-3 p-4 text-white text-center bg-secondary">
            <h5>Register Product</h5>
        </div>
        <a class="back" href="index.php">
            <button class="Back-Button">Back</button>     
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
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
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
                        <!-- Update -->
                        <button type="button" class="Update_btn btn-success update-button" data-bs-toggle="modal" data-bs-target="#editModal">Update 
                            <svg class="svg" viewBox="0 0 512 512">
                            <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg>
                        </button>
                    </td>
                    <td>
                        <!-- Delete -->
                        <button type="button" class="Delete-btn btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <svg viewBox="0 0 15 17.5" height="17.5" width="15" xmlns="http://www.w3.org/2000/svg" class="icon">
                            <path transform="translate(-2.5 -1.25)" d="M15,18.75H5A1.251,1.251,0,0,1,3.75,17.5V5H2.5V3.75h15V5H16.25V17.5A1.251,1.251,0,0,1,15,18.75ZM5,5V17.5H15V5Zm7.5,10H11.25V7.5H12.5V15ZM8.75,15H7.5V7.5H8.75V15ZM12.5,2.5h-5V1.25h5V2.5Z" id="Fill"></path>
                            </svg>
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
                            <button type="submit" class="Save-Modal">Save</button>     
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
                            <p>
                                <b>Note: </b>
                                This product will also delete this product to the customer cart.
                            </p>
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

