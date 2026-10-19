<?php 
require_once __DIR__ . '/header.php'; 
require_once __DIR__ . '/../backend/database.php';

$categoryFilter = isset($_GET['category']) ? trim($_GET['category']) : '';

// FULL CATALOG (12 EYEGLASSES + 12 SUNGLASSES + 12 CONTACT LENSES)
$productsCatalog = [
    // EYEGLASSES (101 - 112)
    [
        'id' => 101, 'name' => 'Sleek Black Rimless Optical', 'category' => 'Eyeglasses', 'badge' => 'NEW ARRIVAL', 'price' => 2499.00, 'rating' => '4.9',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTa1WP60vwLnP--cN2oiLJXC8eE1WVVwpu7WFmVg1jg-Q&s=10',
        'description' => 'Ultra-lightweight rimless structure designed for minimal footprint and maximum day-long comfort.'
    ],
    [
        'id' => 102, 'name' => 'Honey Hazel Gold Frame', 'category' => 'Eyeglasses', 'badge' => 'HONEY GOLD', 'price' => 2999.00, 'rating' => '4.8',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiTAwiqYqKSILd1RFkjKs94r5KxRgSfKsY26d5j7Dlpw&s=10',
        'description' => 'Warm golden honey tone lightweight prescription eyewear crafted with Italian bio-acetate.'
    ],
    [
        'id' => 103, 'name' => 'Classic Matte Brown Frame', 'category' => 'Eyeglasses', 'badge' => 'BEST SELLER', 'price' => 2299.00, 'rating' => '4.9',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBeamO8yR7HKMMWxrxu5Sa1xITacdnpWfXynPB0cZnqQ&s=10',
        'description' => 'Earthy matte finish square full-rim eyewear with durable titanium metal bridge.'
    ],
    [
        'id' => 104, 'name' => 'Transparent Crystal Clear Frames', 'category' => 'Eyeglasses', 'badge' => 'TRENDING', 'price' => 2799.00, 'rating' => '5.0',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQY_m0zlwgO3i65oys-dEXsos0gu5_ch9KLRqnXEefOlg&s=10',
        'description' => 'High-clarity clear acetate frame paired with prescription-ready anti-glare optical lenses.'
    ],
    [
        'id' => 105, 'name' => 'Dark Amber Tortoiseshell Optics', 'category' => 'Eyeglasses', 'badge' => 'LUXURY RETRO', 'price' => 3199.00, 'rating' => '4.8',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSqMgmhRPH1Def_UFn3MfvCUq0z5sSbx3W5brXVygP-g&s=10',
        'description' => 'Classic tortoiseshell aesthetic blended with flexible memory metal hinges for all face shapes.'
    ],
    [
        'id' => 106, 'name' => 'Minimalist Metallic Gunmetal Glass', 'category' => 'Eyeglasses', 'badge' => 'LIGHTWEIGHT', 'price' => 2699.00, 'rating' => '4.9',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEXw0k4ApZHDe_WOLWD1o87rpzOauxzbScxREb0w0jbA&s=10',
        'description' => 'Industrial gunmetal wireframe specs featuring zero-power protective blue-block lenses.'
    ],
    [
        'id' => 107, 'name' => 'Rose Tinted Gold Oval Specs', 'category' => 'Eyeglasses', 'badge' => 'ELEGANT', 'price' => 2899.00, 'rating' => '4.7',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1XFartudQ35F8DQkgZLZppRMp3JIbSqQXwNYWhBds8g&s=10',
        'description' => 'Delicate golden oval frame designed with subtle pastel rose hue tints for a modern luxury finish.'
    ],
    [
        'id' => 108, 'name' => 'Deep Navy Square Rimmed Frame', 'category' => 'Eyeglasses', 'badge' => 'PREMIUM', 'price' => 2599.00, 'rating' => '4.9',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyfj7yVfiWaeiazCG2vtRy_hXKVY2qlFdEf4_EBdYMCQ&s',
        'description' => 'Bold dark navy acetate square frames built with ergonomic nose pads for high stability.'
    ],
    [
        'id' => 109, 'name' => 'Titanium Silver Executive Frame', 'category' => 'Eyeglasses', 'badge' => 'EXECUTIVE', 'price' => 3499.00, 'rating' => '5.0',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuJK_IsFxf_Z0R6AxL2kBw2BzC4qKT3Nbs2wQS8Hy9mA&s=10',
        'description' => 'Sleek metallic silver finish engineered for professional everyday corporate style.'
    ],
    [
        'id' => 110, 'name' => 'Champagne Tint Bio Acetate Glass', 'category' => 'Eyeglasses', 'badge' => 'LIMITED', 'price' => 2899.00, 'rating' => '4.8',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEOBeRVg2BFNLds4R0k4k65SUjmw4T8f-lxUkdJvgfqg&s=10',
        'description' => 'Handcrafted bio-cellulose frames in a luxurious soft champagne translucent gloss.'
    ],
    [
        'id' => 111, 'name' => 'Obsidian Black Aviator Eyeglasses', 'category' => 'Eyeglasses', 'badge' => 'AVIATOR OPTICS', 'price' => 3099.00, 'rating' => '4.9',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPrJLvc2J4sorerxjlneqN84ZBN60SDSeAzmwcoYChEA&s=10',
        'description' => 'Retro double-bridge aviator style optical glasses finished in ultra-matt obsidian black.'
    ],
    [
        'id' => 112, 'name' => 'Emerald Accent Bio Acetate Frame', 'category' => 'Eyeglasses', 'badge' => 'EXCLUSIVE', 'price' => 2799.00, 'rating' => '4.9',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1Qyo8HXpwutwEeTyqNEsx5FOwMNH8CczK61Xlkp949Q&s=10',
        'description' => 'Sophisticated designer optical specs with subtle emerald highlights and lightweight titanium temples.'
    ],

    // SUNGLASSES (201 - 212)
    [
        'id' => 201, 'name' => 'Rich Gold Amber Polarized Sunglasses', 'category' => 'Sunglasses', 'badge' => 'RICH GOLD TINT', 'price' => 3499.00, 'rating' => '5.0',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaWh0ptXZ9hJE8tkbdeCsCCyH7gdLwVj7PuXPzH0A-4w&s=10',
        'description' => 'Premium UV400 protected rich golden yellow tinted lenses with ultra-light metallic frame.'
    ],
    [
        'id' => 202, 'name' => 'Classic Matte Black Wayfarer', 'category' => 'Sunglasses', 'badge' => 'DARK SMOKE', 'price' => 3299.00, 'rating' => '4.9',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1HmXRIcvFCuqlNFrsp9t8mO7YYptn3tMc_rk9P1lDlA&s=10',
        'description' => 'High impact dark smoke polarized sunglasses crafted for maximum sun protection.'
    ],
    [
        'id' => 203, 'name' => 'Vintage Yellow Sunset Aviator', 'category' => 'Sunglasses', 'badge' => 'YELLOW SUNSET', 'price' => 3699.00, 'rating' => '4.8',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvOObmpO3x5_XTXYsRikE6sep17qykN7XFjMNbihNqLw&s=10',
        'description' => 'Retro aviator design with vibrant yellow high-contrast optical clarity lenses.'
    ],
    [
        'id' => 204, 'name' => 'Urban Smoke Shield Sunglasses', 'category' => 'Sunglasses', 'badge' => 'UV400 SHIELD', 'price' => 2999.00, 'rating' => '4.9',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaUd5F2ByarPmLpMlT7RNA_kEVUHHPaiDHaDECKPy73g&s=10',
        'description' => 'Modern dark slate shade lenses in a robust bio-cellulose ergonomic frame.'
    ],
    [
        'id' => 205, 'name' => 'Warm Honey Amber Sunglasses', 'category' => 'Sunglasses', 'badge' => 'HONEY AMBER', 'price' => 3599.00, 'rating' => '5.0',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDdUwjYVlORQZR-2CsXh1LvlTYAVRloNoFCvXBA1Q5sw&s=10',
        'description' => 'Rich warm amber tinted lenses ideal for high clarity outdoor driving and travel.'
    ],
    [
        'id' => 206, 'name' => 'Jet Black Luxury Oval Shade', 'category' => 'Sunglasses', 'badge' => 'JET BLACK', 'price' => 3899.00, 'rating' => '4.9',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScRAtX8yUyo9vNzWkdeijn69_KzF_q5exUMuucPUrXQw&s=10',
        'description' => 'Sleek luxury oval black sunglasses with gradient anti-reflective lens treatment.'
    ],
    [
        'id' => 207, 'name' => 'Golden Hour Sunset Tint Specs', 'category' => 'Sunglasses', 'badge' => 'GOLDEN TINT', 'price' => 3399.00, 'rating' => '4.8',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMhc3jRqVdWo90Kb8T_YaNTzMNKe53H6HKMqaRfxj60A&s=10',
        'description' => 'Golden yellow tinted protective lenses set in a refined gold wireframe bridge.'
    ],
    [
        'id' => 208, 'name' => 'Dark Obsidian Sport Polarized', 'category' => 'Sunglasses', 'badge' => 'POLARIZED SPORT', 'price' => 3199.00, 'rating' => '4.9',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYIhFRA9fnTDQRenVvGG-vmxYQUldPLQGHsmZ86t-GwA&s=10',
        'description' => 'High durability dark obsidian polarized lenses engineered for sports and active lifestyle.'
    ],
    [
        'id' => 209, 'name' => 'Crystal Yellow Tinted Luxury Glass', 'category' => 'Sunglasses', 'badge' => 'CRYSTAL YELLOW', 'price' => 3799.00, 'rating' => '5.0',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEKTFjWmaKhcOHQhQi8_Z7nVVZOxy87FqDiin9uW7cWw&s=10',
        'description' => 'Translucent crystal acetate frame housing rich yellow anti-fatigue optical lenses.'
    ],
    [
        'id' => 210, 'name' => 'Deep Charcoal Square Sunglasses', 'category' => 'Sunglasses', 'badge' => 'CHARCOAL SHADE', 'price' => 3499.00, 'rating' => '4.8',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThTiaNZPE_F0l66Z2tytW4gWRY9URo6hCZIRGGNkSL1Q&s=10',
        'description' => 'Deep charcoal tinted square lenses providing 100% UV protection with classic style.'
    ],
    [
        'id' => 211, 'name' => 'Retro Golden Flame Aviators', 'category' => 'Sunglasses', 'badge' => 'GOLDEN FLAME', 'price' => 3999.00, 'rating' => '4.9',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSI3tFrtzZPUBgj-T3Chy5ZYW_telWjhqLFfIFGLIqWyg&s=10',
        'description' => 'Double-bridge aviator frame with vibrant yellow sunset mirror lenses for high fashion.'
    ],
    [
        'id' => 212, 'name' => 'Midnight Matte Polarized Lens', 'category' => 'Sunglasses', 'badge' => 'MIDNIGHT MATTE', 'price' => 3299.00, 'rating' => '5.0',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6bZg0iEORNwlegjwV-NBYsU7PyKZMuESgsahSuR_q4Q&s=10',
        'description' => 'Midnight dark polarized lenses with soft-touch matte black bio-acetate frame.'
    ],

    // CONTACT LENSES (301 - 312)
    [
        'id' => 301, 'name' => 'Aquacolor Emerald Green Cosmetic Lenses', 'category' => 'Contact Lenses', 'badge' => 'EMERALD GREEN', 'price' => 1299.00, 'rating' => '4.9',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbV3qKk-GFTACaMigc9a2L988umrn2JFavRoYbTfkhQA&s=10',
        'description' => 'Hydration-rich emerald green monthly cosmetic lenses with ultra-soft breathable comfort.'
    ],
    [
        'id' => 302, 'name' => 'Aquacolor Ocean Sapphire Blue Lenses', 'category' => 'Contact Lenses', 'badge' => 'SAPPHIRE BLUE', 'price' => 1399.00, 'rating' => '5.0',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNZ7fK3j5VgO7N5W13Wl72tKk2he2rOAAcOunhIIc7IQ&s=10',
        'description' => 'Vibrant ocean sapphire blue natural eyeball iris lenses with high oxygen permeability.'
    ],
    [
        'id' => 303, 'name' => 'Aquacolor Honey Hazel Cosmetic Eyes', 'category' => 'Contact Lenses', 'badge' => 'HONEY HAZEL', 'price' => 1249.00, 'rating' => '4.8',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBQpJvugWeU07rKrIoq608cVW_QhHe_RhF7yLIES6Xrw&s',
        'description' => 'Warm honey hazel brown color contact lenses with high moisture retention.'
    ],
    [
        'id' => 304, 'name' => 'Aquacolor Amethyst Violet Lenses', 'category' => 'Contact Lenses', 'badge' => 'VIOLET SHADE', 'price' => 1499.00, 'rating' => '4.9',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2uZdxyH_L8xPYayh4nbKMp_WaxrH8jFyMn-iEnl22CA&s',
        'description' => 'Striking amethyst purple violet natural iris cosmetic contact lenses.'
    ],
    [
        'id' => 305, 'name' => 'Aquacolor Turquoise Aqua Blue Lens', 'category' => 'Contact Lenses', 'badge' => 'TURQUOISE AQUA', 'price' => 1299.00, 'rating' => '5.0',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5Xuwtl8xMP8c4O0ilsX8Jv9I-vAVWSe-c5Ug6cllKTQ&s',
        'description' => 'Luminous turquoise sea blue soft contact lenses for a radiant eyeball look.'
    ],
    [
        'id' => 306, 'name' => 'Aquacolor Warm Amber Hazel Lens', 'category' => 'Contact Lenses', 'badge' => 'HAZEL AMBER', 'price' => 1349.00, 'rating' => '4.8',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTVhfNwLfT879mf_AVCDr6HqNN0xjMLHIK_UOvQh0-8A&s=10',
        'description' => 'Soft hazel amber tone cosmetic lenses designed for sensitive modern eyes.'
    ],
    [
        'id' => 307, 'name' => 'Aquacolor Pastel Rose Pink Lenses', 'category' => 'Contact Lenses', 'badge' => 'ROSE PINK', 'price' => 1399.00, 'rating' => '4.7',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2AEYLMl628kGQNdtllxLK0hK-dz8nl0MO88oxjvvf7w&s=10',
        'description' => 'Delicate pastel rose pink shade monthly cosmetic contact lenses.'
    ],
    [
        'id' => 308, 'name' => 'Aquacolor Sterling Crystal Gray', 'category' => 'Contact Lenses', 'badge' => 'STERLING GRAY', 'price' => 1449.00, 'rating' => '4.9',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTVhfNwLfT879mf_AVCDr6HqNN0xjMLHIK_UOvQh0-8A&s=10',
        'description' => 'Luminous silver crystal gray iris contact lenses for expressive eyes.'
    ],
    [
        'id' => 309, 'name' => 'Aquacolor Arctic Ice Blue Lenses', 'category' => 'Contact Lenses', 'badge' => 'ARCTIC ICE', 'price' => 1399.00, 'rating' => '5.0',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQitpchytjxv-st_6r1KxQLHcWjG4lrBgYGJ_e2u93Raw&s',
        'description' => 'High contrast arctic ice light blue cosmetic iris contact lenses.'
    ],
    [
        'id' => 310, 'name' => 'Aquacolor Deep Ruby Red Lenses', 'category' => 'Contact Lenses', 'badge' => 'RUBY RED', 'price' => 1499.00, 'rating' => '4.9',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkjR1ZXUrEbjo-fA5scpA0_WYp1o8coVLafz1PNgzxBg&s',
        'description' => 'Bold ruby red dramatic cosmetic lenses with high hydration technology.'
    ],
    [
        'id' => 311, 'name' => 'Aquacolor Golden Amber Bronze', 'category' => 'Contact Lenses', 'badge' => 'GOLDEN BRONZE', 'price' => 1299.00, 'rating' => '4.8',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgQs0mId5Ou-ul1qjLMXrsYUnLL68SjxUwTjlNea-jxA&s=10',
        'description' => 'Vibrant golden amber bronze tone natural iris contact lenses.'
    ],
    [
        'id' => 312, 'name' => 'Aquacolor Obsidian Black Lenses', 'category' => 'Contact Lenses', 'badge' => 'OBSIDIAN BLACK', 'price' => 1199.00, 'rating' => '5.0',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRx5OgidQBqToHO9O0KJ5ivJ-W9O4Xh4vmqA_pzgnCqbg&s=10',
        'description' => 'Deep obsidian jet black enlarging iris ring cosmetic lenses.'
    ]
];

$displayedProducts = [];
if (!empty($categoryFilter)) {
    foreach ($productsCatalog as $item) {
        if (strcasecmp($item['category'], $categoryFilter) === 0) {
            $displayedProducts[] = $item;
        }
    }
} else {
    $displayedProducts = $productsCatalog;
}
?>

<section class="max-w-7xl mx-auto px-6 py-12 text-slate-900">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <h1 class="serif-title text-3xl font-extrabold text-slate-900">
                <?php echo !empty($categoryFilter) ? htmlspecialchars($categoryFilter) : 'All Eyewear Collections'; ?>
            </h1>
            <p class="text-xs text-slate-500 mt-1">Explore our 2026 luxury collection with live AR virtual fitting studio.</p>
        </div>
        
        <div class="flex items-center space-x-2 text-xs font-semibold">
            <a href="products.php" class="px-4 py-2 rounded-full border <?php echo empty($categoryFilter) ? 'bg-slate-900 text-white border-slate-900' : 'bg-slate-50 text-slate-600 border-slate-200 hover:bg-slate-100'; ?> transition">All</a>
            <a href="products.php?category=Eyeglasses" class="px-4 py-2 rounded-full border <?php echo ($categoryFilter === 'Eyeglasses') ? 'bg-slate-900 text-white border-slate-900' : 'bg-slate-50 text-slate-600 border-slate-200 hover:bg-slate-100'; ?> transition">Eyeglasses</a>
            <a href="products.php?category=Sunglasses" class="px-4 py-2 rounded-full border <?php echo ($categoryFilter === 'Sunglasses') ? 'bg-slate-900 text-white border-slate-900' : 'bg-slate-50 text-slate-600 border-slate-200 hover:bg-slate-100'; ?> transition">Sunglasses</a>
            <a href="products.php?category=Contact Lenses" class="px-4 py-2 rounded-full border <?php echo ($categoryFilter === 'Contact Lenses') ? 'bg-slate-900 text-white border-slate-900' : 'bg-slate-50 text-slate-600 border-slate-200 hover:bg-slate-100'; ?> transition">Contact Lenses</a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <?php foreach ($displayedProducts as $item): ?>
            <div class="bg-white rounded-3xl border border-slate-100 p-5 shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                
                <div class="space-y-4">
                    <div class="bg-slate-100 rounded-2xl aspect-[4/5] w-full relative overflow-hidden flex items-center justify-center">
                        <span class="absolute top-3 left-3 bg-slate-900 text-white font-extrabold text-[9px] uppercase tracking-widest px-3 py-1 rounded-full shadow-md z-10">
                            <?php echo htmlspecialchars($item['badge']); ?>
                        </span>
                        <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>

                    <div>
                        <div class="flex items-center space-x-1 text-amber-400 text-[10px] mb-1">
                            <i class="fa-solid fa-star"></i>
                            <span class="font-bold text-slate-500 ml-1">(<?php echo htmlspecialchars($item['rating']); ?>)</span>
                        </div>
                        <h3 class="font-extrabold text-sm text-slate-900 leading-snug group-hover:text-sky-500 transition line-clamp-1">
                            <?php echo htmlspecialchars($item['name']); ?>
                        </h3>
                        <p class="text-[11px] text-slate-400 mt-1 line-clamp-2">
                            <?php echo htmlspecialchars($item['description']); ?>
                        </p>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 mt-4 space-y-3">
                    <div class="flex items-baseline justify-between">
                        <div>
                            <span class="text-[10px] text-slate-400 uppercase font-bold block">PRICE</span>
                            <span class="text-base font-black text-slate-900">₹<?php echo number_format($item['price'], 2); ?></span>
                        </div>
                        <a href="product-details.php?id=<?php echo $item['id']; ?>" class="bg-slate-900 text-white text-[11px] font-extrabold px-3.5 py-2 rounded-full hover:bg-sky-500 transition shadow-sm flex items-center space-x-1">
                            <span>VIEW</span>
                            <i class="fa-solid fa-arrow-right text-[9px]"></i>
                        </a>
                    </div>

                    <a href="cart.php?action=add&id=<?php echo $item['id']; ?>" class="w-full py-2.5 rounded-full bg-sky-50 text-sky-600 font-extrabold text-[11px] hover:bg-sky-500 hover:text-white transition flex items-center justify-center space-x-1.5 border border-sky-100">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>ADD TO CART</span>
                    </a>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>