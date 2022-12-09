<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingsRequest;
use App\Http\Requests\UpdateListingsRequest;
use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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

        // Save image file to storage/logos
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

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
    public function edit(Listings $listings, $id)
    {
        $listing = $listings->findOrfail($id);

        return view('pages.listings.edit', [
            'listing' => $listing
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listings  $listings
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListingsRequest $request, $id)
    {
        // Below Code generate using Open AI, shit is rly cool

        // Find the listing to update
        $listing = Listings::findOrFail($id);

        $formFields = $request->all();

        // Check if the user is logged in and is the owner of the listing
        if (Auth::check() && Auth::user()->id === $listing->user->id) {
            // Save logo file to storage/logos
            if ($request->hasFile('logo')) {
                // Will delete existing logo before storing new logos
                if ($listing->logo) {
                    Storage::delete($listing->logo);
                }
                $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            }

            // Update the listing with the new data
            $listing->update($formFields);

            // Redirect the user to the listing page with a success message
            return back()->with('success', 'Listing updated successfully.');
        } else {
            // Redirect the user to the listing page with an error message
            return back()->with('error', 'You are not authorized to update this listing.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listings  $listings
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listings::findOrFail($id);

        // Also delete that logo listing
        if ($listing->logo) {
            Storage::delete($listing->logo);
        }

        $listing->delete();

        return Redirect::route('listings.create')->with('success', "Success Delete Listing");
    }

    public function manage()
    {
        return view('pages.listings.manage', [
            'listings' => Auth::user()->listings()->get()
        ]);
    }
}
