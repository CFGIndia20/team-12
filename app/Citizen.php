<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Citizen extends Model
{
    protected $fillable = [
        'source',
        'phone_no'
    ];
    public function complaints(){
        return $this->hasMany('App\Complaint');
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
        
            public function sendCustomMessage(Request $request){
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
