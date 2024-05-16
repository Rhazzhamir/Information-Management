<?php
include('include/Connection.php')
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <title>Document</title>
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
            <div class="card-header  mb-3 p-4 text-white text-center bg-warning">
                <h5>Register Category</h5>
            </div>
            <a href="index.php">
                <button class="back btn btn-primary">Back</button>
            </a>
            <div class=" p-5 mb-5border border-1px-red card-body">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="Produce_Name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="Product_Name" name="productName">
                    </div>
                    <div class="mb-3">
                        <label for="Product_Price" class="form-label">Product Price</label>
                        <input type="Number" class="form-control" id="Product_Price" name="productPrice">
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>

        <div class="card  m-5">
        <table>
            <thead>
                <th>Category Id</th>
                <th>Category Name</th>
                <th>Category Code</th>
                <th>Posting Date</th>
                <th>Update</th>
                <th>Delete</th>
            </thead>
            <!-- <tbody>
                <tr>
                    <td><?php echo $row['Category Id']; ?></td>
                    <td><?php echo $row['Category Name'];  ?></td>
                    <td><?php echo $row['Category Code']; ?></td>
                    <td><?php echo $row['Posting Date']; ?></td>
                    <td>
                    <button type="button" data-row-id="<?php echo $row['Id']?>" class="btn btn-success update-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Update
                    </button>
                    </td>
                    <td>
                        <a href="Delete.php?Id=<?php echo $row['Id']?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>  
            </tbody> -->
        </table>
    </div>
    </body>
</html>