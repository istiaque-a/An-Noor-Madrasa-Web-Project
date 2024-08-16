<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class JobController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {

        $validator = Validator::make($request->all(), [

           
            'name'=> 'required|string',
            'job_info' => 'required|string',
            'last_date'=>'required',
            'user_id'=>'required'
            
            
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $job_name=$request->input('name');
        $job_info=$request->input('job_info');
        $last_date=$request->input('last_date');
        $user_id=$request->input('user_id');

        Job::create(array('job_heading'=>$job_name,'job_description'=>$job_info,'end_date'=>$last_date,
            'user_id'=>$user_id));

        // return response()->json(['token' => $token], 200);

        return response()->json(['message' => 'Success !'], 200);





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }


    public function job_detail_for_api(Request $request,$id){


        $jobs_info=Job::where(array('id'=>$id))->get();

        $job_id=0;
        $job_heading="";
        $job_info="";
        $job_end_date="";
        $expired=0;

        $jobs_info_found=[];

        foreach($jobs_info as $job_info_indiv){

            $job_id = $job_info_indiv->id;
            $job_heading = $job_info_indiv->job_heading;
            $job_info = $job_info_indiv->job_description;
            $end_date = $job_info_indiv->end_date;
            $end_date_array= explode('-',$end_date);
            $end_date_formatted= $end_date_array[2].'-'.$end_date_array[1].'-'.$end_date_array[0];
            $job_end_date= $end_date_formatted;



            if($end_date < date('Y-m-d')){

                $expired=1;

            }



        }// end of foreach loop

        $jobs_info_found['job_info']=[['id'=>$job_id,'job_heading'=>$job_heading,'job_info'=>$job_info,'end_date'=>$job_end_date,'expired'=>$expired]];

         

        return response()->json($jobs_info_found, 200);


    }// end of function job_detail_for_api


    public function show_jobs(Request $request, $approved_unapproved){

        $approved=0;
        if(strcasecmp($approved_unapproved, 'approved')==0){

                $approved=1;

        }else if(strcasecmp($approved_unapproved, 'unapproved')==0){

                $approved=0;

        }

        



        $jobs=Job::where(array('approved'=>$approved))->orderBy('id','desc')->paginate(10);


        return view('show_jobs',compact('approved','jobs'));



    }// end of function show_jobs



    public function job_details(Request $request, $id )
    {
        $jobs=Job::join('users','jobs.user_id','=','users.id')
        ->where('jobs.id','=',$id)
            ->select('jobs.*'
                //,
                //'users.id as majlishe_shura_id_found'
            
            )
            ->get();

        return view('job_details', compact('jobs','id'));
    }

    public function approve_disapprove_job_now(Request $request)
    {
        $job_id=$request->input('job_id');
        $approved_found = $request->input('approved_found');

        $approval_to_do=0;
        if($approved_found==0){

              $approval_to_do=1;

        }else{

                 $approval_to_do=0; 
        }

        Job::where(array('id'=>$job_id))->update(['approved'=>$approval_to_do]);

        echo '1';



    }//end of function approve_disapprove_job_now

    public function show_jobs_all(Request $request)
    {
        
            /*$open_jobs=Job::where(array('approved'=>1,'end_date','>=',date('Y-m-d')))->get();*/
            $open_jobs=Job::where(array('approved'=>1))
            ->whereRaw('end_date >= '.date('Y-m-d'))
            ->get();



            $jobs_all=[];
            $open_jobs_all=[];

            foreach($open_jobs as $open_job_indiv){
                $open_job_indiv_found=[];
                $job_heading=$open_job_indiv->job_heading;
                $end_date=$open_job_indiv->end_date;
                $end_date_array = explode('-',$end_date);
                $end_date_formatted= $end_date_array[2].'-'.$end_date_array[1].'-'.$end_date_array[0];
                $open_job_indiv_found['job_heading']=$job_heading;
                
                $open_job_indiv_found['id']=$open_job_indiv->id;
                $open_job_indiv_found['end_date']=$end_date_formatted;

                $open_jobs_all[]=$open_job_indiv_found;




            }// end of foreach loop

            $jobs_all['open_jobs']=$open_jobs_all;


            //$closed_jobs=Job::where(array('approved'=>1,'end_date','<',date('Y-m-d')))->get();

            $closed_jobs=Job::where(array('approved'=>1))
            ->whereRaw('end_date < '.date('Y-m-d'))
            ->get();

            $closed_jobs_all=[];

            foreach($closed_jobs as $closed_job_indiv){
                $closed_job_indiv_found=[];
                $job_heading=$closed_job_indiv->job_heading;
                $end_date=$closed_job_indiv->end_date;
                $end_date_array = explode('-',$end_date);
                $end_date_formatted= $end_date_array[2].'-'.$end_date_array[1].'-'.$end_date_array[0];
                $closed_job_indiv_found['job_heading']=$job_heading;
                
                $closed_job_indiv_found['id']=$closed_job_indiv->id;
                $closed_job_indiv_found['end_date']=$end_date_formatted;

                $closed_jobs_all[]=$open_job_indiv_found;




            }// end of foreach loop


            $jobs_all['closed_jobs']=$closed_jobs_all;

                    return response()->json($jobs_all, 200);






    }//end of function show_jobs_all
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobRequest  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
