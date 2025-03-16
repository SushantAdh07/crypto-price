<?php

namespace App\Http\Controllers;

use App\Models\Cryptocurrency;
use App\Services\CryptoService;


class CryptocurrencyController extends Controller
{
    public function index() {
        $cryptos = Cryptocurrency::all();
        return view('crypto.index', compact('cryptos'));
    }

    public function fetch(CryptoService $cryptoService)
    {
        
        $cryptoService->storePrices();
        
        return redirect()->route('crypto.index')->with('success', 'Prices updated!');
    }
}
