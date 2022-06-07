<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthUser implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        //sudah terwakilkan di Auth Admin
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if((session()->get('logged_in') == true) && (session()->get('level') == 1 )) //users
        {
            return redirect()->to(base_url('/'));
        } 
    }
}