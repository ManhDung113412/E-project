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
<<<<<<< HEAD
        // dd('hehe');
        $slideImg = DB::table('brand_collections')->get();
        // dd($chanel);
        return view('clientsPage.login', ['img' => $slideImg]);
=======

        return view('clientsPage.Login');
>>>>>>> f12427a9d2c0b58722501bb4967febee8b0292cf
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
            document.getElementById('signInForm').classList.add('active');
            document.getElementById('registerForm').classList.remove('active');
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
