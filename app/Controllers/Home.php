<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Home extends BaseController
{
    public function index(): string
    {
        $currentUserDetails = getCurrentUserDetails();
        $usersModel = new UsersModel();
        $users = $usersModel->findAll();
        $data = [
            'users' => $users,
            'currentUserDetails' => $currentUserDetails
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
}
