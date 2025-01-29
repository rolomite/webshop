<?php

namespace App\Services;

use App\Exceptions\Payment\ChargeFailedException;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class PaymentService
{
    public function charge(User $user, float $amount, $callback_url = null){
        $url = "https://api.paystack.co/transaction/initialize";
        $apiKey = env('PAY_KEY');
        $fields = [
          'email' => $user->email,
          'amount' => $amount * 100,
          'callback_url' => $callback_url,
        ];
    
        $response = Http::withHeaders([
          "Authorization" => "Bearer $apiKey"
        ])->post($url, $fields);
        
        if(!$response->successful()) {
            throw new ChargeFailedException;
        }

        $data = $response->json();
        return response()->json($data['data']['authorization_url']);
    }
    public function verify(){}
}
