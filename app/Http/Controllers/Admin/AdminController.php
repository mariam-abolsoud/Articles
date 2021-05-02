<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    //
    
    public function dashboard()
    {
        
        $output = [
            
            
        ];
        return view('admin.dashboard')->with($output);
    }
    
    public function logout(Request $request)
    {
        Auth('web')->logout();
        return redirect()->route('AdminLogin');
    }
}
