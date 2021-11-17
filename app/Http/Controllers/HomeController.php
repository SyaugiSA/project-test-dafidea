<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\posting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        $komen = DB::table('comments')->get();
        $jmlkomen = DB::table('comments')->count();
        $jmlpost = DB::table('postings')->count();
        return view('home', compact('komen', 'jmlkomen', 'jmlpost'));
    }
}
