<?php
require_once '../backend/database.php';

// Add Product
if (isset($_POST['add_product'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $category = $conn->real_escape_string($_POST['category']);
    $price = (float)$_POST['price'];
    $image = $conn->real_escape_string($_POST['image']);

    $conn->query("INSERT INTO products (name, category, price, image) VALUES ('$name', '$category', $price, '$image')");
    header("Location: products.php");
    exit();
}

// Delete Product
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM products WHERE id = $id");
    header("Location: products.php");
    exit();
}

$products = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin - Manage Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-5xl mx-auto bg-white p-8 rounded-2xl shadow-md">
        <h1 class="text-2xl font-bold mb-6">Admin Panel - Products</h1>

        <!-- Add Form -->
        <form method="POST" class="grid grid-cols-4 gap-4 mb-8 bg-gray-50 p-4 rounded-xl">
            <input type="text" name="name" placeholder="Product Name" required class="p-2 border rounded text-xs">
            <select name="category" class="p-2 border rounded text-xs">
                <option value="Eyeglasses">Eyeglasses</option>
                <option value="Sunglasses">Sunglasses</option>
                <option value="Contact Lenses">Contact Lenses</option>
            </select>
            <input type="number" name="price" placeholder="Price (₹)" required class="p-2 border rounded text-xs">
            <input type="text" name="image" placeholder="Image URL" required class="p-2 border rounded text-xs">
            <button type="submit" name="add_product" class="col-span-4 bg-emerald-800 text-white py-2 rounded text-xs font-bold">Add Product</button>
        </form>

        <!-- Product Table -->
        <table class="w-full text-left text-xs border-collapse">
            <thead>
                <tr class="border-b bg-gray-50">
                    <th class="p-3">ID</th>
                    <th class="p-3">Name</th>
                    <th class="p-3">Category</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($p = $products->fetch_assoc()): ?>
                <tr class="border-b">
                    <td class="p-3"><?php echo $p['id']; ?></td>
                    <td class="p-3 font-semibold"><?php echo $p['name']; ?></td>
                    <td class="p-3"><?php echo $p['category']; ?></td>
                    <td class="p-3">₹<?php echo $p['price']; ?></td>
                    <td class="p-3">
                        <a href="products.php?delete=<?php echo $p['id']; ?>" class="text-red-600 font-bold hover:underline" onclick="return confirm('Delete this product?')">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>