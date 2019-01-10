<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $today = Carbon::today()->format('l, d F, Y');
        //echo $mytime->toDateTimeString();
        //echo $mytime;
        return view('home', [
            'today' => $today
        ]);
    }

    public function question()
    {
        return view('question');

    }

}
