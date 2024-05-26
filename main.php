<style>
.CartBtn {
width: 140px;
height: 40px;
border-radius: 12px;
border: none;
background-color: rgb(255, 208, 0);
display: flex;
align-items: center;
justify-content: center;
cursor: pointer;
transition-duration: .5s;
overflow: hidden;
box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.103);
position: relative;
}

.IconContainer {
position: absolute;
left: -50px;
width: 30px;
height: 30px;
background-color: transparent;
border-radius: 50%;
display: flex;
align-items: center;
justify-content: center;
overflow: hidden;
z-index: 2;
transition-duration: .5s;
}

.icon {
border-radius: 1px;
}

.text {
margin-top: 15px;
height: 100%;
width: fit-content;
display: flex;
align-items: center;
justify-content: center;
color: rgb(17, 17, 17);
z-index: 1;
transition-duration: .5s;
font-size: 1.04em;
font-weight: 600;
}

.CartBtn:hover .IconContainer {
transform: translateX(58px);
border-radius: 40px;
transition-duration: .5s;
}

.CartBtn:hover .text {
transform: translate(10px,0px);
transition-duration: .5s;
}

.CartBtn:active {
transform: scale(0.95);
transition-duration: .5s;
}
</style>

<div class="container text-center ">

    <div class="d-flex flex-wrap mt-5">
        <?php include('products/get-products.php');
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
