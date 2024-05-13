<?php 
include '../../header.php'; 
if (!isset($username)) {
    header("Location: ../pages/login.php");
    exit;
}
?>

<h1>User Dashboard</h1>
<p>Welcome, <?php echo htmlspecialchars($username); ?>! You are logged in as a standard user.</p>
<a href="../actions/logout.php">Logout</a>
<div class="categories">
    <h2>Categories</h2>
    <?php function displayCategories($categories) {
        if (!empty($categories)) {
            echo '<ul>';
            foreach ($categories as $category) {
                echo '<li>';
                echo '<a href="../actions/categoryController.php?category_id=' . $category['id'] . '">' . htmlspecialchars($category['category_name']) . '</a>';
                if (!empty($category['children'])) {
                    displayCategories($category['children']);
                }
                echo '</li>';
            }
            echo '</ul>';
        }
    }
    displayCategories($categories); ?>
</div>

