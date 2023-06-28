<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserAuthenticationModel;
use Config\Services;

class UserAuthentication extends BaseController
{
    public function login(){
        error_log("=== Login run ===");
        helper('form');

        $data = [
            'title' => "Login page"
        ];

        if (!$this->request->is('post')){
            error_log("=== Get request, returning view ===");
            return view("layouts/header", $data)
                    . view("authentication/login")
                    . view("layouts/footer");
        }

        $post_data = $this->request->getPost(['email','password']);

        if(!$this->validateData($post_data, [
            'email' => 'required|valid_email',
            'password' => 'required'
        ])){
            session()->setFlashdata("error", "Please key in a valid input");
            return view("layouts/header", $data)
                    . view("authentication/login")
                    . view("layouts/footer");
        }

        error_log("=== Post request, Processing ===");
        $model = model(UserAuthenticationModel::class);

        $user = $model->loginUser($post_data['email'],$post_data['password']);

        if(!$user){
            error_log("=== Login fail ===");
            session()->setFlashdata("error", "Invalid email or password. Please try again.");
            return view("layouts/header", $data)
                    . view("authentication/login")
                    . view("layouts/footer");
        }

        $userLogonDetails = [
            "id" => $user['id'],
            "email" => $user['email']
        ];

        session()->set($userLogonDetails);
        return redirect()->route("dashboard");
    }

    public function signup(){
        error_log("=== Sign up run ===");
        helper('form');

        $data = [
            'title' => "Sign up page"
        ];

        if(!$this->request->is('post')){
            error_log("=== Request is a get, returning view ===");
            return view('authentication/signup', $data);
        }

        error_log("=== Request a post, processing ===");

        $post_data = $this->request->getPost(['email','password','cpassword']);

        if(!$this->validateData($post_data,[
            'email' => 'required|valid_email',
            'password' => 'required',
            'cpassword' => 'required'
        ])){
            error_log("=== Data validation failed, returning ===");
            return view("layouts/header", $data)
                    . view("authentication/signup")
                    . view("layouts/footer");
        }

        if($post_data['password'] != $post_data['cpassword']){
            error_log("=== Password and Confirm password don't match ===");
            session()->setFlashdata('error',"Password don't match");
            return view("layouts/header", $data)
                    . view("authentication/signup")
                    . view("layouts/footer");
        }
        $model = model(UserAuthenticationModel::class);

        $model->save([
            'email' => $post_data['email'],
            'password' => md5($post_data['password'])
        ]);


            return view("layouts/header", ['title'=>'Signup success! Please login.'])
                    . view("authentication/login")
                    . view("layouts/footer");
    }

    public function signout(){
        session()->destroy();
        return redirect()->route('login');
    }
}
