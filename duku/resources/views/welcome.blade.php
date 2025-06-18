<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Dukundumurimo - Modern Food Inventory Management System">

        <title>Dukundumurimo - Food Inventory Management</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        
        <!-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            'inter': ['Inter', 'sans-serif'],
                        },
                        colors: {
                            primary: {
                                50: '#eff6ff',
                                100: '#dbeafe',
                                200: '#bfdbfe',
                                300: '#93c5fd',
                                400: '#60a5fa',
                                500: '#3b82f6',
                                600: '#2563eb',
                                700: '#1d4ed8',
                                800: '#1e40af',
                                900: '#1e3a8a',
                            },
                            secondary: {
                                50: '#f8fafc',
                                100: '#f1f5f9',
                                200: '#e2e8f0',
                                300: '#cbd5e1',
                                400: '#94a3b8',
                                500: '#64748b',
                                600: '#475569',
                                700: '#334155',
                                800: '#1e293b',
                                900: '#0f172a',
                            }
                        },
                        animation: {
                            'fade-in': 'fadeIn 0.6s ease-in-out',
                            'slide-up': 'slideUp 0.8s ease-out',
                            'bounce-slow': 'bounce 3s infinite',
                            'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        },
                        keyframes: {
                            fadeIn: {
                                '0%': { opacity: '0' },
                                '100%': { opacity: '1' },
                            },
                            slideUp: {
                                '0%': { transform: 'translateY(30px)', opacity: '0' },
                                '100%': { transform: 'translateY(0)', opacity: '1' },
                            }
                        }
                    }
                }
            }
        </script>

        <style>
            body {
                font-family: 'Inter', sans-serif;
                scroll-behavior: smooth;
            }
            
            .gradient-bg {
                background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            }
            
            .hero-gradient {
                background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 50%, #7c3aed 100%);
                background-size: 400% 400%;
                animation: gradientShift 15s ease infinite;
            }
            
            @keyframes gradientShift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            
            .feature-card {
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            
            .feature-card:hover {
                transform: translateY(-8px) scale(1.02);
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
                border-color: rgba(37, 99, 235, 0.3);
            }
            
            .glass-effect {
                backdrop-filter: blur(16px);
                background: rgba(255, 255, 255, 0.1);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            
            .text-gradient {
                background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            
            .btn-primary {
                background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }
            
            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(37, 99, 235, 0.4);
            }
            
            .btn-primary::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
                transition: left 0.5s;
            }
            
            .btn-primary:hover::before {
                left: 100%;
            }
            
            .btn-secondary {
                background: transparent;
                border: 2px solid rgba(255, 255, 255, 0.8);
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }
            
            .btn-secondary:hover {
                background: rgba(255, 255, 255, 0.1);
                border-color: rgba(255, 255, 255, 1);
                transform: translateY(-2px);
            }
            
            /* Enhanced animated circles */
            .floating-circle {
                animation: float 8s ease-in-out infinite;
                filter: blur(0.5px);
            }
            
            .floating-circle:nth-child(1) {
                animation-delay: 0s;
                animation-duration: 10s;
            }
            
            .floating-circle:nth-child(2) {
                animation-delay: 2s;
                animation-duration: 12s;
            }
            
            .floating-circle:nth-child(3) {
                animation-delay: 4s;
                animation-duration: 14s;
            }
            
            @keyframes float {
                0%, 100% {
                    transform: translateY(0px) rotate(0deg) scale(1);
                    opacity: 0.1;
                }
                25% {
                    transform: translateY(-30px) rotate(90deg) scale(1.1);
                    opacity: 0.3;
                }
                50% {
                    transform: translateY(-50px) rotate(180deg) scale(0.9);
                    opacity: 0.2;
                }
                75% {
                    transform: translateY(-30px) rotate(270deg) scale(1.05);
                    opacity: 0.4;
                }
            }
            
            .floating-circle-alt {
                animation: floatAlt 10s ease-in-out infinite;
                filter: blur(0.3px);
            }
            
            .floating-circle-alt:nth-child(1) {
                animation-delay: 1s;
                animation-duration: 11s;
            }
            
            .floating-circle-alt:nth-child(2) {
                animation-delay: 3s;
                animation-duration: 13s;
            }
            
            .floating-circle-alt:nth-child(3) {
                animation-delay: 5s;
                animation-duration: 15s;
            }
            
            @keyframes floatAlt {
                0%, 100% {
                    transform: translateX(0px) translateY(0px) scale(1) rotate(0deg);
                    opacity: 0.05;
                }
                33% {
                    transform: translateX(20px) translateY(-40px) scale(1.2) rotate(120deg);
                    opacity: 0.25;
                }
                66% {
                    transform: translateX(-15px) translateY(-25px) scale(0.8) rotate(240deg);
                    opacity: 0.15;
                }
            }
            
            .nav-blur {
                backdrop-filter: blur(20px);
                background: rgba(255, 255, 255, 0.9);
                border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            }
            
            .section-divider {
                height: 100px;
                background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 70%);
            }
            
            .stats-card {
                background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(124, 58, 237, 0.1) 100%);
                border: 1px solid rgba(37, 99, 235, 0.2);
                backdrop-filter: blur(10px);
            }
            
            .feature-icon {
                background: linear-gradient(135deg, #3b82f6 0%, #7c3aed 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            
            .scroll-indicator {
                animation: bounce 2s infinite;
            }
            
            @media (max-width: 768px) {
                .hero-gradient {
                    background-size: 200% 200%;
                }
            }
        </style>
    </head>
    <body class="antialiased bg-gray-50">
        <!-- Navigation Bar -->
        <nav class="nav-blur fixed w-full z-50 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center">
                            <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-warehouse text-white text-xl"></i>
                            </div>
                            <span class="text-2xl font-bold text-gray-900">Dukundumurimo</span>
                        </div>
                    </div>
                    
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#features" class="text-gray-700 hover:text-primary-600 transition duration-300 font-medium">Features</a>
                        <a href="#about" class="text-gray-700 hover:text-primary-600 transition duration-300 font-medium">About</a>
                        <a href="#contact" class="text-gray-700 hover:text-primary-600 transition duration-300 font-medium">Contact</a>
                        
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn-primary text-white px-6 py-3 rounded-xl font-semibold">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-700 hover:text-primary-600 transition duration-300 font-medium">
                                    Login
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn-primary text-white px-6 py-3 rounded-xl font-semibold">
                                        Sign Up
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                    
                    <!-- Mobile menu button -->
                    <div class="md:hidden flex items-center">
                        <button class="text-gray-700 hover:text-primary-600 transition duration-300">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="hero-gradient min-h-screen flex items-center justify-center relative overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-5"></div>
            <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 animate-fade-in">
                <div class="max-w-5xl mx-auto">
                    <h1 class="text-5xl md:text-7xl font-black text-white mb-8 leading-tight animate-slide-up">
                        Modern Food Inventory 
                        <span class="block bg-gradient-to-r from-white to-gray-200 bg-clip-text text-transparent">Management System</span>
                    </h1>
                    <p class="text-xl md:text-2xl text-white/95 mb-12 max-w-4xl mx-auto font-light leading-relaxed animate-slide-up" style="animation-delay: 0.2s;">
                        Streamline your food business operations with our comprehensive inventory management solution. 
                        Track imports, exports, and stock levels with unprecedented ease and precision.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-6 justify-center animate-slide-up" style="animation-delay: 0.4s;">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn-primary text-white px-10 py-4 rounded-xl font-bold text-lg shadow-2xl">
                                    Go to Dashboard
                                </a>
                            @else
                                <a href="{{ route('register') }}" class="btn-primary text-white px-10 py-4 rounded-xl font-bold text-lg shadow-2xl">
                                    Get Started Free
                                </a>
                                <a href="{{ route('login') }}" class="btn-secondary text-white px-10 py-4 rounded-xl font-bold text-lg">
                                    Login
                                </a>
                            @endauth
                        @endif
                    </div>
                    
                    <!-- Scroll indicator -->
                    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 scroll-indicator">
                        <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center">
                            <div class="w-1 h-3 bg-white/60 rounded-full mt-2 animate-bounce"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced animated circles -->
            <div class="absolute top-20 left-10 w-24 h-24 bg-white/8 rounded-full floating-circle"></div>
            <div class="absolute bottom-20 right-10 w-40 h-40 bg-white/4 rounded-full floating-circle"></div>
            <div class="absolute top-1/2 left-20 w-20 h-20 bg-white/6 rounded-full floating-circle"></div>
            
            <!-- Additional animated circles -->
            <div class="absolute top-1/4 right-20 w-16 h-16 bg-white/5 rounded-full floating-circle-alt"></div>
            <div class="absolute bottom-1/3 left-1/4 w-32 h-32 bg-white/3 rounded-full floating-circle"></div>
            <div class="absolute top-3/4 right-1/3 w-12 h-12 bg-white/7 rounded-full floating-circle-alt"></div>
            <div class="absolute top-1/3 left-1/3 w-36 h-36 bg-white/2 rounded-full floating-circle"></div>
            <div class="absolute bottom-1/4 left-1/2 w-20 h-20 bg-white/6 rounded-full floating-circle-alt"></div>
            <div class="absolute top-2/3 right-1/4 w-24 h-24 bg-white/4 rounded-full floating-circle"></div>
        </section>

        <!-- Section Divider -->
        <div class="section-divider"></div>

        <!-- Features Section -->
        <section id="features" class="py-24 bg-white relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-20">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                        Powerful Features for Your 
                        <span class="text-gradient">Business</span>
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto font-light">
                        Everything you need to manage your food inventory efficiently and grow your business with confidence
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Dashboard Feature -->
                    <div class="feature-card bg-white p-10 rounded-2xl shadow-xl">
                        <div class="w-20 h-20 bg-blue-100 rounded-2xl flex items-center justify-center mb-8">
                            <i class="fas fa-chart-line text-3xl text-blue-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Smart Dashboard</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Get real-time insights into your inventory with our comprehensive dashboard. 
                            Monitor stock levels, track imports/exports, and make data-driven decisions instantly.
                        </p>
                    </div>

                    <!-- Food Management Feature -->
                    <div class="feature-card bg-white p-10 rounded-2xl shadow-xl">
                        <div class="w-20 h-20 bg-green-100 rounded-2xl flex items-center justify-center mb-8">
                            <i class="fas fa-utensils text-3xl text-green-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Food Management</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Complete CRUD operations for food items. Add, edit, and manage your product 
                            catalog with detailed information and smart categorization.
                        </p>
                    </div>

                    <!-- Import/Export Feature -->
                    <div class="feature-card bg-white p-10 rounded-2xl shadow-xl">
                        <div class="w-20 h-20 bg-red-100 rounded-2xl flex items-center justify-center mb-8">
                            <i class="fas fa-exchange-alt text-3xl text-red-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Import & Export Tracking</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Track all your food imports and exports with detailed records. 
                            Monitor quantities, dates, and maintain accurate inventory levels automatically.
                        </p>
                    </div>

                    <!-- Reports Feature -->
                    <div class="feature-card bg-white p-10 rounded-2xl shadow-xl">
                        <div class="w-20 h-20 bg-purple-100 rounded-2xl flex items-center justify-center mb-8">
                            <i class="fas fa-file-alt text-3xl text-purple-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Advanced Reports</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Generate comprehensive reports with advanced filtering. 
                            Analyze trends, track performance, and export data for further analysis.
                        </p>
                    </div>

                    <!-- User Management Feature -->
                    <div class="feature-card bg-white p-10 rounded-2xl shadow-xl">
                        <div class="w-20 h-20 bg-yellow-100 rounded-2xl flex items-center justify-center mb-8">
                            <i class="fas fa-users text-3xl text-yellow-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">User Management</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Secure authentication and user profile management. 
                            Control access levels and maintain security for your business data.
                        </p>
                    </div>

                    <!-- Modern UI Feature -->
                    <div class="feature-card bg-white p-10 rounded-2xl shadow-xl">
                        <div class="w-20 h-20 bg-pink-100 rounded-2xl flex items-center justify-center mb-8">
                            <i class="fas fa-palette text-3xl text-pink-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Modern Interface</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Beautiful, responsive design built with modern technologies. 
                            Enjoy a seamless experience across all devices and screen sizes.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-24 bg-gradient-to-br from-gray-50 to-gray-100 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8">
                            About 
                            <span class="text-gradient">Dukundumurimo</span>
                        </h2>
                        <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                            Dukundumurimo is a comprehensive food inventory management system designed to help 
                            businesses streamline their operations and improve efficiency.
                        </p>
                        <p class="text-xl text-gray-600 mb-12 leading-relaxed">
                            Built with Laravel and modern web technologies, our platform provides everything 
                            you need to manage your food inventory, track stock levels, and generate insightful reports.
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 text-xl mr-3"></i>
                                <span class="text-gray-700 font-medium">Easy to use</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 text-xl mr-3"></i>
                                <span class="text-gray-700 font-medium">Secure & reliable</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 text-xl mr-3"></i>
                                <span class="text-gray-700 font-medium">24/7 support</span>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="stats-card p-12 rounded-3xl shadow-2xl">
                            <div class="grid grid-cols-2 gap-8">
                                <div class="text-center">
                                    <div class="text-4xl font-black text-primary-600 mb-3">100%</div>
                                    <div class="text-gray-600 font-medium">Uptime</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-4xl font-black text-primary-600 mb-3">24/7</div>
                                    <div class="text-gray-600 font-medium">Support</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-4xl font-black text-primary-600 mb-3">99.9%</div>
                                    <div class="text-gray-600 font-medium">Accuracy</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-4xl font-black text-primary-600 mb-3">1000+</div>
                                    <div class="text-gray-600 font-medium">Users</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-24 gradient-bg relative overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="relative z-10 max-w-5xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                <h2 class="text-4xl md:text-5xl font-black text-white mb-8">
                    Ready to Transform Your 
                    <span class="block">Food Business?</span>
                </h2>
                <p class="text-xl md:text-2xl text-white/95 mb-12 max-w-3xl mx-auto font-light">
                    Join thousands of businesses that trust Dukundumurimo for their inventory management needs.
                </p>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-primary text-white px-12 py-5 rounded-xl font-bold text-xl shadow-2xl">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn-primary text-white px-12 py-5 rounded-xl font-bold text-xl shadow-2xl">
                            Start Free Trial
                        </a>
                    @endauth
                @endif
            </div>
        </section>

        <!-- Footer -->
        <footer id="contact" class="bg-gray-900 text-white relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                    <!-- Company Info -->
                    <div class="col-span-1 md:col-span-2">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-warehouse text-white text-xl"></i>
                            </div>
                            <span class="text-2xl font-bold text-white">Dukundumurimo</span>
                        </div>
                        <p class="text-gray-400 mb-8 max-w-md leading-relaxed">
                            Modern food inventory management system designed to help businesses 
                            streamline their operations and improve efficiency.
                        </p>
                        <div class="flex space-x-6">
                            <a href="#" class="w-12 h-12 bg-gray-800 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-primary-600 transition duration-300">
                                <i class="fab fa-facebook text-xl"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-gray-800 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-primary-600 transition duration-300">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-gray-800 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-primary-600 transition duration-300">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-gray-800 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-primary-600 transition duration-300">
                                <i class="fab fa-github text-xl"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-xl font-bold mb-6">Quick Links</h3>
                        <ul class="space-y-4">
                            <li><a href="#features" class="text-gray-400 hover:text-white transition duration-300 font-medium">Features</a></li>
                            <li><a href="#about" class="text-gray-400 hover:text-white transition duration-300 font-medium">About</a></li>
                            <li><a href="#contact" class="text-gray-400 hover:text-white transition duration-300 font-medium">Contact</a></li>
                            @if (Route::has('login'))
                                <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition duration-300 font-medium">Login</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-white transition duration-300 font-medium">Sign Up</a></li>
                                @endif
                            @endif
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h3 class="text-xl font-bold mb-6">Contact</h3>
                        <ul class="space-y-4 text-gray-400">
                            <li class="flex items-center">
                                <div class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-envelope text-primary-400"></i>
                                </div>
                                <span class="font-medium">info@dukundumurimo.com</span>
                            </li>
                            <li class="flex items-center">
                                <div class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-phone text-primary-400"></i>
                                </div>
                                <span class="font-medium">+1 (555) 123-4567</span>
                            </li>
                            <li class="flex items-center">
                                <div class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-map-marker-alt text-primary-400"></i>
                                </div>
                                <span class="font-medium">123 Business St, City, Country</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                    <p class="text-gray-400 font-medium">
                        © {{ date('Y') }} Dukundumurimo. All rights reserved. Built with Laravel and Tailwind CSS.
                    </p>
                </div>
            </div>
        </footer>

        <!-- Smooth scrolling script -->
        <script>
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
            
            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const nav = document.querySelector('nav');
                if (window.scrollY > 100) {
                    nav.classList.add('shadow-lg');
                } else {
                    nav.classList.remove('shadow-lg');
                }
            });
        </script>
    </body>
</html>
