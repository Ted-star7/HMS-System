<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            $usertype = Auth::user()->usertype;
            
            if($usertype == 'admin') {
                return view('dashboard');
            } elseif($usertype == 'user') {
                return view('admin.index');
            }
        }
        
        // If not logged in, redirect to login
        return redirect()->route('login');
    }
}