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
        <link rel="stylesheet" href="Style/Register_User.css">
    </head>
    <body>
        <div>
            <div class="head p-4 text-white text-center bg-secondary">Register User</div>
                <div class="table p-5">
                    <a href="./index.php">
                        <button class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">Back</button>
                    </a>
                    <table class="table table-hover table-bordered table-striped mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Seller_Id</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Mobile Number</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once('./users/get_all_user.php');
                            foreach($sellers as $seller):?> 
                            <tr class="seller" scope="row">
                                <td data-key="Seller_Id"><?= $seller['Seller_Id'] ?></td>
                                <?php foreach (array_keys($seller) as $key):?>
                                    <?php if ($key !== 'Seller_Id'): ?>
                                        <td data-key="<?= $key ?>" contenteditable="true"><?= $seller[$key] ?></td>
                                    <?php endif ?>
                                <?php endforeach ?>
                                <td>
                                    <a class="btn btn-danger" href="./users/delete_user.php?id=<?= $seller['Seller_Id'] ?>">Delete</a>
                                    <button type="button" class="edit-seller btn btn-primary">Update</button>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
        </div>

        <script>
            function handleClicks(event) {
                const editSellerBtn = event.target.closest('.edit-seller.btn');
                if (editSellerBtn) {
                    const seller = editSellerBtn.closest('.seller');
                    const dataObj = {};
                    seller.querySelectorAll('td[data-key]').forEach(data => {
                        dataObj[data.getAttribute('data-key')] = data.textContent;
                    });
                    fetch("./users/update_user.php", {
                        method: 'PUT',
                        body: JSON.stringify(dataObj),
                    })
                    .then(response => {
                        return response.text();
                    })
                    .then(data => {
                        if (data) {
                            alert(data);
                        } else {
                            window.location.reload();
                        }
                    });
                }
            }
            document.addEventListener('click', handleClicks);
        </script>

    </body>
</html>