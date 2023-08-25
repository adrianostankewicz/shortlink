<?php

return [

    'fields' => [
        'id'        => 'Id cannot be less than or equal to zero',
        'name'      => 'Name is required',
        'email'     => 'Email is required',
        'password'  => 'Password is required'
    ],

    'failed' => 'These credentials do not match our records.',
    'password' => 'The provided password is incorrect.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

];
