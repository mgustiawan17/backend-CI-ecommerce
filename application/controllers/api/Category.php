<?php 



class Category extends CI_Controller
{
    function listCategory() {
        $dataCategory = $this->mCategory->selectAll('id_category,name_category,image_category');

        if (count($dataCategory) > 0) {
            foreach ($dataCategory as $index => $value) {
                $dataCategory[$index]->image_category = base_url('images/category/'.$value->image_category);
            }
            $response = [
                "data" => $dataCategory,
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

    function detailCategory($idCategory) {
         $dataCategory = $this->mCategory->selectBy($idCategory);

         //update data gambarnya dengan gabungan baseurl(), sama seperti diatas
         $dataCategory->image_category = base_url('images/category/'.$dataCategory->image_category);

        if (!empty($dataCategory)) {
            $response = [
                "data" => $dataCategory,
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