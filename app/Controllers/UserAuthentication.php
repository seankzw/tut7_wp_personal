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
            return view("layouts/header", $data)
                    . view("authentication/signup")
                    . view("layouts/footer");
        }

        error_log("=== Request a post, processing ===");

        $post_data = $this->request->getPost(['email','password','cpassword','security-question','security-answer']);

        if(!$this->validateData($post_data,[
            'email' => 'required|valid_email',
            'password' => 'required',
            'cpassword' => 'required',
            'security-question' => 'required',
            'security-answer' => 'required'
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

        // Models
        $user_model = model(UserAuthenticationModel::class);

        error_log($post_data['security-question']);
        error_log($post_data['security-answer']);

        // Save to user
        $user_model->save([
            'email' => $post_data['email'],
            'password' => md5($post_data['password']),
            'security_question' => $post_data['security-question'],
            'security_answer' => $post_data['security-answer'],
            'account_balance' => 0
        ]);


            return view("layouts/header", ['title'=>'Signup success! Please login.'])
                    . view("authentication/login")
                    . view("layouts/footer");
    }

    public function signout(){
        session()->destroy();
        return redirect()->route('login');
    }

    public function reset(){
        error_log("=== Reset ran ===");
        helper('form');

        if(!$this->request->is('post')){
            error_log("=== Get request===");
            return view("layouts/header", ['title'=>'Password reset'])
                    . view("authentication/reset")
                    . view("layouts/footer");
        }

        $model = model(UserAuthenticationModel::class);
        $post_data = $this->request->getPost(['email', 'security-answer']);
        $user_id = $model->getUserId($post_data['email']);

        if(!$user_id){
            session()->setFlashdata('error', 'Invalid email address');

            return view("layouts/header", ['title'=>'Password reset'])
                    . view("authentication/reset")
                    . view("layouts/footer");
        }else if($user_id && isset($post_data['email']) && !isset($post_data['security-answer'])){
            error_log("=== Show security question === ");

            $userQuestion = $model->getSecurityQuestion($user_id);

            $data = [
                'title' => 'Password reset',
                'sQuestion' => $userQuestion,
                'email' => $post_data['email']
            ];

            error_log($post_data['security-answer']);

            return view("layouts/header",$data)
                    . view("authentication/reset")
                    . view("layouts/footer");
        }else if ($user_id && isset($post_data['email']) && isset($post_data['security-answer'])){
            error_log("=== output random password === ");

            //Check answer correct

            if(!$model->verifySecurityAnswer($user_id, $post_data['security-answer'])){

                $userQuestion = $model->getSecurityQuestion($user_id);
                $data = [
                    'title' => 'Password reset',
                    'sQuestion' => $userQuestion,
                    'email' => $post_data['email']
                ];

                session()->setFlashdata("error", "Incorrect security answer. Please try again");


                return view("layouts/header",$data)
                        . view("authentication/reset")
                        . view("layouts/footer");
            }
            $randPwd = $this->random_password();
            $data = [
                'title' => 'Password reset',
                'email' => $post_data['email'],
                'new_pwd' => $randPwd
            ];

            $model->updateUserData($user_id, $randPwd);

            return view("layouts/header",$data)
                    . view("authentication/reset")
                    . view("layouts/footer");

        }

    }

    private function random_password() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+=-<>?/,.';
        $password = str_shuffle($alphabet);
        return substr($password, 0, 12);
    }
}
