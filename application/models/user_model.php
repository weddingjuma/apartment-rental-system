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

    public function loginByName($username, $password)
    {
        if ($this->input->post('username')) {
            $query = $this->db->where('username', $this->input->post('username'))
                        ->where('password', $this->encodePassword($this->input->post('password')))
                        ->where('is_active', 1)
                        ->limit(1)->get('users');
        }

        if ($query->num_rows()) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function loginByEmail($username, $password)
    {
        if ($this->input->post('email')) {
            $query = $this->db->where('email', $this->input->post('email'))
                        ->where('password', $this->encodePassword($this->input->post('password')))
                        ->where('is_active', 1)
                        ->limit(1)->get('users');
        }

        if ($query->num_rows()) {
            return $query->row();
        } else {
            return false;
        }
    }
}
