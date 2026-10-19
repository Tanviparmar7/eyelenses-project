<?php require_once __DIR__ . '/header.php'; ?>

<!-- Animation Assets & FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<!-- MEDIAPIPE LIBRARIES FOR REAL-TIME FACE LANDMARK TRACKING -->
<script src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils/camera_utils.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@mediapipe/face_mesh/face_mesh.js" crossorigin="anonymous"></script>

<!-- HERO SECTION WITH SHINY GRADIENTS & AUTOMATIC 3-SECOND CAROUSEL -->
<section class="bg-gradient-to-b from-[#090D16] via-[#0D1424] to-[#090D16] text-white min-h-[88vh] relative overflow-hidden flex items-center">
    
    <!-- Shiny Background Ambient Glows -->
    <div class="absolute top-10 left-10 w-96 h-96 bg-sky-500/15 rounded-full blur-[120px] pointer-events-none animate-pulse"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-pink-500/15 rounded-full blur-[120px] pointer-events-none animate-pulse"></div>

    <div class="max-w-7xl mx-auto px-6 py-12 w-full grid grid-cols-1 lg:grid-cols-2 items-center gap-12 relative z-10">
        
        <!-- Left Side: Hero Text & Badges -->
        <div class="space-y-6 animate__animated animate__fadeInLeft">
            <div class="inline-flex items-center space-x-2 px-4 py-2 bg-gradient-to-r from-sky-500/20 to-pink-500/20 border border-sky-400/30 text-sky-300 rounded-full text-xs font-bold uppercase tracking-widest backdrop-blur-md shadow-lg shadow-sky-500/10">
                <span class="w-2.5 h-2.5 rounded-full bg-sky-400 animate-ping"></span>
                <span>✨ 2026 Luxury Eyewear Edition</span>
            </div>
            
            <h1 class="serif-title text-5xl sm:text-6xl font-extrabold tracking-tight text-white leading-[1.15]">
                Redefine Your <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-teal-300 to-pink-400">Visual Identity</span>
            </h1>

            <p class="text-slate-300 text-sm sm:text-base max-w-lg leading-relaxed font-normal">
                Handcrafted luxury optical frames, UV400 polarized sunglasses, and hydration-rich contact lenses. Designed for ultimate precision, lightweight comfort, and high fashion.
            </p>

            <!-- Interactive Action Buttons -->
           <div class="flex flex-wrap items-center gap-4 pt-4">
    <a href="products.php" class="px-8 py-4 rounded-full bg-sky-500 text-slate-950 font-extrabold text-xs uppercase tracking-widest hover:bg-sky-400 transition shadow-lg flex items-center space-x-2">
        <span>Explore Collection</span>
        <i class="fa-solid fa-arrow-right"></i>
    </a>
    
    <a href="face-shape-analyzer.php" class="px-8 py-4 rounded-full bg-slate-800/80 text-white font-extrabold text-xs uppercase tracking-widest hover:bg-slate-700 transition border border-slate-700 flex items-center space-x-2 backdrop-blur-md">
        <i class="fa-solid fa-wand-magic-sparkles text-sky-400"></i>
        <span>Face Shape Finder</span>
    </a>
</div>

            <!-- Trust Stats Badge -->
            <div class="pt-6 border-t border-slate-800/80 grid grid-cols-3 gap-4 text-xs text-slate-400">
                <div>
                    <p class="text-white font-extrabold text-lg text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-emerald-300">50K+</p>
                    <p class="text-[11px] font-medium">Happy Customers</p>
                </div>
                <div>
                    <p class="text-white font-extrabold text-lg text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-emerald-300">4.9 ★</p>
                    <p class="text-[11px] font-medium">Verified Reviews</p>
                </div>
                <div>
                    <p class="text-white font-extrabold text-lg text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-emerald-300">100%</p>
                    <p class="text-[11px] font-medium">UV400 Certified</p>
                </div>
            </div>
        </div>

        <!-- Right Side: Auto 3-Second Cross-Fade Image Slider -->
        <div class="relative flex justify-center items-center animate__animated animate__fadeInRight">
            
            <div class="relative w-full max-w-md h-[520px] rounded-3xl overflow-hidden shadow-2xl border-2 border-slate-700/60 bg-slate-900 group">
                
                <!-- Slide 1 -->
                <div class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-100 z-10">
                    <img src="https://images.unsplash.com/photo-1574258495973-f010dfbb5371?q=80&w=1000&auto=format&fit=crop" 
                         alt="Indian Female Model Eyeglasses" 
                         class="w-full h-full object-cover object-top">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#090D16] via-transparent to-transparent opacity-85"></div>
                    <div class="absolute bottom-6 left-6 right-6 z-20">
                        <span class="bg-sky-500 text-slate-950 text-[10px] font-extrabold uppercase px-3 py-1 rounded-full tracking-wider shadow-md">
                            Clear Frame Collection
                        </span>
                        <h3 class="serif-title text-xl font-bold text-white mt-2">Crystal Transparent Acetate</h3>
                        <p class="text-xs text-slate-300">Zero-power blue light protection</p>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-0 z-0">
                    <img src="https://images.unsplash.com/photo-1509695507497-903c140c43b0?q=80&w=1000&auto=format&fit=crop" 
                         alt="Male Model Glasses" 
                         class="w-full h-full object-cover object-top">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#090D16] via-transparent to-transparent opacity-85"></div>
                    <div class="absolute bottom-6 left-6 right-6 z-20">
                        <span class="bg-pink-500 text-white text-[10px] font-extrabold uppercase px-3 py-1 rounded-full tracking-wider shadow-md">
                            Gentlemen Optics
                        </span>
                        <h3 class="serif-title text-xl font-bold text-white mt-2">Rose Gold Square Profile</h3>
                        <p class="text-xs text-slate-300">Ultra-lightweight titanium frame</p>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-0 z-0">
                    <img src="https://images.unsplash.com/photo-1508296695146-257a814070b4?q=80&w=1000&auto=format&fit=crop" 
                         alt="Blue Top Female Model" 
                         class="w-full h-full object-cover object-center">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#090D16] via-transparent to-transparent opacity-85"></div>
                    <div class="absolute bottom-6 left-6 right-6 z-20">
                        <span class="bg-emerald-400 text-slate-950 text-[10px] font-extrabold uppercase px-3 py-1 rounded-full tracking-wider shadow-md">
                            Fashion Series
                        </span>
                        <h3 class="serif-title text-xl font-bold text-white mt-2">Comfort Nose Pad Eyeglasses</h3>
                        <p class="text-xs text-slate-300">Ergonomic fit for all-day wear</p>
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-0 z-0">
                    <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?q=80&w=1000&auto=format&fit=crop" 
                         alt="Contact Lenses Model" 
                         class="w-full h-full object-cover object-center">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#090D16] via-transparent to-transparent opacity-85"></div>
                    <div class="absolute bottom-6 left-6 right-6 z-20">
                        <span class="bg-purple-500 text-white text-[10px] font-extrabold uppercase px-3 py-1 rounded-full tracking-wider shadow-md">
                            HydraLuxe Lenses
                        </span>
                        <h3 class="serif-title text-xl font-bold text-white mt-2">Premium Color Contact Lenses</h3>
                        <p class="text-xs text-slate-300">98% Moisture retention for glowing eyes</p>
                    </div>
                </div>

                <!-- Floating Virtual Try-On Badge -->
                <button onclick="openModal('tryOnModal')" 
                        class="absolute top-5 right-5 z-30 bg-slate-900/90 backdrop-blur-md text-sky-300 text-xs font-bold px-4 py-2.5 rounded-full border border-sky-500/40 shadow-xl hover:scale-105 transition flex items-center">
                    <i class="fa-solid fa-camera text-pink-400 mr-2"></i> Virtual Try-On
                </button>

                <!-- Slider Dots Indicator -->
                <div class="absolute top-6 left-6 z-30 flex space-x-1.5">
                    <span class="slider-dot w-5 h-2.5 rounded-full bg-white transition-all"></span>
                    <span class="slider-dot w-2.5 h-2.5 rounded-full bg-white/40 transition-all"></span>
                    <span class="slider-dot w-2.5 h-2.5 rounded-full bg-white/40 transition-all"></span>
                    <span class="slider-dot w-2.5 h-2.5 rounded-full bg-white/40 transition-all"></span>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- MODAL: ADVANCED AI WEBCAM VIRTUAL TRY-ON (FIXED HEADER & FULLSCREEN CONTROLS) -->
<div id="tryOnModal" class="fixed inset-0 bg-slate-950/90 backdrop-blur-md z-50 hidden flex items-center justify-center p-3 sm:p-6 overflow-y-auto">
    <div id="tryOnCard" class="bg-slate-900 text-white rounded-3xl max-w-xl w-full p-5 sm:p-7 relative shadow-2xl border border-slate-800 max-h-[92vh] flex flex-col justify-between overflow-y-auto transition-all duration-300">
        
        <!-- STICKY TOP HEADER CONTROL BAR -->
        <div class="sticky top-0 z-50 bg-slate-900/95 backdrop-blur-md py-2 border-b border-slate-800/80 flex items-center justify-between mb-3">
            <h2 class="serif-title text-lg sm:text-xl font-bold flex items-center text-sky-300">
                <i class="fa-solid fa-glasses text-sky-400 mr-2"></i> AR Realistic Glasses Fitting
            </h2>
            <div class="flex items-center space-x-2 sm:space-x-3 bg-slate-800/80 px-3 py-1.5 rounded-full border border-slate-700">
                <button onclick="toggleFullScreenTryOn()" id="fullScreenBtn" title="Toggle Size" class="text-slate-300 hover:text-white transition flex items-center text-xs font-bold">
                    <i class="fa-solid fa-expand mr-1 text-sky-400"></i> <span id="fullScreenText">Expand</span>
                </button>
                <span class="text-slate-600">|</span>
                <button onclick="closeModal('tryOnModal'); stopWebcam();" title="Close" class="text-slate-300 hover:text-pink-400 transition flex items-center text-xs font-bold">
                    <i class="fa-solid fa-xmark text-sm mr-1"></i> Close
                </button>
            </div>
        </div>

        <p class="text-[11px] sm:text-xs text-slate-400 mb-3">
            Sliders ka use karke chashme ka size, height aur vertical position adjust karein.
        </p>

        <!-- Live Camera Container -->
        <div id="cameraBox" class="bg-slate-950 h-64 sm:h-72 rounded-2xl border border-slate-800 overflow-hidden relative flex items-center justify-center shadow-inner transition-all duration-300">
            <video id="webcamVideo" autoplay playsinline class="hidden"></video>
            <canvas id="outputCanvas" class="w-full h-full object-cover hidden transform -scale-x-100"></canvas>

            <!-- Camera Offline Placeholder -->
            <div id="cameraPlaceholder" class="flex flex-col items-center space-y-2 p-4 text-center">
                <div class="w-12 h-12 rounded-full bg-sky-500/10 flex items-center justify-center text-sky-400 text-xl mb-1">
                    <i class="fa-solid fa-video"></i>
                </div>
                <p class="text-xs font-bold text-slate-300">Camera preview is offline</p>
                <p class="text-[11px] text-slate-500 max-w-xs">Click 'Start AI Live Try-On' to enable camera & 3D face tracking.</p>
            </div>
        </div>

        <!-- LIVE ADJUSTMENT CONTROLS FOR REALISTIC FIT -->
        <div class="mt-3 p-3 rounded-2xl bg-slate-950/60 border border-slate-800/80 space-y-2">
            <div class="grid grid-cols-2 gap-3 text-xs">
                <div>
                    <div class="flex justify-between text-[11px] font-semibold text-slate-300 mb-1">
                        <span>Frame Size:</span>
                        <span id="scaleVal" class="text-sky-400">1.65</span>
                    </div>
                    <input type="range" id="scaleSlider" min="1.0" max="2.5" step="0.05" value="1.65" oninput="updateAdjustmentControls()" class="w-full accent-sky-400 h-1 bg-slate-700 rounded-lg cursor-pointer">
                </div>

                <div>
                    <div class="flex justify-between text-[11px] font-semibold text-slate-300 mb-1">
                        <span>Position Up/Down:</span>
                        <span id="posYVal" class="text-sky-400">0px</span>
                    </div>
                    <input type="range" id="posYSlider" min="-30" max="30" step="1" value="0" oninput="updateAdjustmentControls()" class="w-full accent-sky-400 h-1 bg-slate-700 rounded-lg cursor-pointer">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3 text-xs pt-1">
                <div>
                    <div class="flex justify-between text-[11px] font-semibold text-slate-300 mb-1">
                        <span>Width Scale:</span>
                        <span id="widthVal" class="text-sky-400">1.0</span>
                    </div>
                    <input type="range" id="widthSlider" min="0.7" max="1.4" step="0.05" value="1.0" oninput="updateAdjustmentControls()" class="w-full accent-sky-400 h-1 bg-slate-700 rounded-lg cursor-pointer">
                </div>

                <div>
                    <div class="flex justify-between text-[11px] font-semibold text-slate-300 mb-1">
                        <span>Height Scale:</span>
                        <span id="heightVal" class="text-sky-400">0.9</span>
                    </div>
                    <input type="range" id="heightSlider" min="0.5" max="1.3" step="0.05" value="0.9" oninput="updateAdjustmentControls()" class="w-full accent-sky-400 h-1 bg-slate-700 rounded-lg cursor-pointer">
                </div>
            </div>
        </div>

        <!-- Glasses Selector Bar -->
        <div class="mt-3 pt-2 border-t border-slate-800">
            <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Select Try-On Frame:</label>
            <div class="grid grid-cols-3 gap-2">
                <button onclick="setFrameType('classic')" 
                        class="p-2 rounded-xl bg-slate-800 border border-slate-700 hover:border-sky-400 text-[11px] font-bold text-white text-center transition">
                    👓 Classic Square
                </button>
                <button onclick="setFrameType('round')" 
                        class="p-2 rounded-xl bg-slate-800 border border-slate-700 hover:border-sky-400 text-[11px] font-bold text-white text-center transition">
                    🕶️ Round Tinted
                </button>
                <button onclick="setFrameType('transparent')" 
                        class="p-2 rounded-xl bg-slate-800 border border-slate-700 hover:border-sky-400 text-[11px] font-bold text-white text-center transition">
                    💎 Crystal Frame
                </button>
            </div>
        </div>

        <button id="startCamBtn" onclick="startWebcam()" 
                class="btn-pill bg-gradient-to-r from-sky-400 to-sky-500 text-slate-950 font-extrabold w-full py-3 text-xs uppercase tracking-widest hover:from-sky-300 hover:to-sky-400 transition mt-3 shadow-lg shadow-sky-500/20">
            Start AI Live Try-On
        </button>
    </div>
</div>

<!-- SCRIPTS FOR HERO SLIDER & MEDIAPIPE FACE TRACKING -->
<script>
let cameraUtils = null;
let faceMesh = null;
let currentFrameKey = 'classic';
let isCameraActive = false;

// Fitting Adjustment Variables
let customScale = 1.65;
let customPosY = 0;
let customWidthMult = 1.0;
let customHeightMult = 0.9;

function updateAdjustmentControls() {
    customScale = parseFloat(document.getElementById('scaleSlider').value);
    customPosY = parseInt(document.getElementById('posYSlider').value);
    customWidthMult = parseFloat(document.getElementById('widthSlider').value);
    customHeightMult = parseFloat(document.getElementById('heightSlider').value);

    document.getElementById('scaleVal').innerText = customScale.toFixed(2);
    document.getElementById('posYVal').innerText = customPosY + 'px';
    document.getElementById('widthVal').innerText = customWidthMult.toFixed(2);
    document.getElementById('heightVal').innerText = customHeightMult.toFixed(2);
}

// Hero Cross-fade Slider
let currentSlide = 0;
function initHeroSlider() {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.slider-dot');
    if (slides.length === 0) return;

    setInterval(() => {
        slides[currentSlide].classList.remove('opacity-100', 'z-10');
        slides[currentSlide].classList.add('opacity-0', 'z-0');
        dots[currentSlide].classList.remove('bg-white', 'w-5');
        dots[currentSlide].classList.add('bg-white/40', 'w-2.5');

        currentSlide = (currentSlide + 1) % slides.length;

        slides[currentSlide].classList.remove('opacity-0', 'z-0');
        slides[currentSlide].classList.add('opacity-100', 'z-10');
        dots[currentSlide].classList.remove('bg-white/40', 'w-2.5');
        dots[currentSlide].classList.add('bg-white', 'w-5');
    }, 3000);
}
document.addEventListener('DOMContentLoaded', initHeroSlider);

function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

// Real-Time AI Face Mesh Tracking
async function startWebcam() {
    const video = document.getElementById('webcamVideo');
    const canvas = document.getElementById('outputCanvas');
    const placeholder = document.getElementById('cameraPlaceholder');
    const btn = document.getElementById('startCamBtn');

    btn.innerText = "Loading AI Face Detection...";
    
    faceMesh = new FaceMesh({
        locateFile: (file) => `https://cdn.jsdelivr.net/npm/@mediapipe/face_mesh/${file}`
    });

    faceMesh.setOptions({
        maxNumFaces: 1,
        refineLandmarks: true,
        minDetectionConfidence: 0.5,
        minTrackingConfidence: 0.5
    });

    faceMesh.onResults(onFaceResults);

    cameraUtils = new Camera(video, {
        onFrame: async () => {
            if (isCameraActive) {
                await faceMesh.send({ image: video });
            }
        },
        width: 640,
        height: 480
    });

    try {
        await cameraUtils.start();
        isCameraActive = true;
        canvas.classList.remove('hidden');
        placeholder.classList.add('hidden');
        btn.innerText = "AI Tracking Active • Fitting Real Glasses";
        btn.className = "btn-pill bg-emerald-500 text-slate-950 font-extrabold w-full py-3 text-xs uppercase tracking-widest cursor-default mt-3";
    } catch (err) {
        alert("Camera permission is required for AI Virtual Try-On.");
        console.error("Camera Error:", err);
        btn.innerText = "Start AI Live Try-On";
    }
}

function stopWebcam() {
    isCameraActive = false;
    if (cameraUtils) { cameraUtils.stop(); }
    
    const canvas = document.getElementById('outputCanvas');
    const placeholder = document.getElementById('cameraPlaceholder');
    const btn = document.getElementById('startCamBtn');

    if (canvas && placeholder && btn) {
        canvas.classList.add('hidden');
        placeholder.classList.remove('hidden');
        btn.innerText = "Start AI Live Try-On";
        btn.className = "btn-pill bg-gradient-to-r from-sky-400 to-sky-500 text-slate-950 font-extrabold w-full py-3 text-xs uppercase tracking-widest hover:from-sky-300 hover:to-sky-400 transition mt-3 shadow-lg shadow-sky-500/20";
    }
}

function setFrameType(type) {
    currentFrameKey = type;
}

// ULTRA-REALISTIC CANVAS VECTOR GLASSES WITH SHADOWS & REFLECTIONS
function drawRealisticGlasses(ctx, x, y, width, height, type) {
    ctx.save();
    
    // Add Drop Shadow for 3D depth
    ctx.shadowColor = 'rgba(0, 0, 0, 0.45)';
    ctx.shadowBlur = 12;
    ctx.shadowOffsetY = 6;

    const lensWidth = width * 0.42;
    const lensHeight = height;
    const bridgeGap = width * 0.16;

    if (type === 'classic') {
        ctx.strokeStyle = '#0f172a';
        ctx.fillStyle = 'rgba(15, 23, 42, 0.08)';
        ctx.lineWidth = Math.max(3, width * 0.06);

        ctx.beginPath();
        ctx.roundRect(x, y, lensWidth, lensHeight, [12, 12, 8, 8]);
        ctx.fill();
        ctx.stroke();

        ctx.beginPath();
        ctx.roundRect(x + lensWidth + bridgeGap, y, lensWidth, lensHeight, [12, 12, 8, 8]);
        ctx.fill();
        ctx.stroke();

        ctx.beginPath();
        ctx.lineWidth = Math.max(2, width * 0.05);
        ctx.moveTo(x + lensWidth, y + lensHeight * 0.25);
        ctx.quadraticCurveTo(x + lensWidth + bridgeGap / 2, y + lensHeight * 0.15, x + lensWidth + bridgeGap, y + lensHeight * 0.25);
        ctx.stroke();

    } else if (type === 'round') {
        ctx.strokeStyle = '#b45309';
        ctx.fillStyle = 'rgba(20, 30, 45, 0.55)';
        ctx.lineWidth = Math.max(3, width * 0.05);

        const r = lensHeight / 2;

        ctx.beginPath();
        ctx.arc(x + r, y + r, r, 0, Math.PI * 2);
        ctx.fill();
        ctx.stroke();

        ctx.beginPath();
        ctx.arc(x + lensWidth + bridgeGap + r, y + r, r, 0, Math.PI * 2);
        ctx.fill();
        ctx.stroke();

        ctx.beginPath();
        ctx.moveTo(x + lensWidth, y + r - 2);
        ctx.quadraticCurveTo(x + lensWidth + bridgeGap / 2, y + r - 10, x + lensWidth + bridgeGap, y + r - 2);
        ctx.stroke();

    } else {
        ctx.strokeStyle = 'rgba(255, 255, 255, 0.9)';
        ctx.fillStyle = 'rgba(224, 242, 254, 0.12)';
        ctx.lineWidth = Math.max(3, width * 0.055);

        ctx.beginPath();
        ctx.roundRect(x, y, lensWidth, lensHeight, 14);
        ctx.fill();
        ctx.stroke();

        ctx.beginPath();
        ctx.roundRect(x + lensWidth + bridgeGap, y, lensWidth, lensHeight, 14);
        ctx.fill();
        ctx.stroke();

        ctx.beginPath();
        ctx.moveTo(x + lensWidth, y + lensHeight * 0.22);
        ctx.lineTo(x + lensWidth + bridgeGap, y + lensHeight * 0.22);
        ctx.stroke();
    }

    // Glass Reflection Effect
    ctx.shadowColor = 'transparent';
    ctx.strokeStyle = 'rgba(255, 255, 255, 0.45)';
    ctx.lineWidth = Math.max(1, width * 0.015);

    ctx.beginPath();
    ctx.moveTo(x + lensWidth * 0.2, y + lensHeight * 0.15);
    ctx.lineTo(x + lensWidth * 0.5, y + lensHeight * 0.15);
    ctx.stroke();

    ctx.beginPath();
    ctx.moveTo(x + lensWidth + bridgeGap + lensWidth * 0.2, y + lensHeight * 0.15);
    ctx.lineTo(x + lensWidth + bridgeGap + lensWidth * 0.5, y + lensHeight * 0.15);
    ctx.stroke();

    ctx.restore();
}

// Draw Glasses according to facial landmarks
function onFaceResults(results) {
    const video = document.getElementById('webcamVideo');
    const canvas = document.getElementById('outputCanvas');
    const ctx = canvas.getContext('2d');

    canvas.width = video.videoWidth || 640;
    canvas.height = video.videoHeight || 480;

    ctx.save();
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.drawImage(results.image, 0, 0, canvas.width, canvas.height);

    if (results.multiFaceLandmarks && results.multiFaceLandmarks.length > 0) {
        const landmarks = results.multiFaceLandmarks[0];

        const leftEye = landmarks[33];
        const rightEye = landmarks[263];
        const noseBridge = landmarks[168];

        const lx = leftEye.x * canvas.width;
        const ly = leftEye.y * canvas.height;
        const rx = rightEye.x * canvas.width;
        const ry = rightEye.y * canvas.height;

        const dx = rx - lx;
        const dy = ry - ly;
        const angle = Math.atan2(dy, dx);
        const eyeDistance = Math.sqrt(dx * dx + dy * dy);

        const centerX = noseBridge.x * canvas.width;
        const centerY = (noseBridge.y * canvas.height) + customPosY;

        ctx.translate(centerX, centerY);
        ctx.rotate(angle);

        const baseWidth = eyeDistance * customScale * customWidthMult;
        const baseHeight = (baseWidth * 0.42) * customHeightMult;

        drawRealisticGlasses(ctx, -baseWidth / 2, -baseHeight / 2, baseWidth, baseHeight, currentFrameKey);
    }
    ctx.restore();
}

// TOGGLE FULL SCREEN FIT SAFELY
function toggleFullScreenTryOn() {
    const modalCard = document.getElementById('tryOnCard');
    const cameraBox = document.getElementById('cameraBox');
    const textSpan = document.getElementById('fullScreenText');

    if (cameraBox.classList.contains('h-64') || cameraBox.classList.contains('h-72')) {
        cameraBox.classList.remove('h-64', 'sm:h-72');
        cameraBox.classList.add('h-[50vh]', 'sm:h-[55vh]');
        modalCard.classList.remove('max-w-xl');
        modalCard.classList.add('max-w-3xl');
        if (textSpan) textSpan.innerText = "Minimize";
    } else {
        cameraBox.classList.remove('h-[50vh]', 'sm:h-[55vh]');
        cameraBox.classList.add('h-64', 'sm:h-72');
        modalCard.classList.remove('max-w-3xl');
        modalCard.classList.add('max-w-xl');
        if (textSpan) textSpan.innerText = "Expand";
    }
}
</script>

</body>
</html>