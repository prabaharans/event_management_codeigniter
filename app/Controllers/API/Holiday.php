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
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if($this->request->getPost('id')) {
            $id = $this->request->getPost('id');
            $data['id'] = $id;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $validation = \Config\Services::validation();
            $validationResult = $this->validate('holidayUpdate');
            $message = lang('EventManagement.validation.messages.holidayForm.UpdateSuccess');
        } else {
            $validation = \Config\Services::validation();
            $validationResult = $this->validate('holidayCreate');
            $message = lang('EventManagement.validation.messages.holidayForm.addSuccess');
        }

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
            'message' => $message
        ]);
    }
}
