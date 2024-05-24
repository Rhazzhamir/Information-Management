<div class="mb-3">
    <label for="Product_Name" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="Product_Name" name="product_name">
</div>
<div class="mb-3">
    <label for="Product_Image" class="form-label">Product Image</label>
    <input type="file" class="form-control" id="Product_Image" name="product_img">
</div>
<div class="mb-3">
    <label for="Product_Price" class="form-label">Product Price</label>
    <input type="number" class="form-control" id="Product_Price" name="product_price">
</div>
<div class="mb-3">
    <label for="Product_Stock" class="form-label">Product Stock</label>
    <input type="number" class="form-control" id="Product_Stock" name="product_stock">
</div>
<div class="mb-3 category-container">
    <label class="form-label" for="category">Category:</label>
    <select class="form-select" name="category_id" id="category">
        <?php
        include('./category/get-categories.php');
        foreach($data as $row):?>
        <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
        <?php endforeach ?>
    </select>
    <button type="button" class="Add-Category-Btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
        Add Category
    </button>
</div>

<button type="submit" class="Save-btn btn-success">Save</button>
