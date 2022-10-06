<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use DB;

class MailController extends Controller
{
    public function getData(){


        return view('khach_hang.mail.mail-order');
    }
}
