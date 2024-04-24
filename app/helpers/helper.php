<?php

use App\Models\User;
if(!function_exists("userAuth")){
    function userAuth(): ?User {return auth()->user();} ;
}

