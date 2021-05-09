<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SmsNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:smsnotification {--temperature}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send SMS';

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
        echo 'HI';
        return false;
        $temperature = $this->option('temperature') ? $this->option('temperature') : false;
        $message = '';

        if($temperature != false){
            if($temperature > 20){
                $message = 'Iordanis Georgiadis. Temperature more than 20C. '. $temperature;
            }else{
                $message = 'Iordanis Georgiadis. Temperature less  than 20C. '. $temperature;
            }
        }else{
            return false;
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://connect.routee.net/sms",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{ \"body\": \"$message\",\"to\" : \"+306978745957\",\"from\": \"amdTelecom\"}",
        CURLOPT_HTTPHEADER => array(
            "authorization: Basic 5f9138288b71de3617a87cd3",
            "content-type: application/json"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
        return 0;
    }
}
