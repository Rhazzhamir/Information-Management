<em?php
include('include/Connection.php')
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <title>Manage_Category</title>
        <link rel="stylesheet" href="Style/Manage_Category.css">
    </head>
    <body>
        <div class="card">
            <div class="card-header  mb-3 p-4 text-white text-center bg-secondary">
                <h5>Register Category</h5>
            </div>
            <a class="back" href="index.php">
                <button class="Back-Button">Back</button>     
            </a>
            <div class=" p-5 mb-5border border-1px-red card-body">
                <form action="./category/add-category.php" method="post">
                    <div class="mb-3">
                        <label for="CategoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="CategoryName" name="category_name">
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>

        <div class="card  m-5">
        <table class="table">
            <thead>
                <th scope="col">Category Id</th>
                <th scope="col">Category Name</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </thead>
            <tbody>
            <?php include('./category/get-categories.php');
            foreach($data as $row):?>
                <tr scope="row" data-category-id="<?php echo $row['category_id'] ?>">
                    <td><?php echo $row['category_id'] ?></td>
                    <td class="category-name"><?php echo $row['category_name'] ?></td>
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
                    <td>

                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>


    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Remove Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="category/delete-category.php" method="post">
                        <div class="mb-3">
                            <label for="removeCategoryButton" class="form-label">Are you sure do you want to remove <em id="categoryName"></em> category&quest;</label>
                            <p><b>Note:</b> Deleting this category will also delete all products associated with it.</p>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit" id="removeCategoryButton">Yes</button>
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
                    <h1 class="modal-title fs-5">Edit Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="./category/edit-category.php" method="post">
                        <div class="mb-3">
                            <label for="CategoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="CategoryName" name="category_name">
                        </div>
                        <button type="submit" class="btn btn-success" id="editCategoryButton">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('#deleteModal').addEventListener('show.bs.modal', (event) => {
            const row = event.relatedTarget.closest('tr');
            const id = row.getAttribute('data-category-id');
            const submit = document.querySelector('#deleteModal #removeCategoryButton');
            const categoryName = document.querySelector('#deleteModal #categoryName');
            categoryName.textContent = row.querySelector('.category-name').textContent;
            submit.setAttribute('name', 'id');
            submit.setAttribute('value', id);
        });
        document.querySelector('#editModal').addEventListener('show.bs.modal', event => {
            const row = event.relatedTarget.closest('tr');
            const id = row.getAttribute('data-category-id');
            const submit = document.querySelector('#editModal #editCategoryButton');
            submit.setAttribute('name', 'id');
            submit.setAttribute('value', id);
            document.querySelector('#editModal #CategoryName').value = row.querySelector('.category-name').textContent;
        });
    </script>

    </body>
</html>