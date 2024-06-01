<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRController extends Controller
{
    public function show()
    {
        return view('qr_code_page');
    }
}
