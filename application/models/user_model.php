<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public $username;
    public $password;

    public function __construct()
    {
        parent::__construct();
    }

    private function encodePassword($password)
    {
        return md5($password);
    }

    public function loginByName()
    {
        $query = $this->db->where('username', $this->input->post('username'))
                    ->where('password', $this->encodePassword($this->input->post('password')))
                    ->where('is_active', 1)
                    ->limit(1)->get('users');

        if ($query->num_rows()) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function loginByEmail()
    {
        $query = $this->db->where('username', $this->input->post('username'))
                    ->where('password', md5($this->input->post('password')))
                    ->where('is_active', 1)
                    ->limit(1)->get('users');

        if ($query->num_rows()) {
            return $query->row();
        } else {
            return false;
        }
    }
}
