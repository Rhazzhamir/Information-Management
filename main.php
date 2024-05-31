<link rel="stylesheet" href="style/main.css">

<div class="container text-center ">

    <div class="d-flex flex-wrap mt-5">
        <?php 
        foreach ($data as $row):?>
            <div class="card product" style="height: 300px;" data-product-id="<?php echo $row['Product_Id'] ?>">
                <img class="product-image" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($row['Product_Img']) ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['Product_Name'] ?></h5>
                    <p class="card-text">Php<?php echo $row['Product_Price'] ?></p>
                    <button class="CartBtn btn add-to-cart-btn">
                        <span class="IconContainer"> 
                            <?php include('./Img_logo/cart-icon.php'); ?>
                        </span>
                        <p class="text ">Add to Cart</p>
                    </button>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
