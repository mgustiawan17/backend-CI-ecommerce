<?php 



class Carousel extends CI_Controller
{
    function listCarousel() {
        $dataCarousel = $this->mCarousel->selectAll('id_carousel,img_carousel');

        if (count($dataCarousel) > 0) {
            foreach ($dataCarousel as $index => $value) {
                $dataCarousel[$index]->img_carousel = base_url('images/carousel/'.$value->img_carousel);
            }
            $response = [
                "data" => $dataCarousel,
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

    function detailCarousel($idCarousel) {
         $dataCarousel = $this->mCarousel->selectBy($idCarousel);

         //update data gambarnya dengan gabungan baseurl(), sama seperti diatas
         $dataCarousel->img_carousel = base_url('images/carousel/'.$dataCarousel->img_carousel);

        if (!empty($dataCarousel)) {
            $response = [
                "data" => $dataCarousel,
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