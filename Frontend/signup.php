<?php require_once __DIR__ . '/header.php'; ?>

<div class="min-h-[85vh] flex items-center justify-center px-6 py-12">
    <div class="max-w-md w-full bg-white rounded-3xl p-8 shadow-xl border border-slate-100">
        
        <!-- Header Logo & Title -->
        <div class="text-center mb-8">
            <div class="w-12 h-12 rounded-full bg-sky-100 flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-glasses text-brand-blue text-xl"></i>
            </div>
            <h2 class="serif-title text-3xl font-bold text-slate-900">Create Account</h2>
            <p class="text-xs text-slate-500 mt-2 uppercase tracking-wider font-semibold">Join EyeLenses Luxury Club</p>
        </div>

        <!-- Signup Form -->
        <form action="../backend/register.php" method="POST" class="space-y-4">
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Full Name</label>
                <input type="text" name="name" placeholder="John Doe" required 
                       class="w-full bg-slate-50 border border-slate-200 rounded-full px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500 transition">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Email Address</label>
                <input type="email" name="email" placeholder="name@example.com" required 
                       class="w-full bg-slate-50 border border-slate-200 rounded-full px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500 transition">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Password</label>
                <input type="password" name="password" placeholder="••••••••" required 
                       class="w-full bg-slate-50 border border-slate-200 rounded-full px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500 transition">
            </div>

            <button type="submit" 
                    class="btn-pill bg-brand-navy text-white w-full py-3.5 text-xs font-bold uppercase tracking-widest hover:bg-slate-800 transition">
                Create Account <i class="fa-solid fa-arrow-right ml-2"></i>
            </button>
        </form>

        <!-- Redirect to Login -->
        <div class="text-center mt-6 border-t border-slate-100 pt-6">
            <p class="text-xs text-slate-600 font-medium">
                Already have an account? 
                <a href="login.php" class="text-sky-600 font-bold hover:underline ml-1">Log In Here</a>
            </p>
        </div>

    </div>
</div>