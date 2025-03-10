<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\CountriesModel;
use App\Models\HolidaysModel;
use \Hermawan\DataTables\DataTable;
use CodeIgniter\I18n\Time;

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
        $holidays->orderBY('updated_at', 'Desc');
        $holidays->orderBY('id', 'Desc');

        return DataTable::of($holidays)->addNumbering('no')
        ->add('action', function($row){
            return '<button type="button" class="btn btn-primary btn-sm" onclick="holidayEdit('.$row->id.')" ><i class="fas fa-edit"></i> Edit</button>';
        }, 'last')
        ->format('hdate', function($value, $meta){
            $hDate = Time::parse($value); // Parse a date

            return $hDate->toLocalizedString('MMM d, yyyy hh:mm:ss a');
            // return $hDate->humanize(); // Outputs something like "1 month ago"
        })
        ->hide('id')
        ->toJson(true);
    }

    public function ajaxGet($id)
    {
        $holidays = new HolidaysModel();
        $holidays->select('id, hdate, reason');
        $resData = $holidays->find($id);
        return $this->response->setJSON($resData);
    }
}
