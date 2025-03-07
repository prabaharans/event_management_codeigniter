<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;
use App\Models\UserDetailsModel;
use App\Models\UserIdentityModel;
use App\Models\CountriesModel;

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
        $userDetail = $userDetailModel->where('user_id', $id)->first();
        // echo '<pre>';
        // print_r($userInfo);
        // echo '</pre>';
        // die;
        $countriesModel = new CountriesModel;
        $countries = $countriesModel->find($userDetail['country_id']);

        $response = [
            'user-info' => $userInfo,
            'countries' => $countries,
            'email' => $getIdentities->secret,
            'details'   => $userDetail
        ];
        return $this->response->setJSON($response);

    }
}
