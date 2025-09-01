<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taman Sriwedari</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#fef7ee',
                            100: '#fdedd3',
                            200: '#fbd6a5',
                            300: '#f8b76d',
                            400: '#f49332',
                            500: '#f1770a',
                            600: '#e25d05',
                            700: '#bc4608',
                            800: '#96380e',
                            900: '#78300f',
                            950: '#411604',
                        },
                        gray: {
                            50: '#f9fafb',
                            100: '#f3f4f6',
                            200: '#e5e7eb',
                            300: '#d1d5db',
                            400: '#9ca3af',
                            500: '#6b7280',
                            600: '#4b5563',
                            700: '#374151',
                            800: '#1f2937',
                            900: '#111827',
                            950: '#030712',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .hero-pattern {
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(241, 119, 10, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(241, 119, 10, 0.05) 0%, transparent 50%);
        }
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .gradient-border {
            background: linear-gradient(white, white) padding-box,
                        linear-gradient(135deg, #f1770a, #e25d05) border-box;
            border: 2px solid transparent;
        }
        
        .table-row-hover:hover {
            background-color: #fef7ee;
        }
        
        .nav-link {
            position: relative;
            transition: color 0.2s ease;
        }
        
        .nav-link:hover {
            color: #f1770a;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 50%;
            background-color: #f1770a;
            transition: all 0.2s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #f1770a 0%, #e25d05 100%);
            transition: all 0.2s ease;
            box-shadow: 0 4px 6px -1px rgba(241, 119, 10, 0.1);
        }
        
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgba(241, 119, 10, 0.2);
        }
        
        .stats-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.7) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md shadow-sm border-b  sticky top-0 z-50">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center py-4">
                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="hamburgerBtn" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
                
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 border-gray-800 from-primary-500 to-primary-600 rounded-xl flex items-center justify-center shadow-lg">
                        <img src="./img/logo.png" alt="Taman Sriwedari Logo" class="h-6 w-6 rounded-md">
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">Taman Sriwedari</h1>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-6">
                    @auth
                        <a href="/admin" class="btn-primary text-white px-6 py-2.5 rounded-lg font-medium text-sm nav-link">
                            Dashboard
                        </a>
                    @else
                        <a href="/admin" class="btn-primary text-white px-6 py-2.5 rounded-lg font-medium text-sm nav-link">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Sidebar -->
    <div id="mobileSidebar" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
        <div class="bg-white w-72 h-full shadow-2xl p-6 relative transform -translate-x-full transition-transform duration-300" id="sidebarContent">
            <!-- Close Button -->
            <button id="closeSidebar" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-xl">
                ✕
            </button>

            <div class="mt-8">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-10 h-10 border-gray-800 from-primary-500 to-primary-600 rounded-xl flex items-center justify-center">
                        <img src="./img/logo.png" alt="Logo" class="h-6 w-6 rounded-md">
                    </div>
                    <div>
                        <h2 class="font-bold text-gray-900">Taman Sriwedari</h2>
                    </div>
                </div>
                
                <nav class="space-y-3">
                    @auth
                        <a href="/admin" class="btn-primary text-white px-6 py-2.5 rounded-lg font-medium text-sm nav-link">
                            Dashboard
                        </a>
                    @else
                        <a href="/admin" class="btn-primary text-white px-6 py-2.5 rounded-lg font-medium text-sm nav-link">
                            Login
                        </a>
                    @endauth
                </nav>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-gray-50 to-gray-100 hero-pattern min-h-screen flex items-center">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div class="space-y-8">
                    <!-- Badge -->
                    <div class="inline-flex items-center px-4 py-2 bg-primary-50 text-primary-700 rounded-full text-sm font-medium border border-primary-100">
                        <span class="w-2 h-2 bg-primary-500 rounded-full mr-2"></span>
                        Sistem Informasi Terpadu
                    </div>
                    
                    <h1 class="text-5xl md:text-6xl font-bold text-gray-900 leading-tight">
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-primary-600">
                            Taman Sriwedari
                        </span>
                    </h1>
                    
                    <p class="text-xl text-gray-600 leading-relaxed max-w-2xl">
                        Taman Sriwedari adalah sistem informasi terpadu untuk manajemen taman dan ruang hijau di Kecamatan Maos. Dengan teknologi modern untuk pengelolaan yang lebih efisien.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button class="btn-primary text-white px-8 py-3 rounded-lg font-medium">
                            Mulai Sekarang
                        </button>
                        <button class="border-2 border-gray-300 text-gray-700 px-8 py-3 rounded-lg font-medium hover:border-primary-300 hover:text-primary-600 transition-all">
                            Pelajari Lebih Lanjut
                        </button>
                    </div>
                </div>
                
                <!-- Right Illustration -->
                <div class="flex justify-center lg:justify-start">
                    <div class="floating-animation">
                        <div class="relative">
                            <!-- Main logo container -->
                            <div class="w-80 h-80 bg-white rounded-3xl shadow-2xl p-8 flex items-center justify-center gradient-border">
                                <img src="/img/logo.png" alt="Taman Sriwedari Logo" class="w-full h-full object-contain">
                            </div>
                            <!-- Decorative elements -->
                            <div class="absolute -top-4 -right-4 w-24 h-24 bg-primary-100 rounded-2xl -z-10"></div>
                            <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-primary-50 rounded-2xl -z-10"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Data Dokumen Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <!-- Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center px-4 py-2 bg-primary-50 text-primary-700 rounded-full text-sm font-medium mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Dokumen Keuangan
                </div>
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Daftar Dokumen Keuangan</h2>
                <p class="text-xl text-gray-600">LS / GU / SPP / SPM</p>
            </div>

            <!-- Table Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <!-- Table Header -->
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Dokumen Terdaftar</h3>
                        <div class="flex items-center space-x-2">
                            <span class="inline-flex items-center px-3 py-1 bg-primary-100 text-primary-700 rounded-full text-sm font-medium">
                                <span class="w-2 h-2 bg-primary-500 rounded-full mr-2"></span>
                                Aktif
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50/50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">NO</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">NAMA DOKUMEN</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">BULAN PENGESAHAN</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">LINK DOKUMEN</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $doc)
                                <tr class="table-row-hover transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $doc->nama }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $doc->bulan_pengesahan }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <a href="{{ $doc->link }}" target="_blank" class="text-primary-600 hover:underline font-semibold">Lihat</a>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $doc->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-primary-50 hero-pattern">
        <div class="container mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-white/80 text-primary-700 rounded-full text-sm font-medium mb-4 shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Analitik & Statistik
                </div>
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Statistik Dokumen Keuangan</h2>
                <p class="text-xl text-gray-600">Visualisasi data untuk monitoring dan evaluasi</p>
            </div>

            <!-- Charts Grid -->
            <div class="grid lg:grid-cols-2 gap-8 mb-16">
                <!-- Chart 1 -->
                <div class="stats-card rounded-2xl p-8 card-hover">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-900">Distribusi Jenis Dokumen</h3>
                        <div class="w-3 h-3 bg-primary-500 rounded-full"></div>
                    </div>
                    <canvas id="documentsChart" width="400" height="200"></canvas>
                </div>

                <!-- Chart 2 -->
                <div class="stats-card rounded-2xl p-8 card-hover">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-900">Tren Bulanan</h3>
                        <div class="w-3 h-3 bg-primary-500 rounded-full"></div>
                    </div>
                    <canvas id="monthlyChart" width="400" height="200"></canvas>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="stats-card rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-gray-900">{{ $stat_total ?? 3 }}</h4>
                    <p class="text-sm text-gray-600">Total Dokumen</p>
                </div>
                
                <div class="stats-card rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-gray-900">{{ $stat_approved ?? 1 }}</h4>
                    <p class="text-sm text-gray-600">Disetujui</p>
                </div>
                
                <div class="stats-card rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-gray-900">{{ $stat_processing ?? 1 }}</h4>
                    <p class="text-sm text-gray-600">Dalam Proses</p>
                </div>
                
                <div class="stats-card rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-gray-900">{{ $stat_this_month ?? 2 }}</h4>
                    <p class="text-sm text-gray-600">Bulan Ini</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <!-- Main Footer Content -->
        <div class="container mx-auto px-6 py-16">
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Logo & Description -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 border-white-800 bg-slate-100 from-primary-500 to-primary-600 rounded-xl flex items-center justify-center">
                            <img src="./img/logo.png" alt="Taman Sriwedari Logo" class="h-6 w-6 rounded-md">
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">Taman Sriwedari</h3>
                            <p class="text-xs text-gray-400">Sistem Informasi</p>
                        </div>
                    </div>
                    <p class="text-gray-400 leading-relaxed max-w-md">
                        Sistem informasi terpadu untuk manajemen taman dan ruang hijau di Kecamatan Maos dengan teknologi modern untuk pengelolaan yang lebih efisien.
                    </p>
                </div>
                
                <!-- Kontak -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Kontak</h4>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-primary-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div>
                                <p class="font-medium text-white">Alamat</p>
                                <p class="text-gray-400 text-sm">Kecamatan Maos</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-primary-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <div>
                                <p class="font-medium text-white">Email</p>
                                <p class="text-gray-400 text-sm">info@tamansriwedari.id</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-primary-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <div>
                                <p class="font-medium text-white">Telepon</p>
                                <p class="text-gray-400 text-sm">(0281) 123-4567</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Sosial Media -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Ikuti Kami</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-primary-600 transition-all" aria-label="Instagram">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5zm4.25 3.25a5.25 5.25 0 1 1 0 10.5 5.25 5.25 0 0 1 0-10.5zm0 1.5a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5zm5.25.75a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-primary-600 transition-all" aria-label="Twitter">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-primary-600 transition-all" aria-label="GitHub">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.120.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="border-t border-gray-800">
            <div class="container mx-auto px-6 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-gray-400 text-sm">
                        &copy; 2025 Taman Sriwedari. Semua hak dilindungi undang-undang.
                    </p>
                    <div class="flex items-center space-x-6 text-sm text-gray-400">
                        <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                        <a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
                        <a href="#" class="hover:text-white transition-colors">Bantuan</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
const chartOptions = {
    responsive: true,
    plugins: {
        legend: { display: true },
        tooltip: { enabled: true }
    },
    scales: {
        x: { beginAtZero: true },
        y: { beginAtZero: true }
    }
};

// Chart Dokumen
fetch('/api/stats/documents')
.then(res => res.json())
.then(data => {
    const labels = data.map(d => d.jenis);
    const dataset = data.map(d => d.total);

    new Chart(document.getElementById('documentsChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Dokumen',
                data: dataset,
                backgroundColor: ['#f1770a', '#e25d05', '#fbbf24', '#ec4899'],
                borderRadius: 8,
                borderSkipped: false
            }]
        },
        options: chartOptions
    });
});

// Chart Bulanan
fetch('/api/stats/monthly')
.then(res => res.json())
.then(data => {
    const monthLabels = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    const dataset = monthLabels.map((_, i) => {
        const monthData = data.find(d => d.month == i+1);
        return monthData ? monthData.total : 0;
    });

    new Chart(document.getElementById('monthlyChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: monthLabels,
            datasets: [{
                label: 'Jumlah Dokumen Per Bulan',
                data: dataset,
                fill: true,
                backgroundColor: 'rgba(241, 119, 10, 0.1)',
                borderColor: '#f1770a',
                borderWidth: 3,
                tension: 0.4,
                pointBackgroundColor: '#f1770a',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,
                pointRadius: 6,
                pointHoverRadius: 8
            }]
        },
        options: chartOptions
    });
});
</script>

    <script>
        // Mobile menu functionality
        const sidebar = document.getElementById('mobileSidebar');
        const sidebarContent = document.getElementById('sidebarContent');
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const closeSidebar = document.getElementById('closeSidebar');

        hamburgerBtn.addEventListener('click', () => {
            sidebar.classList.remove('hidden');
            setTimeout(() => {
                sidebarContent.classList.remove('-translate-x-full');
            }, 10);
        });

        function closeMenu() {
            sidebarContent.classList.add('-translate-x-full');
            setTimeout(() => {
                sidebar.classList.add('hidden');
            }, 300);
        }

        closeSidebar.addEventListener('click', closeMenu);
        sidebar.addEventListener('click', (e) => {
            if (e.target === sidebar) {
                closeMenu();
            }
        });

        // Chart configurations with Filament-style colors
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { 
                    display: false 
                },
                title: { 
                    display: false 
                }
            },
            elements: {
                bar: {
                    borderRadius: 8,
                    borderSkipped: false,
                },
                point: {
                    radius: 6,
                    hoverRadius: 8,
                }
            }
        };

        // Documents Chart (Bar Chart)
        const labels = ['LS', 'GU', 'SPP', 'SPM'];
        const data = [5, 3, 7, 2];

        const ctx = document.getElementById('documentsChart').getContext('2d');
        ctx.canvas.height = 300;
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Dokumen',
                    data: data,
                    backgroundColor: [
                        '#f1770a',
                        '#e25d05',
                        '#fbbf24',
                        '#ec4899'
                    ],
                    borderWidth: 0,
                    borderRadius: 8,
                    borderSkipped: false,
                }]
            },
            options: {
                ...chartOptions,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f3f4f6',
                            drawBorder: false,
                        },
                        ticks: { 
                            color: '#6b7280',
                            font: {
                                size: 12,
                                weight: '500'
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                        },
                        ticks: { 
                            color: '#6b7280',
                            font: {
                                size: 12,
                                weight: '500'
                            }
                        }
                    }
                }
            }
        });

        // Monthly Chart (Line Chart)
        const monthLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        const monthData = [2, 3, 4, 5, 3, 2, 4, 6, 5, 3, 2, 1];

        const ctxMonth = document.getElementById('monthlyChart').getContext('2d');
        ctxMonth.canvas.height = 300;
        
        new Chart(ctxMonth, {
            type: 'line',
            data: {
                labels: monthLabels,
                datasets: [{
                    label: 'Jumlah Dokumen Per Bulan',
                    data: monthData,
                    fill: true,
                    backgroundColor: 'rgba(241, 119, 10, 0.1)',
                    borderColor: '#f1770a',
                    borderWidth: 3,
                    tension: 0.4,
                    pointBackgroundColor: '#f1770a',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    pointHoverBackgroundColor: '#e25d05',
                    pointHoverBorderColor: '#ffffff',
                    pointHoverBorderWidth: 3,
                }]
            },
            options: {
                ...chartOptions,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f3f4f6',
                            drawBorder: false,
                        },
                        ticks: { 
                            color: '#6b7280',
                            font: {
                                size: 12,
                                weight: '500'
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                        },
                        ticks: { 
                            color: '#6b7280',
                            font: {
                                size: 12,
                                weight: '500'
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                hover: {
                    animationDuration: 200,
                }
            }
        });

        // Add smooth scrolling for any anchor links
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

        // Add loading animation for charts
        window.addEventListener('load', () => {
            const charts = document.querySelectorAll('canvas');
            charts.forEach(chart => {
                chart.style.opacity = '0';
                chart.style.transform = 'translateY(20px)';
                chart.style.transition = 'all 0.6s ease';
                
                setTimeout(() => {
                    chart.style.opacity = '1';
                    chart.style.transform = 'translateY(0)';
                }, 500);
            });
        });
    </script>
</body>
</html>