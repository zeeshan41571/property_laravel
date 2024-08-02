<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class TestMailController extends Controller
{
    public function sendTestEmail()
    {
        Mail::raw('This is a test email', function ($message) {
            $message->to('qasmifreelancer@gmail.com')
                    ->subject('Test Email');
        });

        return 'Test email sent!';
    }
}
