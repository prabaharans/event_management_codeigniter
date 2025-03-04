<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\CountriesModel;

class Home extends BaseController
{
    public function index(): string
    {
        $currentUserDetails = getCurrentUserDetails();
        // echo '<pre>';
        // print_r($currentUserDetails->email);
        // echo '</pre>';
        // die;
        $countriesModel = new CountriesModel();
        $countries = $countriesModel->findAll();
        $usersModel = new UsersModel();
        $users = $usersModel->findAll();
        $data = [
            'users' => $users,
            'countries' => $countries,
            'currentUserDetails' => $currentUserDetails,
            'token' => getUerJWTToken($currentUserDetails['email'])
        ];
        return view('dashboard', $data);
    }

    public function studentDashboard()
    {
        echo 'admin dashboard';
    }

    public function adminDashboard()
    {
        echo 'student dashboard';
    }

    public function userInfo()
    {
        $currentUserDetails = getCurrentUserDetails();
        // echo '<pre>';
        // print_r($currentUserDetails);
        // echo '</pre>';
        // die;
        return view('user_info', $currentUserDetails);
    }
}
