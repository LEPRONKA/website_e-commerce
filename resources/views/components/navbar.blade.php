<nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            
            <!-- Kiri: Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="text-2xl font-bold text-brand-primary tracking-wide">GOLFA<span class="text-brand-secondary">.</span></a>
            </div>

            <!-- Tengah: Desktop Menu -->
            <div class="hidden md:flex space-x-8">
                <a href="/dashboard" class="text-brand-primary font-medium border-b-2 border-brand-primary pb-1 transition">Dashboard</a>
                <a href="#" class="text-gray-600 hover:text-brand-primary font-medium transition">Shop</a>
                <a href="/categories" class="text-gray-600 hover:text-brand-primary font-medium transition">Categories</a>
            </div>

            <!-- Kanan: Icons, Profile, atau Login -->
            <div class="hidden md:flex items-center space-x-6">
                <!-- Form Pencarian Dinamis -->
                <form action="/dashboard" method="GET" class="relative hidden sm:block">
                    <input type="text" name="search" placeholder="Cari produk..." value="{{ request('search') }}" class="w-48 lg:w-64 pl-4 pr-10 py-1.5 border border-gray-200 rounded-full text-sm focus:outline-none focus:border-brand-primary focus:ring-1 focus:ring-brand-primary transition-all">
                    <button type="submit" class="absolute right-0 top-0 mt-1.5 mr-3 text-gray-400 hover:text-brand-primary transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </button>
                </form>
                
                @auth
                    <!-- Icon Cart (Hanya tampil jika login) -->
                    <button class="text-gray-500 hover:text-brand-primary transition relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 100 4 2 2 0 000-4z" /></svg>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">0</span>
                    </button>

                    <!-- Profile Dropdown (Hanya tampil jika login) -->
                    <div class="relative">
                        <button id="profile-btn" class="flex items-center space-x-2 text-gray-700 hover:text-brand-primary transition focus:outline-none">
                            <div class="w-8 h-8 rounded-full bg-brand-primary text-white flex items-center justify-center font-bold text-sm">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <span class="font-medium text-sm">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        
                        <!-- Isi Dropdown (Tersembunyi default) -->
                        <div id="profile-dropdown" class="hidden absolute right-0 mt-3 w-48 bg-white rounded-lg shadow-xl py-2 border border-gray-100 transform origin-top-right transition-all duration-200">
                            <div class="px-4 py-2 border-b border-gray-50 mb-1">
                                <p class="text-xs text-gray-500">Login sebagai</p>
                                <p class="text-sm font-semibold text-gray-800 truncate">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-primary">Profil Saya</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-primary">Pesanan</a>
                            <form action="{{ route('logout') }}" method="POST" class="mt-1 border-t border-gray-50 pt-1">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">Logout</button>
                            </form>
                        </div>
                    </div>
                @endauth

                @guest
                    <!-- Tombol Auth (Hanya tampil jika belum login) -->
                    <a href="/login" class="text-gray-600 hover:text-brand-primary font-medium transition">Login</a>
                    <a href="/register" class="bg-brand-primary hover:bg-blue-800 text-white px-4 py-2 rounded-lg font-medium transition">Register</a>
                @endguest
            </div>

            <!-- Tombol Hamburger Mobile -->
            <div class="flex md:hidden items-center">
                <button id="mobile-menu-btn" class="text-gray-700 hover:text-brand-primary focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Panel Menu Mobile -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-inner">
        <div class="px-4 pt-2 pb-4 space-y-1">
            <a href="/dashboard" class="block px-3 py-2 rounded-md text-base font-medium text-brand-primary bg-blue-50">Dashboard</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-primary hover:bg-gray-50">Shop</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-primary hover:bg-gray-50">Categories</a>
            
            <hr class="my-2 border-gray-200">
            
            @auth
                <p class="px-3 text-xs text-gray-500 uppercase tracking-wider mb-2">Akun Saya</p>
                <p class="px-3 text-sm font-bold text-gray-800">{{ Auth::user()->name }}</p>
                <form action="{{ route('logout') }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-red-600 hover:bg-red-50">Logout</button>
                </form>
            @endauth

            @guest
                <a href="/login" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Login</a>
                <a href="/register" class="block px-3 py-2 rounded-md text-base font-medium text-brand-primary hover:bg-blue-50">Register</a>
            @endguest
        </div>
    </div>
</nav>