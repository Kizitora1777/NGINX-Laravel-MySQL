<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = Student::all();
        //$data = ['msg' => '勉強時間','students' => $students];
        $data = ['msg' => 'みんなの勉強時間','students' => $students];
        //$studies = Study::select('user_id') -> selectRaw('SUM(hour) as time') ->groupBy('user_id') ->get();

        return view('admin.home',$data);
    }
}
