<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;
use App\Models\UserDetailsModel;

class User extends BaseController
{
    public function index()
    {
        $users = new UsersModel;
        return $this->respond(['users' => $users->findAll()], 200);
    }

    public function info($id)
    {
        $users = new UsersModel;
        $userDetailModel = new UserDetailsModel();

        $response = [
            'user-info' => $users->find($id),
            'details'   => $userDetailModel->where('user_id', user_id())->first()
        ];
        return $this->response->setJSON($response);

    }
}
