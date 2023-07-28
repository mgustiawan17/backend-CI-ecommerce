<?php 



class Carousel_model extends CI_Model
{
    public function selectAll($column = '*') {
        $this->db->select($column);
        $data = $this->db->get('carousel');
        return $data->result();
    }

    public function insert($data) {
        return $this->db->insert('carousel', $data);
        return $this->db->affected_rows();
    }

    public function selectBy($idCarousel) {
        $this->db->select('*');
        $this->db->where('id_carousel', $idCarousel);
        $data = $this->db->get('carousel');
        return $data->row();
    }

    public function update($idCarousel, $data) {
        $this->db->where('id_carousel', $idCarousel);
        $this->db->update('carousel', $data);
        // mengembalikan nilai berupa jumlah data yang berpengaruh
        return $this->db->affected_rows();
    }

    public function delete($idCarousel) {
        $this->db->where('id_carousel', $idCarousel);
        $this->db->delete('carousel');
        return $this->db->affected_rows();
    }
}



?>