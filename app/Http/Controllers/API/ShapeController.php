<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Shape;
use Validator;
use App\Http\Resources\ShapeResource;

class ShapeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shape = Shape::all();
    
        return $this->sendResponse(ShapeResource::collection($shape), 'Shape retrieved successfully.');
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
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'status' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $shape = Shape::create($input);
   
        return $this->sendResponse(new ShapeResource($shape), 'Shape created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shape  $shape
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shape = Shape::find($id);
  
        if (is_null($shape)) {
            return $this->sendError('Shape not found.');
        }
   
        return $this->sendResponse(new ShapeResource($shape), 'Shape retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shape  $shape
     * @return \Illuminate\Http\Response
     */
    public function edit(Shape $shape)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shape  $shape
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shape $shape)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'status' => 'required'
        ]);
    
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $shape->name = $input['name'];
        $shape->status = $input['status'];
        $shape->save();
   
        return $this->sendResponse(new ShapeResource($shape), 'Shape updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shape  $shape
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shape $shape)
    {
        $shape->delete();
   
        return $this->sendResponse([], 'Shape deleted successfully.');
    }
}
