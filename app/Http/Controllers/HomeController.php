<?php

namespace App\Http\Controllers;

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
        return view('viewadmin.index');
    }

    public function indexdosen()
    {
        return view('viewdosen.index');
    }

    public function indexmahasiswa()
    {
        return view('viewsiswa.index');
    }
}
