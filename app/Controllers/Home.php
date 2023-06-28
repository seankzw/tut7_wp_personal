<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        if(session()->get('email') == null){
            return redirect()->route('login');
        }
        $data['title'] = 'Dashboard here';
        return view('layouts/header', $data)
                . view('home/dashboard')
                . view('layouts/footer');
    }
}
