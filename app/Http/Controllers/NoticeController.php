<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Notice;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Datatables;
use Redirect;
            
use App\Models\TeacherStaff;
use App\Models\Fujala;
use App\Models\Student;
use App\Models\Donor;
use App\Models\Volunteer;


class NoticeController extends Controller
{
     public function get_notices(Request $request)
        {
            
            $page=$request->input('_page');
            $limit=$request->input('_limit');
            $user_id = $request->input('user_id');

            
            $teacher_approved=0;
            $student_approved=0;
            $fujala_approved=0;
            $donor_approved=0;
            $volunteer_approved=0;

            $teacher_data=TeacherStaff::where(array('id'=>$user_id,'approved'=>1))->get();
            if(count($teacher_data)){
                $teacher_approved=1;

            }

            $student_data=Student::where(array('id'=>$user_id,'approved'=>1))->get();

            if(count($student_data)){

                $student_approved=1;

            }

            $fujala_data=Fujala::where(array('id'=>$user_id,'approved'=>1))->get();
            if(count($fujala_data)){

                $fujala_approved=1;

            }

            $donor_data=Donor::where(array('id'=>$user_id,'approved'=>1))->get();
            if(count($donor_data)){
                $donor_approved=1;

            }

            $volunteer_data=Volunteer::where(array('id'=>$user_id,'approved'=>1))->get();

            if(count($volunteer_data)){
                $volunteer_approved=1;

            }




            $show_private_notices=0;

            if($teacher_approved==1 || $student_approved==1|| $fujala_approved==1|| $donor_approved==1|| $volunteer_approved==1){

                    $show_private_notices=1;
            }

            

                
            $notices=[];
            // if(!empty($page) && !empty($limit)){

                $skip=$page*$limit;

                if($show_private_notices==1){

                  $notices=Notice::orderBy('id','desc')->skip($skip)->take($limit)->get();  

              }else{

                $notices=Notice::where(array('isPublic'=>1))->orderBy('id','desc')->skip($skip)->take($limit)->get();  


              }



                  // $notices_json = json_encode($notices);

                

            // }// end of if(!empty($page) && !empty($limit){

            // echo $notices;    

            return response()->json($notices, 200);


        }// end of function get_notices


    public function noticeboard(Request $request){

        $notices=Notice::orderBy('id','desc')->paginate(2);

        // return view('volunteers', compact('users'));

        return view('noticeboard', compact('notices'));


    }//end of function noticeboard



     public function notice_edit(Request $request, $id){

        
        $notice=Notice::find($id);
        return view('notice_edit',compact('notice'));



     }//end of function notice_edit


     public function edit_notice_now(Request $request){

        $this->validate($request,[
                'public'=> 'required',
                'notice_title'=> 'required|unique:notices,title',
                'notice_body'=>'required'
        ]);

        $notice_id = $request->input('id');
        $title = $request->input('notice_title');
        $notice_body = $request->input('notice_body');
        $public= $request->input('public');

        Notice::where('id',$notice_id)->update(['title'=>$title,'notice_body'=>$notice_body,'isPublic'=>$public]);

        
       return  redirect()->back()->with('message', 'success|Record updated.')->withInput();


        

        

     } // end of function edit_notice_now  


     public function add_notice_now(Request $request){

        $this->validate($request,[
                'public'=> 'required',
                'notice_title'=> 'required|unique:notices,title',
                'notice_body'=>'required'
        ]);

        $public = $request->input('public');
        $title = $request->input('notice_title');
        $notice_body = $request->input('notice_body');


        $notice= new Notice();
        $notice->title = $title;
        $notice->notice_body = $notice_body;
        $notice->isPublic = $public;
        $notice->save();

        

        
       return  redirect()->back()->with('message', 'success|Record added.')->withInput();



     }//end of function add_notice_now


     public function notice_add(Request $request){

        return view('notice_add');

     }// end of function notice_add

}
