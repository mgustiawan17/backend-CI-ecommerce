<?php 



class Subcategory extends CI_Controller
{
    function listSubcategory($idCategory) {
        $dataSubcategory = $this->mSubcategory->selectAll('id_subcategory,id_category,name_subcategory,image_subcategory',$idCategory);

        if (count($dataSubcategory) > 0) {
            foreach ($dataSubcategory as $index => $value) {
                $dataSubcategory[$index]->image_subcategory = base_url('images/subcategory/'.$value->image_subcategory);
            }
            $response = [
                "data" => $dataSubcategory,
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

    function listProductBySubcategory($idSubcategory) {
        $dataProduct = $this->mProduct->selectAll(["id_product","name_product","image_product","price_product","product.id_subcategory"],$idSubcategory);

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

    function detailSubcategory($idSubcategory) {
         $dataSubcategory = $this->mSubcategory->selectBy($idSubcategory);

         //update data gambarnya dengan gabungan baseurl(), sama seperti diatas
         $dataSubcategory->image_subcategory = base_url('images/subcategory/'.$dataSubcategory->image_subcategory);

        if (!empty($dataSubcategory)) {
            $response = [
                "data" => $dataSubcategory,
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