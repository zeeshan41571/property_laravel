<?php

namespace App\Http\Controllers;

use App\Mail\SendPdfMail;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PdfController extends Controller
{
    public function generateAndSendPdf(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        // Determine email content based on role
        if ($request->role == 'owner') {
            $subject = 'Owner Booking Details';
            $view = 'emails.ownerBookingDetails';
        } else {
            $subject = 'Guest Booking Details';
            $view = 'emails.guestBookingDetails';
        }
        // Fetch data from the database
        $data = User::all();

        // Generate PDF
        $pdf = Pdf::loadView('pdf.document', ['data' => $data]);

        // Send PDF via email
        Mail::to($request->email)->send(new SendPdfMail($pdf->output()));

        return back()->with('success', 'PDF generated and sent to your email!');
    }
}
