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


<!-- Dropdown-->
<div class="btn-group ">
    <button type="button" class="btn btn-danger">Action</button>
    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="visually-hidden">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Separated link</a></li>
    </ul>
</div>
<div class="container text-center ">

    <div class="d-flex flex-wrap mt-5">
        <?php include('products/get-products.php');
        foreach ($data as $row):?>
            <div class="card product" style="height: 300px;">
                <img class="product-image" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($row['Product_Img']) ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['Product_Name'] ?></h5>
                    <p class="card-text">Php<?php echo $row['Product_Price'] ?></p>
                    <a href="#" class="btn add-to-cart-btn">
                        <button class="CartBtn">
                            <span class="IconContainer"> 
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" fill="rgb(17, 17, 17)" class="cart"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"></path></svg>
                            </span>
                            <p class="text">Add to Cart</p>
                        </button>
                    </a>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <!-- <div class="row row-cols-4 mt-5">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        
    </div> -->
</div>
