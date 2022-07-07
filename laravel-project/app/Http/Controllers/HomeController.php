<?php

namespace App\Http\Controllers;

use App\Studies;
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
        $studies = Studies::all();

        return view('home', [
            'studies' => $studies
        ]);
    }
}
