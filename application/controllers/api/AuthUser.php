<?php


class AuthUser extends CI_Controller
{
    function login() {
        $data = $this->input->post();

        $authenticate = $this->mAuthUser->authenticate($data['email'], $data['password']);

        if ($authenticate) {
            $response = [
                "data" => $authenticate,
                "status" => 200,
                "error" => "OK",
                "message" => "Fetched all data"
            ];
            die(json_encode($response));
        } else {
            $response = [
                "data" => $authenticate,
                "status" => 400,
                "error" => "EMPTY_DATA",
                "message" => "Login Invalid"
            ];
            die(json_encode($response));
        }
    }

    function register() {
        $data = $this->input->post();
        $data['id_user'] = rand(11111,99999);
        $data['password'] = md5($data['password']);
        // die(json_encode($data));
        $insert = $this->mAuthUser->insert($data);

        if ($insert) {
            $response = [
                "data" => $insert,
                "status" => 200,
                "error" => "OK",
                "message" => "Fetched all data"
            ];
            die(json_encode($response));
        } else {
            $response = [
                "data" => $insert,
                "status" => 400,
                "error" => "EMPTY_DATA",
                "message" => "Login Invalid"
            ];
            die(json_encode($response));
        }
    }
}