<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\UsersModel;
use \Firebase\JWT\JWT;
class Login extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $userModel = new UsersModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userModel->where('email', $email)->first();

        if(is_null($user)) {
            return $this->respond(['error' => 'Invalid username or password.'], 401);
        }

        $pwd_verify = password_verify($password, $user['password']);

        if(!$pwd_verify) {
            return $this->respond(['error' => 'Invalid username or password.'], 401);
        }

        // $key = getenv('JWT_SECRET');
        // $iat = time(); // current timestamp value
        // $exp = $iat + 3600;

        // $payload = array(
        //     "iss" => "Issuer of the JWT",
        //     "aud" => "Audience that the JWT",
        //     "sub" => "Subject of the JWT",
        //     "iat" => $iat, //Time the JWT issued at
        //     "exp" => $exp, // Expiration time of token
        //     "email" => $user['email'],
        // );

        // $token = JWT::encode($payload, $key, 'HS256');
        $token = getUerJWTToken($user['email']);
        $response = [
            'message' => 'Login Succesful',
            'token' => $token
        ];

        return $this->respond($response, 200);
    }
}
