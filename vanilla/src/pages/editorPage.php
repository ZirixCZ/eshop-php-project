<?php 
include '../../header.php';

$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header("Location: ../pages/login.php");
    exit;
}
?>

<h1>Editor Dashboard</h1>
<p>Welcome, <?php echo $_SESSION['username']; ?>! You are logged in as an editor.</p>
<h2>Create Category</h2>
<form method="post" action="../actions/createCategory.php">
    Category Name: <input type="text" name="category_name"><br>
    Category Slug: <input type="text" name="category_slug"><br>
    Parent Category: 
    <select name="parent_id">
        <option value="">None</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>">
                <?php echo htmlspecialchars($category['category_name']); ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <input type="hidden" name="is_editor" value="true">
    <input type="submit" value="Create Category">
</form>
<form method="post" action="../actions/createProduct.php">
    <h2>Create Product</h2>
    Product Name: <input type="text" name="product_name"><br>
    Product Price: <input type="text" name="product_price"><br>
    Product Description: <textarea name="product_desc"></textarea><br>
    Category: 
    <select name="category_id">
        <option value="">Select a Category</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo htmlspecialchars($category['id']); ?>">
                <?php echo htmlspecialchars($category['category_name']); ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <input type="hidden" name="is_editor" value="true">
    <input type="submit" value="Create Product">
</form>

<a href="../actions/logout.php">Logout</a>
