<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\CountriesModel;
use App\Models\HolidaysModel;
use \Hermawan\DataTables\DataTable;

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

    public function holidays()
    {
        $currentUserDetails = getCurrentUserDetails();
        $usersModel = new UsersModel();
        $users = $usersModel->findAll();
        $data = [
            'users' => $users,
            'currentUserDetails' => $currentUserDetails,
            'token' => getUerJWTToken($currentUserDetails['email'])
        ];
        return view('holidays', $data);
    }

    public function ajaxHolidaysDataTables()
    {
        $holidays = new HolidaysModel();
        $holidays->select('id, hdate, reason');

        return DataTable::of($holidays)
        ->add('action', function($row){
            return '<button type="button" class="btn btn-primary btn-sm" onclick="alert(\'edit holiday: '.$row->reason.'\')" ><i class="fas fa-edit"></i> Edit</button>';
        }, 'last')
        ->toJson();
    }
}
