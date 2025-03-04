<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CountriesModel;

class CountriesController extends BaseController
{
    public function index()
    {
        //
    }

    public function getPhoneCodes($limit = 10, $offset = 0)
    {
        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();
        $page = ($postData['page']) ?? 1;
        $offset = ($page - 1) * $limit;
        // Fetch record
        // $countries = new CountriesModel();
        $countries = model(CountriesModel::class);
        // $countries->select('id,name')->orderBy('name')->asArray();
        $countries->select('id, name, phonecode, iso2')->orderBy('name');

        if(isset($postData['searchTerm'])){
            $searchTerm = $postData['searchTerm'];
            $countries->like('name', $searchTerm);
            $countries->orLike('phonecode', $searchTerm);
            $countries->orLike('iso2', $searchTerm);
        }

        $countriesList = $countries->findAll($limit, $offset);
        $countriesCnt = new CountriesModel();
        $countriesCount = $countriesCnt->countAllResults();

        $endCount = $offset + $limit;
        $morePages = $endCount < $countriesCount;
        $data = array();
        foreach($countriesList as $country){
            $data[] = array(
                "id" => $country['iso2'],
                "text" => '+'.$country['phonecode'].' ('.$country['name'].')',
                "data_id" => $country['id']
            );
        }

        $response['data'] = $data;
        $response['pagination']['more'] = $morePages;
        return $this->response->setJSON($response);
    }
}
