<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SNMPWrapper;

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
        snmp2_set("localhost", "public", "1.3.6.1.2.1.1.4.0", "s", "Omar");



        dd( snmp2_walk("127.0.0.1", "public", "1.3.6.1.2.1.1") );
        // dd($snmp::get('1.3.6.1.2.1.1.1.0'));

        return view('home');
    }
}
