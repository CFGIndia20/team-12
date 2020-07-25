<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // Helper function for SMS
    private function sendMessage($message, $recipients) {
    $account_sid = getenv("TWILIO_SID");
    $auth_token = getenv("TWILIO_AUTH_TOKEN");
    $twilio_number = getenv("TWILIO_NUMBER");
    $client = new Client($account_sid, $auth_token);
    $client->messages->create($recipients, 
            ['from' => $twilio_number, 'body' => $message] );
    }

    public function sendCustomMessage(Request $request)
{
    $validatedData = $request->validate([
        'users' => 'required|array',
        'body' => 'required',
    ]);
    $recipients = $validatedData["users"];
    // iterate over the array of recipients and send a twilio request for each
    foreach ($recipients as $recipient) {
        $this->sendMessage($validatedData["body"], $recipient);
    }
    return back()->with(['success' => "Messages on their way!"]);
}
}
