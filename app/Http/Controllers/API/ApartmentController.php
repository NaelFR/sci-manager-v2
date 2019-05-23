<?php

namespace App\Http\Controllers\API;

use App\Apartment;
use App\Building;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Building $building)
    {
        return response($building->apartments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Building $building)
    {
        $this->validate($request, [
            'apartment_number' => 'required|numeric|min:0',
            'floor' => 'required|numeric|min:0',
            'rent' => 'required|numeric|min:0',
            'charges' => 'required|numeric|min:0',
        ]);

        $attributes = $request->all();

        $attributes += ["building_id" => $building->id];
        $apartment = new Apartment($attributes);

        $apartment->save();

        return response($apartment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return response($apartment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        //
    }
}
