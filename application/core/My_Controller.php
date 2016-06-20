<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_Controller extends CI_Controller
{
    public $template = [];
    public $data = [];

    public function __construct()
    {
        parent::__construct();

        // Authentication
        if (!$this->session->has_userdata('user') && (strtolower($this->router->class) != 'auth')) {
            redirect(base_url('login'));
        }
    }

    public function layout($type = null)
    {
        switch ($type) {
            case 'full-width-no-header':
                $this->template['middle'] = $this->load->view($this->content, $this->data, true);
                break;

            default:
                $this->template['header'] = $this->load->view('layout/header', $this->data, true);
                $this->template['left']   = $this->load->view('layout/left', $this->data, true);
                $this->template['middle'] = $this->load->view($this->content, $this->data, true);
                $this->template['footer'] = $this->load->view('layout/footer', $this->data, true);
                break;
        }

        $this->load->view('layout/index', $this->template);
    }
}
