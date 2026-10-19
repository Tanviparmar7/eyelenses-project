
<?php
session_start();

if (empty($_SESSION["is_admin"])) {
    http_response_code(403);
    exit("Access denied. Admin login is not configured yet.");
}

require_once "../backend/database.php";

$stmt = $pdo->query(
    "SELECT id, name, email, created_at FROM users ORDER BY id DESC"
);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Manage Users</title>
<style>
body{font-family:Arial;padding:25px;background:#f5f5f5}
table{border-collapse:collapse;width:100%;background:white}
th,td{padding:10px;border:1px solid #ddd;text-align:left}
a{color:#654321}
</style>
</head>
<body>
<h1>Registered Users</h1>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Registration Date</th>
</tr>

<?php foreach ($users as $user): ?>
<tr>
<td><?= (int)$user["id"] ?></td>
<td><?= htmlspecialchars($user["name"]) ?></td>
<td><?= htmlspecialchars($user["email"]) ?></td>
<td><?= htmlspecialchars($user["created_at"]) ?></td>
</tr>
<?php endforeach; ?>

</table>

<p><a href="index.php">Back to Dashboard</a></p>
</body>
</html>
