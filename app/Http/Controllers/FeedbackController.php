<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\TeacherStaff;
use App\Models\Fujala;
use App\Models\Student;
use App\Models\Donor;
use App\Models\Volunteer;
use App\Models\User;



class FeedbackController extends Controller
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


public function find_person_name($user_id)
    {
        
            $info_result=TeacherStaff::where(array('user_id'=>$user_id))->get();

            $name_found=0;
            $person_name="";

            foreach($info_result as $info_result_indiv){

                $person_name=$info_result_indiv['name'];

                $name_found=1;

            }//end of foreach loop

            if($name_found==0){

                $info_result=Fujala::where(array('user_id'=>$user_id))->get();


                foreach($info_result as $info_result_indiv){

                    $person_name=$info_result_indiv['name'];

                    $name_found=1;

                }//end of foreach loop


            }

            if($name_found==0){

                $info_result=Student::where(array('user_id'=>$user_id))->get();


                foreach($info_result as $info_result_indiv){

                    $person_name=$info_result_indiv['name'];

                    $name_found=1;

                }//end of foreach loop


            }

            if($name_found==0){

                $info_result=Donor::where(array('user_id'=>$user_id))->get();


                foreach($info_result as $info_result_indiv){

                    $person_name=$info_result_indiv['name'];

                    $name_found=1;

                }//end of foreach loop


            }


            if($name_found==0){

                $info_result=Volunteer::where(array('user_id'=>$user_id))->get();;;


                foreach($info_result as $info_result_indiv){

                    $person_name=$info_result_indiv['name'];

                    $name_found=1;

                }//end of foreach loop


            }

            if($name_found==0){

               $info_result =User::where(array('id'=>$user_id))->get();

               foreach($info_result as $info_result_indiv){

                    $person_name=$info_result_indiv['mobile'];

                    $name_found=1;

                }//end of foreach loop

            }
            

            return $person_name;

    }//end pof function find_person_name


    public function feedback($value='')
    {
        
        $feedback=[];
        // return view('feedback',compact('feedback'));



        



        $feedback_all=Feedback::orderBy('id','desc')->paginate(10);

        $person_names=[];

        foreach($feedback_all as $feedback_indiv){

            $user_id=$feedback_indiv->user_id;

            $person_name=$this->find_person_name($user_id);

            $person_names[]=$person_name;



        }//end of foreach loop


        return view('feedback',compact('feedback_all','person_names'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFeedbackRequest  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(StoreFeedbackRequest $request)*/
    public function store(Request $request)
    {
        
        $user_id=$request->input('user_id');
        $feedback=$request->input('feedback');

        Feedback::create(array('feedback'=>$feedback,'user_id'=>$user_id));
        return response()->json(['message'=>'Done!'], 200);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFeedbackRequest  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
