<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <!-- Header Section -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 animate-fade-in">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Selamat datang, <?= htmlspecialchars(ucfirst(session()->get('username') ?? 'user')) ?></h1>
                <p class="text-gray-500 mt-1">Dashboard Manajemen Properti PT INTI Kontrak Properti</p>
            </div>
            <div class="mt-4 md:mt-0">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                    <span class="w-2 h-2 mr-2 rounded-full bg-blue-500 animate-pulse"></span>
                    Aktif
                </span>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 animate-slide-up">
        <!-- Total Properti -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Properti</p>
                    <h3 class="text-2xl font-bold mt-1">142</h3>
                </div>
                <div class="p-3 rounded-lg bg-blue-50 text-blue-600">
                    <i class="fas fa-building text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-center text-sm text-green-500">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span>12% dari bulan lalu</span>
                </div>
            </div>
        </div>

        <!-- Properti Tersedia -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Properti Tersedia</p>
                    <h3 class="text-2xl font-bold mt-1">87</h3>
                </div>
                <div class="p-3 rounded-lg bg-green-50 text-green-600">
                    <i class="fas fa-home text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-center text-sm text-green-500">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span>8% dari bulan lalu</span>
                </div>
            </div>
        </div>

        <!-- Properti Terjual -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Properti Terjual</p>
                    <h3 class="text-2xl font-bold mt-1">55</h3>
                </div>
                <div class="p-3 rounded-lg bg-purple-50 text-purple-600">
                    <i class="fas fa-handshake text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-center text-sm text-red-500">
                    <i class="fas fa-arrow-down mr-1"></i>
                    <span>3% dari bulan lalu</span>
                </div>
            </div>
        </div>

        <!-- Pendapatan -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Pendapatan Bulan Ini</p>
                    <h3 class="text-2xl font-bold mt-1">Rp 4,2M</h3>
                </div>
                <div class="p-3 rounded-lg bg-yellow-50 text-yellow-600">
                    <i class="fas fa-coins text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-center text-sm text-green-500">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span>15% dari bulan lalu</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 animate-slide-up">
        <!-- Penjualan Properti -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold">Trend Penjualan Properti</h3>
                <select class="text-sm border border-gray-200 rounded-lg px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Bulan Ini</option>
                    <option>3 Bulan Terakhir</option>
                    <option>Tahun Ini</option>
                </select>
            </div>
            <div class="h-64 bg-gray-50 rounded-lg flex items-center justify-center animate-pulse">
                <p class="text-gray-400">Grafik akan muncul di sini</p>
            </div>
        </div>

        <!-- Jenis Properti -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold">Distribusi Jenis Properti</h3>
                <select class="text-sm border border-gray-200 rounded-lg px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Semua</option>
                    <option>Residensial</option>
                    <option>Komersial</option>
                </select>
            </div>
            <div class="h-64 bg-gray-50 rounded-lg flex items-center justify-center animate-pulse">
                <p class="text-gray-400">Grafik pie akan muncul di sini</p>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 animate-slide-up">
        <h3 class="text-lg font-semibold mb-4">Aktivitas Terkini</h3>
        <div class="space-y-4">
            <!-- Activity Item -->
            <div class="flex items-start pb-4 border-b border-gray-100 last:border-0 last:pb-0 group">
                <div class="p-2 rounded-lg bg-blue-50 text-blue-600 mr-4 group-hover:bg-blue-100 transition-colors">
                    <i class="fas fa-file-signature"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium">Kontrak baru untuk Apartemen Green Park</p>
                    <p class="text-sm text-gray-500 mt-1">Ditandatangani oleh Bapak Andi Wijaya</p>
                </div>
                <span class="text-sm text-gray-400">2 jam lalu</span>
            </div>
            
            <!-- Activity Item -->
            <div class="flex items-start pb-4 border-b border-gray-100 last:border-0 last:pb-0 group">
                <div class="p-2 rounded-lg bg-green-50 text-green-600 mr-4 group-hover:bg-green-100 transition-colors">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium">Properti terjual - Rumah di BSD City</p>
                    <p class="text-sm text-gray-500 mt-1">Harga Rp 1,8M kepada Ibu Siti Rahayu</p>
                </div>
                <span class="text-sm text-gray-400">Kemarin</span>
            </div>
            
            <!-- Activity Item -->
            <div class="flex items-start pb-4 border-b border-gray-100 last:border-0 last:pb-0 group">
                <div class="p-2 rounded-lg bg-purple-50 text-purple-600 mr-4 group-hover:bg-purple-100 transition-colors">
                    <i class="fas fa-home"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium">Properti baru ditambahkan</p>
                    <p class="text-sm text-gray-500 mt-1">Ruko 2 lantai di Alam Sutera</p>
                </div>
                <span class="text-sm text-gray-400">2 hari lalu</span>
            </div>
        </div>
    </div>
</div>

<style>
    .animate-fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
    .animate-slide-up {
        animation: slideUp 0.6s ease-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes slideUp {
        from { 
            opacity: 0;
            transform: translateY(20px);
        }
        to { 
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<?= $this->endSection() ?>