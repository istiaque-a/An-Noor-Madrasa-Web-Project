<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TeacherStaff;
use App\Models\Fujala;
use App\Models\Student;
use App\Models\Donor;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
// use Datatables;
use Yajra\DataTables\DataTables;



class UserController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth', ['only' => 'getTeachersAndStaff']);

            // $this->middleware('auth');
        }
    public function register_with_password(Request $request){

        $validator = Validator::make($request->all(), [

           
            'mobile'=> 'required|string|unique:users',
            'password' => 'required|string|min:6|same:password_again',
            'password_again'=>'required|string|min:6',
            
            
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user=User::create([
            'mobile'=> $request->input('mobile'),
            'password'=> Hash::make($request->input('password')),

        ]);

        $user_id=$user->id;

        $token=rand(0,99999999999);

        return response()->json(['token'=>$token,'user_id'=>$user_id], 200);



    }//

    public function register(Request $request)
    {
        $user_type=$request->input('user_type');
        $user_id=$request->input('user_id');
         $token=rand(0,99999999999);

        if($user_type==1){

        
        $validator = Validator::make($request->all(), [

            'user_type' => 'required', 
            // 'mobile_own'=> 'required|string|unique:users',
            'name' => 'required|string',
            'father_name' => 'required|string',
            // 'dob'=> 'required|string',
            'permanent_address'=>'required|string',
            'temporary_address'=>'required|string',
            'email' => 'required|email|unique:users',
            /*'password' => 'required|string|min:6|same:password_again',
            'password_again'=>'required|string|min:6',
            */
            
        ]);

        }// end of if($user_type==1){

        if($user_type==2){

            $validator = Validator::make($request->all(), [

            'mobile_own'=> 'required|string',
            'name' => 'required|string',
            'father_name' => 'required|string',
            

            'permanent_address_village'=> 'required|string',
            'permanent_address_post_office'=> 'required|string',
            'permanent_address_thana'=> 'required|string',
            'permanent_address_district'=> 'required|string',
            'permanent_address_division'=> 'required|string',
            'temporary_address'=> 'required|string',

            'email' => 'email|unique:users',
            /*'password' => 'required|string|min:6|same:password_again',
            'password_again'=>'required|string|min:6',*/
            
            // 'custom_field' => 'required', // Add your custom field validation here
            //'user_type' => 'required', // Add your custom field validation here
        ]);

        }    



        if($user_type==3){

            $validator = Validator::make($request->all(), [

            'mobile_own'=> 'required|string',
            'name' => 'required|string',
            'father_name' => 'required|string',
            

            'permanent_address_village'=> 'required|string',
            'permanent_address_post_office'=> 'required|string',
            'permanent_address_thana'=> 'required|string',
            'permanent_address_district'=> 'required|string',
            'permanent_address_division'=> 'required|string',
            'temporary_address'=> 'required|string',

            'email' => 'email|unique:users',
            /*'password' => 'required|string|min:6|same:password_again',
            'password_again'=>'required|string|min:6',
            */
            // 'custom_field' => 'required', // Add your custom field validation here
            //'user_type' => 'required', // Add your custom field validation here
        ]);

        }    


        if($user_type==4){

            $validator = Validator::make($request->all(), [

            'mobile_own'=> 'required|string',
            'name' => 'required|string',
            
            /*'password' => 'required|string|min:6|same:password_again',
            'password_again'=>'required|string|min:6',
            */
            // 'custom_field' => 'required', // Add your custom field validation here
            //'user_type' => 'required', // Add your custom field validation here
        ]);

        }    


        if($user_type==5){

            $validator = Validator::make($request->all(), [

                'mobile_own'=> 'required|string',
                'name' => 'required|string',
                'father_name'=> 'required|string',
                'current_address' =>'required|string',

                
            /*    'password' => 'required|string|min:6|same:password_again',
                'password_again'=>'required|string|min:6',
            */
            
        ]);

        }


        if($user_type==6){

                
            $validator = Validator::make($request->all(), [

                'mobile_own'=> 'required|string',
                'name' => 'required|string',
                'father_name' => 'required|string',
                

                'permanent_address_village'=> 'required|string',
                'permanent_address_post_office'=> 'required|string',
                'permanent_address_thana'=> 'required|string',
                'permanent_address_district'=> 'required|string',
                'permanent_address_division'=> 'required|string',
                'temporary_address'=> 'required|string',

                'email' => 'email|unique:users',
                
        ]);

        }    



        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        if($user_type==1){

            $info=TeacherStaff::where(array('user_id'=>$user_id))->get();
            if(count($info)>0){

                $approved_found=$info[0]['approved'];

                $message="";
                if($approved_found==1){
                    $message='অ্যাকাউন্ট ইতোমধ্যেই নিবন্ধিত এবং অ্যাডমিনের অনুমোদনের অপেক্ষায় আছে।';

                }else{
                    $message="অ্যাকাউন্ট ইতোমধ্যেই নিবন্ধিত এবং অ্যাডমিন কর্তৃক অনুমোদিত।";

                }
                return response()->json(['token' => $token,'already_exists'=>1,'message'=>$message], 200);


            }


            // Create the user
        $user = TeacherStaff::create([
            'user_id'=>$user_id,
            'user_type'=>$user_type,
            // 'mobile' => $request->input('mobile_own'),
            'name' => $request->input('name'),
            'father_name' => $request->input('father_name'),
            'rank'=> $request->input('status'), 
          
            'whatsapp'=> $request->input('whatsapp'),
            'permanent_address'=>$request->input('permanent_address'),
            'temporary_address'=>$request->input('temporary_address'),
            'email' => $request->input('email'),

            'khidmat_year'=> $request->input('khidmat_year'),
            'ex_or_current'=> $request->input('ex_or_current'),
            'current_working_institution'=> $request->input('current_institution'),  
            // 'password' => Hash::make($request->input('password')),
            //'password_again'=>$request->input('password_again'),

            
          
          
          
          


        ]);

        }    // end of $user_type==1

        if($user_type==2){


            $info=Fujala::where(array('user_id'=>$user_id))->get();
            if(count($info)>0){

                $approved_found=$info[0]['approved'];

                $message="";
                if($approved_found==1){
                    $message='অ্যাকাউন্ট ইতোমধ্যেই নিবন্ধিত এবং অ্যাডমিনের অনুমোদনের অপেক্ষায় আছে।';

                }else{
                    $message="অ্যাকাউন্ট ইতোমধ্যেই নিবন্ধিত এবং অ্যাডমিন কর্তৃক অনুমোদিত।";

                }
                return response()->json(['token' => $token,'already_exists'=>1,'message'=>$message], 200);


            }

            $user = Fujala::create([
            
 
                'user_id'=> $user_id,    
                'user_type'=>$user_type,
                'name'=>$request->input('name'),
                'father_name'=>$request->input('father_name'),
                'dob' => $request->input('dob'),
                'mobile_own'=>$request->input('mobile_own'),
                'permanent_address_village'=>$request->input('permanent_address_village'),
                'permanent_address_post_office'=>$request->input('permanent_address_post_office'),
                'permanent_address_thana'=>$request->input('permanent_address_thana'),
                'permanent_address_district'=>$request->input('permanent_address_district'),
                'permanent_address_division'=>$request->input('permanent_address_division'),
                'temporary_address'=>$request->input('temporary_address'),
                'marital_status'=>$request->input('marital_status'),
                'mashgala_workplaces'=>$request->input('mashgala_workplaces'),
                'facebook_id'=>$request->input('facebook_id'),
                'faragat_year_hijri'=>$request->input('faragat_year_hijri'),
                'faragat_year_christian'=>$request->input('faragat_year_christian'),
                'blood_group'=>$request->input('blood_group'),
                'last_jamat_attended'=>$request->input('last_jamat_attended'),
                'email'=>$request->input('email'),
                'mobile_own'=>$request->input('mobile_own'),
                'mobile_guardian'=>$request->input('mobile_guardian'),
                'whatsapp'=>$request->input('whatsapp'),
                'tasnif'=>$request->input('tasnif'),
                'social_organizational_contribution' =>$request->input('social_organizational_contribution'),
                
     
                 ]);   
        }



        if($user_type==3){


            $info=Student::where(array('user_id'=>$user_id))->get();
            if(count($info)>0){

                $approved_found=$info[0]['approved'];

                $message="";
                if($approved_found==1){
                    $message='অ্যাকাউন্ট ইতোমধ্যেই নিবন্ধিত এবং অ্যাডমিনের অনুমোদনের অপেক্ষায় আছে।';

                }else{
                    $message="অ্যাকাউন্ট ইতোমধ্যেই নিবন্ধিত এবং অ্যাডমিন কর্তৃক অনুমোদিত।";

                }
                return response()->json(['token' => $token,'already_exists'=>1,'message'=>$message], 200);


            }

            $user = Student::create([
            
 
                'user_id' => $user_id,    
                'user_type'=>$user_type,
                'name'=>$request->input('name'),
                'father_name'=>$request->input('father_name'),
                'dob' => $request->input('dob'),
                'mobile_own'=>$request->input('mobile_own'),
                'permanent_address_village'=>$request->input('permanent_address_village'),
                'permanent_address_post_office'=>$request->input('permanent_address_post_office'),
                'permanent_address_thana'=>$request->input('permanent_address_thana'),
                'permanent_address_district'=>$request->input('permanent_address_district'),
                'permanent_address_division'=>$request->input('permanent_address_division'),
                'temporary_address'=>$request->input('temporary_address'),
                'marital_status'=>$request->input('marital_status'),
                'mashgala_workplaces'=>$request->input('mashgala_workplaces'),
                'facebook_id'=>$request->input('facebook_id'),
                'faragat_year_hijri'=>$request->input('faragat_year_hijri'),
                'faragat_year_christian'=>$request->input('faragat_year_christian'),
                'blood_group'=>$request->input('blood_group'),
                'last_jamat_attended'=>$request->input('last_jamat_attended'),
                'email'=>$request->input('email'),
                'mobile_own'=>$request->input('mobile_own'),
                'mobile_guardian'=>$request->input('mobile_guardian'),
                'whatsapp'=>$request->input('whatsapp'),
                'tasnif'=>$request->input('tasnif'),
                'social_organizational_contribution' =>$request->input('social_organizational_contribution'),
                // 'password' =>Hash::make($request->input('password')),
     
                 ]);   
        }


        if($user_type==4){


            $info=Donor::where(array('user_id'=>$user_id))->get();
            if(count($info)>0){

                $approved_found=$info[0]['approved'];

                $message="";
                if($approved_found==1){
                    $message='অ্যাকাউন্ট ইতোমধ্যেই নিবন্ধিত এবং অ্যাডমিনের অনুমোদনের অপেক্ষায় আছে।';

                }else{
                    $message="অ্যাকাউন্ট ইতোমধ্যেই নিবন্ধিত এবং অ্যাডমিন কর্তৃক অনুমোদিত।";

                }
                return response()->json(['token' => $token,'already_exists'=>1,'message'=>$message], 200);


            }

            $donation_amount=$request->input('amount');
            if(empty($donation_amount)){

                $donation_amount=0;

            }
            $donor_types = $request->input('donor_types');

            for($i=0; $i<count($donor_types); $i++){

                $donor_type_found = $donor_types[$i];



                $user = Donor::create([
                
     
                    'user_id' => $user_id,   
                    'user_type'=>$user_type,
                    'name'=>$request->input('name'),
                    'profession'=>$request->input('occupation'),
                    'current_working_institution'=>$request->input('current_working_institution'),

                    // 'father_name'=>$request->input('father_name'),
                    'mobile_own'=>$request->input('mobile_own'),
                    
                    

                    'rank'=> $request->input('rank'),
                    'temporary_address' =>$request->input('current_address'),
                    'donor_type'=> $donor_type_found,
                    'donation_type'=> $request->input('donation_types'),
                    'donation_fields'=> $request->input('donation_fields'),
                    'donation_amount'=>$donation_amount,

                    // 'password'=> Hash::make($request->input('password'))
                    
         
                     ]);   
                     

            }//end of for loop

            
        }




        if($user_type==5){


            $info=Volunteer::where(array('user_id'=>$user_id))->get();
            if(count($info)>0){

                $approved_found=$info[0]['approved'];

                $message="";
                if($approved_found==1){
                    $message='অ্যাকাউন্ট ইতোমধ্যেই নিবন্ধিত এবং অ্যাডমিনের অনুমোদনের অপেক্ষায় আছে।';

                }else{
                    $message="অ্যাকাউন্ট ইতোমধ্যেই নিবন্ধিত এবং অ্যাডমিন কর্তৃক অনুমোদিত।";

                }
                return response()->json(['token' => $token,'already_exists'=>1,'message'=>$message], 200);


            }
            
            $user = Volunteer::create([
            
 
                'user_id' => $user_id,   
                'user_type'=>$user_type,
                'name'=>$request->input('name'),
                'father_name'=> $request->input('father_name'),

                'temporary_address'=> $request->input('current_address'),   
                'profession'=>$request->input('profession'),
                'current_working_institution'=>$request->input('current_working_institution'),

                
                'mobile_own'=>$request->input('mobile_own'),
                'email'=> $request->input('email'),
                'whatsapp'=> $request->input('whatsapp'),
                'age'=> $request->input('age'),
                'educational_institution'=> $request->input('educational_institution'),
                'current_working_institution'=> $request->input('current_working_institution'),
                'skill_experience'=> $request->input('skill_experience'),

                // 'password'=> Hash::make($request->input('password'))
                
     
                 ]);   
        }


        if($user_type==6){


            $info=Student::where(array('user_id'=>$user_id))->get();
            if(count($info)>0){

                $approved_found=$info[0]['approved'];

                $message="";
                if($approved_found==1){
                    $message='অ্যাকাউন্ট ইতোমধ্যেই নিবন্ধিত এবং অ্যাডমিনের অনুমোদনের অপেক্ষায় আছে।';

                }else{
                    $message="অ্যাকাউন্ট ইতোমধ্যেই নিবন্ধিত এবং অ্যাডমিন কর্তৃক অনুমোদিত।";

                }
                return response()->json(['token' => $token,'already_exists'=>1,'message'=>$message], 200);


            }
            
            $user = Student::create([
            
 
                'user_id' => $user_id,    
                'user_type'=>$user_type,
                'name'=>$request->input('name'),
                'father_name'=>$request->input('father_name'),
                'dob' => $request->input('dob'),
                'mobile_own'=>$request->input('mobile_own'),
                'permanent_address_village'=>$request->input('permanent_address_village'),
                'permanent_address_post_office'=>$request->input('permanent_address_post_office'),
                'permanent_address_thana'=>$request->input('permanent_address_thana'),
                'permanent_address_district'=>$request->input('permanent_address_district'),
                'permanent_address_division'=>$request->input('permanent_address_division'),
                'temporary_address'=>$request->input('temporary_address'),
                // 'marital_status'=>$request->input('marital_status'),
                // 'mashgala_workplaces'=>$request->input('mashgala_workplaces'),
                'facebook_id'=>$request->input('facebook_id'),
                // 'faragat_year_hijri'=>$request->input('faragat_year_hijri'),
                // 'faragat_year_christian'=>$request->input('faragat_year_christian'),
                'blood_group'=>$request->input('blood_group'),
                // 'last_jamat_attended'=>$request->input('last_jamat_attended'),
                'current_class'=>$request->input('current_class'),
                'email'=>$request->input('email'),
                'mobile_own'=>$request->input('mobile_own'),
                'mobile_guardian'=>$request->input('mobile_guardian'),
                'whatsapp'=>$request->input('whatsapp'),
                'student_type'=> '1'
                // 'tasnif'=>$request->input('tasnif'),
                // 'social_organizational_contribution' =>$request->input('social_organizational_contribution'),
                // 'password' =>Hash::make($request->input('password')),
     
                 ]);   

            // var_dump($user);


        }


        

        // You can also generate a token for the user if needed
       // $token = $user->createToken('AnNoor')->accessToken;

        return response()->json(['token' => $token,'already_exists'=>0], 200);

        // return response()->json([], 200);
    }



    public function get_registered_categories(Request $request, $userId){

        


        $all_categories=[];

        $teacher_staff_info=TeacherStaff::where(array('user_id'=>$userId))->get();
        if(count($teacher_staff_info)>0){

            $all_categories['teacher_staff']=1;

        }else{
            $all_categories['teacher_staff']=0;
        }


        $fujala_info=Fujala::where(array('user_id'=>$userId))->get();

        if(count($fujala_info)>0){

            $all_categories['fujala']=1;


        }else{

            $all_categories['fujala']=0;
        }



        $student_info=Student::where(array('user_id'=>$userId))->get();

        if(count($student_info)>0){

            $all_categories['student']=1;


        }else{

            $all_categories['student']=0;
        }


        $donor_info=Donor::where(array('user_id'=>$userId))->get();

        if(count($donor_info)>0){

            $all_categories['donor']=1;


        }else{

            $all_categories['donor']=0;
        }

        $volunteer_info=Volunteer::where(array('user_id'=>$userId))->get();

        if(count($volunteer_info)>0){

            $all_categories['volunteer']=1;


        }else{

            $all_categories['volunteer']=0;
        }

        $all_categories_all=[];
        $all_categories_obtained=[];
        $all_categories_obtained[]=$all_categories;
        $all_categories_all['categories']=$all_categories_obtained;


        return response()->json($all_categories_all);

    }//end of function get_registered_categories



    public function getTeachersAndStaff(Request $request){
/**/


        /*$users=User
        // ::all();
        ::where(array('user_type'=>'1'))
        ->get();*/

        $users = TeacherStaff::get();

        
        return view('teachersAndStaff', compact('users'));

    }// end of function getTeachersAndStaff

    public function getTeachersAndStaffDataTable(Request $request){

/*        $users = User::where(array('user_type'=>'1'))
        ->get();
*/

        $users = TeacherStaff::get();

        return Datatables::of($users)
        ->addIndexColumn()
         ->addColumn('intro', function($userIndiv){

            $approval_text='';

            if($userIndiv->approved==1){

                $approval_text='Disapprove';

            }else if($userIndiv->approved==0){

                $approval_text='Approve';
            }

            return '<span class="approve_or_disapprove" data-id="'.$userIndiv->id.'" data-approved="'.$userIndiv->approved.'">'.$approval_text.'</span>';
         })

         ->rawColumns(['intro'])
         ->toJson();
         // ->make(true);

    }// end of function getTeachersAndStaffDataTable

    public function getFujala(Request $request){

        /*$users=User
        // ::all();
        ::where(array('user_type'=>'2'))
        ->get();*/

        $users = Fujala::get();

        
        return view('fujala', compact('users'));



    }//end of function getFujala 

    public function getVolunteers(Request $request){

        /*$users=User
        // ::all();
        ::where(array('user_type'=>'5'))
        ->get();*/

        $users = Volunteer::get();

        
        return view('volunteers', compact('users'));



    }//end of function getVolunteers 


    

    public function getStudents(Request $request){

        /*$users=User
        // ::all();
        ::where(array('user_type'=>'3'))
        ->get();*/

        $users= Student::get();

        
        return view('students', compact('users'));



    }//end of function getStudents 



public function getDonors(Request $request){

        /*$users=User
        // ::all();
        ::where(array('user_type'=>'4'))
        ->get();*/

        $users = Donor::get();

        // echo " donor name = ".$users[0]->name;

        //echo " total donors = ".count($users);

        
        return view('donors', compact('users'));



    }//end of function getDonors 
    

    

    public function getFujalaDataTable(Request $request){

        

        /*$users = User::where(array('user_type'=>'2'))
        ->get();*/

        $users = Fujala::get();

        $mashgala_work_fields=['শাইখুল হাদিস','মুহাদ্দিস','মুহতামিম','ইমাম'];

        return Datatables::of($users)

        ->addIndexColumn()


         ->addColumn('permanent_address_found', function($userIndiv){

            $permanent_address_found=' Village: '.$userIndiv->permanent_address_village .', Post Office:'. $userIndiv->permanent_address_post_office.', Thana: '.$userIndiv->permanent_address_thana .', District: '.$userIndiv->permanent_address_district.', Division: '.$userIndiv->permanent_address_division ;


            return $permanent_address_found;
         })

         ->addColumn('mashgala_work_fields_found', function($userIndiv) use ($mashgala_work_fields){

            $mashgala_db = $userIndiv->mashgala_workplaces ;
            $mashgala_array=explode(',', $mashgala_db);

            $mashgala_found="";

            for($i=0; $i<count($mashgala_array); $i++){

                $mashgala_field_index=$mashgala_array[$i];

                $mashgala_found.=$mashgala_work_fields[$mashgala_field_index];

                

                if($i < count($mashgala_array)-1){

                    $mashgala_found.=",";

                }

            }// end of for loop


            return $mashgala_found;
         })
         


         ->addColumn('faragat_year_found', function($userIndiv){

            $permanent_address_found=' Hijri : '.$userIndiv->faragat_year_hijri .', Christian:'. 
            $userIndiv->faragat_year_christian  ;


            return $permanent_address_found;
         })

         

         ->addColumn('intro', function($userIndiv){

            $approval_text='';

            if($userIndiv->approved==1){

                $approval_text='Disapprove';

            }else if($userIndiv->approved==0){

                $approval_text='Approve';
            }

            return '<span class="approve_or_disapprove" data-id="'.$userIndiv->id.'" data-approved="'.$userIndiv->approved.'">'.$approval_text.'</span>';
         })

         ->rawColumns(['intro','permanent_address_found'])
         ->toJson();
         // ->make(true);            

    }// end of function getFujalaDataTable



public function getDonorsDataTable(Request $request){

        


        /*$users = User::where(array('user_type'=>'4'))
        ->get();*/

        $users = Donor::get();

        $mashgala_work_fields=['শাইখুল হাদিস','মুহাদ্দিস','মুহতামিম','ইমাম'];

        return Datatables::of($users)

        ->addIndexColumn()


         ->addColumn('permanent_address_found', function($userIndiv){

            $permanent_address_found=' Village: '.$userIndiv->permanent_address_village .', Post Office:'. $userIndiv->permanent_address_post_office.', Thana: '.$userIndiv->permanent_address_thana .', District: '.$userIndiv->permanent_address_district.', Division: '.$userIndiv->permanent_address_division ;


            return $permanent_address_found;
         })

         ->addColumn('mashgala_work_fields_found', function($userIndiv) use ($mashgala_work_fields){

            $mashgala_db = $userIndiv->mashgala_workplaces ;
            $mashgala_array=explode(',', $mashgala_db);

            $mashgala_found="";

            for($i=0; $i<count($mashgala_array); $i++){

                $mashgala_found.=$mashgala_work_fields[$i];

                if($i < count($mashgala_array)-1){

                    $mashgala_found.=",";

                }

            }// end of for loop


            return $mashgala_found;
         })
         


         ->addColumn('faragat_year_found', function($userIndiv){

            $permanent_address_found=' Hijri : '.$userIndiv->faragat_year_hijri .', Christian:'. 
            $userIndiv->faragat_year_christian  ;


            return $permanent_address_found;
         })

         

         ->addColumn('intro', function($userIndiv){

            $approval_text='';

            if($userIndiv->approved==1){

                $approval_text='Disapprove';

            }else if($userIndiv->approved==0){

                $approval_text='Approve';
            }

            return '<span class="approve_or_disapprove" data-id="'.$userIndiv->id.'" data-approved="'.$userIndiv->approved.'">'.$approval_text.'</span>';
         })

         ->rawColumns(['intro','permanent_address_found'])
         // ->toJson()
         ->make(true);       
         }// end of function getDonorsDataTable    

    public function getStudentsDataTable(Request $request){

        

        /*$users = User::where(array('user_type'=>'3'))
        ->get();*/

        $users = Student::get();

        $mashgala_work_fields=['শাইখুল হাদিস','মুহাদ্দিস','মুহতামিম','ইমাম'];

        return Datatables::of($users)

        ->addIndexColumn()


         ->addColumn('permanent_address_found', function($userIndiv){

            $permanent_address_found=' Village: '.$userIndiv->permanent_address_village .', Post Office:'. $userIndiv->permanent_address_post_office.', Thana: '.$userIndiv->permanent_address_thana .', District: '.$userIndiv->permanent_address_district.', Division: '.$userIndiv->permanent_address_division ;


            return $permanent_address_found;
         })

         ->addColumn('mashgala_work_fields_found', function($userIndiv) use ($mashgala_work_fields){

            $mashgala_db = $userIndiv->mashgala_workplaces ;
            if($mashgala_db==null){
                $mashgala_array=[];

            }else{

            
            $mashgala_array=explode(',', $mashgala_db);

           }

            $mashgala_found="";

            for($i=0; $i<count($mashgala_array); $i++){

                $mashgala_field_index=$mashgala_array[$i];

                $mashgala_found.=$mashgala_work_fields[$mashgala_field_index];

                if($i < count($mashgala_array)-1){

                    $mashgala_found.=",";

                }

            }// end of for loop


            return $mashgala_found;
         })
         


         ->addColumn('faragat_year_found', function($userIndiv){

            $permanent_address_found=' Hijri : '.$userIndiv->faragat_year_hijri .', Christian:'. 
            $userIndiv->faragat_year_christian  ;


            return $permanent_address_found;
         })

         

         ->addColumn('intro', function($userIndiv){

            $approval_text='';

            if($userIndiv->approved==1){

                $approval_text='Disapprove';

            }else if($userIndiv->approved==0){

                $approval_text='Approve';
            }

            return '<span class="approve_or_disapprove" data-id="'.$userIndiv->id.'" data-approved="'.$userIndiv->approved.'">'.$approval_text.'</span>';
         })

         ->rawColumns(['intro','permanent_address_found'])
         ->toJson();
         // ->make(true);            

    }// end of function getStudentsDataTable


    public function getVolunteersDataTable(Request $request){

    /*$users = User::where(array('user_type'=>'5'))
        ->get();*/

        $users= Volunteer::get();

        $mashgala_work_fields=['শাইখুল হাদিস','মুহাদ্দিস','মুহতামিম','ইমাম'];

        return Datatables::of($users)
        ->addIndexColumn()


         ->addColumn('permanent_address_found', function($userIndiv){

            $permanent_address_found=' Village: '.$userIndiv->permanent_address_village .', Post Office:'. $userIndiv->permanent_address_post_office.', Thana: '.$userIndiv->permanent_address_thana .', District: '.$userIndiv->permanent_address_district.', Division: '.$userIndiv->permanent_address_division ;


            return $permanent_address_found;
         })

         ->addColumn('mashgala_work_fields_found', function($userIndiv) use ($mashgala_work_fields){

            $mashgala_db = $userIndiv->mashgala_workplaces ;
            $mashgala_array=explode(',', $mashgala_db);

            $mashgala_found="";

            for($i=0; $i<count($mashgala_array); $i++){

                $mashgala_found.=$mashgala_work_fields[$i];

                if($i < count($mashgala_array)-1){

                    $mashgala_found.=",";

                }

            }// end of for loop


            return $mashgala_found;
         })
         


         ->addColumn('faragat_year_found', function($userIndiv){

            $permanent_address_found=' Hijri : '.$userIndiv->faragat_year_hijri .', Christian:'. 
            $userIndiv->faragat_year_christian  ;


            return $permanent_address_found;
         })

         

         ->addColumn('intro', function($userIndiv){

            $approval_text='';

            if($userIndiv->approved==1){

                $approval_text='Disapprove';

            }else if($userIndiv->approved==0){

                $approval_text='Approve';
            }

            return '<span class="approve_or_disapprove" data-id="'.$userIndiv->id.'" data-approved="'.$userIndiv->approved.'">'.$approval_text.'</span>';
         })

         ->rawColumns(['intro','permanent_address_found'])
         ->toJson();
         // ->make(true);            


    }// end of function getVolunteersDataTable

    public function getInfo(Request $request, $user_type,$user_id){




        
        $user_info=[];

        if($user_type==1){

            $user_info=TeacherStaff::where(array('user_id'=>$user_id,'approved'=>'1'))->get();

        }elseif($user_type==2){

            $user_info=Fujala::where(array('user_id'=>$user_id,'approved'=>'1'))->get();            

        }elseif($user_type==3){

            $user_info=Student::where(array('user_id'=>$user_id,'approved'=>'1'))->get();            

        }elseif($user_type==4){

            $user_info=Donor::where(array('user_id'=>$user_id,'approved'=>'1'))->get();            

        }elseif($user_type==5){

            $user_info=Volunteer::where(array('user_id'=>$user_id,'approved'=>'1'))->get();            

        }

        // return json_encode($user_info);

        return response()->json($user_info);




    }// end of function getInfo



    public function updateUser(Request $request){


        $user_type=$request->input('user_type');
        $user_id=$request->input('user_id');
        $token=rand(0,99999999999);

        if($user_type==1){

        
        
        $validator = Validator::make($request->all(), [

            'user_type' => 'required', 
            // 'mobile_own'=> 'required|string|unique:users',
            'name' => 'required|string',
            'father_name' => 'required|string',
            // 'dob'=> 'required|string',
            'permanent_address'=>'required|string',
            'temporary_address'=>'required|string',
            'email' => 'required|email|unique:users',
            // 'password' => 'required|string|min:6|same:password_again',
            // 'password_again'=>'required|string|min:6',
            
            
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        }// end of if($user_type==1){

        if($user_type==2){

            $validator = Validator::make($request->all(), [

            // 'mobile_own'=> 'required|string|unique:users',
            'name' => 'required|string',
            'father_name' => 'required|string',
            

            'permanent_address_village'=> 'required|string',
            'permanent_address_post_office'=> 'required|string',
            'permanent_address_thana'=> 'required|string',
            'permanent_address_district'=> 'required|string',
            'permanent_address_division'=> 'required|string',
            'temporary_address'=> 'required|string',

            // 'email' => 'email|unique:users',
            // 'password' => 'required|string|min:6|same:password_again',
            // 'password_again'=>'required|string|min:6',
            
            // 'custom_field' => 'required', // Add your custom field validation here
            //'user_type' => 'required', // Add your custom field validation here
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        }    



        if($user_type==3){

            $validator = Validator::make($request->all(), [

            'mobile_own'=> 'required|string|unique:users',
            'name' => 'required|string',
            'father_name' => 'required|string',
            

            'permanent_address_village'=> 'required|string',
            'permanent_address_post_office'=> 'required|string',
            'permanent_address_thana'=> 'required|string',
            'permanent_address_district'=> 'required|string',
            'permanent_address_division'=> 'required|string',
            'temporary_address'=> 'required|string',

            'email' => 'email|unique:users',
            
            /*'password' => 'required|string|min:6|same:password_again',
            'password_again'=>'required|string|min:6',
            */
            // 'custom_field' => 'required', // Add your custom field validation here
            //'user_type' => 'required', // Add your custom field validation here
        ]);

        }    




        if($user_type==4){

            $validator = Validator::make($request->all(), [

            // 'mobile_own'=> 'required|string|unique:users',
            'name' => 'required|string',
            
            'temporary_address'=> 'required|string',

            // 'email' => 'email|unique:users',
            // 'password' => 'required|string|min:6|same:password_again',
            // 'password_again'=>'required|string|min:6',
            
            // 'custom_field' => 'required', // Add your custom field validation here
            //'user_type' => 'required', // Add your custom field validation here
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        } 


         if($user_type==5){

            $validator = Validator::make($request->all(), [

                'mobile_own'=> 'required|string|unique:users',
                'name' => 'required|string',
                'father_name'=> 'required|string',
                'current_address' =>'required|string',

                
                'password' => 'required|string|min:6|same:password_again',
                'password_again'=>'required|string|min:6',
            
            
        ]);

        }    

        

        if($user_type==1){

            // Create the user
        $user = TeacherStaff::where('user_id',$user_id)->update([
            'name' => $request->input('name'),
            'father_name' => $request->input('father_name'),
            'rank'=> $request->input('rank'), 
            'permanent_address'=>$request->input('permanent_address'),
            'temporary_address'=>$request->input('temporary_address'),
            'khidmat_year'=> $request->input('khidmat_year'),
            'ex_or_current'=> $request->input('ex_or_current'),
            'current_working_institution'=> $request->input('current_institution'),  
            'whatsapp'=> $request->input('whatsapp'),
            'email' => $request->input('email'),

        ]);

        $user =TeacherStaff::find($user_id);
        // $token = $user->createToken('AnNoor')->accessToken;

        }    // end of $user_type==1

        if($user_type==2){

             Fujala::where('user_id',$user_id)->update([
                'name'=>$request->input('name'),
                'father_name'=>$request->input('father_name'),
                // 'mobile_own'=>$request->input('mobile_own'),
                'permanent_address_village'=>$request->input('permanent_address_village'),
                'permanent_address_post_office'=>$request->input('permanent_address_post_office'),
                'permanent_address_thana'=>$request->input('permanent_address_thana'),
                'permanent_address_district'=>$request->input('permanent_address_district'),
                'permanent_address_division'=>$request->input('permanent_address_division'),
                'temporary_address'=>$request->input('temporary_address'),
                'marital_status'=>$request->input('marital_status'),
                'mashgala_workplaces'=>$request->input('mashgala_workplaces'),
                'facebook_id'=>$request->input('facebook_id'),
                'faragat_year_hijri'=>$request->input('faragat_year_hijri'),
                'faragat_year_christian'=>$request->input('faragat_year_christian'),
                'blood_group'=>$request->input('blood_group'),
                'last_jamat_attended'=>$request->input('last_jamat_attended'),
                // 'email'=>$request->input('email'),
                'mobile_own'=>$request->input('mobile_own'),
                'mobile_guardian'=>$request->input('mobile_guardian'),
                'whatsapp'=>$request->input('whatsapp'),
                'tasnif'=>$request->input('tasnif'),
                'social_organizational_contribution' =>$request->input('social_organizational_contribution'),
                // 'password' =>$request->input('password'),
     
                 ]);   

             $user =User::find($user_id);

             // $token = $user->createToken('AnNoor')->accessToken;
        }

        if($user_type==3){



        $user =  Student::where('user_id',$user_id)->update([
            
 
                'user_id' => $user_id,    
                'user_type'=>$user_type,
                'name'=>$request->input('name'),
                'father_name'=>$request->input('father_name'),
                'dob' => $request->input('dob'),
                'mobile_own'=>$request->input('mobile_own'),
                'permanent_address_village'=>$request->input('permanent_address_village'),
                'permanent_address_post_office'=>$request->input('permanent_address_post_office'),
                'permanent_address_thana'=>$request->input('permanent_address_thana'),
                'permanent_address_district'=>$request->input('permanent_address_district'),
                'permanent_address_division'=>$request->input('permanent_address_division'),
                'temporary_address'=>$request->input('temporary_address'),
                'marital_status'=>$request->input('marital_status'),
                'mashgala_workplaces'=>$request->input('mashgala_workplaces'),
                'facebook_id'=>$request->input('facebook_id'),
                'faragat_year_hijri'=>$request->input('faragat_year_hijri'),
                'faragat_year_christian'=>$request->input('faragat_year_christian'),
                'blood_group'=>$request->input('blood_group'),
                'last_jamat_attended'=>$request->input('last_jamat_attended'),
                'email'=>$request->input('email'),
                'mobile_own'=>$request->input('mobile_own'),
                'mobile_guardian'=>$request->input('mobile_guardian'),
                'whatsapp'=>$request->input('whatsapp'),
                'tasnif'=>$request->input('tasnif'),
                'social_organizational_contribution' =>$request->input('social_organizational_contribution'),
                // 'password' =>Hash::make($request->input('password')),
     
                 ]);       

        }//end of if $user_type ==3
        
        if($user_type==4){

            $donation_amount=$request->input('amount');
            if(empty($donation_amount)){

                $donation_amount=0;

            }

             Donor::where('user_id',$user_id)->update([
                'name'=>$request->input('name'),
                
                
                'temporary_address'=>$request->input('temporary_address'),
            
                'profession'=> $request->input('profession'),
                'current_working_institution'=> $request->input('current_institution'),
                'rank'=> $request->input('rank'),
                'temporary_address'=> $request->input('temporary_address'),
                'donation_type'=> $request->input('donation_types'),
                'donation_amount'=> $donation_amount,
                'donation_fields'=> $request->input('donation_fields')

                // 'password' =>$request->input('password'),
     
                 ]);   

             // echo "user id = ".$user_id;

             $user =User::find($user_id);

             // $token = $user->createToken('AnNoor')->accessToken;
        }

        if($user_type==5){


             Volunteer::where('user_id',$user_id)->update([
                'name'=>$request->input('name'),
                'father_name'=> $request->input('father_name'),

                'temporary_address'=> $request->input('current_address'),   
                'profession'=>$request->input('profession'),
                'current_working_institution'=>$request->input('current_working_institution'),

                
                'mobile_own'=>$request->input('mobile_own'),
                'email'=> $request->input('email'),
                'whatsapp'=> $request->input('whatsapp'),
                'age'=> $request->input('age'),
                'educational_institution'=> $request->input('educational_institution'),
                'current_working_institution'=> $request->input('current_working_institution'),
                'skill_experience'=> $request->input('skill_experience')

                 ]);   

             // echo "user id = ".$user_id;

             $user =User::find($user_id);

             // $token = $user->createToken('AnNoor')->accessToken;
        }


        // You can also generate a token for the user if needed
        // $token = $user->createToken('AnNoor')->accessToken;

        return response()->json(['token' => $token], 200);
        // return response()->json([], 200);

    }// end of function updateUser


    public function signin(Request $request){

        $mobile=$request->mobile;

        // echo " mobile = ".$mobile;
        $password=$request->password;
        
        $user_result=User::where(array('mobile'=>$mobile))->get();

        $user_exists=0;
        if(count($user_result)){
            $password_db_hashed = $user_result[0]->password;

            if(Hash::check($password, $password_db_hashed)){

                    $user_exists=1;

            }else{

                $user_exists=0;
            }
        }

        if($user_exists==1){

            $user_type_found=$user_result[0]->user_type;
            $approved = $user_result[0]->approved;
            $user_id = $user_result[0]->id;


            // $token = $user_result[0]->createToken('AnNoor')->accessToken;

            return response()->json(['user_exists'=>1,'user_type'=>$user_type_found,
                // 'approved'=>$approved,
                'user_id'=>$user_id], 200);

        }else{

            return response()->json([ 'user_exists'=>0], 200);

        }



    }// end of function signin




    public function approveDisapproveNow(Request $request){

        $id =$request->id;
        $user_type =$request->user_type;
        $approved_found=$request->approved_found;

        $approve_action=0;
        \DB::enableQueryLog();
        
        if($user_type==1){


            $user=TeacherStaff::find($id);


        }else if($user_type==2){


            $user=Fujala::find($id);


        }else if($user_type==3){


            $user=Student::find($id);


        }else if($user_type==4){


            $user=Donor::find($id);


        }else if($user_type==5){


            $user=Volunteer::find($id);


        }

        

        $approved_found=$request->approved_found;

        if($approved_found==1){

            $approve_action='0';



        }else if($approved_found==0){

            $approve_action='1';



        }

        

        

        if ($user) {

            $user->approved= $approve_action;
            $user->save();

            $user_again = Donor::find($id);

                    
                    // Get the raw SQL query
                    $queryLog = \DB::getQueryLog();

                    // Check if there are queries in the log
                    if (count($queryLog) > 0) {
                        // Get the first query from the log
                        $query = $queryLog[0]['query'];
                        $bindings = $queryLog[0]['bindings'];

                        // Interpolate the bindings into the SQL
                        $sql = vsprintf(str_replace('?', "'%s'", $query), $bindings);


                        // Output the raw SQL query
                        //dd($sql);
                    } else {
                        // No queries in the log
                        //dd('No queries in the log.');
                    }

                    \DB::disableQueryLog();
        }

        // var_dump($query);

        // echo $query->toSql();

        // $query=$query->update(['approved'=> $approve_action]);

        /*echo "<br/> user id = ".$user_id;

        echo '<br/><br/><br/><br/>';*/
        return 1;

    }// end of function approveDisapproveNow
}
