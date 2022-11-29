<?php

namespace App\Console\Commands;

use App\Models\Account;
use App\Models\Package;
use Illuminate\Console\Command;

class earncard1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'earn:hours';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cards = Package::all();
        foreach($cards as $card){
            if($card->card_earn_date == 1){
                $rate = $card->card_Rate;
                $card_min = $card->card_min;
                $total = $card_min * $rate / 100;
                Account::where('status', 1)->increment('belance', $total);
            }
        }
    }
}
