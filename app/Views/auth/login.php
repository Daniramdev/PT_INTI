<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .btn-blue {
            transition: all 0.3s ease;
        }
        .btn-blue:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-social {
            transition: all 0.3s ease;
        }
        .btn-social:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .social-logo {
            width: 18px;
            height: 18px;
            object-fit: contain;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md" x-data="{ showPassword: false }">
        <div class="flex justify-center mb-6">
            <img src="/img/Ptin.jpg" alt="PT Inti Logo" class="h-12 object-contain">
        </div>
        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Sign In</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-100 text-red-600 p-3 rounded mb-6 text-sm">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="/auth/processLogin" method="post">
            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input type="email" name="email" id="email" 
                       class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" 
                       placeholder="Enter your email" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <input :type="showPassword ? 'text' : 'password'" name="password" id="password" 
                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" 
                           placeholder="Enter your password" required>
                    <button type="button" @click="showPassword = !showPassword" 
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">
                        <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'" class="text-sm"></i>
                    </button>
                </div>
            </div>
            <button type="submit" 
                    class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg btn-blue hover:bg-blue-700">
                Sign In
            </button>
        </form>
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-white text-gray-500">Or sign in with</span>
            </div>
        </div>
        <div class="flex gap-4">
            <a href="/auth/google" 
               class="flex-1 flex items-center justify-center bg-white border border-gray-200 text-black py-2 px-4 rounded-lg btn-social hover:bg-gray-50">
                <img src="/img/Google.svg" 
                     alt="Google Logo" class="social-logo mr-2">
                Google
            </a>
            <a href="/auth/facebook" 
               class="flex-1 flex items-center justify-center bg-white text-black py-2 px-4 rounded-lg btn-social hover:bg-blue-700">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" 
                     alt="Facebook Logo" class="social-logo mr-2">
                Facebook
            </a>
        </div>
        <p class="mt-6 text-center text-sm text-gray-600">
            Don't have an account? 
            <a href="/auth/register" class="text-blue-600 font-medium hover:underline">Sign Up</a>
        </p>
    </div>
</body>
</html>