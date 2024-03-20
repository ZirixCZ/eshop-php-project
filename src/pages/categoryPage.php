<?php include '../../header.php'; ?>

<html>
<head>
    <title><?php echo $category ? htmlspecialchars($category['category_name']) : 'Category'; ?></title>
</head>
<body>
    <h1><?php echo $category ? htmlspecialchars($category['category_name']) : 'Category'; ?></h1>
    <a href="../actions/userController.php">Back to main page</a>
    <nav>
        <ul>
            <?php foreach ($breadcrumbs as $crumb): ?>
                <li>
                    <a href="/src/actions/categoryController.php?category_id=<?php echo $crumb['id']; ?>"><?php echo htmlspecialchars($crumb['category_name']); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <?php if (!empty($products)): ?>
        <ul>
            <?php foreach ($products as $product): ?>
                <li><a href="/src/actions/productController.php?product_id=<?php echo $product['id']; ?>"><?php echo htmlspecialchars($product['product_name']); ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No products found in this category.</p>
    <?php endif; ?>

    <a href="../actions/logout.php">Logout</a>
</body>
</html>

