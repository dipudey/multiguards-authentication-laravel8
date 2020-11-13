<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\AdminRequest;

class AdminController extends Controller
{
    public function index() {
        return view('adminDashboard');
    }
    
    public function create()
    {
        return view('auth.adminLogin');
    }

    public function store(AdminRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect(RouteServiceProvider::ADMIN);
    }

    public function destroy(Request $request)
    {
        auth('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
