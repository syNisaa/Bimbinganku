<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeeController extends Controller
{
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
