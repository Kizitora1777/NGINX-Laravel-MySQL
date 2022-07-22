<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use Carbon\Carbon;

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
        // $students = Student::all();
        // foreach($students as $student){
        //     $studentday = Carbon::parse($student->created_at);
        // }
        // $sevendays = Carbon::today()->subDay(7);
        // $students = Student::whereDate('created_at', '>=', $sevendays)->get();

        $students = Student::select('user_id') 
                    -> selectRaw('SUM(hour) * 60 + SUM(minute) as time') 
                    -> groupBy('user_id')
                    -> get();
        $data = ['msg' => 'みんなの勉強時間','students' => $students];
        return view('admin.home',$data);
    }
}
