<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard' ?></title>
    <link rel="icon" href="<?= base_url('/img/Ptin.jpg') ?>" type="image/x-icon">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        dark: {
                            800: '#1e293b',
                            900: '#0f172a',
                        },
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                },
            },
        };
    </script>
    <style>
        .sidebar-link.active {
            @apply bg-primary-50 text-primary-600 border-l-3 border-primary-600;
        }
        .sidebar-link.active i {
            @apply text-primary-600;
        }
        .notification-dot {
            @apply top-1 right-1;
        }
        .dropdown-enter-active, .dropdown-leave-active {
            transition: all 0.3s ease;
        }
        .dropdown-enter-from, .dropdown-leave-to {
            opacity: 0;
            transform: translateY(-10px);
        }
    </style>
</head>
<body x-data="{ 
        sidebarOpen: true, 
        mobileMenuOpen: false, 
        activeNav: 'dashboard', 
        userDropdownOpen: false 
    }" 
      @keydown.escape="mobileMenuOpen = false; userDropdownOpen = false"
      class="bg-gray-50 min-h-screen">

    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 h-full bg-white text-gray-800 transition-all duration-300 shadow-xl z-50 border-r border-gray-200"
           :class="{ 'w-64': sidebarOpen, 'w-20': !sidebarOpen, '-translate-x-full md:translate-x-0': !mobileMenuOpen, 'translate-x-0': mobileMenuOpen }">
        <div class="flex flex-col h-full">
            <!-- Logo -->
            <div class="p-4 flex items-center justify-between border-b ">
                <div class="flex items-center gap-3 px-3" x-show="sidebarOpen || mobileMenuOpen">
                    <img src="/img/Ptin.jpg" alt="PT Inti Logo" class="w-full h-10 ">
                </div>
                <button @click="sidebarOpen = !sidebarOpen; mobileMenuOpen = false" 
                        class="p-2 ml-2 rounded-md hover:bg-gray-100 text-gray-500">
                    <i :class="sidebarOpen ? 'fas fa-indent' : 'fas fa-outdent'" class="text-sm"></i>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
                <a href="#" @click="activeNav = 'dashboard'" 
                   class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors"
                   :class="{ 'active': activeNav === 'dashboard' }">
                    <i class="fas fa-chart-pie w-5 text-gray-500"></i>
                    <span x-show="sidebarOpen || mobileMenuOpen" class="text-sm font-medium">Dashboard</span>
                </a>
                
                <!-- Property Management Dropdown -->
                <div x-data="{ open: false }" class="space-y-1">
                    <button @click="open = !open" 
                            class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors"
                            :class="{ 'bg-gray-100': open }">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-home w-5 text-gray-500"></i>
                            <span x-show="sidebarOpen || mobileMenuOpen" class="text-sm font-medium">Property Management</span>
                        </div>
                        <i x-show="sidebarOpen || mobileMenuOpen" 
                           :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" 
                           class="text-xs text-gray-400 transition-transform duration-200"></i>
                    </button>
                    
                    <div x-show="open && (sidebarOpen || mobileMenuOpen)" 
                         x-transition:enter="dropdown-enter-active"
                         x-transition:enter-start="dropdown-enter-from"
                         x-transition:enter-end="dropdown-enter-to"
                         x-transition:leave="dropdown-leave-active"
                         x-transition:leave-start="dropdown-leave-from"
                         x-transition:leave-end="dropdown-leave-to"
                         class="pl-8 space-y-1">
                        <a href="#" @click="activeNav = 'property-list'" 
                           class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors text-sm"
                           :class="{ 'active': activeNav === 'property-list' }">
                            <i class="fas fa-list-ul w-4 text-gray-400"></i>
                            <span>Property List</span>
                        </a>
                        <a href="#" @click="activeNav = 'add-property'" 
                           class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors text-sm"
                           :class="{ 'active': activeNav === 'add-property' }">
                            <i class="fas fa-plus-circle w-4 text-gray-400"></i>
                            <span>Add Property</span>
                        </a>
                        <a href="#" @click="activeNav = 'property-types'" 
                           class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors text-sm"
                           :class="{ 'active': activeNav === 'property-types' }">
                            <i class="fas fa-tags w-4 text-gray-400"></i>
                            <span>Property Types</span>
                        </a>
                    </div>
                </div>
                
                <!-- Contract Management Dropdown -->
                <div x-data="{ open: false }" class="space-y-1">
                    <button @click="open = !open" 
                            class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors"
                            :class="{ 'bg-gray-100': open }">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-file-contract w-5 text-gray-500"></i>
                            <span x-show="sidebarOpen || mobileMenuOpen" class="text-sm font-medium">Contract Management</span>
                        </div>
                        <i x-show="sidebarOpen || mobileMenuOpen" 
                           :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" 
                           class="text-xs text-gray-400 transition-transform duration-200"></i>
                    </button>
                    
                    <div x-show="open && (sidebarOpen || mobileMenuOpen)" 
                         x-transition:enter="dropdown-enter-active"
                         x-transition:enter-start="dropdown-enter-from"
                         x-transition:enter-end="dropdown-enter-to"
                         x-transition:leave="dropdown-leave-active"
                         x-transition:leave-start="dropdown-leave-from"
                         x-transition:leave-end="dropdown-leave-to"
                         class="pl-8 space-y-1">
                        <a href="#" @click="activeNav = 'active-contracts'" 
                           class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors text-sm"
                           :class="{ 'active': activeNav === 'active-contracts' }">
                            <i class="fas fa-file-signature w-4 text-gray-400"></i>
                            <span>Active Contracts</span>
                        </a>
                        <a href="#" @click="activeNav = 'create-contract'" 
                           class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors text-sm"
                           :class="{ 'active': activeNav === 'create-contract' }">
                            <i class="fas fa-file-alt w-4 text-gray-400"></i>
                            <span>Create Contract</span>
                        </a>
                        <a href="#" @click="activeNav = 'contract-templates'" 
                           class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors text-sm"
                           :class="{ 'active': activeNav === 'contract-templates' }">
                            <i class="fas fa-copy w-4 text-gray-400"></i>
                            <span>Contract Templates</span>
                        </a>
                        <a href="#" @click="activeNav = 'expiring-contracts'" 
                           class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors text-sm"
                           :class="{ 'active': activeNav === 'expiring-contracts' }">
                            <i class="fas fa-clock w-4 text-gray-400"></i>
                            <span>Expiring Contracts</span>
                        </a>
                    </div>
                </div>
                
                <!-- User Management Dropdown -->
                <div x-data="{ open: false }" class="space-y-1">
                    <button @click="open = !open" 
                            class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors"
                            :class="{ 'bg-gray-100': open }">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-users w-5 text-gray-500"></i>
                            <span x-show="sidebarOpen || mobileMenuOpen" class="text-sm font-medium">User Management</span>
                        </div>
                        <i x-show="sidebarOpen || mobileMenuOpen" 
                           :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" 
                           class="text-xs text-gray-400 transition-transform duration-200"></i>
                    </button>
                    
                    <div x-show="open && (sidebarOpen || mobileMenuOpen)" 
                         x-transition:enter="dropdown-enter-active"
                         x-transition:enter-start="dropdown-enter-from"
                         x-transition:enter-end="dropdown-enter-to"
                         x-transition:leave="dropdown-leave-active"
                         x-transition:leave-start="dropdown-leave-from"
                         x-transition:leave-end="dropdown-leave-to"
                         class="pl-8 space-y-1">
                        <a href="#" @click="activeNav = 'users-list'" 
                           class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors text-sm"
                           :class="{ 'active': activeNav === 'users-list' }">
                            <i class="fas fa-list w-4 text-gray-400"></i>
                            <span>List Users</span>
                        </a>
                        <a href="#" @click="activeNav = 'add-user'" 
                           class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors text-sm"
                           :class="{ 'active': activeNav === 'add-user' }">
                            <i class="fas fa-user-plus w-4 text-gray-400"></i>
                            <span>Add User</span>
                        </a>
                        <a href="#" @click="activeNav = 'roles'" 
                           class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors text-sm"
                           :class="{ 'active': activeNav === 'roles' }">
                            <i class="fas fa-user-shield w-4 text-gray-400"></i>
                            <span>Roles & Permissions</span>
                        </a>
                        <a href="#" @click="activeNav = 'activity'" 
                           class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors text-sm"
                           :class="{ 'active': activeNav === 'activity' }">
                            <i class="fas fa-history w-4 text-gray-400"></i>
                            <span>User Activity</span>
                        </a>
                    </div>
                </div>
                
                <a href="#" @click="activeNav = 'reports'" 
                   class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors"
                   :class="{ 'active': activeNav === 'reports' }">
                    <i class="fas fa-chart-bar w-5 text-gray-500"></i>
                    <span x-show="sidebarOpen || mobileMenuOpen" class="text-sm font-medium">Reports</span>
                </a>
                <a href="#" @click="activeNav = 'settings'" 
                   class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors"
                   :class="{ 'active': activeNav === 'settings' }">
                    <i class="fas fa-cog w-5 text-gray-500"></i>
                    <span x-show="sidebarOpen || mobileMenuOpen" class="text-sm font-medium">Settings</span>
                </a>
            </nav>

            <!-- User Profile Dropdown -->
            <div class="p-3 border-t border-gray-100 relative">
                <button @click="userDropdownOpen = !userDropdownOpen" 
                        class="w-full flex items-center gap-2 p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="relative">
                        <img src="/img/dani.jpg" class="w-8 h-8 rounded-full object-cover">
                        <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 rounded-full border-2 border-white"></span>
                    </div>
                    <div x-show="sidebarOpen || mobileMenuOpen" class="flex-1 min-w-0 text-left">
                        <p class="text-sm font-medium text-gray-800 truncate"><?= session()->get('username') ?? 'John Doe' ?></p>
                        <p class="text-xs text-gray-500">Admin</p>
                    </div>
                    <i x-show="sidebarOpen || mobileMenuOpen" 
                       :class="userDropdownOpen ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" 
                       class="text-xs text-gray-400"></i>
                </button>
                
                <!-- Sidebar Dropdown Menu -->
                <div x-show="userDropdownOpen && (sidebarOpen || mobileMenuOpen)" 
                     x-transition:enter="dropdown-enter-active"
                     x-transition:enter-start="dropdown-enter-from"
                     x-transition:enter-end="dropdown-enter-to"
                     x-transition:leave="dropdown-leave-active"
                     x-transition:leave-start="dropdown-leave-from"
                     x-transition:leave-end="dropdown-leave-to"
                     @click.outside="userDropdownOpen = false"
                     class="absolute bottom-full left-0 right-0 mb-2 mx-3 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-10">
                    <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-user text-gray-500"></i> My Profile
                    </a>
                    <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-cog text-gray-500"></i> Settings
                    </a>
                    <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-bell text-gray-500"></i> Notifications
                    </a>
                    <div class="border-t border-gray-200 my-1"></div>
                    <a href="/" class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                        <i class="fas fa-sign-out-alt text-red-500"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="transition-all duration-300" :class="{ 'ml-64': sidebarOpen, 'ml-20': !sidebarOpen }">
        <!-- Navbar -->
        <nav class="fixed top-0 left-0 right-0 bg-white shadow-sm z-40 border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <!-- Left: Mobile menu button and welcome message -->
                    <div class="flex items-center gap-4">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" 
                                class="md:hidden p-2 rounded-md hover:bg-gray-100 text-gray-600">
                            <i class="fas fa-bars text-lg"></i>
                        </button>
                        <span class="text-sm ml-6 font-medium text-gray-700 hidden md:block">
        Welcome, <?= htmlspecialchars(ucfirst(session()->get('username') ?? 'user')) ?>
    </span>
                    </div>
                    <!-- Right: Search and user info -->
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <input type="text" placeholder="Search..." 
                                   class="w-48 md:w-64 rounded-lg border-gray-200 pl-10 pr-4 py-1.5 text-sm focus:ring-2 focus:ring-primary-500 focus:border-transparent placeholder-gray-400">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        </div>
                        <button class="p-2 hover:bg-gray-100 rounded-full relative">
                            <i class="fas fa-bell text-gray-600 text-lg"></i>
                            <span class="notification-dot absolute w-2 h-2 bg-red-500 rounded-full border border-white"></span>
                        </button>
                        <!-- Navbar Avatar Dropdown -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" 
                                    class="flex items-center gap-2 p-1 rounded-lg hover:bg-gray-100">
                                <img src="/img/dani.jpg" class="w-8 h-8 rounded-full object-cover">
                                <span class="text-sm font-medium text-gray-700 hidden md:block"><?= htmlspecialchars(ucfirst(session()->get('username') ?? 'user')) ?></span>
                                <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="text-xs text-gray-400"></i>
                            </button>
                            <div x-show="open" 
                                 x-transition:enter="dropdown-enter-active"
                                 x-transition:enter-start="dropdown-enter-from"
                                 x-transition:enter-end="dropdown-enter-to"
                                 x-transition:leave="dropdown-leave-active"
                                 x-transition:leave-start="dropdown-leave-from"
                                 x-transition:leave-end="dropdown-leave-to"
                                 @click.outside="open = false"
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-10">
                                <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user text-gray-500"></i> Profile
                                </a>
                                <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-cog text-gray-500"></i> Settings
                                </a>
                                <div class="border-t border-gray-200 my-1"></div>
                                <a href="/" class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt text-red-500"></i> Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-8">
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <?= $this->renderSection('content') ?>
            </div>
        </main>
    </div>

    <!-- Mobile Menu Overlay -->
    <div x-show="mobileMenuOpen" 
         @click="mobileMenuOpen = false" 
         class="fixed inset-0 bg-black bg-opacity-50 md:hidden z-40"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
    </div>
</body>
</html>