<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;
use App\Models\UserDetailsModel;
use App\Models\UserIdentityModel;

class User extends BaseController
{
    public function index()
    {
        $users = new UsersModel;
        return $this->respond(['users' => $users->findAll()], 200);
    }

    public function info($id)
    {
        if(!$id) return false;

        $users = new UsersModel;
        $userInfo = $users->find($id);

        $userDetailModel = new UserDetailsModel();
        $userIdentityModel = new UserIdentityModel();
        $getIdentities = $userIdentityModel->getIdentityByType($userInfo,'email_password');
        // echo '<pre>';
        // print_r($getIdentities->secret);
        // echo '</pre>';
        // die;

        $response = [
            'user-info' => $userInfo,
            'email' => $getIdentities->secret,
            'details'   => $userDetailModel->where('user_id', user_id())->first()
        ];
        return $this->response->setJSON($response);

    }
}
