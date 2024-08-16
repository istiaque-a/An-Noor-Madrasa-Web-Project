<?php

namespace App\Http\Controllers;

use App\Models\FoundationActivity;
use App\Http\Requests\StoreFoundationActivityRequest;
use App\Http\Requests\UpdateFoundationActivityRequest;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FoundationActivityController extends Controller
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
        return view('create_activities');
    }


    public function activity_details(Request $request, $id){

        $activity_info=FoundationActivity::find($id);
        return view('activity_details',compact('activity_info'));


    }//end of function activity_details

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFoundationActivityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoundationActivityRequest $request)
    {

/*        $validator = Validator::make($request->all(), [

           
            'activity_heading' => 'required|string',
            'activity_body' => 'required|string|',
            'activity_type' =>'required',
            'activity_cat' =>'required',

            
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
*/
           $activity_heading=$request->input('activity_heading');
            $activity_body = $request->input('activity_body');
            $activity_type = $request->input('activity_type');

            $activity_cat = $request->input('activity_cat');

            $url = $request->input('url');

            $publish_date = $request->input('publish_date');
            $publish_date_formatted="00-00-0000";
            if($publish_date!=""){
                
                $publish_date_array = explode('-',$publish_date);

                $publish_date_formatted = $publish_date_array[2].'-'.$publish_date_array[1].'-'.$publish_date_array[0];
            }
            

             // echo " activity_cat= ".$activity_cat.' url = '.$url;


        if($activity_cat==4){

                    $foundation_activity=FoundationActivity::create([
            
                        'activity_heading' => $activity_heading,
                        'url' => $url,
                        'publish_date' =>$publish_date_formatted,
                        'activity_heading' => $activity_heading,
                        'activity_cat' =>$activity_cat
                        

                    ]);

        }   else{

            $foundation_activity=FoundationActivity::create([
            
                        'activity_heading' => $activity_heading,
                        'activity_body' => $activity_body,
                        'activity_type' =>$activity_type,
                        'activity_cat' =>$activity_cat

            ]);

        } 
        

        

        echo 'Done !!';

        // return response()->json(['success'=>'Done !!'], 200);





        
    }// end of method store 


    public function activities_categorywise(Request $request, $catId){

        if($catId==0){
                
                $activities=FoundationActivity::where(array('activity_type'=>0))->get();

        }else{
                
                $activities=FoundationActivity::where(array('activity_cat'=>$catId))->get();    

        }

        

        $activities_past=[];
        $activities_present=[];
        $activities_future=[];
        $activities_online_media=[];


        foreach($activities as $activity_indiv){
            $activity_type= $activity_indiv->activity_type;
            $activity_id= $activity_indiv->id;
            $activity_heading= $activity_indiv->activity_heading;
            $activity_body= $activity_indiv->activity_body;
            $activity_url = $activity_indiv->url;
            $activity_publish_date= $activity_indiv->publish_date;
            $activity_publish_date_formatted=NULL;

            if($activity_publish_date!=NUll){

                $activity_publish_date_array = explode('-',$activity_publish_date);
                $activity_publish_date_formatted = $activity_publish_date_array[2].'-'.$activity_publish_date_array[1].'-'.$activity_publish_date_array[0];
            }
            


            
                $activity_info_indiv=array();
                $activity_info_indiv['id']=$activity_id;
                $activity_info_indiv['activity_heading']=$activity_heading;
                $activity_info_indiv['activity_body']=$activity_body;                
                $activity_info_indiv['url']=$activity_url;                
                $activity_info_indiv['publish_date']=$activity_publish_date_formatted;                

            if($activity_type==1){    

                $activities_past[]= $activity_info_indiv; 

            }else if($activity_type==2){

                $activities_present[]= $activity_info_indiv; 

            }else if($activity_type==3){

                $activities_future[]= $activity_info_indiv; 

            }else if($activity_type==0){

                $activities_online_media[]= $activity_info_indiv; 

            }



        }//end of foreach loop

        $activities_all=[];
        $activities_all['past_activities']=$activities_past;
        $activities_all['present_activities']=$activities_present;
        $activities_all['future_activities']=$activities_future;
        $activities_all['online_media']=$activities_online_media;



        return response()->json($activities_all, 200);





    }//end of function activities_categorywise


    public function activity_details_api(Request $request, $catId)
    {
        
        $activity_info=FoundationActivity::find($catId);




        $activity_heading="";
        $activity_body="";
        $url="";
        $publish_date_formatted="";

        if($activity_info){

            $activity_heading=$activity_info['activity_heading'];
            $activity_body=$activity_info['activity_body'];
            $url=$activity_info['url'];
            $publish_date_found=$activity_info['publish_date'];
            $activity_type=$activity_info['activity_type'];
            $publish_date_formatted="";
            if($publish_date_found!=null){
                $publish_date_found_array=explode('-',$publish_date_found);
                $publish_date_formatted=$publish_date_found_array[2].'-'.$publish_date_found_array[1].'-'.$publish_date_found_array[0];


            }


        }

        $activity_info_all=[];
        $activity_info_found=[];

        $activity_info_found['activity_heading']=$activity_heading;
        $activity_info_found['activity_body']=$activity_body;

        if( substr( $url, 0, 4 ) !== "http" && substr( $url, 0, 5 ) !== "https"){

            if($url!=""){
                $url="http://".$url;
            }

            

         }
        $activity_info_found['url']=$url;
        $activity_info_found['activity_type']=$activity_type;
        $activity_info_found['publish_date']=$publish_date_formatted;

        $activity_info_all['activity_info']=[$activity_info_found];

        

        return response()->json($activity_info_all, 200);



    }//end of function activity_details

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoundationActivity  $foundationActivity
     * @return \Illuminate\Http\Response
     */
    public function show(FoundationActivity $foundationActivity)
    {
        //
    }


    public function activities_all(Request $request){


        



        $activities=FoundationActivity::orderBy('id','desc')->paginate(10);


        
        return view('activities_all', compact('activities'));


    }//end of function activities


    public function get_activity_indiv(Request $request,$id){

        $info=FoundationActivity::where(array('id'=> $id ))->get();
        return response()->json($info, 200);


    }//end of function get_activity_indiv


    public function get_activities(Request $request, $activity_type_found){


     $page=$request->input('_page');
            $limit=$request->input('_limit');
            $user_id = $request->input('user_id');   

     $activity_type=0;
     if($activity_type_found=="past"){

        $activity_type=1;

     }else if($activity_type_found=="present"){

        $activity_type=2;

     }else if($activity_type_found=="future"){

        $activity_type=3;
     }      

            $foundation_info=[];
            

            $skip=$page*$limit;

            

            $foundation_info =FoundationActivity::where(array('activity_type'=>$activity_type))->orderBy('id','desc')->skip($skip)->take($limit)->get();

            return response()->json($foundation_info, 200);

    }//end of function get_activities

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoundationActivity  $foundationActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(FoundationActivity $foundationActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFoundationActivityRequest  $request
     * @param  \App\Models\FoundationActivity  $foundationActivity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoundationActivityRequest $request, FoundationActivity $foundationActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoundationActivity  $foundationActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoundationActivity $foundationActivity)
    {
        //
    }
}
