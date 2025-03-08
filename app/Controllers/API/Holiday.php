<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\HolidaysModel;
class Holiday extends BaseController
{
    public function index()
    {
        //
    }

    public function update()
    {

        $data = [
            'hdate' => $this->request->getPost('hdate'),
            'reason' => $this->request->getPost('reason'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $validation = \Config\Services::validation();
        // if ($this->request->getPost()) {     // still TBD: any different to using $this->request->getGetPost() ?
        $validationResult = $this->validate('holidayCreate');
        if (!$validationResult) {

            $validationErrors = $validation->getErrors();
            return $this->response->setJSON([
                        'error' => true,
                        'message' => $validation->getErrors()
                    ]);
        }

        $holidaysModel = new HolidaysModel();
        $holidaysModel->save($data);
        return $this->response->setJSON([
            'error' => false,
            'message' => 'Successfully added new holiday!'
        ]);
    }
}
