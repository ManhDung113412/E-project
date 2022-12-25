<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client\loginModel;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;



class clientLoginController extends Controller
{


    public function getLogin()
    {
        // dd('hehe');
        $slideImg = DB::table('brand_collections')->get();
        // dd($chanel);
        return view('clientsPage.login', ['img' => $slideImg]);
    }

    public function getProfile()
    {
        // dd('hehe');
        // $slideImg = DB::table('brand_collections')->get();
        // dd($chanel);
        return view('clientsPage.myProfile');
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
            $customer_ID = Auth::guard('users')->id();
            $this_customer = User::where('id', $customer_ID)->get();
            // dd($this_customer);
            // dd($this_customer);
            // $data = session(['this_customer',$this_customer[0]]);
            // $d = session()->get('this_customer');
            return redirect()->route('homepage');
        } else {
            return redirect()->back();
            // document.getElementById('signInForm').classList.add('active');
            // document.getElementById('registerForm').classList.remove('active');
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
                'First_Name'
                => $request->first_name, 'Last_Name'
                => $request->last_name, 'Email'
                => $request->mail, 'username'
                => $request->user_name, 'password'
                => bcrypt($request->password), 'rank' => 1
            ]
        );
        return redirect()->back();
    }

    public function logOut(Request $req)
    {
        // dd('asd');
        Auth::guard('users')->logout();
        $req -> session()->forget('this_customer');
        return redirect()->route('client-login');
    }
}
