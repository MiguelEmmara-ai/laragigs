<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingsRequest;
use App\Http\Requests\UpdateListingsRequest;
use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.listings.index', [
            'heading' => 'Latest Listings',
            'listings' => Listings::latest()->filter(request(['tag', 'search']))->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.listings.create', [
            'heading' => 'Latest Listings',
            'listings' => Listings::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListingsRequest $request)
    {
        $formFields = $request->all();

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Save listing records
        Listings::create($formFields);

        return Redirect::route('listings.create')->with('success', "Success Create New Listing");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listings  $listings
     * @return \Illuminate\Http\Response
     */
    public function show(Listings $listings, $id)
    {
        $listing = $listings->findOrfail($id);

        return view('pages.listings.show', [
            'listing' => $listing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listings  $listings
     * @return \Illuminate\Http\Response
     */
    public function edit(Listings $listings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listings  $listings
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListingsRequest $request, Listings $listings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listings  $listings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listings $listings)
    {
        //
    }
}
