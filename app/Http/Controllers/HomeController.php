<?php

namespace App\Http\Controllers;
Use Redirect;
use Illuminate\Http\Request;

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
    public function index()
    {
        if(auth()->user()->u_type == "Pusat Mel Officer (Admin)"){
            return Redirect::to('/admin');
        }
        else if(auth()->user()->u_type == "Pusat Mel Officer"){
            return Redirect::to('/officer');
        }
        else if(auth()->user()->u_type == "Resident Warden"){
            return Redirect::to('/warden');
        }
        else if(auth()->user()->u_type == "Student")
        {
            return Redirect::to('/student');
        }
    }

    public function adminIndex()
    {
        if(auth()->user()->u_type !== "Pusat Mel Officer (Admin)")
        {
            abort(403, 'Unauthorized action.');
        }
        return view('layouts.adminIndex');
    }

    public function wardenIndex()
    {
        if(auth()->user()->u_type !== "Resident Warden")
        {
            abort(403, 'Unauthorized action.');
        }
        return view('layouts.wardenIndex');
    }

    public function officerIndex()
    {
        if(auth()->user()->u_type !== "Pusat Mel Officer")
        {
            abort(403, 'Unauthorized action.'); 
        }
        return view('layouts.officerIndex');
    }

    public function studentIndex()
    {
        if(auth()->user()->u_type !== "Student")
        {
            abort(403, 'Unauthorized action.');
        }
        return view('layouts.studentIndex');
    }
}
