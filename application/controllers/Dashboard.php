<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        print_r($this->session->get_userdata('username'));
        echo 'Hi, ' . $this->session->userdata('username');
    }
}
