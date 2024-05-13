<?php 
include '../../header.php';

$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header("Location: ../pages/login.php");
    exit;
}
?>

<h1>Admin Dashboard</h1>
<p>Welcome, <?php echo $_SESSION['username']; ?>! You are logged in as an admin.</p>
<form method="post" action="../actions/createUser.php">
    <h2>Create User</h2>
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <select name="roles_id">
    <option value="">Select a Role</option>
    <?php foreach ($roles as $role): ?>
        <option value="<?php echo htmlspecialchars($role['id']); ?>">
            <?php echo htmlspecialchars($role['displayName']); ?>
        </option>
    <?php endforeach; ?>
</select>
    <input type="hidden" name="create_user" value="true">
    <input type="submit" value="Create User">
</form>
<form method="post" action="../actions/createRole.php">
    <h2>Create Role</h2>
    Role Name: <input type="text" name="role_name"><br>
    Admin: <input type="checkbox" name="admin"><br>
    <input type="hidden" name="create_role" value="true">
    <input type="submit" value="Create Role">
</form>
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
    <input type="submit" value="Create Product">
</form>

<a href="../actions/logout.php">Logout</a>
