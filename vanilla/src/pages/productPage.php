<?php include '../../header.php'; ?>

<html>
<head>
    <title><?php echo $product ? htmlspecialchars($product['product_name']) : 'Product'; ?></title>
</head>
<body>
<a href="/src/actions/userController.php">Back to main page</a>
    <nav>
        <ul>
            <?php foreach ($breadcrumbs as $crumb): ?>
                <li>
                    <a href="categoryPageController.php?category_id=<?php echo $crumb['id']; ?>"><?php echo htmlspecialchars($crumb['category_name']); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <h1><?php echo $product ? htmlspecialchars($product['product_name']) : 'Product'; ?></h1>
    <p><?php echo $product ? htmlspecialchars($product['product_desc']) : 'Product Description'; ?></p>
    <i><?php echo $product ? htmlspecialchars($product['product_price']) . " czk" : 'Product Price'; ?></i>
</body>
</html>

