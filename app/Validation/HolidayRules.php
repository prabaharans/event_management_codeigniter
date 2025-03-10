<?php

namespace App\Validation;

class HolidayRules
{
    public function create(): mixed
    {
        return [
            'hdate' => [
                'label' => 'Date',
                'rules' => 'required'
            ],
            'reason' => [
                'label' => 'Reasons',
                'rules' => 'required|string|min_length[10]|max_length[60]',
            ]
        ];

    }

    public function update(): mixed
    {
        return [
            'id' => [
                'label' => 'Id',
                'rules' => 'required'
            ],
            'hdate' => [
                'label' => 'Date',
                'rules' => 'required'
            ],
            'reason' => [
                'label' => 'Reasons',
                'rules' => 'required|string|min_length[10]|max_length[60]',
            ]
        ];

    }
}
