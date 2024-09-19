<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Logic;
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();    

Schedule::call(function(){
    foreach(\App\Models\user_milestones::where("weight",">","0")->get() as $s){
        echo $s->first()->username, $s->first()->lift,$s->first()->reps;
        $s->update(["weight" => 0]);
    }
})->everySecond()->name("reset");
