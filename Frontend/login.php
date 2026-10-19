<?php require_once __DIR__ . '/header.php'; ?>

<div class="min-h-[88vh] flex items-center justify-center px-6 py-12 relative overflow-hidden bg-slate-900">
    <!-- Eyewear Background Overlay -->
    <div class="absolute inset-0 z-0 opacity-20">
        <img src="https://images.unsplash.com/photo-1508296695146-257a814070b4?q=80&w=1600" class="w-full h-full object-cover">
    </div>

    <div class="max-w-md w-full bg-white/95 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-slate-100 relative z-10">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="w-14 h-14 rounded-full bg-sky-100 flex items-center justify-center mx-auto mb-3 shadow-inner">
                <i class="fa-solid fa-glasses text-sky-600 text-2xl"></i>
            </div>
            <h2 class="serif-title text-3xl font-extrabold text-slate-900">EyeLenses Luxury</h2>
            <p class="text-xs text-slate-500 mt-1 uppercase tracking-wider font-semibold">Sign in to access premium collection</p>
        </div>

        <!-- Login Form -->
        <form action="../backend/authenticate.php" method="POST" class="space-y-4">
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Email Address</label>
                <input type="email" name="email" placeholder="name@example.com" required 
                       class="w-full bg-slate-50 border border-slate-200 rounded-full px-5 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500 transition">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Password</label>
                <input type="password" name="password" placeholder="••••••••" required 
                       class="w-full bg-slate-50 border border-slate-200 rounded-full px-5 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500 transition">
            </div>

            <button type="submit" 
                    class="btn-pill bg-slate-900 text-white w-full py-4 text-xs font-extrabold uppercase tracking-widest hover:bg-sky-600 transition shadow-lg shadow-slate-900/20">
                Sign In To Store <i class="fa-solid fa-arrow-right ml-2"></i>
            </button>
        </form>

        <div class="text-center mt-6 border-t border-slate-100 pt-6">
            <p class="text-xs text-slate-600 font-medium">
                New to EyeLenses? 
                <a href="signup.php" class="text-sky-600 font-bold hover:underline ml-1">Create an Account</a>
            </p>
        </div>

    </div>
</div>