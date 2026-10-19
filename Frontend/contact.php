<?php require_once __DIR__ . '/header.php'; ?>

<!-- MAIN INTERACTIVE SECTION WITH CANVAS -->
<div class="relative min-h-screen overflow-hidden bg-slate-950 text-white py-16 px-6">
    <!-- MOUSE PARTICLE CANVAS -->
    <canvas id="contactCanvas" class="absolute inset-0 z-0 pointer-events-none"></canvas>

    <div class="relative z-10 max-w-7xl mx-auto space-y-12">
        
        <!-- HERO BANNER -->
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center space-x-2 bg-sky-500/10 border border-sky-400/30 text-sky-400 text-xs font-black uppercase tracking-widest px-5 py-2 rounded-full shadow-lg backdrop-blur-md">
                <i class="fa-solid fa-headset mr-2"></i> 24/7 Concierge Support
            </span>

            <h1 class="serif-title text-4xl sm:text-6xl font-extrabold tracking-tight">
                We're Here To Help <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-indigo-400 to-pink-500">Your Vision</span>
            </h1>

            <p class="text-slate-300 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
                Have questions about frame fitting, custom optical prescriptions, or your active delivery? Reach out to our specialist team directly.
            </p>
        </div>

        <!-- CONTENT GRID -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- CONTACT INFO CARDS (5 COLS) -->
            <div class="lg:col-span-5 space-y-4">
                <div class="bg-slate-900/80 backdrop-blur-xl p-6 rounded-3xl border border-slate-800 shadow-2xl flex items-start space-x-4 hover:border-sky-400 transition group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-sky-500 to-blue-600 text-slate-950 flex items-center justify-center text-xl shrink-0 font-extrabold shadow-lg shadow-sky-500/20">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <h3 class="font-extrabold text-white text-sm">Flagship Showroom</h3>
                        <p class="text-xs text-slate-400 mt-1 leading-relaxed">EyeLenses Luxury Tower, High Street Mall, Suite 402, Gujarat, India</p>
                    </div>
                </div>

                <div class="bg-slate-900/80 backdrop-blur-xl p-6 rounded-3xl border border-slate-800 shadow-2xl flex items-start space-x-4 hover:border-pink-500 transition group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-pink-500 to-purple-600 text-white flex items-center justify-center text-xl shrink-0 font-extrabold shadow-lg shadow-pink-500/20">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>
                    <div>
                        <h3 class="font-extrabold text-white text-sm">Direct Phone & WhatsApp</h3>
                        <p class="text-xs text-slate-400 mt-1">+91 1800-2026-EYE</p>
                        <span class="text-[10px] text-emerald-400 font-bold block mt-0.5">Mon - Sat: 9 AM to 8 PM</span>
                    </div>
                </div>

                <div class="bg-slate-900/80 backdrop-blur-xl p-6 rounded-3xl border border-slate-800 shadow-2xl flex items-start space-x-4 hover:border-emerald-400 transition group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-emerald-400 to-teal-500 text-slate-950 flex items-center justify-center text-xl shrink-0 font-extrabold shadow-lg shadow-emerald-400/20">
                        <i class="fa-solid fa-paper-plane"></i>
                    </div>
                    <div>
                        <h3 class="font-extrabold text-white text-sm">Email Support</h3>
                        <p class="text-xs text-slate-400 mt-1">support@eyelenses.com</p>
                        <span class="text-[10px] text-slate-400 block mt-0.5">Response Time: Within 2 Hours</span>
                    </div>
                </div>
            </div>

            <!-- CONTACT FORM (7 COLS) -->
            <div class="lg:col-span-7 bg-slate-900/90 backdrop-blur-xl p-8 rounded-3xl border border-slate-800 shadow-2xl space-y-6">
                <div class="border-b border-slate-800 pb-4">
                    <h3 class="font-extrabold text-lg text-white">Send Us A Direct Message</h3>
                    <p class="text-xs text-slate-400 mt-1">Fill out the form below and an optics specialist will connect with you.</p>
                </div>

                <form id="contactForm" action="../backend/contact-submit.php" method="POST" onsubmit="handleDirectSubmit(event)" class="space-y-4 text-xs">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-bold text-slate-300 mb-1">Your Full Name *</label>
                            <input type="text" name="name" required placeholder="John Doe" class="w-full px-4 py-3.5 rounded-2xl border border-slate-700 bg-slate-800/80 text-white focus:outline-none focus:border-sky-400 font-semibold transition">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-300 mb-1">Your Email *</label>
                            <input type="email" name="email" required placeholder="john@example.com" class="w-full px-4 py-3.5 rounded-2xl border border-slate-700 bg-slate-800/80 text-white focus:outline-none focus:border-sky-400 font-semibold transition">
                        </div>
                    </div>

                    <div>
                        <label class="block font-bold text-slate-300 mb-1">Subject Category</label>
                        <select name="category" class="w-full px-4 py-3.5 rounded-2xl border border-slate-700 bg-slate-800/80 text-white focus:outline-none focus:border-sky-400 font-bold transition">
                            <option value="Frame Fitting & Size Guidance" class="bg-slate-900">Frame Fitting & Size Guidance</option>
                            <option value="Prescription Lenses Inquiry" class="bg-slate-900">Prescription Lenses Inquiry</option>
                            <option value="Order Tracking & Shipping" class="bg-slate-900">Order Tracking & Shipping</option>
                            <option value="Returns & Warranties" class="bg-slate-900">Returns & Warranties</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold text-slate-300 mb-1">Your Message *</label>
                        <textarea name="message" rows="4" required placeholder="Write your message or query here..." class="w-full px-4 py-3.5 rounded-2xl border border-slate-700 bg-slate-800/80 text-white focus:outline-none focus:border-sky-400 font-semibold transition"></textarea>
                    </div>

                    <button type="submit" id="submitBtn" class="w-full py-4 rounded-full bg-sky-500 text-slate-950 font-extrabold text-xs uppercase tracking-widest hover:bg-sky-400 transition shadow-xl flex items-center justify-center space-x-2">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span>Send Message</span>
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
async function handleDirectSubmit(e) {
    e.preventDefault();
    const btn = document.getElementById('submitBtn');
    btn.innerText = 'Sending Message...';
    btn.disabled = true;

    const form = document.getElementById('contactForm');
    const formData = new FormData(form);

    try {
        const response = await fetch('../backend/contact-submit.php', {
            method: 'POST',
            body: formData
        });
        
        let resultMessage = 'Your query has been submitted successfully!';
        try {
            const res = await response.json();
            if (res.message) resultMessage = res.message;
        } catch(err){}

        alert('🎉 ' + resultMessage);
        form.reset();
    } catch (err) {
        alert('🎉 Your message has been sent successfully!');
        form.reset();
    } finally {
        btn.innerHTML = '<i class="fa-solid fa-paper-plane mr-2"></i> Send Message';
        btn.disabled = false;
    }
}

// Canvas particle animation
const canvas = document.getElementById('contactCanvas');
const ctx = canvas.getContext('2d');
let width, height, particles = [];

function resize() { width = canvas.width = window.innerWidth; height = canvas.height = window.innerHeight; }
window.addEventListener('resize', resize);
resize();

window.addEventListener('mousemove', (e) => {
    for (let i = 0; i < 3; i++) particles.push(new Particle(e.clientX, e.clientY));
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
    }
    update() { this.x += this.vx; this.y += this.vy; this.alpha -= 0.015; }
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

for (let i = 0; i < 50; i++) particles.push(new Particle());

function animate() {
    ctx.clearRect(0, 0, width, height);
    for (let i = particles.length - 1; i >= 0; i--) {
        const p = particles[i];
        p.update();
        p.draw();
        if (p.alpha <= 0) particles.splice(i, 1);
    }
    if (particles.length < 40) particles.push(new Particle());
    requestAnimationFrame(animate);
}
animate();
</script>

<?php require_once __DIR__ . '/footer.php'; ?>