<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class UserController extends Controller
{
    public function dashboard()
    {
        // Cek apakah user sudah login dan memiliki role user
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'user') {
            return redirect()->to('/auth/login');
        }

        // Data untuk dashboard user
        $data = [
            'title' => 'User Dashboard',
            'user' => session()->get('username'),
        ];

        return view('user/dashboard', $data);
    }
}