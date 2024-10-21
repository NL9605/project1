<h1>Product List</h1>
<a href="index.php?act=createproduct">Add New Product</a>
<table border="1">
    <thead>
    <tr>
        <th>Product Name</th>
        <th>Category</th>
        <th>Size</th>
        <th>Price</th>
        <th>Images</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                <td><?php echo htmlspecialchars($product['category_name']); ?></td>
                <td><?php echo htmlspecialchars($product['size_name']); ?></td>
                <td><?php echo htmlspecialchars($product['price']); ?></td>
                <td>
                    <?php if (!empty($product['image'])):
                        $images = explode(',', $product['image']);
                        foreach ($images as $image): ?>
                            <img src="<?php echo htmlspecialchars($image); ?>" alt="Product Image" width="50" height="50">
                        <?php endforeach;
                    else: ?>
                        No images
                    <?php endif; ?>
                </td>
                <td>
                    <a href="index.php?act=editproduct&id=<?php echo htmlspecialchars($product['product_id']); ?>">Edit</a> |
                    <a href="index.php?act=deleteproduct&id=<?php echo htmlspecialchars($product['product_id']); ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">No products found.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>