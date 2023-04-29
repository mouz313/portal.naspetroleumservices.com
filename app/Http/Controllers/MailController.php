<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\resetpassword;
use App\Mail\restpassword;
use Exception;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        $data = [
            'subject' => 'Welcome mail',
            'body' => 'Hello Check you detils'

        ];
    try{
    Mail::to('usman@root4tech.com')->send( new restpassword($data));
    return response()->json(['Check Email']);
    }
    catch(Exception $th)
    {
        // throw $th;
        return response()->json(['Check Email not send']);
    }
    }

}
