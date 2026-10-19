<?php require_once __DIR__ . '/header.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fetch session orders or show demo fallback
$cartHistory = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<section class="max-w-5xl mx-auto px-6 py-12 text-slate-900">
    <div class="flex items-center justify-between border-b border-slate-200 pb-4 mb-8">
        <div>
            <h1 class="serif-title text-3xl font-extrabold text-slate-900">My Order History</h1>
            <p class="text-xs text-slate-500 mt-1">Track your past eyewear purchases and view bill receipts</p>
        </div>
        <a href="products.php" class="px-5 py-2.5 bg-sky-500 text-slate-950 font-extrabold text-xs rounded-xl uppercase tracking-wider hover:bg-sky-400 transition">
            Browse Catalog
        </a>
    </div>

    <div class="space-y-4">
        <?php if (!empty($cartHistory)): ?>
            <?php foreach ($cartHistory as $item): ?>
                <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-md flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-slate-50 border rounded-2xl p-2 flex items-center justify-center">
                            <img src="<?php echo $item['image']; ?>" class="max-h-full max-w-full object-contain">
                        </div>
                        <div>
                            <span class="text-[10px] font-bold text-sky-500 uppercase bg-sky-50 px-2.5 py-0.5 rounded-full border border-sky-100">Order #EYE-<?php echo rand(10000, 99999); ?></span>
                            <h3 class="font-extrabold text-slate-900 text-sm mt-1"><?php echo $item['name']; ?></h3>
                            <span class="text-xs text-slate-500"><?php echo $item['category']; ?> • Qty: <?php echo $item['qty']; ?></span>
                        </div>
                    </div>

                    <div class="flex items-center space-x-6">
                        <div class="text-right">
                            <span class="text-xs text-slate-400 font-semibold block">AMOUNT PAID</span>
                            <span class="text-base font-extrabold text-slate-900">₹<?php echo number_format($item['price'] * $item['qty'], 2); ?></span>
                        </div>
                        <a href="invoice.php?order_id=<?php echo rand(10000, 99999); ?>" class="px-4 py-2.5 bg-slate-900 text-white rounded-xl text-xs font-bold hover:bg-sky-500 hover:text-slate-950 transition">
                            View Bill
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- DEMO ORDER DISPLAY IF SESSION IS EMPTY -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-md flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-slate-50 border rounded-2xl p-2 flex items-center justify-center">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShKqY7apDuFq3CWm3xq1QUUsHlY5Xh6VQUJODiwaBpsg&s=10" class="max-h-full max-w-full object-contain">
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-sky-500 uppercase bg-sky-50 px-2.5 py-0.5 rounded-full border border-sky-100">Order #EYE-84920</span>
                        <h3 class="font-extrabold text-slate-900 text-sm mt-1">Spicy Gray Zero Power Optics</h3>
                        <span class="text-xs text-slate-500">Delivered on <?php echo date("d M Y"); ?></span>
                    </div>
                </div>

                <div class="flex items-center space-x-6">
                    <div class="text-right">
                        <span class="text-xs text-slate-400 font-semibold block">AMOUNT PAID</span>
                        <span class="text-base font-extrabold text-slate-900">₹2,499.00</span>
                    </div>
                    <a href="invoice.php?order_id=84920" class="px-4 py-2.5 bg-slate-900 text-white rounded-xl text-xs font-bold hover:bg-sky-500 hover:text-slate-950 transition">
                        View Bill
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>