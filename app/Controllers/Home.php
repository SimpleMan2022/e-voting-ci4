<?php

namespace App\Controllers;

use App\Models\UserModel;

use function PHPUnit\Framework\returnSelf;

class Home extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function index(): string
    {
        $data['title'] = "E-Voting | Home";
        return view("template/index", $data);
    }

    public function login()
    {
        $data['title'] = "E-Voting | Login";
        return view("auth/login", $data);
    }

    public function authenticate()
    {
        $data = [
            'email' => $this->request->getVar('email'),
            'password' => md5($this->request->getVar('password')),
        ];

        $user = $this->model->where('email', $data['email'])->first();
        if ($user) {
            if ($user['password'] == $data['password']) {
                session()->set('name', $user['name']);
                session()->set('is_login', true);
                session()->set('is_admin', $user['is_admin']);
                if ($user['is_admin'] == 1) {
                    return redirect()->to(base_url('/dashboard'));
                } else {
                    return redirect()->to(base_url('/'));
                }
            } else {
                return redirect()->back()->with('error', 'Wrong email or password');
            }
        } else {
            return redirect()->back()->with('error', 'Wrong email or password');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}
