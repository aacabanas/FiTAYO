<?php

use App\Models\user_assessment;
use App\Models\user_membership;
use App\Models\user_profile;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;

use App\Models\User;

$i = 0;


Schedule::call(function () {
    $curr = Carbon::now();
    $data = user_membership::select(['userMem_ID', 'expiry_date', 'membership_type'])->get()->jsonSerialize();
    foreach ($data as $dat) {
        if ($dat["membership_type"] == "Member") {
            $t = round(Carbon::parse($dat['expiry_date'])->diffInDays($curr, false));
            if ($t >= 30) {
                $id = $dat["userMem_ID"];
                User::find($id)->delete();
                user_membership::where('userMem_ID', $id)->delete();
            }
        }
        if ($t >= 30) {
            $id = $dat["userMem_ID"];
            User::find($id)->delete();
            user_membership::where('userMem_ID', $id)->delete();
        }
    }

})->everySecond()->name("----deleting expired users----");
Schedule::call(function(){foreach(User::all() as $user){generate_json($user->id,$user->username);}})->everySecond()->name('regenerate qr');