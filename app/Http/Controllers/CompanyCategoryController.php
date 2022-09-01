<?php

namespace App\Http\Controllers;

use App\Models\CompanyCategory;
use Illuminate\Http\Request;
use Response;

class CompanyCategoryController extends Controller
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
        return view('content.company.create-company-categories');
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
                        'company_category_name' => ['required','unique:company_categories,category_name'],
                    
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
            $category_name = trim($request->company_category_name); 
            $category_description  = trim($request->category_description) ;

            $company_category= new CompanyCategory();
            $company_category->category_name =$category_name;
            $company_category->category_description = $category_description;

            $company_category->save();    
            return response()->json(['success'=>true],200);  


        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyCategory  $companyCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyCategory $companyCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyCategory  $companyCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyCategory $companyCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyCategory  $companyCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyCategory $companyCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyCategory  $companyCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyCategory $companyCategory)
    {
        //
    }
}
