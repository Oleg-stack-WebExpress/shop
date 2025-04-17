<?php
require_once(dirname(__DIR__, 2) . '/utils/paths.php');

require_once(getRootPath('services/auth.php'));
require_once(getRootPath('services/categories.php'));
require_once(getRootPath('services/products.php'));

if (!isAuth()) {
  redirect('/');
}

$category_id = $_GET['id'] ?? null;
echo $category_id;
if ($category_id == null) {
  redirect('/admin/categories');
}

if (removeCategory($category_id)) {
  redirect('/admin/categories');
} else {
  //...
  redirect('/admin/categories');
}
