<?php

namespace App\Console\Commands;

use App\Services\CryptoService;
use Illuminate\Console\Command;

class FetchCryptoPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crypto:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(private CryptoService $cryptoService) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void {
        $this->cryptoService->fetchAndStorePrices();
        $this->info('Cryptocurrency prices updated successfully.');
    }
}
