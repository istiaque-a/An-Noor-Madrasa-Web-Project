<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;

use App\Models\TeacherStaff;
use App\Models\Fujala;
use App\Models\Student;
use App\Models\Donor;
use App\Models\Volunteer;





use App\Http\Requests\StorequestionRequest;
use App\Http\Requests\UpdatequestionRequest;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
        
        return view('add_question');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorequestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(StorequestionRequest $request)*/
    public function store(Request $request)
    {


            $question_body=$request->input('question');
            $user_id=$request->input('user_id');

             // echo ' question = '.$question_body.' user id = '.$user_id;






            Question::create(array(

                'question' => $question_body,
                'user_id'  => $user_id
            ));

            return response()->json(['message'=>'Success !!'], 200);
            // echo 'success !';

        


    }


    public function insert_answer(Request $request)
    {
        $question_id=$request->input('question_id');
        $answer= $request->input('answer');
        $user_id = $request->input('user_id');
        
        Answer::create(array(

                'question_id' => $question_id,
                'answer'=> $answer,
                'user_id'  => $user_id
            ));

        $answers_all=Answer::where(array('question_id'=>$question_id))->get();

        $answers_found=[];

        $answers_constructed_all=[];

        foreach($answers_all as $answer_indiv){

            $user_id=$answer_indiv->user_id;
            $person_name = $this->find_person_name($user_id);
            $answer_found = $answer_indiv->answer;

            $answer_constructed=[];
            $answer_constructed['answer']=$answer_found;
            $answer_constructed['person_name']=$person_name;

            $answers_constructed_all[]=$answer_constructed;




        }//end of foreach loop

        $answers_found['all_answers']=$answers_constructed_all;

        return response()->json( $answers_found, 200);




    }

    public function all_questions(Request $request)
    {
        /*$questions=Question::get();
        return view('all_questions',compact('questions'));*/


        $page=$request->input('_page');
            $limit=$request->input('_limit');
            // $user_id = $request->input('user_id');   

     

            $questions=[];
            

            $skip=$page*$limit;

            

            $questions =Question::orderBy('id','desc')->skip($skip)->take($limit)->get();

            return response()->json($questions, 200);

    }// end of function all_questions

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


    public function get_question_indiv(Request $request, $id)
    {
        
        $info=Question::where(array('id'=> $id ))->get();
        $question_body="";
        foreach ($info as $info_indiv) {
            
            $question_body=$info_indiv['question'];

        }

        $answers=Answer::where(array('question_id'=>$id))->get();
        $answers_found=[];
        foreach($answers as $answer_found_indiv){

            $answer_indiv=[];
            $answer_indiv['answer_id']=$answer_found_indiv->id;
            $answer_indiv['answer']=$answer_found_indiv->answer;

            $user_id=$answer_found_indiv['user_id'];


            $person_name=$this->find_person_name($user_id);            

            
            
            $answer_indiv['person_name']=$person_name;



            $answers_found[]=$answer_indiv;



        }//end of foreach loop

        return response()->json(['question'=>$question_body, 'answers'=> $answers_found ], 200);



    }// end of function get_question_indiv

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatequestionRequest  $request
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatequestionRequest $request, question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $question)
    {
        //
    }
}
