<?php 



class Product extends CI_Controller
{
    function listProduct($idSubcategory = null) {
        $column = ["id_product","name_product","price_product","image_product","product.id_subcategory"];
        $dataProduct = $this->mProduct->selectAll($column, $idSubcategory);

        if (count($dataProduct) > 0) {
            foreach ($dataProduct as $index => $value) {
                $dataProduct[$index]->image_product = base_url('images/product/'.$value->image_product);
            }
            $response = [
                "data" => $dataProduct,
                "status" => 200,
                "error" => "OK",
                "message" => "Fetched all data"
            ];
            die(json_encode($response));
        } else {
             $response = [
                "data" => null,
                "status" => 400,
                "error" => "EMPTY_DATA",
                "message" => "Data is empty"
            ];
            die(json_encode($response));
        }
    }

    function detailProduct($idProduct) {
         $dataProduct = $this->mProduct->selectBy($idProduct);

         //update data gambarnya dengan gabungan baseurl(), sama seperti diatas
         $dataProduct->image_product = base_url('images/product/'.$dataProduct->image_product);

        if (!empty($dataProduct)) {
            $response = [
                "data" => $dataProduct,
                "status" => 200,
                "error" => "OK",
                "message" => "Fetched all data"
            ];
            die(json_encode($response));
        } else {
             $response = [
                "data" => null,
                "status" => 400,
                "error" => "EMPTY_DATA",
                "message" => "Data is empty"
            ];
            die(json_encode($response));
        }
    }
}



?>