<h1>Edit Product</h1>
<form action="" method="POST" enctype="multipart/form-data">
    <label for="product_name">Product Name:</label>
    <input type="text" name="product_name" id="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>" required><br>

    <label for="description">Description:</label>
    <textarea name="description" id="description" required><?php echo htmlspecialchars($product['description']); ?></textarea><br>

    <label for="price">Price:</label>
    <input type="text" name="price" id="price" value="<?php echo htmlspecialchars($product['price']); ?>" required><br>

    <label for="category_id">Category:</label>
    <select name="category_id" id="category_id">
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['category_id']; ?>" <?php echo $category['category_id'] == $product['category_id'] ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($category['category_name']); ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="size_id">Size:</label>
    <select name="size_id" id="size_id">
        <?php foreach ($sizes as $size): ?>
            <option value="<?php echo $size['size_id']; ?>" <?php echo $size['size_id'] == $product['size_id'] ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($size['size_name']); ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="discount_id">Discount:</label>
    <select name="discount_id" id="discount_id">
        <option value="">No Discount</option>
        <?php foreach ($discounts as $discount): ?>
            <option value="<?php echo $discount['discount_id']; ?>" <?php echo $discount['discount_id'] == $product['discount_id'] ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($discount['discount_name']); ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="image_files">Upload Images:</label>
    <input type="file" name="image_files[]" multiple><br>

    <button type="submit" name="update">Update Product</button>
</form>