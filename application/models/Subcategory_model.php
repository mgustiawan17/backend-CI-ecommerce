<?php 


class Subcategory_model extends CI_Model
{
    public function selectAll($column = '*', $idCategory) {
        $this->db->select($column);
        if($idCategory != null) {
            $this->db->where('id_category', $idCategory);
        }
        $data = $this->db->get('subcategory');
        return $data->result();
    }

    public function insert($data) {
        $this->db->insert('subcategory', $data);
        return $this->db->affected_rows();
    }

    public function selectBy($idSubcategory) {
        $this->db->select('*');
        $this->db->where('id_subcategory', $idSubcategory);
        $data = $this->db->get('subcategory');
        return $data->row();
    }

    public function update($idSubcategory, $data) {
        $this->db->where('id_subcategory', $idSubcategory);
        $this->db->update('subcategory', $data);
        // mengembalikan nilai berupa jumlah data yang berpengaruh
        return $this->db->affected_rows();
    }

    public function delete($idSubcategory) {
        $this->db->where('id_subcategory', $idSubcategory);
        $this->db->delete('subcategory');
        return $this->db->affected_rows();
    }
}



?>