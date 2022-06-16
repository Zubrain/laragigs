<?php

namespace App\Http\Controllers;


use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;



class ListingController extends Controller
{
    //show all listings
    public function index()
    {
        $listings = Listing::latest()->filter(request(['tag', 'search']))->get();

        return view('listings.index', ['listings' => $listings]);
    }

    //show single listing
    public function show($id)
    {
        $list = DB::table('listings')->find($id);

        if ($list) {
            return view('listings.show', ['list' => $list]);
        } else {
            abort('404');
        }
    }

    //show create form
    public function create()
    {
        return view('listings.create');
    }

    //store new listing data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'company' => ['required', Rule::unique('listings', 'company')],
            'title' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);


        Listing::create($formFields);

        return redirect('/');
    }
}
