<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Cek apakah user sudah login dan memiliki role admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/auth/login');
        }

        // Data untuk dashboard admin
        $data = [
            'title' => 'Admin Dashboard',
            'user' => session()->get('username'),
        ];

        return view('admin/dashboard', $data);
    }
}