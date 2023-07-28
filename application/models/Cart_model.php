<?php 



class Cart_model extends CI_Model
{
    public function select($column = [
        "cart.id_cart",
        "product.name_product",
        "cart.id_user",
        "cart.quantity",
    ],$idUser,$idCart = null) {
        $this->db->select($column);
        $this->db->join('product','cart.id_product = product.id_product','inner');
        $this->db->where('cart.id_user', $idUser);
        if ($idCart != null) {
            $this->db->where('cart.id_cart', $idCart);
        }
        $data = $this->db->get('cart');
        if ($idCart != null) {
            return $data->row();
        }
        return $data->result();
    }

    public function insert($data) {
        return $this->db->insert('cart', $data);
        return $this->db->affected_rows();
    }

    public function update($idCart, $data,$idUser) {
        $this->db->where('id_cart', $idCart);
        $this->db->where('id_user', $idUser);
        $this->db->update('cart', $data);
        // mengembalikan nilai berupa jumlah data yang berpengaruh
        return $this->db->affected_rows();
    }

    public function delete($idCart,$idUser) {
        $this->db->where('id_cart', $idCart);
        $this->db->where('id_user', $idUser);
        $this->db->delete('cart');
        return $this->db->affected_rows();
    }
}



?>