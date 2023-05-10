<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\ApiModel;

class ApiAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $username = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : "";
        $password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : "";
        $usr = new ApiModel();
        $data_user = $usr->getUsername($username);
        if ($data_user) {
            $pass = $data_user['password'];
            $verify_pass = password_verify($password, $pass);
            if (!$verify_pass) {
                header("Content-type: application/json");

                echo json_encode(array(
                    "status" => false,
                    "message" => "Invalid credentials"
                ));
                die;
            }
        } else {
            header("Content-type: application/json");
            echo json_encode(array(
                "status" => false,
                "message" => "Invalid credentials"
            ));
            die;
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
