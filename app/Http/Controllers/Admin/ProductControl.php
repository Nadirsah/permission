<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ProductControl extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    // Mail::to('isazadenadir@gmail.com')->send(new WelcomeEmail($name));


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
