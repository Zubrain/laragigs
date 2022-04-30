<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ListingController extends Controller
{
    public function index()
    {
        $listing = DB::table('listings')->get();
 
        return view('listing', ['listing' => $listing]);
    }

    public function show($id)
    {
        $list = DB::table('listings')->find($id);
 
        return view('show', ['list' => $list]);
    }
}
