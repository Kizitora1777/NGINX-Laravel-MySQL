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
        //$students = Student::all();
        //$students = Student::select('user_id') -> selectRaw('SUM(hour) as hours') -> groupBy('user_id')->get();
        $students = Student::select('user_id') -> selectRaw('SUM(hour) * 60 + SUM(minute) as time') -> groupBy('user_id')->get();
        //$minutes = Student::select('user_id') -> selectRaw('SUM(minute) as minutes') -> groupBy('user_id')->first();
        //$students = Student::select('user_id') -> selectRaw('SUM(hour)') -> groupBy('user_id') -> get();
        $data = ['msg' => 'みんなの勉強時間','students' => $students];
        //$data = ['msg' => 'みんなの勉強時間','students' => $students,'minutes' => $minutes];
        return view('admin.home',$data);
    }
}
