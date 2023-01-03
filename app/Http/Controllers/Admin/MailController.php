<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mail;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function index()
    {
        $mails = Mail::paginate(10);
        return view('admin.mail.list', compact('mails'));
    }

    public function mail()
    {
        return view('admin.mail.mail');
    }

    public function sendMail()
    {
    }

    public function search(Request $request)
    {
        $data = $request->search;
        $mails = DB::table('subscribe')
            ->where('email', 'like', '%' . $data . '%')
            ->paginate(10);
        if(!count($mails)){
            $error = 'No Result';
            return view('admin.mail.list', compact('error'));
        }
        return view('admin.mail.list', compact('mails'));
    }
}
