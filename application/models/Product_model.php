<?php 



class Product_model extends CI_Model
{
    public function selectAll($column = [
            "product.id_product", 
            "product.name_product", 
            "subcategory.name_subcategory as subcategory",
            "product.desc_product as description",
            "product.stock_product as stock",
            "product.price_product as price",
            "product.image_product as image"
    ], $idSubcategory = null)
    { 
        $this->db->select($column);
        if ($idSubcategory != null) {
            $this->db->where('product.id_subcategory', $idSubcategory);
        }
        $this->db->join('subcategory', 'product.id_subcategory = subcategory.id_subcategory','inner');
        $data = $this->db->get('product');
        return $data->result();
    }

    public function insert($data) {
        return $this->db->insert('product', $data);
        return $this->db->affected_rows();
    }

    public function selectBy($idProduct) {
        $this->db->select('*');
        $this->db->where('id_product', $idProduct);
        $data = $this->db->get('product');
        return $data->row();
    }

    public function update($idProduct, $data) {
        $this->db->where('id_product', $idProduct);
        $this->db->update('product', $data);
        // mengembalikan nilai berupa jumlah data yang berpengaruh
        return $this->db->affected_rows();
    }

    public function delete($idProduct) {
        $this->db->where('id_product', $idProduct);
        $this->db->delete('product');
        return $this->db->affected_rows();
    }
}



?>