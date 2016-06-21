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
        $query = $this->db->get('users')->limit(1);

        print_r($query->row());
    }
}
