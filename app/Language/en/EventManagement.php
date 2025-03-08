<?php

return [
    'dashboard' => 'Dashboard',
    'book_event' => 'Book Event',
    'name' => 'Name',
    'address' => 'Address',
    'mobile' => 'Mobile',
    'select_user' => '--select user--',
    'phone_codes' => 'Phone Codes',
    'mobile_number' => 'Mobile number',
    'email_address' => 'Email address',
    'reservation_date' => 'Reservation Date',
    'reservation_date_placeholder' => 'YYYY-mm-dd',
    'reservation_time' => 'Reservation Time',
    'reservation_time_placeholder' => 'HH:mm',
    'no_of_peoples' => 'No of Peoples',
    'submit' => 'Submit',
    'holidays' => 'Holidays',
    'holiday_list' => 'Holiday List',
    'holiday_form' => 'Holiday',
    'holiday_date' => 'Date',
    'holiday_date_placeholder' => 'yyyy-mm-dd',
    'holiday_reason' => 'Reason',
    'add_holiday' => 'Add Holiday',
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
                    'required' => 'Please select the reservation date',
                ],
                'eventReservationTime' => [
                    'required' => 'Please select the reservation time',
                ],
                'eventNoOfPeople' => [
                    'required' => 'Please enter the no of people',
                    'maxlength' => "The no of people should less than or equal to ##REQUIREREPLACE## digits",
                ]
            ],
            'holidayForm' => [
                'holidayDate' => [
                    'required' => 'Please select the date',
                ],
                'holidayReason' => [
                    'required' => 'Please enter the reason',
                ],
            ]
        ]
    ],
];