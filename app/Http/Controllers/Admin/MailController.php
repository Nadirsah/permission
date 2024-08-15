<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\MailModel;

class MailController extends Controller
{
    public function sendEmail()
    {
        // Your user registration logic here
        $user = User::First();
        try {
            Mail::to($user->email)->send(new WelcomeEmail($user));
            return back(); // Email sent successfully
        } catch (\Exception $e) {
            // Log the error or handle it
            // Log::error($e->getMessage());
            return back()->withErrors(['email' => 'E-poçt göndərmə zamanı bir xəta baş verdi.']);
        }
    }

    public function index(){
        return view('admin.mail.mail');
    }

    public function store(Request $request){

        $data=new MailModel;
        $data->name=$request->name;
        $data->save();
        return back();
    }
}
