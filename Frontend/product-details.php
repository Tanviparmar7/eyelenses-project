<?php 
require_once __DIR__ . '/header.php'; 
require_once __DIR__ . '/../backend/database.php';

$productId = isset($_GET['id']) ? intval($_GET['id']) : 101;
$product = null;

try {
    if (isset($pdo)) {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$productId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    }
} catch (Exception $e) {
    $product = null;
}

// FULL CATALOG WITH DYNAMIC LENS COLOR BLENDING
$catalog = [
    // Eyeglasses
    101 => ['id' => 101, 'name' => 'Sleek Black Rimless Optical', 'category' => 'Eyeglasses', 'badge' => 'NEW ARRIVAL', 'price' => 2499.00, 'original_price' => 3199.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTa1WP60vwLnP--cN2oiLJXC8eE1WVVwpu7WFmVg1jg-Q&s=10', 'description' => 'Ultra-lightweight rimless structure designed for minimal footprint and maximum day-long comfort.', 'tint' => 'rgba(15, 23, 42, 0.15)', 'is_contact_lens' => false],
    102 => ['id' => 102, 'name' => 'Honey Hazel Gold Frame', 'category' => 'Eyeglasses', 'badge' => 'HONEY GOLD', 'price' => 2999.00, 'original_price' => 3899.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiTAwiqYqKSILd1RFkjKs94r5KxRgSfKsY26d5j7Dlpw&s=10', 'description' => 'Warm golden honey tone lightweight prescription eyewear crafted with Italian bio-acetate.', 'tint' => 'rgba(180, 120, 20, 0.25)', 'is_contact_lens' => false],
    103 => ['id' => 103, 'name' => 'Classic Matte Brown Frame', 'category' => 'Eyeglasses', 'badge' => 'BEST SELLER', 'price' => 2299.00, 'original_price' => 2999.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBeamO8yR7HKMMWxrxu5Sa1xITacdnpWfXynPB0cZnqQ&s=10', 'description' => 'Earthy matte finish square full-rim eyewear with durable titanium metal bridge.', 'tint' => 'rgba(80, 50, 20, 0.25)', 'is_contact_lens' => false],
    104 => ['id' => 104, 'name' => 'Transparent Crystal Clear Frames', 'category' => 'Eyeglasses', 'badge' => 'TRENDING', 'price' => 2799.00, 'original_price' => 3599.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQY_m0zlwgO3i65oys-dEXsos0gu5_ch9KLRqnXEefOlg&s=10', 'description' => 'High-clarity clear acetate frame paired with prescription-ready anti-glare optical lenses.', 'tint' => 'rgba(255, 255, 255, 0.1)', 'is_contact_lens' => false],
    105 => ['id' => 105, 'name' => 'Dark Amber Tortoiseshell Optics', 'category' => 'Eyeglasses', 'badge' => 'LUXURY RETRO', 'price' => 3199.00, 'original_price' => 4199.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSqMgmhRPH1Def_UFn3MfvCUq0z5sSbx3W5brXVygP-g&s=10', 'description' => 'Classic tortoiseshell aesthetic blended with flexible memory metal hinges for all face shapes.', 'tint' => 'rgba(120, 60, 10, 0.3)', 'is_contact_lens' => false],
    106 => ['id' => 106, 'name' => 'Minimalist Metallic Gunmetal Glass', 'category' => 'Eyeglasses', 'badge' => 'LIGHTWEIGHT', 'price' => 2699.00, 'original_price' => 3399.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEXw0k4ApZHDe_WOLWD1o87rpzOauxzbScxREb0w0jbA&s=10', 'description' => 'Industrial gunmetal wireframe specs featuring zero-power protective blue-block lenses.', 'tint' => 'rgba(30, 40, 50, 0.2)', 'is_contact_lens' => false],
    107 => ['id' => 107, 'name' => 'Rose Tinted Gold Oval Specs', 'category' => 'Eyeglasses', 'badge' => 'ELEGANT', 'price' => 2899.00, 'original_price' => 3699.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1XFartudQ35F8DQkgZLZppRMp3JIbSqQXwNYWhBds8g&s=10', 'description' => 'Delicate golden oval frame designed with subtle pastel rose hue tints for a modern luxury finish.', 'tint' => 'rgba(220, 100, 120, 0.2)', 'is_contact_lens' => false],
    108 => ['id' => 108, 'name' => 'Deep Navy Square Rimmed Frame', 'category' => 'Eyeglasses', 'badge' => 'PREMIUM', 'price' => 2599.00, 'original_price' => 3299.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyfj7yVfiWaeiazCG2vtRy_hXKVY2qlFdEf4_EBdYMCQ&s', 'description' => 'Bold dark navy acetate square frames built with ergonomic nose pads for high stability.', 'tint' => 'rgba(20, 30, 70, 0.25)', 'is_contact_lens' => false],
    109 => ['id' => 109, 'name' => 'Titanium Silver Executive Frame', 'category' => 'Eyeglasses', 'badge' => 'EXECUTIVE', 'price' => 3499.00, 'original_price' => 4499.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuJK_IsFxf_Z0R6AxL2kBw2BzC4qKT3Nbs2wQS8Hy9mA&s=10', 'description' => 'Sleek metallic silver finish engineered for professional everyday corporate style.', 'tint' => 'rgba(50, 50, 60, 0.15)', 'is_contact_lens' => false],
    110 => ['id' => 110, 'name' => 'Champagne Tint Bio Acetate Glass', 'category' => 'Eyeglasses', 'badge' => 'LIMITED', 'price' => 2899.00, 'original_price' => 3799.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEOBeRVg2BFNLds4R0k4k65SUjmw4T8f-lxUkdJvgfqg&s=10', 'description' => 'Handcrafted bio-cellulose frames in a luxurious soft champagne translucent gloss.', 'tint' => 'rgba(210, 170, 100, 0.2)', 'is_contact_lens' => false],
    111 => ['id' => 111, 'name' => 'Obsidian Black Aviator Eyeglasses', 'category' => 'Eyeglasses', 'badge' => 'AVIATOR OPTICS', 'price' => 3099.00, 'original_price' => 3999.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPrJLvc2J4sorerxjlneqN84ZBN60SDSeAzmwcoYChEA&s=10', 'description' => 'Retro double-bridge aviator style optical glasses finished in ultra-matt obsidian black.', 'tint' => 'rgba(15, 15, 15, 0.3)', 'is_contact_lens' => false],
    112 => ['id' => 112, 'name' => 'Emerald Accent Bio Acetate Frame', 'category' => 'Eyeglasses', 'badge' => 'EXCLUSIVE', 'price' => 2799.00, 'original_price' => 3499.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1Qyo8HXpwutwEeTyqNEsx5FOwMNH8CczK61Xlkp949Q&s=10', 'description' => 'Sophisticated designer optical specs with subtle emerald highlights and lightweight titanium temples.', 'tint' => 'rgba(20, 100, 60, 0.2)', 'is_contact_lens' => false],

    // Sunglasses
    201 => ['id' => 201, 'name' => 'Rich Gold Amber Polarized Sunglasses', 'category' => 'Sunglasses', 'badge' => 'RICH GOLD TINT', 'price' => 3499.00, 'original_price' => 4500.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaWh0ptXZ9hJE8tkbdeCsCCyH7gdLwVj7PuXPzH0A-4w&s=10', 'description' => 'Premium UV400 protected rich golden yellow tinted lenses with ultra-light metallic frame.', 'tint' => 'rgba(234, 179, 8, 0.55)', 'is_contact_lens' => false],
    202 => ['id' => 202, 'name' => 'Classic Matte Black Wayfarer', 'category' => 'Sunglasses', 'badge' => 'DARK SMOKE', 'price' => 3299.00, 'original_price' => 4200.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1HmXRIcvFCuqlNFrsp9t8mO7YYptn3tMc_rk9P1lDlA&s=10', 'description' => 'High impact dark smoke polarized sunglasses crafted for maximum sun protection.', 'tint' => 'rgba(15, 23, 42, 0.75)', 'is_contact_lens' => false],
    203 => ['id' => 203, 'name' => 'Vintage Yellow Sunset Aviator', 'category' => 'Sunglasses', 'badge' => 'YELLOW SUNSET', 'price' => 3699.00, 'original_price' => 4800.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvOObmpO3x5_XTXYsRikE6sep17qykN7XFjMNbihNqLw&s=10', 'description' => 'Retro aviator design with vibrant yellow high-contrast optical clarity lenses.', 'tint' => 'rgba(250, 204, 21, 0.6)', 'is_contact_lens' => false],
    204 => ['id' => 204, 'name' => 'Urban Smoke Shield Sunglasses', 'category' => 'Sunglasses', 'badge' => 'UV400 SHIELD', 'price' => 2999.00, 'original_price' => 3900.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaUd5F2ByarPmLpMlT7RNA_kEVUHHPaiDHaDECKPy73g&s=10', 'description' => 'Modern dark slate shade lenses in a robust bio-cellulose ergonomic frame.', 'tint' => 'rgba(30, 41, 59, 0.7)', 'is_contact_lens' => false],
    205 => ['id' => 205, 'name' => 'Warm Honey Amber Sunglasses', 'category' => 'Sunglasses', 'badge' => 'HONEY AMBER', 'price' => 3599.00, 'original_price' => 4600.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDdUwjYVlORQZR-2CsXh1LvlTYAVRloNoFCvXBA1Q5sw&s=10', 'description' => 'Rich warm amber tinted lenses ideal for high clarity outdoor driving and travel.', 'tint' => 'rgba(217, 119, 6, 0.6)', 'is_contact_lens' => false],
    206 => ['id' => 206, 'name' => 'Jet Black Luxury Oval Shade', 'category' => 'Sunglasses', 'badge' => 'JET BLACK', 'price' => 3899.00, 'original_price' => 5000.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScRAtX8yUyo9vNzWkdeijn69_KzF_q5exUMuucPUrXQw&s=10', 'description' => 'Sleek luxury oval black sunglasses with gradient anti-reflective lens treatment.', 'tint' => 'rgba(2, 6, 23, 0.8)', 'is_contact_lens' => false],
    207 => ['id' => 207, 'name' => 'Golden Hour Sunset Tint Specs', 'category' => 'Sunglasses', 'badge' => 'GOLDEN TINT', 'price' => 3399.00, 'original_price' => 4300.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMhc3jRqVdWo90Kb8T_YaNTzMNKe53H6HKMqaRfxj60A&s=10', 'description' => 'Golden yellow tinted protective lenses set in a refined gold wireframe bridge.', 'tint' => 'rgba(234, 179, 8, 0.55)', 'is_contact_lens' => false],
    208 => ['id' => 208, 'name' => 'Dark Obsidian Sport Polarized', 'category' => 'Sunglasses', 'badge' => 'POLARIZED SPORT', 'price' => 3199.00, 'original_price' => 4100.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYIhFRA9fnTDQRenVvGG-vmxYQUldPLQGHsmZ86t-GwA&s=10', 'description' => 'High durability dark obsidian polarized lenses engineered for sports and active lifestyle.', 'tint' => 'rgba(15, 23, 42, 0.75)', 'is_contact_lens' => false],
    209 => ['id' => 209, 'name' => 'Crystal Yellow Tinted Luxury Glass', 'category' => 'Sunglasses', 'badge' => 'CRYSTAL YELLOW', 'price' => 3799.00, 'original_price' => 4900.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEKTFjWmaKhcOHQhQi8_Z7nVVZOxy87FqDiin9uW7cWw&s=10', 'description' => 'Translucent crystal acetate frame housing rich yellow anti-fatigue optical lenses.', 'tint' => 'rgba(250, 204, 21, 0.6)', 'is_contact_lens' => false],
    210 => ['id' => 210, 'name' => 'Deep Charcoal Square Sunglasses', 'category' => 'Sunglasses', 'badge' => 'CHARCOAL SHADE', 'price' => 3499.00, 'original_price' => 4500.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThTiaNZPE_F0l66Z2tytW4gWRY9URo6hCZIRGGNkSL1Q&s=10', 'description' => 'Deep charcoal tinted square lenses providing 100% UV protection with classic style.', 'tint' => 'rgba(30, 41, 59, 0.75)', 'is_contact_lens' => false],
    211 => ['id' => 211, 'name' => 'Retro Golden Flame Aviators', 'category' => 'Sunglasses', 'badge' => 'GOLDEN FLAME', 'price' => 3999.00, 'original_price' => 5200.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSI3tFrtzZPUBgj-T3Chy5ZYW_telWjhqLFfIFGLIqWyg&s=10', 'description' => 'Double-bridge aviator frame with vibrant yellow sunset mirror lenses for high fashion.', 'tint' => 'rgba(234, 179, 8, 0.65)', 'is_contact_lens' => false],
    212 => ['id' => 212, 'name' => 'Midnight Matte Polarized Lens', 'category' => 'Sunglasses', 'badge' => 'MIDNIGHT MATTE', 'price' => 3299.00, 'original_price' => 4300.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6bZg0iEORNwlegjwV-NBYsU7PyKZMuESgsahSuR_q4Q&s=10', 'description' => 'Midnight dark polarized lenses with soft-touch matte black bio-acetate frame.', 'tint' => 'rgba(15, 23, 42, 0.8)', 'is_contact_lens' => false],

    // Contact Lenses (Eyeball Pupil Blending)
    301 => ['id' => 301, 'name' => 'Aquacolor Emerald Green Cosmetic Lenses', 'category' => 'Contact Lenses', 'badge' => 'EMERALD GREEN', 'price' => 1299.00, 'original_price' => 1699.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbV3qKk-GFTACaMigc9a2L988umrn2JFavRoYbTfkhQA&s=10', 'description' => 'Hydration-rich emerald green monthly cosmetic lenses with ultra-soft breathable comfort.', 'tint' => 'rgba(16, 185, 129, 0.75)', 'is_contact_lens' => true],
    302 => ['id' => 302, 'name' => 'Aquacolor Ocean Sapphire Blue Lenses', 'category' => 'Contact Lenses', 'badge' => 'SAPPHIRE BLUE', 'price' => 1399.00, 'original_price' => 1799.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNZ7fK3j5VgO7N5W13Wl72tKk2he2rOAAcOunhIIc7IQ&s=10', 'description' => 'Vibrant ocean sapphire blue natural eyeball iris lenses with high oxygen permeability.', 'tint' => 'rgba(14, 165, 233, 0.75)', 'is_contact_lens' => true],
    303 => ['id' => 303, 'name' => 'Aquacolor Honey Hazel Cosmetic Eyes', 'category' => 'Contact Lenses', 'badge' => 'HONEY HAZEL', 'price' => 1249.00, 'original_price' => 1600.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBQpJvugWeU07rKrIoq608cVW_QhHe_RhF7yLIES6Xrw&s', 'description' => 'Warm honey hazel brown color contact lenses with high moisture retention.', 'tint' => 'rgba(217, 119, 6, 0.75)', 'is_contact_lens' => true],
    304 => ['id' => 304, 'name' => 'Aquacolor Amethyst Violet Lenses', 'category' => 'Contact Lenses', 'badge' => 'VIOLET SHADE', 'price' => 1499.00, 'original_price' => 1899.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2uZdxyH_L8xPYayh4nbKMp_WaxrH8jFyMn-iEnl22CA&s', 'description' => 'Striking amethyst purple violet natural iris cosmetic contact lenses.', 'tint' => 'rgba(168, 85, 247, 0.75)', 'is_contact_lens' => true],
    305 => ['id' => 305, 'name' => 'Aquacolor Turquoise Aqua Blue Lens', 'category' => 'Contact Lenses', 'badge' => 'TURQUOISE AQUA', 'price' => 1299.00, 'original_price' => 1699.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5Xuwtl8xMP8c4O0ilsX8Jv9I-vAVWSe-c5Ug6cllKTQ&s', 'description' => 'Luminous turquoise sea blue soft contact lenses for a radiant eyeball look.', 'tint' => 'rgba(6, 182, 212, 0.75)', 'is_contact_lens' => true],
    306 => ['id' => 306, 'name' => 'Aquacolor Warm Amber Hazel Lens', 'category' => 'Contact Lenses', 'badge' => 'HAZEL AMBER', 'price' => 1349.00, 'original_price' => 1749.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTVhfNwLfT879mf_AVCDr6HqNN0xjMLHIK_UOvQh0-8A&s=10', 'description' => 'Soft hazel amber tone cosmetic lenses designed for sensitive modern eyes.', 'tint' => 'rgba(245, 158, 11, 0.75)', 'is_contact_lens' => true],
    307 => ['id' => 307, 'name' => 'Aquacolor Pastel Rose Pink Lenses', 'category' => 'Contact Lenses', 'badge' => 'ROSE PINK', 'price' => 1399.00, 'original_price' => 1799.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2AEYLMl628kGQNdtllxLK0hK-dz8nl0MO88oxjvvf7w&s=10', 'description' => 'Delicate pastel rose pink shade monthly cosmetic contact lenses.', 'tint' => 'rgba(244, 114, 182, 0.75)', 'is_contact_lens' => true],
    308 => ['id' => 308, 'name' => 'Aquacolor Sterling Crystal Gray', 'category' => 'Contact Lenses', 'badge' => 'STERLING GRAY', 'price' => 1449.00, 'original_price' => 1849.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTVhfNwLfT879mf_AVCDr6HqNN0xjMLHIK_UOvQh0-8A&s=10', 'description' => 'Luminous silver crystal gray iris contact lenses for expressive eyes.', 'tint' => 'rgba(148, 163, 184, 0.8)', 'is_contact_lens' => true],
    309 => ['id' => 309, 'name' => 'Aquacolor Arctic Ice Blue Lenses', 'category' => 'Contact Lenses', 'badge' => 'ARCTIC ICE', 'price' => 1399.00, 'original_price' => 1799.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQitpchytjxv-st_6r1KxQLHcWjG4lrBgYGJ_e2u93Raw&s', 'description' => 'High contrast arctic ice light blue cosmetic iris contact lenses.', 'tint' => 'rgba(56, 189, 248, 0.75)', 'is_contact_lens' => true],
    310 => ['id' => 310, 'name' => 'Aquacolor Deep Ruby Red Lenses', 'category' => 'Contact Lenses', 'badge' => 'RUBY RED', 'price' => 1499.00, 'original_price' => 1899.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkjR1ZXUrEbjo-fA5scpA0_WYp1o8coVLafz1PNgzxBg&s', 'description' => 'Bold ruby red dramatic cosmetic lenses with high hydration technology.', 'tint' => 'rgba(225, 29, 72, 0.8)', 'is_contact_lens' => true],
    311 => ['id' => 311, 'name' => 'Aquacolor Golden Amber Bronze', 'category' => 'Contact Lenses', 'badge' => 'GOLDEN BRONZE', 'price' => 1299.00, 'original_price' => 1699.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgQs0mId5Ou-ul1qjLMXrsYUnLL68SjxUwTjlNea-jxA&s=10', 'description' => 'Vibrant golden amber bronze tone natural iris contact lenses.', 'tint' => 'rgba(202, 138, 4, 0.75)', 'is_contact_lens' => true],
    312 => ['id' => 312, 'name' => 'Aquacolor Obsidian Black Lenses', 'category' => 'Contact Lenses', 'badge' => 'OBSIDIAN BLACK', 'price' => 1199.00, 'original_price' => 1599.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRx5OgidQBqToHO9O0KJ5ivJ-W9O4Xh4vmqA_pzgnCqbg&s=10', 'description' => 'Deep obsidian jet black enlarging iris ring cosmetic lenses.', 'tint' => 'rgba(15, 23, 42, 0.9)', 'is_contact_lens' => true]
];

if (!$product || empty($product['image'])) {
    $product = $catalog[$productId] ?? $catalog[101];
}

$origPrice = isset($product['original_price']) ? $product['original_price'] : ($product['price'] * 1.3);
$badgeText = isset($product['badge']) ? $product['badge'] : strtoupper($product['category']);
$lensTint = isset($product['tint']) ?$product['tint'] : 'rgba(15, 23, 42, 0.3)';
$isContactLens = !empty($product['is_contact_lens']);
?>

<!-- MEDIAPIPE AI LIBRARIES -->
<script src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils/camera_utils.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@mediapipe/face_mesh/face_mesh.js" crossorigin="anonymous"></script>

<style>
.mirror-mode {
    transform: scaleX(-1);
}
</style>

<section class="max-w-7xl mx-auto px-6 py-12 text-slate-900">
    <div class="text-xs font-semibold text-slate-400 mb-8 space-x-2">
        <a href="index.php" class="hover:text-slate-600">Products</a>
        <span>/</span>
        <a href="products.php?category=<?php echo urlencode($product['category']); ?>" class="hover:text-slate-600"><?php echo htmlspecialchars($product['category']); ?></a>
        <span>/</span>
        <span class="text-slate-800 font-bold"><?php echo htmlspecialchars($product['name']); ?></span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
        <div class="lg:col-span-6 space-y-4">
            <div class="bg-slate-100 rounded-3xl p-6 border border-slate-200 relative overflow-hidden group shadow-inner">
                <span class="absolute top-6 left-6 bg-slate-900 text-white font-extrabold text-[10px] uppercase tracking-widest px-3.5 py-1.5 rounded-full z-10 shadow-md">
                    <?php echo htmlspecialchars($badgeText); ?>
                </span>
                <div class="aspect-[4/5] w-full rounded-2xl overflow-hidden bg-white shadow-md flex items-center justify-center p-2">
                    <img id="productImageSrc" src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
            </div>

            <button onclick="openTryOnModal()" class="w-full py-4 rounded-full bg-slate-900 text-white font-extrabold text-xs uppercase tracking-widest hover:bg-slate-800 transition shadow-lg flex items-center justify-center space-x-2">
                <i class="fa-solid fa-eye text-sky-400"></i>
                <span>Live AI <?php echo $isContactLens ? 'Contact Lens Fitting' : 'Glasses Try-On'; ?></span>
            </button>
        </div>

        <div class="lg:col-span-6 space-y-6">
            <div>
                <span class="text-sky-500 font-extrabold text-xs uppercase tracking-widest bg-sky-50 px-3.5 py-1.5 rounded-full border border-sky-100 inline-block mb-3">
                    <?php echo htmlspecialchars($product['category']); ?>
                </span>
                <h1 class="serif-title text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight">
                    <?php echo htmlspecialchars($product['name']); ?>
                </h1>
                
                <div class="flex items-center space-x-3 mt-2">
                    <div class="flex text-amber-400 text-xs">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <span class="text-xs font-bold text-slate-500">4.9 / 5.0</span>
                    <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-100"><i class="fa-solid fa-circle-check mr-1"></i>In Stock & Ready to Ship</span>
                </div>
            </div>

            <div class="bg-slate-50 p-6 rounded-3xl border border-slate-200 flex items-center justify-between">
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Special Price</span>
                    <div class="flex items-baseline space-x-3">
                        <span class="text-3xl font-black text-slate-900">₹<?php echo number_format($product['price'], 2); ?></span>
                        <span class="text-sm font-semibold text-slate-400 line-through">₹<?php echo number_format($origPrice, 2); ?></span>
                    </div>
                </div>
                <span class="text-xs font-extrabold text-emerald-700 bg-emerald-100 px-3 py-1.5 rounded-full border border-emerald-200">
                    Save 30% Today
                </span>
            </div>

            <p class="text-xs text-slate-500 leading-relaxed">
                <?php echo htmlspecialchars($product['description']); ?>
            </p>

            <a href="cart.php?action=add&id=<?php echo $product['id']; ?>" class="w-full py-4 rounded-full bg-sky-500 text-slate-950 font-extrabold text-xs uppercase tracking-widest hover:bg-sky-400 transition shadow-xl flex items-center justify-center space-x-2">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>Add To Cart & Checkout</span>
            </a>

            <div class="grid grid-cols-3 gap-4 pt-4 border-t border-slate-100 text-center">
                <div class="space-y-1">
                    <i class="fa-solid fa-truck-fast text-sky-500 text-lg"></i>
                    <p class="text-[11px] font-bold text-slate-700">Free Express Delivery</p>
                </div>
                <div class="space-y-1">
                    <i class="fa-solid fa-shield-halved text-sky-500 text-lg"></i>
                    <p class="text-[11px] font-bold text-slate-700">1 Year Warranty</p>
                </div>
                <div class="space-y-1">
                    <i class="fa-solid fa-rotate-left text-sky-500 text-lg"></i>
                    <p class="text-[11px] font-bold text-slate-700">14 Days Return</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- AR REALISTIC EYE TRY-ON OVERLAY -->
<div id="tryOnModal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-md hidden flex items-center justify-center p-4">
    <div class="bg-slate-900/95 border border-slate-800 text-white rounded-3xl max-w-xl w-full p-6 relative space-y-4 shadow-2xl overflow-hidden">
        
        <div class="flex items-center justify-between pb-1">
            <h3 class="serif-title font-extrabold text-xl text-sky-400 flex items-center space-x-2">
                <i class="fa-solid fa-eye text-sky-400"></i>
                <span>AI Live <?php echo $isContactLens ? 'Eyeball Contact Lens Fitting' : 'Glasses Fitting Studio'; ?></span>
            </h3>
            <div class="flex items-center space-x-2">
                <button onclick="toggleExpand()" class="text-xs bg-slate-800 hover:bg-slate-700 text-slate-300 px-3 py-1.5 rounded-lg border border-slate-700 transition">
                    <i class="fa-solid fa-expand mr-1"></i> Expand
                </button>
                <button onclick="closeTryOnModal()" class="text-xs bg-slate-800 hover:bg-rose-600 text-slate-300 hover:text-white px-3 py-1.5 rounded-lg border border-slate-700 transition">
                    ✕ Close
                </button>
            </div>
        </div>

        <p class="text-xs text-slate-400 -mt-1">
            Sliders ka use karke size, position (Up/Down, Left/Right) aur height/width adjust karein.
        </p>

        <div id="videoContainer" class="relative aspect-video rounded-2xl overflow-hidden bg-black flex items-center justify-center border border-slate-800 shadow-inner">
            <video id="tryOnVideo" class="hidden mirror-mode" playsinline></video>
            <canvas id="tryOnCanvas" class="w-full h-full object-cover mirror-mode"></canvas>
            
            <div id="tryOnLoader" class="absolute inset-0 bg-slate-950/90 flex flex-col items-center justify-center space-y-2 z-10">
                <i class="fa-solid fa-spinner fa-spin text-2xl text-sky-400"></i>
                <span class="text-xs font-bold text-slate-300">Initializing AI Eye Landmark Tracker...</span>
            </div>
        </div>

        <!-- COMPLETE 2ND PHOTO SLIDERS + LEFT/RIGHT CONTROL -->
        <div class="grid grid-cols-2 gap-x-6 gap-y-3 pt-2 text-xs">
            <div>
                <div class="flex justify-between font-bold text-slate-300 mb-1">
                    <span><?php echo $isContactLens ? 'Iris Size:' : 'Frame Size:'; ?></span>
                    <span id="valSize" class="text-sky-400">1.30</span>
                </div>
                <input type="range" id="ctrlSize" min="0.8" max="2.2" step="0.05" value="1.30" class="w-full accent-sky-400 cursor-pointer">
            </div>

            <div>
                <div class="flex justify-between font-bold text-slate-300 mb-1">
                    <span>Position Up/Down:</span>
                    <span id="valY" class="text-sky-400">0px</span>
                </div>
                <input type="range" id="ctrlY" min="-40" max="60" value="0" class="w-full accent-sky-400 cursor-pointer">
            </div>

            <div>
                <div class="flex justify-between font-bold text-slate-300 mb-1">
                    <span>Width Scale:</span>
                    <span id="valW" class="text-sky-400">1.00</span>
                </div>
                <input type="range" id="ctrlW" min="0.7" max="1.8" step="0.05" value="1.00" class="w-full accent-sky-400 cursor-pointer">
            </div>

            <div>
                <div class="flex justify-between font-bold text-slate-300 mb-1">
                    <span>Height Scale:</span>
                    <span id="valH" class="text-sky-400">0.90</span>
                </div>
                <input type="range" id="ctrlH" min="0.4" max="1.5" step="0.05" value="0.90" class="w-full accent-sky-400 cursor-pointer">
            </div>

            <div class="col-span-2">
                <div class="flex justify-between font-bold text-slate-300 mb-1">
                    <span>Position Left/Right:</span>
                    <span id="valX" class="text-sky-400">0px</span>
                </div>
                <input type="range" id="ctrlX" min="-50" max="50" value="0" class="w-full accent-sky-400 cursor-pointer">
            </div>
        </div>

        <?php if (!$isContactLens): ?>
        <div class="space-y-2 pt-1">
            <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider block">Select Try-On Frame:</span>
            <div class="grid grid-cols-3 gap-3">
                <button onclick="setShape('square')" id="btnSquare" class="shape-btn bg-slate-800/90 border border-sky-400/50 text-sky-400 font-bold py-2 rounded-xl text-xs flex items-center justify-center space-x-1.5 hover:border-sky-400 transition">
                    <span>🕶️ Classic Square</span>
                </button>
                <button onclick="setShape('round')" id="btnRound" class="shape-btn bg-slate-900 border border-slate-800 text-slate-400 font-bold py-2 rounded-xl text-xs flex items-center justify-center space-x-1.5 hover:border-sky-400 transition">
                    <span>👓 Round Tinted</span>
                </button>
                <button onclick="setShape('crystal')" id="btnCrystal" class="shape-btn bg-slate-900 border border-slate-800 text-slate-400 font-bold py-2 rounded-xl text-xs flex items-center justify-center space-x-1.5 hover:border-sky-400 transition">
                    <span>💎 Crystal Frame</span>
                </button>
            </div>
        </div>
        <?php endif; ?>

        <div class="bg-emerald-500/20 border border-emerald-500/40 text-emerald-400 font-black text-xs text-center py-3 rounded-2xl tracking-wider uppercase flex items-center justify-center space-x-2">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <span>AI TRACKING ACTIVE • FITTING REAL GLASSES</span>
        </div>

    </div>
</div>

<script>
let cameraStream = null;
let faceMesh = null;
let activeShape = 'square';
const currentTint = "<?php echo $lensTint; ?>";
const isContactLensMode = <?php echo $isContactLens ? 'true' : 'false'; ?>;

const ctrlSize = document.getElementById('ctrlSize');
const ctrlY = document.getElementById('ctrlY');
const ctrlX = document.getElementById('ctrlX');
const ctrlW = document.getElementById('ctrlW');
const ctrlH = document.getElementById('ctrlH');

const valSize = document.getElementById('valSize');
const valY = document.getElementById('valY');
const valX = document.getElementById('valX');
const valW = document.getElementById('valW');
const valH = document.getElementById('valH');

ctrlSize.oninput = () => valSize.innerText = parseFloat(ctrlSize.value).toFixed(2);
ctrlY.oninput = () => valY.innerText = ctrlY.value + 'px';
ctrlX.oninput = () => valX.innerText = ctrlX.value + 'px';
ctrlW.oninput = () => valW.innerText = parseFloat(ctrlW.value).toFixed(2);
ctrlH.oninput = () => valH.innerText = parseFloat(ctrlH.value).toFixed(2);

function setShape(shape) {
    activeShape = shape;
    document.querySelectorAll('.shape-btn').forEach(btn => {
        btn.classList.replace('border-sky-400/50', 'border-slate-800');
        btn.classList.replace('text-sky-400', 'text-slate-400');
        btn.classList.replace('bg-slate-800/90', 'bg-slate-900');
    });

    const activeBtn = shape === 'square' ? document.getElementById('btnSquare') : (shape === 'round' ? document.getElementById('btnRound') : document.getElementById('btnCrystal'));
    if (activeBtn) {
        activeBtn.classList.replace('border-slate-800', 'border-sky-400/50');
        activeBtn.classList.replace('text-slate-400', 'text-sky-400');
        activeBtn.classList.replace('bg-slate-900', 'bg-slate-800/90');
    }
}

function toggleExpand() {
    const container = document.getElementById('videoContainer');
    container.classList.toggle('aspect-video');
    container.classList.toggle('h-80');
}

function openTryOnModal() {
    document.getElementById('tryOnModal').classList.remove('hidden');
    initAIFaceTracking();
}

function closeTryOnModal() {
    document.getElementById('tryOnModal').classList.add('hidden');
    if (cameraStream) {
        cameraStream.getTracks().forEach(track => track.stop());
    }
}

async function initAIFaceTracking() {
    const video = document.getElementById('tryOnVideo');
    const canvas = document.getElementById('tryOnCanvas');
    const ctx = canvas.getContext('2d');
    const loader = document.getElementById('tryOnLoader');

    faceMesh = new FaceMesh({
        locateFile: (file) => `https://cdn.jsdelivr.net/npm/@mediapipe/face_mesh/${file}`
    });

    faceMesh.setOptions({
        maxNumFaces: 1,
        refineLandmarks: true,
        minDetectionConfidence: 0.5,
        minTrackingConfidence: 0.5
    });

    faceMesh.onResults((results) => {
        loader.classList.add('hidden');
        canvas.width = video.videoWidth || 640;
        canvas.height = video.videoHeight || 480;

        ctx.save();
        ctx.drawImage(results.image, 0, 0, canvas.width, canvas.height);

        if (results.multiFaceLandmarks && results.multiFaceLandmarks.length > 0) {
            const landmarks = results.multiFaceLandmarks[0];

            const offsetX = parseInt(ctrlX.value);
            const offsetY = parseInt(ctrlY.value);
            const wScale = parseFloat(ctrlW.value);
            const hScale = parseFloat(ctrlH.value);
            const sizeVal = parseFloat(ctrlSize.value);

            if (isContactLensMode) {
                // Precise Eyeball Pupil Landmark Tracking
                const leftIris = landmarks[468] || landmarks[33];
                const rightIris = landmarks[473] || landmarks[263];
                const leftEye = landmarks[33];
                const rightEye = landmarks[263];

                const eyeDist = Math.hypot((rightEye.x - leftEye.x) * canvas.width, (rightEye.y - leftEye.y) * canvas.height);
                const irisRadiusX = (eyeDist * 0.12) * sizeVal * wScale;
                const irisRadiusY = (eyeDist * 0.12) * sizeVal * hScale;

                const lX = (leftIris.x * canvas.width) + offsetX;
                const lY = (leftIris.y * canvas.height) + offsetY;
                const rX = (rightIris.x * canvas.width) + offsetX;
                const rY = (rightIris.y * canvas.height) + offsetY;

                drawContactLensOnEye(ctx, lX, lY, irisRadiusX, irisRadiusY, currentTint);
                drawContactLensOnEye(ctx, rX, rY, irisRadiusX, irisRadiusY, currentTint);
            } else {
                // Eyeglasses / Sunglasses Mode
                const leftEye = landmarks[33];
                const rightEye = landmarks[263];
                const bridge = landmarks[168];

                const lx = leftEye.x * canvas.width;
                const ly = leftEye.y * canvas.height;
                const rx = rightEye.x * canvas.width;
                const ry = rightEye.y * canvas.height;
                const bx = (bridge.x * canvas.width) + offsetX;
                const by = (bridge.y * canvas.height) + offsetY;

                const eyeDist = Math.hypot(rx - lx, ry - ly);
                const angle = Math.atan2(ry - ly, rx - lx);

                const frameW = eyeDist * sizeVal * wScale;
                const frameH = (frameW * 0.45) * hScale;

                ctx.translate(bx, by);
                ctx.rotate(angle);

                drawGlassesFrame(ctx, frameW, frameH, activeShape, currentTint);
            }
        }

        ctx.restore();
    });

    try {
        cameraStream = await navigator.mediaDevices.getUserMedia({ video: { width: 640, height: 480 } });
        video.srcObject = cameraStream;
        await video.play();

        async function sendVideoFrames() {
            if (cameraStream && !video.paused) {
                await faceMesh.send({ image: video });
                requestAnimationFrame(sendVideoFrames);
            }
        }
        sendVideoFrames();
    } catch (err) {
        loader.innerHTML = '<p class="text-xs text-rose-400 font-bold p-4 text-center">Camera permission needed for AI Eye Mesh Tracking.</p>';
    }
}

// REALISTIC BOTH EYEBALL CONTACT LENS DRAWING WITH NATURAL BLEND
function drawContactLensOnEye(ctx, x, y, radiusX, radiusY, colorTint) {
    ctx.save();
    ctx.globalCompositeOperation = 'overlay';

    const grad = ctx.createRadialGradient(x, y, radiusX * 0.2, x, y, radiusX);
    grad.addColorStop(0, 'rgba(0,0,0,0.4)');
    grad.addColorStop(0.5, colorTint);
    grad.addColorStop(1, 'rgba(0,0,0,0.6)');

    ctx.fillStyle = grad;
    ctx.beginPath();
    ctx.ellipse(x, y, radiusX, radiusY, 0, 0, Math.PI * 2);
    ctx.fill();

    ctx.globalCompositeOperation = 'destination-out';
    ctx.beginPath();
    ctx.ellipse(x, y, radiusX * 0.3, radiusY * 0.3, 0, 0, Math.PI * 2);
    ctx.fill();

    ctx.restore();
}

function drawGlassesFrame(ctx, w, h, shape, tintColor) {
    const lensW = w * 0.42;
    const leftX = -w / 2 + lensW / 2;
    const rightX = w / 2 - lensW / 2;

    const frameColor = shape === 'crystal' ? '#38bdf8' : '#0f172a';

    ctx.fillStyle = tintColor;

    if (shape === 'round') {
        ctx.beginPath();
        ctx.ellipse(leftX, 0, lensW / 2, h / 2, 0, 0, Math.PI * 2);
        ctx.ellipse(rightX, 0, lensW / 2, h / 2, 0, 0, Math.PI * 2);
        ctx.fill();
    } else {
        ctx.beginPath();
        ctx.roundRect(leftX - lensW / 2, -h / 2, lensW, h, 10);
        ctx.roundRect(rightX - lensW / 2, -h / 2, lensW, h, 10);
        ctx.fill();
    }

    ctx.strokeStyle = frameColor;
    ctx.lineWidth = 7;

    if (shape === 'round') {
        ctx.beginPath();
        ctx.ellipse(leftX, 0, lensW / 2, h / 2, 0, 0, Math.PI * 2);
        ctx.stroke();

        ctx.beginPath();
        ctx.ellipse(rightX, 0, lensW / 2, h / 2, 0, 0, Math.PI * 2);
        ctx.stroke();
    } else {
        ctx.beginPath();
        ctx.roundRect(leftX - lensW / 2, -h / 2, lensW, h, 10);
        ctx.stroke();

        ctx.beginPath();
        ctx.roundRect(rightX - lensW / 2, -h / 2, lensW, h, 10);
        ctx.stroke();
    }

    ctx.beginPath();
    ctx.moveTo(leftX + lensW / 2, -h * 0.1);
    ctx.lineTo(rightX - lensW / 2, -h * 0.1);
    ctx.lineWidth = 5;
    ctx.stroke();
}
</script>

<?php require_once __DIR__ . '/footer.php'; ?>