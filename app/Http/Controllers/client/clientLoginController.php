<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client\loginModel;
use Illuminate\Support\Facades\Auth;
use DB;


class clientLoginController extends Controller
{
    private $login;
    public function __construct()
    {
        $this->login = new loginModel();
    }

    public function getLogin()
    {
        return view('clientsPage.LoginSignUp');
    }

    public function postLogin(Request $req)
    {
        $req->validate(
            $rules = [
                'email_login'  => 'bail|required|email',
                'password_login'  => 'bail|required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
            ],
            $messages = [
                'email_login.required' => 'Email address is required.',
                'password_login.required' => 'Password is required. It must be 8 or more characters and include at least one number and letter. Password is case sensitive and cannot contain spaces.',
                'password_login.regex' => 'Password is required. It must be 8 or more characters and include at least one number and letter. Password is case sensitive and cannot contain spaces.',
            ]
        );
        $email_login = $req->email_login;
        $password_login = $req->password_login;
        $remember_token = $req->has('remember') ? true : false;

        $customer = Auth::guard('customers')->attempt(['Customer_email' => $email_login, 'password' => $password_login], $remember_token);
        if ($customer == true) {
            return view('clientsPage.homePage');
        } else {
            return redirect()->back();
        }
    }

    public function postRegister(Request $request)
    {
        $request->validate(
            $rules = [
                'firstname' => 'bail|required|max:30',
                'lastname'  => 'bail|required|max:30',
                'dob'  => 'bail|required',
                'numberphone'  => 'bail|required|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im|unique:customer_models,customer_phone',
                'email'  => 'bail|required|email|unique:customer_models,customer_email',
                'username'  => 'bail|required|max:30',
                'password'  => 'bail|required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
            ],

            $messages = [
                'firstname.required' => 'First name is required and must be 30 characters or less.',
                'firstname.max' => 'First name is required and must be 30 characters or less.',
                'lastname.required' => 'Last name is required and must be 30 characters or less.',
                'lastname.max' => 'Last name is required and must be 30 characters or less.',
                'dob.required' => 'DOB is required.',
                'numberphone.required' => 'Enter your number to be the first to know about exclusive offers, new launches and more via text message.',
                'numberphone.regex' => 'Number phone is invalid',
                'numberphone.unique' => 'Number phone is already used',
                'email.required' => 'Email address is required.',
                'email.unique' => 'Email is already used',
                'username.required' => 'User name is required and must be 30 characters or less.',
                'username.max' => 'User name is required and must be 30 characters or less.',
                'password.required' => 'Password is required. It must be 8 or more characters and include at least one number and letter. Password is case sensitive and cannot contain spaces.',
                'password.regex' => 'Password is required. It must be 8 or more characters and include at least one number and letter. Password is case sensitive and cannot contain spaces.',
            ]
        );

        $data = array(
            $firstname = $request->firstname,
            $lastname = $request->lastname,
            $dob = $request->dob,
            $numberphone = $request->numberphone,
            $email = $request->email,
            $username = $request->username,
            $password = bcrypt($request->password),
            $rank = 1,
            $create_at = $date = date('Y-m-d H:i:s'),
            $update_at = null
        );
        $this->login->createUser($data);
    }
}
