<?php

namespace App\Controllers;

use App\Models\User;

class Users extends BaseController
{

    public $user;
    public $session;

    public function __construct()
    {
        // parent::__construct();
        $this->user = new User();
    }

    public function index()
    {
        $data['message'] = "";
        return view('Login', $data);
    }

    public function register()
    {
        $request = \Config\Services::request();

        $this->user->register($request->getPost());
        return view('Login', ['register_errors']);
    }

    public function userDashboard()
    {
        //take user to controller after they've been registered
        return view('/Dashboard');
    }

    public function login()
    {
        $request = \Config\Services::request();

        $this->user->login($request->getPost());
        return view('Login', ['login_errors']);
    }
}
