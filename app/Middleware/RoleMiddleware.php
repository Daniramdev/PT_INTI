<?php

namespace App\Middleware;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleMiddleware implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $uri = service('uri')->getPath();

        $allowedRoles = [];
        if (strpos($uri, 'admin/') === 0) {
            $allowedRoles = ['admin'];
        } elseif (strpos($uri, 'user/') === 0) {
            $allowedRoles = ['user'];
        }

        if (!empty($allowedRoles) && !in_array(session()->get('role'), $allowedRoles)) {
            return redirect()->to('/')->with('error', 'Access denied.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}