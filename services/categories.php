<?php
require_once(dirname(__DIR__, 1) . '/utils/paths.php');
require_once 'commons.php';

function getCategories($search = null)
{
    global $db;
    $query = "SELECT * FROM categories";

    if ($search) {
        $query .= ' WHERE name LIKE "%' . $search . '%"';
    }
    echo $query;

    $result = $db->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getCategory($id)
{
    global $db;
    $query = "SELECT * FROM categories WHERE id = $id";
    $result = $db->query($query);
    return $result->fetch_assoc();
}

function addCategory($name_categories, $description)
{
    global $db;
    $query = "INSERT INTO categories (name_categories, description) VALUES ('$name_categories', '$description')";
    return $db->query($query);
}

function updateCategory($id, $name_categories, $description)
{
    global $db;
    $query = "UPDATE categories SET name_categories = '$name_categories', description = '$description' WHERE id = $id";
    return $db->query($query);
}

function removeCategory($id)
{
    global $db;
    $query = "DELETE FROM categories WHERE id = $id";
    return $db->query($query);
}