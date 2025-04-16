<?php
require_once(dirname(__DIR__, 1) . '/utils/paths.php');
require_once 'commons.php';

function getProducts($search = null, $page = 1, $count = 8)
{
    global $db;
    $query = "SELECT * FROM products, categories";
   
    if ($search) {
        $query .= ' WHERE name LIKE "%' . $search . '%"';
    }
    
    if ($page && $count) {
        $query .= ' LIMIT ' . $count . ' OFFSET ' . (($page - 1) * $count);
    }   
   
    $result = $db->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getProduct($id)
{
    global $db;
    $query = "SELECT * FROM products WHERE id = $id";
    $result = $db->query($query);
    return $result->fetch_assoc();
}

function addProduct($name_products, $category_id, $price, $description)
{
    global $db;
    $query = "INSERT INTO products (name_products, category_id, price, description) VALUES ('$name_products', '$category_id', '$price', '$description')";
    return $db->query($query);
}

function updateProduct($id, $name_products, $price, $description)
{
    global $db;
    $query = "UPDATE products SET name_products = '$name_products', price = $price, description = '$description' WHERE id = $id";
    return $db->query($query);
}
function removeProduct($id)
{
    global $db;
    $query = "DELETE FROM products WHERE id = $id";
    return $db->query($query);
}


