<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (Auth::user()->role === 'admin') {
            return view('admin.dashboard');
        } 
        
        if ($user->role === 'vendor') {
            // If vendor has not submitted the profile form yet, redirect them to it.
            if (!$user->vendorProfile) {
                return redirect()->route('vendor.profile.create');
            }

            // Otherwise, show them their dashboard
            return view('vendor.dashboard');
        }
    }
}
