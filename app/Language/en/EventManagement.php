<?php

return [
    'dashboard' => 'Dashboard',
    'userInfo' => 'User Information',
    'validation' => [
        'messages' => [
            'eventForm' => [
                'eventName' => [
                    'required' => 'Please select the name'
                ],
                'eventAddress' => [
                    'required' => 'Please enter the address'
                ],
                'eventEmail' => [
                    'required' => 'Please enter the email',
                    'isValid' => 'Please enter valid email (user@domain.com)',
                    'maxlength' => "The email should less than or equal to ##REQUIREREPLACE## characters",
                    'regxEmail' => "Email Address is invalid: Please enter a valid email address. (user@domain.com)",
                ],
                'eventPhoneCode' => [
                    'required' => 'Please select the phone code',
                ],
                'eventMobile' => [
                    'required' => 'Please enter the mobile number',
                    'number' => 'Please enter numbers Only',
                    'minlength' => 'The mobile number should greater than ##REQUIREREPLACE## characters',
                    'maxlength' => 'The mobile number should less than or equal to ##REQUIREREPLACE## characters',
                ],
                'eventReservationDate' => [
                    'required' => 'Please enter the reservation date',
                ],
                'eventReservationTime' => [
                    'required' => 'Please enter the reservation time',
                ],
                'eventNoOfPeople' => [
                    'required' => 'Please enter the no of people',
                    'maxlength' => "The no of people should less than or equal to ##REQUIREREPLACE## digits",
                ]
            ]
        ]
    ],
];