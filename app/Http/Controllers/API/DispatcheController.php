<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Dispatche;
use Validator;
use App\Http\Resources\ContactResource;

class DispatcheController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dispatche = Dispatche::all();
    
        return $this->sendResponse(DispatcheResource::collection($dispatche), 'Dispatche retrieved successfully.');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dispatche  $dispatche
     * @return \Illuminate\Http\Response
     */
    public function show(Dispatche $dispatche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dispatche  $dispatche
     * @return \Illuminate\Http\Response
     */
    public function edit(Dispatche $dispatche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dispatche  $dispatche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dispatche $dispatche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dispatche  $dispatche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dispatche $dispatche)
    {
        //
    }
}
