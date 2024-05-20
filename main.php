
<div class="container text-center ">

    <div class="d-flex flex-wrap mt-5">
    <?php include('products/get-products.php');
    foreach ($data as $row):?>
        <div class="card product" style="height: 300px;">
            <img class="product-image" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($row['Product_Img']) ?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['Product_Name'] ?></h5>
                <p class="card-text">Php<?php echo $row['Product_Price'] ?></p>
                <a href="#" class="btn btn-primary add-to-cart-btn">Add To Cart</a>
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
