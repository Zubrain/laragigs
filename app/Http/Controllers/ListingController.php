<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ListingController extends Controller
{
    //show all listings
    public function index()
    {
        $listings = DB::table('listings')->get();
 
        return view('listings.index', ['listings' => $listings]);
    }

    //show single listing
    public function show($id)
    {
        $list = DB::table('listings')->find($id);

        if($list) {
            return view('listings.show', ['list' => $list]);
        }else{
            abort('404');
        }
 
        
    }
}
