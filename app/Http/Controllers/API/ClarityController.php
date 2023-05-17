<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Clarity;
use Validator;
use App\Http\Resources\ClaritiesResource;

class ClarityController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $clarity = Clarity::all();
    
        return $this->sendResponse(ClaritiesResource::collection($clarity), 'clarity retrieved successfully.');
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'status' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $clarity = Clarity::create($input);
   
        return $this->sendResponse(new ClaritiesResource($clarity), 'Clarity created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clarity  $clarity
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $clarity = Clarity::find($id);
  
        if (is_null($clarity)) {
            return $this->sendError('Clarity not found.');
        }
   
        return $this->sendResponse(new ClaritiesResource($clarity), 'Clarity retrieved successfully.');
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clarity  $clarity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clarity $clarity)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'status' => 'required'
        ]);
    
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $clarity->name = $input['name'];
        $clarity->status = $input['status'];
        $clarity->save();
   
        return $this->sendResponse(new ClaritiesResource($clarity), 'Clarity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clarity  $clarity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clarity $clarity)
    {
       $clarity->delete();
   
        return $this->sendResponse([], 'Clarity deleted successfully.');
    }
}
