<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use Illuminate\Http\Request;

class ResultController extends Controller
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
        return view('result_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResultRequest  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(StoreResultRequest $request)*/
    public function store(Request $request)
    {
        
                $exam_name=$request->input('exam_name');
                $publish_date_found=$request->input('publish_date');
                $url=$request->input('url');
                $publish_date_found_array = explode('-',$publish_date_found);
                $publish_date_formatted = $publish_date_found_array[2].'-'.$publish_date_found_array[1]
                .'-'.$publish_date_found_array[0];



         // $vision_result =Info::where(array('info_name'=>trim('vision')))->get();

         // if(count($vision_result)==0){

                Result::create(array('exam_name'=>$exam_name,'publish_date'=>$publish_date_formatted,'url'=>$url));            
/*
         }else{

            $vision_result =Info::where(array('info_name'=>trim('vision')))->update(['info_content'=>$vision_body]);
         }*/

         echo '<span class="success">Done !!</span>';


    }


    public function show_all_results(Request $request){


        $results=Result::orderBy('id','desc')->paginate(10);


        return view('show_all_results',compact('results'));


    }//end of function show_all_results


    public function result_details(Request $request,$id){

        $result=Result::find($id);
        return view('result_details', compact('result'));


    }// end of function result_details

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResultRequest  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResultRequest $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }

    public function results_all(Request $request){
        
        $results=Result::orderBy('id','desc')->get();

        $results_all=[];
        $results_all['results']=$results;

        return response()->json($results_all, 200);



    }// end of function results_all
}
