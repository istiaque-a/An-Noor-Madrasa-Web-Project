<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\CompanyCategory;
use Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_categories= CompanyCategory::get();
        return view('content.company.create-company',compact('company_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $rules=array(
                        'company_name' => ['required','unique:companies,company_name'],
                        // 'address'
                        'category_type' => 'required',
                    
                );


        $validator = \Validator::make($request->all(), $rules);
        
        if ($validator->fails())
        {
            //return response()->json(['errors'=>$validator->errors()->all()]);

                    return Response::json(array(
                                        'success' => false,
                                        'errors' => $validator->getMessageBag()->toArray()

                                      ), 400); // 400 being the HTTP code for an invalid request.
        }else{
            $company_name = trim($request->company_name); 
            $address  = trim($request->address) ;
            $category_type = trim($request->category_type);

            $company= new Company();
            $company->company_name =$company_name;
            $company->company_type = $category_type;

            $company->save();    
            return response()->json(['success'=>true],200);  


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
