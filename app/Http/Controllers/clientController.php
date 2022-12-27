<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\client\loginModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Support\Facades\Validator;

class clientController extends Controller
{
    // private $login;
    // public function __construct()
    // {
    //     $this->login = new loginModel();
    // }
    public function getProfile()
    {
        $user_id = Auth::guard('users')->id();
        $has_order = DB::table('orders')->where('Customer_ID', 1)->get();

        if ($has_order->count() != 0) {
            $user = DB::table('users As u')
            ->join('orders as o', 'u.id', 'o.Customer_ID')
            ->join('orders_details as od', 'o.ID', 'od.Order_ID')
            ->select(DB::raw('sum(Quantity) as Total_Quantity'), DB::raw('sum(Quantity * Price) as Total_Price'), 'o.Code as Order_Code', 'o.Status', 'o.created_at', 'u.First_Name', 'u.Last_Name', 'u.username', 'u.Dob', 'u.Email', 'u.Number_Phone', 'u.Rank', 'u.Code')
            ->groupBy('Order_Code', 'Status', 'created_at', 'First_Name', 'Last_Name', 'username', 'Dob', 'Email', 'Number_Phone', 'Rank', 'Code')
            ->where('u.id', 1)
            ->get();
        } else {
            $user = DB::table('users As u')
            ->where('u.id', 1)
            ->select('First_Name', 'Last_Name', 'username', 'Dob', 'Email', 'Number_Phone', 'Rank', 'Code')
            ->get();
        }
        return view('clientsPage.myProfile', compact('user'));
    }

    public function editProfile(Request $request)
    {
        $id_user = Auth::guard('users')->id();
        $old_profile = DB::table('users')->where('id', $id_user)->get();
        $old_email =  $old_profile[0]->Email;
        $old_number_phone =  $old_profile[0]->Number_Phone;
        if ($old_email != $request->email && $old_number_phone != $request->phoneNumber) {
            $validator = Validator::make($request->all(), [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:users',
                'dob' => 'required',
                'phone_number' => 'required|regex:/(01)[0-9]{9}/|unique:users'
            ]);
        } else if ($old_email != $request->email) {
            $validator = Validator::make($request->all(), [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:users',
                'dob' => 'required',
                'phone_number' => 'required'
            ]);
        } else if ($old_number_phone != $request->phoneNumber) {
            $validator = Validator::make($request->all(), [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'dob' => 'required',
                'phone_number' => 'required|regex:/(01)[0-9]{9}/|unique:users'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'firstname' => 'required',
                'lastname' => 'required',
                'dob' => 'required',
            ]);
        }

        if ($validator->passes()) {
            DB::table('users')->where('id', $id_user)->update([
                'First_Name' => $request->firstname,
                'Last_Name' => $request->lastname,
                'Email' => $request->email,
                'Dob' => $request->dob,
                'Number_Phone' => $request->phoneNumber,

            ]);
            return response()->json(['success' => 'Updated Succesfully!']);
        }


        return response()->json(['error' => $validator->errors()->all()]);
    }


    public function getMaster()
    {
        return view('layouts.master');
    }

    public function getHomePage()
    {
        return view('clientsPage.homePage');
    }

    public function getSideBar()
    {
        return view('adminlayouts.sidebar');
    }

    public function getproductPage()
    {
        return view('adminPage.productManagementPage');
    }

    public function getAboutUs()
    {
        return view('clientsPage.aboutUs');
    }

    public function getLogin()
    {
        return view('clientsPage.LoginSignUp');
    }

    public function postLogin(Request $request)
    {
        $request->validate(
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

        $email = $request->email_login;
        $hash_password = sha1($request->password_login);

        $database = DB::table('customers')->get();

        foreach ($database as $database) {
            if (($database->Customer_email == $email) && ($database->Password_hash == $hash_password)) {
                return view('clientsPage/homePage');
            }
        }
        $error_login = 'Your Email or Password is invalid';
        return view('clientsPage/LoginSignUp', compact('error_login'));
    }

    public function postRegister(Request $request)
    {
        $request->validate(
            $rules = [
                'firstname' => 'bail|required|max:30',
                'lastname'  => 'bail|required|max:30',
                'dob'  => 'bail|required',
                'numberphone'  => 'bail|required|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im|unique:customers,customer_phone',
                'email'  => 'bail|required|email|unique:customers,customer_email',
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
            $password = sha1($request->password),
            $rank = 1,
            $create_at = $date = date('Y-m-d H:i:s'),
            $update_at = null
        );
        $this->login->createUser($data);
    }

    public function getReview()
    {
        return view('clientsPage.reviewPage');
    }

    public function getProductPages()
    {
        return view('layouts.productPage');
    }

    public function getMainProduct()
    {
        return view('clientsPage.mainProduct');
    }

    public function getShoppingCart()
    {
        return view('clientsPage.shippingCart');
    }
}
