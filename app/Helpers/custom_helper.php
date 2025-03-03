<?php
use App\Models\UsersModel;
use App\Models\UserDetailsModel;
function getCurrentUserDetails(){
    $userDetailModel = new UserDetailsModel();
    $user                   = auth()->user();
    $identity               = auth()->user()->getEmailIdentity();

    $data = [
        'title'             => 'View Users',
        'user'              => $user,
        'details'           => $userDetailModel->where('user_id', user_id())->first(),
        'group'             => auth()->user()->getGroups(),
        'permissions'       => auth()->user()->getPermissions(),
        'identity'          => $identity->secret
    ];
    return $data;
}

function roleName($id) {
    return auth()->get_users_groups($id)->row()->name;
}
?>