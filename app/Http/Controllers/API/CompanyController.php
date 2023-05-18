<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Company;
use Validator;
use App\Http\Resources\CompanyResource;

class CompanyController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
    
        return $this->sendResponse(CompanyResource::collection($company), 'Company retrieved successfully.');
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
            'email' => 'required',
            'contact_no' => 'required',
            'contact_person_name' => 'required',
            'notes' => 'required',
            'address' => 'required',
            'shipping_id' => 'required',
            'status' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $company = Company::create($input);
   
        return $this->sendResponse(new CompanyResource($company), 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company = Company::find($id);
  
        if (is_null($company)) {
            return $this->sendError('Company not found.');
        }
   
        return $this->sendResponse(new CompanyResource($company), 'Company retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'contact_no' => 'required',
            'contact_person_name' => 'required',
            'notes' => 'required',
            'address' => 'required',
            'shipping_id' => 'required',
            'status' => 'required'
        ]);
    
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $company->name = $input['name'];
        $company->email = $input['email'];
        $company->contact_no = $input['contact_no'];
        $company->contact_person_name = $input['contact_person_name'];
        $company->notes = $input['notes'];
        $company->address = $input['address'];
        $company->shipping_id = $input['shipping_id'];
        $company->status = $input['status'];
        $company->save();
   
        return $this->sendResponse(new CompanyResource($company), 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
   
        return $this->sendResponse([], 'company deleted successfully.');
    }
}
