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
        <style>
            .back{
                margin: 20px 0 0 50px;
            }
            form.mb-3 > input{
                width: 500px;
            }

            /* backbtn */
            .box {
                width: 100px;
                height: 40px;
                float: left;
                transition: .5s linear;
                position: relative;
                display: block;
                overflow: hidden;
                padding: 8px;
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

                /* Back */
                    .Back-Button{
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
                        .Back-Button:hover{
                            /* CSS styles for hover state */
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
                        /* Update */
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
                    /* Delete */
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