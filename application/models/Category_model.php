<?php 



class Category_model extends CI_Model
{
    public function selectAll($column = '*') {
        $this->db->select($column);
        $data = $this->db->get('category');
        return $data->result();
    }

    public function insert($data) {
        return $this->db->insert('category', $data);
        return $this->db->affected_rows();
    }

    public function selectBy($idCategory) {
        $this->db->select('*');
        $this->db->where('id_category', $idCategory);
        $data = $this->db->get('category');
        return $data->row();
    }

    public function update($idCategory, $data) {
        $this->db->where('id_category', $idCategory);
        $this->db->update('category', $data);
        // mengembalikan nilai berupa jumlah data yang berpengaruh
        return $this->db->affected_rows();
    }

    public function delete($idCategory) {
        $this->db->where('id_category', $idCategory);
        $this->db->delete('category');
        return $this->db->affected_rows();
    }
}



?>