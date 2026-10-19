<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/header.php'; 
require_once __DIR__ . '/../backend/database.php';

if (!isset($_SESSION['cart'])) {$_SESSION['cart'] = [];
}

$userId =$_SESSION['user_id'] ?? null;

// FULL PRODUCT CATALOG LOOKUP (36 PRODUCTS TOTAL)
$catalog = [
    // Eyeglasses
    101 => ['name' => 'Sleek Black Rimless Optical', 'price' => 2499.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTa1WP60vwLnP--cN2oiLJXC8eE1WVVwpu7WFmVg1jg-Q&s=10'],
    102 => ['name' => 'Honey Hazel Gold Frame', 'price' => 2999.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiTAwiqYqKSILd1RFkjKs94r5KxRgSfKsY26d5j7Dlpw&s=10'],
    103 => ['name' => 'Classic Matte Brown Frame', 'price' => 2299.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBeamO8yR7HKMMWxrxu5Sa1xITacdnpWfXynPB0cZnqQ&s=10'],
    104 => ['name' => 'Transparent Crystal Clear Frames', 'price' => 2799.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQY_m0zlwgO3i65oys-dEXsos0gu5_ch9KLRqnXEefOlg&s=10'],
    105 => ['name' => 'Dark Amber Tortoiseshell Optics', 'price' => 3199.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSqMgmhRPH1Def_UFn3MfvCUq0z5sSbx3W5brXVygP-g&s=10'],
    106 => ['name' => 'Minimalist Metallic Gunmetal Glass', 'price' => 2699.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEXw0k4ApZHDe_WOLWD1o87rpzOauxzbScxREb0w0jbA&s=10'],
    107 => ['name' => 'Rose Tinted Gold Oval Specs', 'price' => 2899.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1XFartudQ35F8DQkgZLZppRMp3JIbSqQXwNYWhBds8g&s=10'],
    108 => ['name' => 'Deep Navy Square Rimmed Frame', 'price' => 2599.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyfj7yVfiWaeiazCG2vtRy_hXKVY2qlFdEf4_EBdYMCQ&s'],
    109 => ['name' => 'Titanium Silver Executive Frame', 'price' => 3499.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuJK_IsFxf_Z0R6AxL2kBw2BzC4qKT3Nbs2wQS8Hy9mA&s=10'],
    110 => ['name' => 'Champagne Tint Bio Acetate Glass', 'price' => 2899.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEOBeRVg2BFNLds4R0k4k65SUjmw4T8f-lxUkdJvgfqg&s=10'],
    111 => ['name' => 'Obsidian Black Aviator Eyeglasses', 'price' => 3099.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPrJLvc2J4sorerxjlneqN84ZBN60SDSeAzmwcoYChEA&s=10'],
    112 => ['name' => 'Emerald Accent Bio Acetate Frame', 'price' => 2799.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1Qyo8HXpwutwEeTyqNEsx5FOwMNH8CczK61Xlkp949Q&s=10'],

    // Sunglasses
    201 => ['name' => 'Rich Gold Amber Polarized Sunglasses', 'price' => 3499.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaWh0ptXZ9hJE8tkbdeCsCCyH7gdLwVj7PuXPzH0A-4w&s=10'],
    202 => ['name' => 'Classic Matte Black Wayfarer', 'price' => 3299.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1HmXRIcvFCuqlNFrsp9t8mO7YYptn3tMc_rk9P1lDlA&s=10'],
    203 => ['name' => 'Vintage Yellow Sunset Aviator', 'price' => 3699.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvOObmpO3x5_XTXYsRikE6sep17qykN7XFjMNbihNqLw&s=10'],
    204 => ['name' => 'Urban Smoke Shield Sunglasses', 'price' => 2999.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaUd5F2ByarPmLpMlT7RNA_kEVUHHPaiDHaDECKPy73g&s=10'],
    205 => ['name' => 'Warm Honey Amber Sunglasses', 'price' => 3599.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDdUwjYVlORQZR-2CsXh1LvlTYAVRloNoFCvXBA1Q5sw&s=10'],
    206 => ['name' => 'Jet Black Luxury Oval Shade', 'price' => 3899.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScRAtX8yUyo9vNzWkdeijn69_KzF_q5exUMuucPUrXQw&s=10'],
    207 => ['name' => 'Golden Hour Sunset Tint Specs', 'price' => 3399.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMhc3jRqVdWo90Kb8T_YaNTzMNKe53H6HKMqaRfxj60A&s=10'],
    208 => ['name' => 'Dark Obsidian Sport Polarized', 'price' => 3199.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYIhFRA9fnTDQRenVvGG-vmxYQUldPLQGHsmZ86t-GwA&s=10'],
    209 => ['name' => 'Crystal Yellow Tinted Luxury Glass', 'price' => 3799.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEKTFjWmaKhcOHQhQi8_Z7nVVZOxy87FqDiin9uW7cWw&s=10'],
    210 => ['name' => 'Deep Charcoal Square Sunglasses', 'price' => 3499.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThTiaNZPE_F0l66Z2tytW4gWRY9URo6hCZIRGGNkSL1Q&s=10'],
    211 => ['name' => 'Retro Golden Flame Aviators', 'price' => 3999.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSI3tFrtzZPUBgj-T3Chy5ZYW_telWjhqLFfIFGLIqWyg&s=10'],
    212 => ['name' => 'Midnight Matte Polarized Lens', 'price' => 3299.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6bZg0iEORNwlegjwV-NBYsU7PyKZMuESgsahSuR_q4Q&s=10'],

    // Contact Lenses
    301 => ['name' => 'Aquacolor Emerald Green Cosmetic Lenses', 'price' => 1299.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbV3qKk-GFTACaMigc9a2L988umrn2JFavRoYbTfkhQA&s=10'],
    302 => ['name' => 'Aquacolor Ocean Sapphire Blue Lenses', 'price' => 1399.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNZ7fK3j5VgO7N5W13Wl72tKk2he2rOAAcOunhIIc7IQ&s=10'],
    303 => ['name' => 'Aquacolor Honey Hazel Cosmetic Eyes', 'price' => 1249.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBQpJvugWeU07rKrIoq608cVW_QhHe_RhF7yLIES6Xrw&s'],
    304 => ['name' => 'Aquacolor Amethyst Violet Lenses', 'price' => 1499.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2uZdxyH_L8xPYayh4nbKMp_WaxrH8jFyMn-iEnl22CA&s'],
    305 => ['name' => 'Aquacolor Turquoise Aqua Blue Lens', 'price' => 1299.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5Xuwtl8xMP8c4O0ilsX8Jv9I-vAVWSe-c5Ug6cllKTQ&s'],
    306 => ['name' => 'Aquacolor Warm Amber Hazel Lens', 'price' => 1349.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTVhfNwLfT879mf_AVCDr6HqNN0xjMLHIK_UOvQh0-8A&s=10'],
    307 => ['name' => 'Aquacolor Pastel Rose Pink Lenses', 'price' => 1399.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2AEYLMl628kGQNdtllxLK0hK-dz8nl0MO88oxjvvf7w&s=10'],
    308 => ['name' => 'Aquacolor Sterling Crystal Gray', 'price' => 1449.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTVhfNwLfT879mf_AVCDr6HqNN0xjMLHIK_UOvQh0-8A&s=10'],
    309 => ['name' => 'Aquacolor Arctic Ice Blue Lenses', 'price' => 1399.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQitpchytjxv-st_6r1KxQLHcWjG4lrBgYGJ_e2u93Raw&s'],
    310 => ['name' => 'Aquacolor Deep Ruby Red Lenses', 'price' => 1499.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkjR1ZXUrEbjo-fA5scpA0_WYp1o8coVLafz1PNgzxBg&s'],
    311 => ['name' => 'Aquacolor Golden Amber Bronze', 'price' => 1299.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgQs0mId5Ou-ul1qjLMXrsYUnLL68SjxUwTjlNea-jxA&s=10'],
    312 => ['name' => 'Aquacolor Obsidian Black Lenses', 'price' => 1199.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRx5OgidQBqToHO9O0KJ5ivJ-W9O4Xh4vmqA_pzgnCqbg&s=10']
];

$action =$_GET['action'] ?? '';
$pId = intval($_GET['id'] ?? 0);

if ($action === 'add' &&$pId > 0 && isset($catalog[$pId])) {
    // 1. Session Storage
    if (isset($_SESSION['cart'][$pId])) {
        $_SESSION['cart'][$pId]['qty'] += 1;
    } else {
        $_SESSION['cart'][$pId] = [
            'id' => $pId,
            'name' => $catalog[$pId]['name'],
            'price' => $catalog[$pId]['price'],
            'image' => $catalog[$pId]['image'],
            'qty' => 1
        ];
    }

    // 2. Database Storage (In `cart` table)
    try {
        if ($userId) {
            $stmt =$pdo->prepare("SELECT id, quantity FROM cart WHERE user_id = ? AND product_id = ?");
            $stmt->execute([$userId,$pId]);
            $exist =$stmt->fetch();

            if ($exist) {
                $uStmt =$pdo->prepare("UPDATE cart SET quantity = quantity + 1 WHERE id = ?");
                $uStmt->execute([$exist['id']]);
            } else {
                $iStmt =$pdo->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1)");
                $iStmt->execute([$userId,$pId]);
            }
        } else {
            $iStmt =$pdo->prepare("INSERT INTO cart (product_id, quantity) VALUES (?, 1)");
            $iStmt->execute([$pId]);
        }
    } catch (Exception $e) {
        // Silently skip if DB error
    }

    header("Location: cart.php");
    exit();
}

if ($action === 'remove' &&$pId > 0) {
    unset($_SESSION['cart'][$pId]);
    try {
        if ($userId) {
            $dStmt =$pdo->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
            $dStmt->execute([$userId,$pId]);
        } else {
            $dStmt =$pdo->prepare("DELETE FROM cart WHERE product_id = ? LIMIT 1");
            $dStmt->execute([$pId]);
        }
    } catch (Exception $e) {}

    header("Location: cart.php");
    exit();
}

if ($action === 'clear') {$_SESSION['cart'] = [];
    try {
        if ($userId) {
            $cStmt =$pdo->prepare("DELETE FROM cart WHERE user_id = ?");
            $cStmt->execute([$userId]);
        } else {
            $pdo->exec("TRUNCATE TABLE cart");
        }
    } catch (Exception $e) {}

    header("Location: cart.php");
    exit();
}

$grandTotal = 0;
foreach ($_SESSION['cart'] as $item) {$grandTotal += ($item['price'] *$item['qty']);
}
?>

<section class="max-w-6xl mx-auto px-6 py-12 text-slate-900">
    <h1 class="serif-title text-3xl font-extrabold text-slate-900 mb-8 flex items-center space-x-3">
        <i class="fa-solid fa-bag-shopping text-sky-500"></i>
        <span>Shopping Bag</span>
    </h1>

    <?php if (empty($_SESSION['cart'])): ?>
        <div class="bg-slate-50 rounded-3xl p-12 text-center border border-slate-200 space-y-4">
            <i class="fa-solid fa-cart-flatbed text-4xl text-slate-300"></i>
            <h2 class="text-xl font-bold text-slate-700">Aapki Shopping Bag Khali Hai!</h2>
            <p class="text-xs text-slate-400">Pehle eyewear / contact lens collection me se item pasand karke Add to Cart karein.</p>
            <a href="products.php" class="inline-block mt-4 bg-slate-900 text-white font-extrabold text-xs px-6 py-3 rounded-full hover:bg-sky-500 transition">
                Browse Collection
            </a>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <div class="lg:col-span-8 space-y-4">
                <?php foreach ($_SESSION['cart'] as$item): ?>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 flex items-center justify-between shadow-sm">
                        <div class="flex items-center space-x-4">
                            <img src="<?php echo htmlspecialchars($item['image']); ?>" class="w-16 h-16 object-cover rounded-xl border border-slate-100">
                            <div>
                                <h3 class="font-extrabold text-sm text-slate-900"><?php echo htmlspecialchars($item['name']); ?></h3>
                                <p class="text-xs text-slate-400 mt-0.5">Quantity: <span class="font-bold text-slate-700"><?php echo $item['qty']; ?></span></p>
                                <p class="text-xs font-black text-sky-600 mt-1">₹<?php echo number_format($item['price'], 2); ?></p>
                            </div>
                        </div>

                        <a href="cart.php?action=remove&id=<?php echo $item['id']; ?>" class="text-slate-400 hover:text-rose-500 text-sm p-2 transition">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </div>
                <?php endforeach; ?>

                <div class="pt-2 flex justify-between items-center">
                    <a href="cart.php?action=clear" class="text-xs text-rose-500 font-bold hover:underline">
                        <i class="fa-solid fa-xmark mr-1"></i> Clear Entire Bag
                    </a>
                    <a href="products.php" class="text-xs text-sky-600 font-bold hover:underline">
                        + Add More Items
                    </a>
                </div>
            </div>

            <div class="lg:col-span-4 bg-slate-50 rounded-3xl p-6 border border-slate-200 space-y-4">
                <h3 class="font-black text-sm uppercase tracking-wider text-slate-700">Order Summary</h3>
                <div class="flex justify-between text-xs text-slate-500 border-b border-slate-200 pb-3">
                    <span>Subtotal</span>
                    <span class="font-bold text-slate-900">₹<?php echo number_format($grandTotal, 2); ?></span>
                </div>
                <div class="flex justify-between text-xs text-slate-500 border-b border-slate-200 pb-3">
                    <span>Shipping</span>
                    <span class="font-bold text-emerald-600">FREE</span>
                </div>
                <div class="flex justify-between text-base font-black text-slate-900 pt-1">
                    <span>Grand Total</span>
                    <span>₹<?php echo number_format($grandTotal, 2); ?></span>
                </div>

                <a href="checkout.php" class="w-full py-3.5 rounded-full bg-slate-900 text-white text-center font-extrabold text-xs tracking-wider uppercase hover:bg-sky-500 transition block">
                    Proceed to Checkout
                </a>
            </div>
        </div>
    <?php endif; ?>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>