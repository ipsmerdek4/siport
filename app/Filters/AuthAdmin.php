<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->get('logged_in') != true)
        {
            return redirect()->to(base_url('/login'));
        } 
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if((session()->get('logged_in') == true) && (session()->get('level') == 5 )) //Admin
        {
            return redirect()->to(base_url('/'));
        } 
    }
}