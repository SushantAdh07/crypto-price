<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Cryptocurrency;

class CryptoService {

    public function storePrices()
    {
        $response = Http::get('https://api.coingecko.com/api/v3/coins/markets', 
        [
            'vs_currency' => 'usd',
            'ids' => 'bitcoin, ethereum',
        ]);


        
        if ($response->successful()) {
            $data = $response->json();

            
            foreach ($data as $crypto) {
                Cryptocurrency::updateOrCreate(
                    ['name' => ucfirst($crypto['name'])],
                    [
                        'symbol' => strtoupper($crypto['symbol']), 
                        'price_usd' => $crypto['current_price'],
                        'last_updated' => now(),
                    ]
                );
            }
        }
    }
}
