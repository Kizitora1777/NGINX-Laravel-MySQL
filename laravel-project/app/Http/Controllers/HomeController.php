<?php

namespace App\Http\Controllers;

use App\Student;
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
        $students = Student::all();

        return view('home', [
            'students' => $students
        ]);
    }

    public function create(Request $request)
    {
        $study = new Student();

        $study->subject = $request->subject;
        $study->hour = $request->hour;
        $study->minute = $request->minute;
        $study->comment = $request->comment;
        $study->user_id = 5409;

        $study->save();

        return redirect()->route('home', [
            'id' => $study->id,
        ]);
    }
}
