<?php 



class Help_model extends CI_Model
{
    public function selectAll($column = '*') {
        $this->db->select($column);
        $data = $this->db->get('help');
        return $data->result();
    }

    public function insert($data) {
        return $this->db->insert('help', $data);
        return $this->db->affected_rows();
    }

    public function selectBy($idHelp) {
        $this->db->select('*');
        $this->db->where('id_help', $idHelp);
        $data = $this->db->get('help');
        return $data->row();
    }

    public function update($idHelp, $data) {
        $this->db->where('id_help', $idHelp);
        $this->db->update('help', $data);
        // mengembalikan nilai berupa jumlah data yang berpengaruh
        return $this->db->affected_rows();
    }

    public function delete($idHelp) {
        $this->db->where('id_help', $idHelp);
        $this->db->delete('help');
        return $this->db->affected_rows();
    }
}



?>