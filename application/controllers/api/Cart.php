<?php

class Cart extends CI_Controller
{
    function listCart($idUser){
        $column = [
            "cart.id_cart",
            "product.id_product",
            "product.name_product",
            "product.image_product",
            "product.price_product as harga_satuan",
            "cart.id_user",
            "cart.quantity",
            "(cart.quantity * product.price_product) as total_harga"
        ];
        $data = $this->mCart->select($column, $idUser);
        foreach ($data as $value){
            $value->image_product = base_url('images/product').$value->image_product;
        }
        if(count($data) > 0) {
            $response = [
                "data" => $data,        
                "status" => 200,
                "error" => 'OK',
                "message" => "Fetch data Success!",
            ];
        } else {
            $response = [
                "data" => $data,
                "status" => 400,
                "error" => 'EMPTY_DATA',
                "message" => "Data empty!",
            ];
        }
        die(json_encode($response));
    }

    function cartById($idUser, $idCart) {
        $column = [
            "cart.id_cart",
            "product.name_product",
            "product.image_product",
            "cart.id_user",
            "cart.quantity",
        ];
        $data = $this->mCart->select($column, $idUser, $idCart);
        $data->image_product = base_url('images/product').$data->image_product;
        if(!empty($data)) {
            $response = [
                "data" => $data,
                "status" => 200,
                "error" => 'OK',
                "message" => "Fetch data Success!",
            ];
        } else {
            $response = [
                "data" => $data,
                "status" => 400,
                "error" => 'EMPTY_DATA',
                "message" => "Data empty!",
            ];
        }
        die(json_encode($response));
    }

    function delete($idUser, $idCart){
        $data = $this->mCart->delete($idUser, $idCart);
        if($data > 0) {
            $response = [
                "rows" => $data,
                "status" => 200,
                "message" => "Delete Success!"
            ];
        } else {
            $response = [
                "rows" => $data,
                "status" => 400,
                "message" => "Delete Failed!"
            ];
        }
        die(json_encode($response));
    }

    function update($idCart, $idUser){
        $data = $this->input->post();
        $update = $this->mCart->update($idCart, $data, $idUser);
        $response = [];
        if($update > 0) {
            $response = [
                "rows" =>$update,
                "status" => 200,
                "message" => "Delete Success!"
            ];
        } else {
            $response = [
                "rows" => $update,
                "status" => 400,
                "message" => "Delete Failed!"
            ];
        }
        die(json_encode($response));
    }

    function add(){
        $data = $this->input->post();
        $data['id_cart'] = rand(11111,99999);
        $insert = $this->mCart->insert($data);
        $response = [];
        if($insert > 0) {
            $response = [
                "rows" =>$insert,
                "status" => 200,
                "message" => "Add Success!"
            ];
        } else {
            $response = [
                "rows" => $insert,
                "status" => 400,
                "message" => "Add    Failed!"
            ];
        }
        die(json_encode($response));
    }
}