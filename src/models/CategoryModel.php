<?php
require_once 'Database.php';

class CategoryModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }


    public function getCategory($categoryId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `db`.`Category` WHERE id = :categoryId");
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buildBreadcrumbs($categoryId, $breadcrumbs = [])
    {
        $category = $this->getCategory($categoryId);
        if ($category) {
            array_unshift($breadcrumbs, $category);
            if ($category['Category_id']) {
                return $this->buildBreadcrumbs($category['Category_id'], $breadcrumbs);
            }
        }
        return $breadcrumbs;
    }


    public function fetchCategories($parentId = null)
    {
        $sql = "SELECT * FROM `db`.`Category` WHERE Category_id " . ($parentId ? "= :parentId" : "IS NULL");
        $stmt = $this->pdo->prepare($sql);

        if ($parentId) {
            $stmt->bindParam(':parentId', $parentId, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchAllCategories()
    {
        $stmt = $this->pdo->prepare("SELECT id, category_name FROM `db`.`Category`");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function createCategory($name, $slug, $parentId)
    {
        $sql = "INSERT INTO `db`.`Category` (category_name, category_slug, Category_id) VALUES (:name, :slug, :parent_id)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':slug', $slug);

        if ($parentId !== null && is_numeric($parentId)) {
            $stmt->bindParam(':parent_id', $parentId, PDO::PARAM_INT);
        } else {
            $null = null;
            $stmt->bindParam(':parent_id', $null, PDO::PARAM_NULL);
        }

        return $stmt->execute();
    }

    public function fetchAllCategoriesWithChildren($parentId = null, $breadcrumbs = [])
    {
        $categories = $this->fetchCategories($parentId);
        foreach ($categories as $key => $category) {
            $newBreadcrumbs = array_merge($breadcrumbs, [$category]);
            $childCategories = $this->fetchAllCategoriesWithChildren($category['id'], $newBreadcrumbs);
            $categories[$key]['children'] = $childCategories;
        }
        return $categories;
    }

}
?>