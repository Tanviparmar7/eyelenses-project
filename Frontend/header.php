<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$cartCount = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'qty')) : 0;
$isLoggedIn = isset($_SESSION['user_name']);
$userName = $_SESSION['user_name'] ?? '';

// Active page & category detection for dynamic pill highlight
$currentPage = basename($_SERVER['PHP_SELF']);
$currentCategory = $_GET['category'] ?? '';

function getNavClass($pageName, $categoryName = '') {
    global $currentPage, $currentCategory;
    if ($categoryName !== '') {
        if ($currentPage === $pageName && $currentCategory === $categoryName) {
            return 'bg-slate-100 text-sky-600 rounded-full px-4 py-2 font-black shadow-sm';
        }
    } else {
        if ($currentPage === $pageName && empty($currentCategory)) {
            return 'bg-slate-100 text-sky-600 rounded-full px-4 py-2 font-black shadow-sm';
        }
    }
    return 'text-slate-700 hover:text-sky-500 hover:bg-slate-50 px-4 py-2 rounded-full transition';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EyeLenses & Glasses | Luxury Eyewear</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .serif-title { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen flex flex-col justify-between">

<!-- PROMO BANNER -->
<div class="bg-slate-900 text-white text-[11px] font-bold py-2 text-center tracking-wider uppercase">
    ✨ Flat 50% Off On First Frame | Use Code: <span class="text-sky-400">EYE2026</span>
</div>

<!-- HEADER NAVIGATION -->
<header class="bg-white border-b border-slate-100 sticky top-0 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-3.5 flex items-center justify-between">
        <a href="index.php" class="serif-title font-extrabold text-2xl text-slate-900 flex items-center space-x-2">
            <span class="text-sky-500"><i class="fa-solid fa-glasses"></i></span>
            <span>EyeLenses</span>
        </a>

        <!-- NAVIGATION LINKS -->
        <nav class="hidden lg:flex items-center space-x-1 text-xs font-bold uppercase tracking-wider">
            <a href="index.php" class="<?php echo getNavClass('index.php'); ?>">Home</a>
            <a href="products.php?category=Eyeglasses" class="<?php echo getNavClass('products.php', 'Eyeglasses'); ?>">Eyeglasses</a>
            <a href="products.php?category=Sunglasses" class="<?php echo getNavClass('products.php', 'Sunglasses'); ?>">Sunglasses</a>
            <a href="products.php?category=Contact Lenses" class="<?php echo getNavClass('products.php', 'Contact Lenses'); ?>">Contact Lenses</a>
            <a href="about.php" class="<?php echo getNavClass('about.php'); ?>">About</a>
            <a href="contact.php" class="<?php echo getNavClass('contact.php'); ?>">Contact</a>
            <a href="face-shape-analyzer.php" class="<?php echo getNavClass('face-shape-analyzer.php'); ?> flex items-center">
                <i class="fa-solid fa-wand-magic-sparkles mr-1.5 text-sky-500"></i> AI Analyzer
            </a>
        </nav>

        <div class="flex items-center space-x-4">
            <?php if ($isLoggedIn): ?>
                <a href="my-orders.php" class="flex items-center space-x-2 bg-slate-100 px-4 py-2 rounded-full text-xs font-extrabold text-slate-800 hover:bg-slate-200 transition border border-slate-200">
                    <i class="fa-solid fa-circle-user text-sky-500 text-sm"></i>
                    <span><?php echo htmlspecialchars($userName); ?></span>
                </a>
                <a href="logout.php" class="text-xs font-bold text-slate-500 hover:text-rose-600 transition uppercase tracking-wider">
                    Logout
                </a>
            <?php else: ?>
                <a href="login.php" class="px-6 py-2.5 rounded-full bg-slate-900 text-white font-extrabold text-xs uppercase tracking-wider hover:bg-sky-500 hover:text-slate-950 transition shadow-sm">
                    Login
                </a>
            <?php endif; ?>

            <a href="cart.php" class="relative text-slate-800 hover:text-sky-500 transition p-2">
                <i class="fa-solid fa-bag-shopping text-xl"></i>
                <span id="headerCartBadge" class="cart-count-badge absolute -top-1 -right-1 bg-sky-500 text-slate-950 font-extrabold text-[10px] w-5 h-5 rounded-full flex items-center justify-center border-2 border-white shadow-sm">
                    <?php echo $cartCount; ?>
                </span>
            </a>
        </div>
    </div>
</header>