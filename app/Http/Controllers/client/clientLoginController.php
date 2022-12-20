<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client\loginModel;
use Illuminate\Support\Facades\Auth;
use DB;


class clientLoginController extends Controller
{


    public function getLogin()
    {

        return view('clientsPage.Login');
    }

    public function postLogin(Request $req)
    {

        $req->validate(
            $rules = [
                'user_name'  => 'bail|required',
                'password'  => 'bail|required',
            ],
            $messages = [
                'user_name.required' => 'User Name Cannot Be Empty',
                'password.required' => 'Password Cannot Be Empty',
            ]
        );
        $user_name = $req->user_name;
        $password = $req->password;

        $customer = Auth::guard('users')->attempt(['username' => $user_name, 'password' => $password]);

        if ($customer == true) {
            $customer_ID = Auth::guard('users')->user();
            $this_customer = DB::table('users')->join('wish_list', 'users.ID', '=', 'wish_list.Customer_ID')->join('carts', 'users.ID', '=', 'carts.Customer_ID')->where('carts.Customer_ID', $customer_ID->ID)->get();
            $data = session(['this_customer' => $this_customer]);
            return redirect()->route('homepage');
        } else {
            return redirect()->back();
        }
    }

    public function postRegister(Request $request)
    {

        $rules = [
            'first_name' => 'bail|required|max:30',
            'last_name'  => 'bail|required|max:30',
            'mail'  => 'bail|required|email|unique:users,Email',
            'user_name'  => 'bail|required',
            'password'  => 'bail|required',
            'c_password'  => 'same:password',
        ];

        $messages = [
            'required' => 'This Field Cannot Be Empty',
            'max' => 'This Field Must Be at Most 30 Characters Long',
            'mail.email' => 'This Is Not A Valid Email',
            'mail.unique' => 'This Email Has Already Exists',
            'regex' => 'Alphanumeric Characters And Must Be 8-20 Characters Long',
            'same'  => 'Must Match With Password'
        ];

        $request->validate($rules, $messages);
        DB::table('users')->insert(
            [
                'First_Name' => $request->first_name, 'Last_Name' => $request->last_name, 'Email' => $request->mail, 'username' => $request->user_name, 'password'  => bcrypt($request->password), 'rank'      => 1
            ]
        );
    }
}
