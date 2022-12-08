<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingsRequest;
use App\Http\Requests\UpdateListingsRequest;
use App\Models\Listings;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.listings.index', [
            'heading' => 'Latest Listings',
            'listings' => Listings::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListingsRequest $request)
    {
        //
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
