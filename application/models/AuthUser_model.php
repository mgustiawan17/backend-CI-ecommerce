<?php 

class AuthUser_model extends CI_Model
{
    public function authenticate($email, $password) {
        $this->db->select('id_user, username, email');
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $data = $this->db->get('user');
        return $data->row();
    }

    public function insert($data) {
        return $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }
}