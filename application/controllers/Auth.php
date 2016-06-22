<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = 'login';

        $this->content = 'auth/login';
        $this->layout();
    }

    public function postLogin()
    {
        $user = $this->user_model->loginByName($this->input->post('username'), $this->input->post('password'));

        // Cretae user session
        $data = [
            'user_id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
            'type' => $user->type,
            'is_active' => $user->is_active,
            'logged_in' => true,
        ];

        $this->session->set_userdata($data);

        redirect('dashboard');
    }

    public function logout()
    {
        $data = ['user_id','username','email','type','is_active','logged_in',];
        $this->session->unset_userdata($data);
        redirect('login');
    }
}
