<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index( Request $request )
    {
        if (Auth::user()->hasRole('admin')) {
            $request->user()->authorizeRoles(['user', 'admin']);
            return view('admin.inicio');
        }
        elseif ( Auth::user()->hasRole('prof')) {
            $request->user()->authorizeRoles(['user', 'prof']);
            return view('profesor.inicio');
        }
        elseif ( Auth::user()->hasRole('prof')) {
            $request->user()->authorizeRoles(['user', 'bedel']);
            return view('bedel.inicio');
        }
        
    }
   
    /*
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles(‘admin’);
        return view(‘some.view’);
    }
    */
}
