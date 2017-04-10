<?php

namespace App\Http\Controllers;

use App\Http\Requests\Countries\CreateCountryRequest;
use App\Http\Requests\Countries\UpdateCountryRequest;
use App\Services\Countries\SaveCountry;


class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCountryRequest $request
     * @param SaveCountry $saveCountry
     * @return \Illuminate\Http\Response
     * @throws \RuntimeException
     */
    public function store(CreateCountryRequest $request, SaveCountry $saveCountry)
    {
        try {
            $saveCountry->fire($request->all());
        } catch (\Exception $e){
            return response(['error' => 'Whooooops!'], 500);
        }

        return response(['data' => $saveCountry], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param GetCountryById $getCountryById
     * @return \Illuminate\Http\Response
     * @throws \InvalidArgumentException
     */
    public function show($id, GetCountryById $getCountryById)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param  UpdateCountryRequest $request
     * @param  SaveCountry $saveCountry
     * @return \Illuminate\Http\Response
     * @throws \RuntimeException
     */
    public function update($id, UpdateCountryRequest $request, SaveCountry $saveCountry)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}