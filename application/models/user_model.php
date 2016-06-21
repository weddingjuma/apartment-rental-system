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

    }

    public function loginByName($id)
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
