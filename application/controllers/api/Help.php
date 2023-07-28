<?php 



class Help extends CI_Controller
{
    function listHelp() {
        $dataHelp = $this->mHelp->selectAll('id_help,name_help,image_help');

        if (count($dataHelp) > 0) {
            foreach ($dataHelp as $index => $value) {
                $dataHelp[$index]->image_help = base_url('images/help/'.$value->image_help);
            }
            $response = [
                "data" => $dataHelp,
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

    function detailHelp($idHelp) {
         $dataHelp = $this->mHelp->selectBy($idHelp);

         //update data gambarnya dengan gabungan baseurl(), sama seperti diatas
         $dataHelp->image_help = base_url('images/help/'.$dataHelp->image_help);

        if (!empty($dataHelp)) {
            $response = [
                "data" => $dataHelp,
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