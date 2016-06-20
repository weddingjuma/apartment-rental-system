<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
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
        print_r($this->input->post());
        exit;
    }
}
