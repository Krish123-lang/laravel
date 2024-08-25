<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    function addUserForm(Request $request)
    {
        // Form validation
        $request->validate(
            [
                'username' => 'required | min:3 | max:15',
                'email' => 'required | email',
                'city' => 'required | max:20',
                'skill' => 'required',
                'gender' => 'required',
                'town' => 'required',
                'range' => 'required'
            ],
            [
                'username.required' => 'username is needed. why is it empty ?',
                'username.min' => 'username should be greater than 3 characters long',
                'username.max' => 'username should not be greater than 15 characters long',

                'email.required' => 'email chaiyeko xa. kina empty chodeko ?',
                'email.email' => 'what kind of email is this ?',
            ]
        );


        // return $request;
        echo $request->username . "<br/>";
        echo $request->email . "<br/>";
        echo $request->city . "<br/>";
        // echo $request->skill . "<br/>";
        echo implode(', ', $request->skill) . "<br/>";
        echo $request->gender . "<br/>";
        echo $request->town . "<br/>";
        echo $request->range . "<br/>";
    }
}
