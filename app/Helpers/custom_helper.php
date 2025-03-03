<?php
use App\Models\UsersModel;
use App\Models\UserDetailsModel;
use \Firebase\JWT\JWT;

function getCurrentUserDetails(){
    $userDetailModel = new UserDetailsModel();
    $user                   = auth()->user();
    // $identity               = auth()->user()->getEmailIdentity();

    $data = [
        'title'             => 'View Users',
        'user'              => $user,
        'details'           => $userDetailModel->where('user_id', user_id())->first(),
        'group'             => auth()->user()->getGroups(),
        'permissions'       => auth()->user()->getPermissions(),
        'email'             => auth()->user()->getEmail(),
        'previousLogin'     => auth()->user()->previousLogin(),
        'lastLogin'         => auth()->user()->lastLogin()
    ];
    return $data;
}

function roleName($id) {
    return auth()->get_users_groups($id)->row()->name;
}

function getUerJWTToken ($email) {
    $key = getenv('JWT_SECRET');
    $iat = time(); // current timestamp value
    $exp = $iat + 3600;

    $payload = array(
        "iss" => "Issuer of the JWT",
        "aud" => "Audience that the JWT",
        "sub" => "Subject of the JWT",
        "iat" => $iat, //Time the JWT issued at
        "exp" => $exp, // Expiration time of token
        "email" => $email,
    );

    $token = JWT::encode($payload, $key, 'HS256');
    return $token;
}
?>