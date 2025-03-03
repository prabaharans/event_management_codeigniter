<?php

return [
    'dashboard' => 'Dashboard',
    'validation' => [
        'messages' => [
            'eventForm' => [
                'eventName' => [
                    'required' => 'Please enter the name'
                ],
                'eventAddress' => [
                    'required' => 'Please enter the address'
                ],
                'eventEmail' => [
                    'required' => 'Please enter the email',
                    'isValid' => 'Please enter valid email',
                    'maxlength' => "The email name should less than or equal to ##REQUIREREPLACE## characters",
                    'regxEmail' => "Email Address is invalid: Please enter a valid email address.",
                ],
                'eventMobile' => [
                    'required' => 'Please enter the mobile number',
                    'number' => 'Please enter numbers Only',
                    'minlength' => 'The mobile number should greater than 10 characters',
                    'maxlength' => 'The mobile number should less than or equal to 17 characters',
                ],
                'eventReservationDate' => [
                    'required' => 'Please enter the reservation date',
                ],
                'eventReservationTime' => [
                    'required' => 'Please enter the reservation time',
                ],
                'eventNoOfPeople' => [
                    'required' => 'Please enter the no of people',
                ]
            ]
        ]
    ],
];