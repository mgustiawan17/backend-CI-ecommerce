<?php 



class Feed extends CI_Controller
{
    function listFeed() {
        $dataFeed = $this->mFeed->selectAll('id_feed,title_feed,category_feed,image_feed,date_feed');

        if (count($dataFeed) > 0) {
            foreach ($dataFeed as $index => $value) {
                $dataFeed[$index]->image_feed = base_url('images/feed/'.$value->image_feed);
            }
            $response = [
                "data" => $dataFeed,
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

    function detailFeed($idFeed) {
         $dataFeed = $this->mFeed->selectBy($idFeed);

         //update data gambarnya dengan gabungan baseurl(), sama seperti diatas
         $dataFeed->image_feed = base_url('images/feed/'.$dataFeed->image_feed);

        if (!empty($dataFeed)) {
            $response = [
                "data" => $dataFeed,
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