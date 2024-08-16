<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\MailModel;
use App\Models\Setting;


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

    public function index()
    {
        $data = MailModel::all();
        return view('admin.mail.mail', compact('data'));
    }

    public function store(Request $request)
    {

        $data = new MailModel;
        $data->name = $request->name;
        $data->save();
        return back();
    }

    public function sendcustomer(Request $request)
    {
        $mail = Setting::first();
        $data = $request->validate([
            'name' => 'required|string|max:255',

        ]);
        $data = new MailModel;
        $data->name = $request->name;
        $data->save();

        // E-mail göndərmək
        Mail::send([], [], function ($message) use ($data,$mail) {
            $message->to($mail->email) // Şirkətin e-poçtu
                ->subject('Yeni mesaj') // Mövzu
                ->html('Ad: ' . $data['name']);
        });

        return back()->with('success', 'Mesajınız uğurla göndərildi!');
    }
}
