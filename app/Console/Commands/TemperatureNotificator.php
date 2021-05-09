<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use RakibDevs\Weather\Weather;

class TemperatureNotificator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:temperature';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'temperature for City Thessaloniki';

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
        $wt = new Weather();
        $info = $wt->getCurrentByCity('Thessaloniki');
        $temperature = $info->main->temp;
        if($temperature > 20){

        }else{

        }
    }
}
