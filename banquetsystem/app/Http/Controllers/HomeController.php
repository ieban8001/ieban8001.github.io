<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\main_page;
use App\table_amount;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->id();

        $wed_info = main_page::where('cust_id', $id)
                  ->get();
        $tbl_info = table_amount::where('cust_id', $id)
                  ->get();
        return view('insert', ['wed_info' => $wed_info, 'error' => '', 'tbl' => $tbl_info]);
    }

    public function welcome()
    {
        $id = auth()->id();

        $wed_info2 = main_page::where('cust_id', $id)
                  ->get();
        return view('welcome', ['wed_info2' => $wed_info2]);
    }

    
}
