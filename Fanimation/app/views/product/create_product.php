<h1>Create New Product</h1>

<form action="index.php?act=createproduct" method="POST" enctype="multipart/form-data">
    <label for="product_name">Product Name:</label>
    <input type="text" id="product_name" name="product_name" required><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" required><br>

    <label for="category_id">Category:</label>
    <select id="category_id" name="category_id" required>
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="size_id">Size:</label>
    <select id="size_id" name="size_id" required>
        <?php foreach ($sizes as $size): ?>
            <option value="<?php echo $size['size_id']; ?>"><?php echo $size['size_name']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="discount_id">Discount (optional):</label>
    <select id="discount_id" name="discount_id">
        <option value="">None</option>
        <?php foreach ($discounts as $discount): ?>
            <option value="<?php echo $discount['discount_id']; ?>"><?php echo $discount['discount_code']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="image_files">Upload Images:</label>
    <input type="file" id="image_files" name="image_files[]" multiple><br>

    <input type="submit" name="create" value="Create Product">
</form>
