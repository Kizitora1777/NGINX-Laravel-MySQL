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
        $today = Carbon::now()->format('Y-m-d');
        $students = Student::whereDate('created_at',$today)
                    -> select('user_id') 
                    -> selectRaw('SUM(hour) * 60 + SUM(minute) as time') 
                    -> groupBy('user_id')
                    -> get();

        $yesterday = Carbon::yesterday()->format('Y-m-d');
        $students2 = Student::whereDate('created_at',$yesterday)
        -> select('user_id') 
        -> selectRaw('SUM(hour) * 60 + SUM(minute) as time') 
        -> groupBy('user_id')
        -> get();

        $three_day_ago = Carbon::yesterday()->subDay()->format('Y-m-d');
        $students3 = Student::whereDate('created_at',$three_day_ago)
        -> select('user_id') 
        -> selectRaw('SUM(hour) * 60 + SUM(minute) as time') 
        -> groupBy('user_id')
        -> get();

        $four_day_ago = Carbon::yesterday()->subDay()->subDay()->format('Y-m-d');
        $students4 = Student::whereDate('created_at',$four_day_ago)
        -> select('user_id') 
        -> selectRaw('SUM(hour) * 60 + SUM(minute) as time') 
        -> groupBy('user_id')
        -> get();

        $five_day_ago = Carbon::yesterday()->subDay()->subDay()->subDay()->format('Y-m-d');
        $students5 = Student::whereDate('created_at',$five_day_ago)
        -> select('user_id') 
        -> selectRaw('SUM(hour) * 60 + SUM(minute) as time') 
        -> groupBy('user_id')
        -> get();

        $six_day_ago = Carbon::yesterday()->subDay()->subDay()->subDay()->subDay()->format('Y-m-d');
        $students6 = Student::whereDate('created_at',$six_day_ago)
        -> select('user_id') 
        -> selectRaw('SUM(hour) * 60 + SUM(minute) as time') 
        -> groupBy('user_id')
        -> get();

        $seven_day_ago = Carbon::yesterday()->subDay()->subDay()->subDay()->subDay()->subDay()->format('Y-m-d');
        $students7 = Student::whereDate('created_at',$seven_day_ago)
        -> select('user_id') 
        -> selectRaw('SUM(hour) * 60 + SUM(minute) as time') 
        -> groupBy('user_id')
        -> get();

        $data = ['msg' => 'みんなの勉強時間','students' => $students,'students2' => $students2,'students3' => $students3,'students4' => $students4,'students5' => $students5,'students6' => $students6,'students7' => $students7];
        return view('admin.home',$data);
    }
}
