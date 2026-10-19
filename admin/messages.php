<?php
require_once __DIR__ . '/../backend/database.php';

$messages = [];
try {
    $stmt = $pdo->query("SELECT * FROM contact_messages ORDER BY created_at DESC");
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $messages = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EyeLenses Admin - Contact Messages</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 text-slate-900 font-sans p-8">
    <div class="max-w-7xl mx-auto space-y-6">
        <div class="flex items-center justify-between bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
            <div>
                <h1 class="text-2xl font-black text-slate-900"><i class="fa-solid fa-envelope-open-text text-sky-500 mr-2"></i> Customer Support Messages</h1>
                <p class="text-xs text-slate-500 mt-1">Live contact form submissions from website visitors</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="orders.php" class="px-4 py-2 bg-slate-100 text-slate-900 border rounded-xl text-xs font-bold uppercase hover:bg-slate-200 transition">
                    View Orders
                </a>
                <a href="../Frontend/index.php" class="px-4 py-2 bg-slate-900 text-white rounded-xl text-xs font-bold uppercase hover:bg-sky-500 hover:text-slate-950 transition">
                    Go To Website
                </a>
            </div>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 border-b border-slate-200 text-slate-600 font-extrabold uppercase">
                        <tr>
                            <th class="p-4">ID</th>
                            <th class="p-4">Customer Name</th>
                            <th class="p-4">Email Address</th>
                            <th class="p-4">Category</th>
                            <th class="p-4">Message Details</th>
                            <th class="p-4">Date & Time</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-semibold text-slate-800">
                        <?php if (!empty($messages)): ?>
                            <?php foreach ($messages as $msg): ?>
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="p-4 font-black text-sky-600">#MSG-<?php echo $msg['id']; ?></td>
                                    <td class="p-4 font-bold"><?php echo htmlspecialchars($msg['name']); ?></td>
                                    <td class="p-4 text-slate-600"><?php echo htmlspecialchars($msg['email']); ?></td>
                                    <td class="p-4"><span class="bg-sky-50 text-sky-600 px-2.5 py-1 rounded-lg border border-sky-100 font-bold"><?php echo htmlspecialchars($msg['category']); ?></span></td>
                                    <td class="p-4 max-w-sm text-slate-700"><?php echo htmlspecialchars($msg['message']); ?></td>
                                    <td class="p-4 text-slate-400"><?php echo htmlspecialchars($msg['created_at']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="p-8 text-center text-slate-400 font-bold">No customer messages received yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>