<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManagerController extends Controller
{
    public function index()
    {
        $user = User::where('role' ,'=', '1')->get();
        return view('manager.index', compact('user'));
    }

    public function form()
    {
        return view('manager.add');
    }

    
}
