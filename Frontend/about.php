<?php require_once __DIR__ . '/header.php'; ?>

<!-- INTERACTIVE COLORFUL CANVAS BACKGROUND -->
<div class="relative min-h-screen overflow-hidden bg-slate-950 text-white">
    <!-- MOUSE MESH CANVAS -->
    <canvas id="mouseCanvas" class="absolute inset-0 z-0 pointer-events-none"></canvas>

    <!-- CONTENT WRAPPER -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 py-16">
        
        <!-- HEADER TITLE STORY -->
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
            <span class="text-sky-400 font-extrabold text-xs uppercase tracking-widest bg-sky-500/10 px-5 py-2 rounded-full border border-sky-400/30 backdrop-blur-md inline-block shadow-lg">
                <i class="fa-solid fa-wand-magic-sparkles mr-2 text-sky-400"></i> The EyeLenses Story
            </span>
            <h1 class="serif-title text-4xl sm:text-6xl font-extrabold text-white leading-tight">
                Where High Optics Meets <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-indigo-400 to-pink-500">Artificial Intelligence</span>
            </h1>
            <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                EyeLenses was built to eliminate online frame guesswork. By merging Italian bio-acetate frames with real-time MediaPipe AI facial tracking, we bring precision optics directly to your screen.
            </p>
        </div>

        <!-- 3 INTERACTIVE FEATURE CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
            <!-- CARD 1 -->
            <div class="bg-slate-900/80 backdrop-blur-xl p-8 rounded-3xl border border-slate-800 shadow-2xl hover:border-sky-400 transition group hover:-translate-y-1 duration-300">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-sky-500 to-blue-600 text-slate-950 font-black flex items-center justify-center text-xl mb-6 shadow-lg shadow-sky-500/20">
                    01
                </div>
                <h3 class="font-extrabold text-white text-xl mb-2 group-hover:text-sky-400 transition">MediaPipe AI Mesh</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Our embedded analyzer tracks 468 facial points in real-time to calculate cheekbone-to-jawline ratios and suggest frame silhouettes tailored to your geometry.
                </p>
            </div>

            <!-- CARD 2 -->
            <div class="bg-slate-900/80 backdrop-blur-xl p-8 rounded-3xl border border-slate-800 shadow-2xl hover:border-pink-500 transition group hover:-translate-y-1 duration-300">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-pink-500 to-purple-600 text-white font-black flex items-center justify-center text-xl mb-6 shadow-lg shadow-pink-500/20">
                    02
                </div>
                <h3 class="font-extrabold text-white text-xl mb-2 group-hover:text-pink-400 transition">AR Virtual Try-On</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Test frame widths, lens tints, and bridge fits live through your webcam using hardware-accelerated canvas rendering with zero lag.
                </p>
            </div>

            <!-- CARD 3 -->
            <div class="bg-slate-900/80 backdrop-blur-xl p-8 rounded-3xl border border-slate-800 shadow-2xl hover:border-emerald-400 transition group hover:-translate-y-1 duration-300">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-emerald-400 to-teal-500 text-slate-950 font-black flex items-center justify-center text-xl mb-6 shadow-lg shadow-emerald-400/20">
                    03
                </div>
                <h3 class="font-extrabold text-white text-xl mb-2 group-hover:text-emerald-400 transition">36-Piece Luxury Catalog</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    From zero-power blue-light optics to UV400 polarized sunglasses and hydration-rich contact lenses, every item is crafted for modern lifestyles.
                </p>
            </div>
        </div>

        <!-- ACTION BANNER -->
        <div class="bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 rounded-3xl p-8 sm:p-12 border border-slate-700/80 shadow-2xl flex flex-col md:flex-row items-center justify-between gap-8 relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-60 h-60 bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="space-y-3 max-w-xl relative z-10">
                <span class="text-sky-400 font-extrabold text-xs uppercase tracking-widest">Guaranteed Precision</span>
                <h2 class="serif-title text-2xl sm:text-4xl font-extrabold text-white">Ready to find your ideal fit?</h2>
                <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                    Experience effortless shopping with automated cart updates, PDF bill receipt generation, and express nationwide delivery.
                </p>
            </div>

            <div class="flex items-center gap-4 shrink-0 relative z-10">
                <a href="face-shape-analyzer.php" class="px-8 py-4 rounded-full bg-sky-500 text-slate-950 font-extrabold text-xs uppercase tracking-widest hover:bg-sky-400 transition shadow-xl hover:scale-105">
                    Start AI Analysis
                </a>
                <a href="products.php" class="px-8 py-4 rounded-full bg-slate-800 text-white font-extrabold text-xs uppercase tracking-widest hover:bg-slate-700 transition border border-slate-600 hover:scale-105">
                    Explore Catalog
                </a>
            </div>
        </div>

    </div>
</div>

<!-- MOUSE INTERACTIVE ANIMATION SCRIPT -->
<script>
const canvas = document.getElementById('mouseCanvas');
const ctx = canvas.getContext('2d');

let width, height;
let particles = [];
let mouse = { x: null, y: null, radius: 150 };

function resize() {
    width = canvas.width = window.innerWidth;
    height = canvas.height = window.innerHeight;
}

window.addEventListener('resize', resize);
resize();

window.addEventListener('mousemove', (e) => {
    mouse.x = e.clientX;
    mouse.y = e.clientY;

    // Spawn colorful particles on cursor drag
    for (let i = 0; i < 3; i++) {
        particles.push(new Particle(mouse.x, mouse.y));
    }
});

class Particle {
    constructor(x, y) {
        this.x = x || Math.random() * width;
        this.y = y || Math.random() * height;
        this.size = Math.random() * 4 + 1;
        this.vx = (Math.random() - 0.5) * 2;
        this.vy = (Math.random() - 0.5) * 2;
        this.color = `hsla(${Math.random() * 360}, 100%, 65%, `;
        this.alpha = 1;
        this.life = Math.random() * 80 + 40;
    }

    update() {
        this.x += this.vx;
        this.y += this.vy;
        this.alpha -= 0.015;
    }

    draw() {
        ctx.save();
        ctx.globalAlpha = Math.max(this.alpha, 0);
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fillStyle = this.color + this.alpha + ')';
        ctx.shadowBlur = 10;
        ctx.shadowColor = this.color + '1)';
        ctx.fill();
        ctx.restore();
    }
}

// Background ambient floating particles
for (let i = 0; i < 60; i++) {
    particles.push(new Particle());
}

function animate() {
    ctx.clearRect(0, 0, width, height);

    for (let i = particles.length - 1; i >= 0; i--) {
        const p = particles[i];
        p.update();
        p.draw();

        if (p.alpha <= 0) {
            particles.splice(i, 1);
        }
    }

    // Keep ambient particles count stable
    if (particles.length < 50) {
        particles.push(new Particle());
    }

    requestAnimationFrame(animate);
}

animate();
</script>

<?php require_once __DIR__ . '/footer.php'; ?>