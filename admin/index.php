
<?php
session_start();

if (empty($_SESSION["is_admin"])) {
    exit("Access denied. Admin login is not configured yet.");
}

require_once "../backend/database.php";

$products = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
$orders = $pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn();
$users = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Dashboard</title>
<style>
body{font-family:Arial;background:#f4f4f4;padding:30px}
.card{display:inline-block;background:white;padding:25px;margin:10px;border-radius:10px}
a{margin-right:15px;color:#654321}
</style>
</head>
<body>
<h1>EyeLenses & Glasses Admin</h1>
<div class="card">Products: <?= (int)$products ?></div>
<div class="card">Orders: <?= (int)$orders ?></div>
<div class="card">Users: <?= (int)$users ?></div>
<p>
<a href="products.php">Manage Products</a>
<a href="orders.php">View Orders</a>
<a href="users.php">View Users</a>
<a href="../logout.php">Logout</a>
</p>
</body>
</html>
