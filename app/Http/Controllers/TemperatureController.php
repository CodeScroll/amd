<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakibDevs\Weather\Weather;

class TemperatureController extends Controller
{
    function index(Request $request){


        $wt = new Weather();

        $info = $wt->getCurrentByCity('Thessaloniki');
        return $info->main->temp;
    }
}
