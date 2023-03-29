<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function create()
    {
        return view('email');
    }


    public function sendEmail(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'subject'=>'required',
            'nom'=>'required',
            'content'=>'required'
        ]);

        $data = [
            'subject' => $request->subject,
            'nom' => $request->nom,
            'email' => $request->email,
            'content' => $request->content,
        ];

        Mail::send("email-template", $data, function($message) use ($data) {
            $message->to($data["email"])
            ->subject($data['subject']);
        });
        Alert::success('Mail envoyé avec succès!');
        return back();

    }
}
