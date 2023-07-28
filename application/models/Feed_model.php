<?php 



class Feed_model extends CI_Model
{
    public function selectAll($column = '*') {
        $this->db->select($column);
        $data = $this->db->get('feed');
        return $data->result();
    }

    public function insert($data) {
        return $this->db->insert('feed', $data);
        return $this->db->affected_rows();
    }

    public function selectBy($idFeed) {
        $this->db->select('*');
        $this->db->where('id_feed', $idFeed);
        $data = $this->db->get('feed');
        return $data->row();
    }

    public function update($idFeed, $data) {
        $this->db->where('id_feed', $idFeed);
        $this->db->update('feed', $data);
        // mengembalikan nilai berupa jumlah data yang berpengaruh
        return $this->db->affected_rows();
    }

    public function delete($idFeed) {
        $this->db->where('id_feed', $idFeed);
        $this->db->delete('feed');
        return $this->db->affected_rows();
    }
}



?>