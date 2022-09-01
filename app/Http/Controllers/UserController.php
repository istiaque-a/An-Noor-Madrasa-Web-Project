<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doc;
use Response;
use Image; // From intervention image package
use File;
use Auth;
use DB;
use Carbon\Carbon;
use App\Models\Country;
use App\Models\Division;
use App\Models\Company;
class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // echo " first name =".$request->first_name;
            


        $rules=array(
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth'=> 'required',
            /*
            'first_lang'=> 'required',
            'countryOfCitizenship'=> 'required',*/
            'passport_no'=> ['required','unique:users,passport_num','min:3'],
            // 'passport_no'=> ['required','min:3'],
            /*
            'passport_expiry_date'=> 'required',
            'nid_number'=> 'required',
            */
            // 'marital_status'=> 'required',
            'gender'=> 'required',
            /*
            'address'=> 'required',
            'city'=> 'required',
            'country'=> 'required',
            'state_province'=> 'required',
            'zip'=> 'required',*/
            'email'=> ['unique:users'],

            
            // 'phone'=> 'required'
            
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

          

         
        $first_name = $request->first_name;
        $middle_name = $request->middle_name;
        $last_name = $request->last_name;
        $date_of_birth= $request->date_of_birth;
        if(trim($date_of_birth)!==trim('')){
                
                $date_of_birth_array=explode('-', $date_of_birth);
                $date_of_birth=$date_of_birth_array[2].'-'.$date_of_birth_array[1].'-'.$date_of_birth_array[0];
        }

        $passport_submission_date = $request->passport_submission_date;

        if(trim($passport_submission_date)!=trim('')){

            $passport_submission_date_array = explode('-', $passport_submission_date);
            $passport_submission_date = $passport_submission_date_array[2].'-'.$passport_submission_date_array[1].'-'.$passport_submission_date[0];

        }

        $medical_formalities_ok=$request->medical_formalities_ok;
        $calling_visa_ok = $request->calling_visa_ok;
        $flight_ok = $request->flight_ok;
        $approach_mode = $request->approach_mode;
        $agent_id = $request->agent;
        $medical_condition=$request->medical_condition;
        $company=trim($request->company);

        
        $first_lang = $request->first_lang;
        $countryOfCitizenship = $request->countryOfCitizenship;
        $nationality = $request->nationality;
        $passport_no = $request->passport_no;
        $passport_expiry_date = $request->passport_expiry_date;
        
        if(trim($passport_expiry_date)!=trim('')){
            $passport_expiry_date_array = explode('-',$passport_expiry_date);
            $passport_expiry_date= $passport_expiry_date_array[2].'-'.$passport_expiry_date_array[1].'-'.$passport_expiry_date_array[0];

        }

        $nid_number = $request->nid_number;
        $marital_status=$request->marital_status;

        $gender = $request->gender;
        $division = $request->division;
        if(empty(trim($division))){
            $division=0;

        }
        $district = $request->district;
        if(empty($district)){
            $district=0;

        }
        $thana= $request->thana;
        if(empty(trim($thana))){
            $thana=0;

        }
        $postal_code= $request->post_code;
        $address= $request->address;
        $city = $request->city;
        $country = $request->country;
        $state_province = $request->state_province;
        $email = $request->email;
        $zip = $request->zip;
        $phone = $request->phone;
        $organization_category = $request->organization_category;
        $company = $request->company;
        $medical_centre=$request->medical_centre;
        $medical_date = $request->medical_date;
        if(trim($medical_date)!=trim('')){

            $medical_date_array = explode('-',$medical_date);
            $medical_date=$medical_date_array[2].'-'.$medical_date_array[1].'-'.$medical_date_array[0];
        }
        
        $job_designation = $request->job_designation;
        $departure_date = $request->departure_date;
        
        if(trim($departure_date)!=trim('')){

                $daparture_date_array =explode('-',$departure_date);
                $departure_date=$daparture_date_array[2].'-'.$daparture_date_array[1].'-'.$daparture_date_array[0];
        }
        
        $esd_to_reach = $request->esd_to_reach;
        if(trim($esd_to_reach)!=trim('')){
            
            $esd_to_reach_array=explode('-',$esd_to_reach);
            $esd_to_reach= $esd_to_reach_array[2].'-'.$esd_to_reach_array[1].'-'.$esd_to_reach_array[0];

        }
        




        
        $user = new User;
        $user->first_name=trim($first_name);
        $user->middle_name=trim($middle_name);
        $user->last_name= trim($last_name);
        if(!empty(trim($date_of_birth))){

            $user->dob= trim($date_of_birth);
        }




        if(!empty(trim($passport_submission_date))){

            $user->passport_submission_date = trim($passport_submission_date);

        }


        if($medical_formalities_ok){

            $user->medical_ok = 1;

        }else{

            $user->medical_ok = 0;

        }
        if($calling_visa_ok){
            
            $user->calling_visa_ok=1;

        }else{
            $user->calling_visa_ok=0;

        }

        if($flight_ok){
            $user->flight_ok = 1;

        }else{


            $user->flight_ok = 0;

        }

        if($agent_id){

            $user->agent_id=$agent_id;
        }


        if(!empty($medical_condition)){

            $user->medical_condition = $medical_condition;

        }

        if(!empty($approach_mode)){

            $user->approach_mode = $approach_mode;

        }

        
        
        
        $user->first_lang=trim($first_lang);
        $user->country_of_citizenship= trim($countryOfCitizenship);
        $user->nationality= trim($nationality);
        $user->passport_num= trim($passport_no);

        if(!empty(trim($passport_expiry_date))){

                $user->passport_expiry_date= trim($passport_expiry_date);
        }
        
        $user->nid_num = trim($nid_number);
        



        if(!empty($marital_status)){

            $user->marital_status= trim($marital_status);

        }

        
        $user->gender=trim($gender);
        
        $user->division_id = $division;
        $user->district_id = $district;
        $user->thana_id= $thana;
        $user->postal_code= $postal_code;

        $user->address = trim($address);
        $user->city= trim($city);
        $user->country= trim($country);
        $user->state_province= trim($state_province);
        $user->email= trim($email);
        $user->zip = trim($zip);
        $user->phone = trim($phone);
        $user->organization_category= trim($organization_category);
        $user->company= trim($company);
        $user->medical_center= trim($medical_centre);
        $user->job_designation = trim($job_designation);
        $user->user_type=2;

        if(!empty(trim($departure_date))){

            $user->departure_date = trim($departure_date);

        }
        
        if(!empty(trim($esd_to_reach))){
            
            $user->esd_to_reach= trim($esd_to_reach);
        }
        




        if ($request->hasFile('passport_size_photo')) {

            $file= $request->file('passport_size_photo');

            $passport_size_photo_found=$user->passport_size_photo;

            /*******************************/

            if($passport_size_photo_found){

                if(File::exists(public_path('uploads/passport_size_photo/'.$passport_size_photo_found))){

                    File::delete(public_path('uploads/passport_size_photo/'.$passport_size_photo_found));

                }

                

            }


        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/passport_size_photo');

            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/passport_size_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->passport_size_photo=$filenameNew;




        }



        /*

        if ($request->hasFile('nid_photo')) {

            $file= $request->file('nid_photo');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            // echo 'nid filename new = '.$filenameNew;

            $destinationPath = public_path('/thumbnails/nid_photo');
            
            
            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/nid_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->nid_photo=$filenameNew;

        }


        if ($request->hasFile('passport_copy')) {

            $file= $request->file('passport_copy');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/passport_copy');

            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/passport_copy');
            


            $file->move($destinationPath, $filenameNew);
            $user->passport_copy=$filenameNew;

        }

        if ($request->hasFile('vaccine_photo')) {

            $file= $request->file('vaccine_photo');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/medical_photo');



            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/medical_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->vaccine_photo=$filenameNew;

        }




        if ($request->hasFile('calling_photo')) {

            $file= $request->file('calling_photo');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/calling_photo');

            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/calling_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->calling_photo=$filenameNew;

        }



        if ($request->hasFile('visa_stamping_photo')) {

            $file= $request->file('visa_stamping_photo');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/visa_stamping_photo');

            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/visa_stamping_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->visa_stamping_photo=$filenameNew;

        }






        if ($request->hasFile('flight_photo')) {

            $file= $request->file('flight_photo');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/flight_photo');

            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/flight_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->flight_photo=$filenameNew;

        }


        */



        $user->added_by = Auth::user()->id;

        DB::transaction(function() use ($user, $request){


                
                $user->save();

                $user_id_created= $user->id;

                $user_id_length=strlen($user_id_created);
                $code_last_part_length=2;
                $first_part_code_length=7-$user_id_length-$code_last_part_length;    
                $user_code=$this->random_numerical_string($first_part_code_length).$this->random_numerical_string($code_last_part_length).$user_id_created;

                $user_found = User::find($user_id_created);
                $user->user_code=$user_code;

                $user->save();
                



                

                $nid_doc_labels = json_decode($request->nid_doc_labels);
                
                if(!$nid_doc_labels){

                    $nid_doc_labels=[];

                }    


                $nid_image_names = json_decode($request->nid_image_names);

                if(!$nid_image_names){

                    $nid_image_names=[];

                }



                $nid_pdf_names = json_decode($request->nid_pdf_names);

                if(!$nid_pdf_names){

                    $nid_pdf_names=[];

                }



                $passport_copy_labels = json_decode($request->passport_copy_labels);

                if(!$passport_copy_labels){

                    $passport_copy_labels=[];

                }
                $passport_copy_image_names = json_decode($request->passport_copy_image_names);
                
                if(!$passport_copy_image_names){

                    $passport_copy_image_names=[];

                }
                $passport_copy_pdf_names = json_decode($request->passport_copy_pdf_names);

                if(!$passport_copy_pdf_names){

                    $passport_copy_pdf_names=[];

                }



                $medical_doc_labels = json_decode($request->medical_doc_labels);
                if(!$medical_doc_labels){

                    $medical_doc_labels=[];

                }
                $medical_image_names = json_decode($request->medical_image_names);

                if(!$medical_image_names){
                    $medical_image_names=[];

                }
                $medical_pdf_names = json_decode($request->medical_pdf_names);

                if(!$medical_pdf_names){

                    $medical_pdf_names=[];

                }


                $doc_info_all=array();


                for($i=0; $i<count($nid_doc_labels); $i++){

                     $doc_info=array();
                     $doc_info['description']=$nid_doc_labels[$i];
                     $pdf_doc = $nid_pdf_names[$i];
                     $doc_info['pdf_doc'] =$pdf_doc;
                     $doc_info['thumbnail']=$nid_image_names[$i];
                     $doc_info['large_image']=$nid_image_names[$i];
                     $doc_info['user_id']=$user_id_created;
                     $doc_info['doc_category']=2; // 2=> nid from db column comment
                     $doc_info['done_by']= Auth::user()->id;
                     $doc_info['created_at']= Carbon::now();
                     $doc_info['updated_at']= Carbon::now();
                     

                     $doc_info_all[]=$doc_info;

                }// end of for loop



                
                
                for($i=0; $i<count($passport_copy_labels); $i++){

                     $doc_info=array();
                     $doc_info['description']=$passport_copy_labels[$i];
                     $pdf_doc = $passport_copy_pdf_names[$i];
                     $doc_info['pdf_doc'] =$pdf_doc;
                     $doc_info['thumbnail']=$passport_copy_image_names[$i];
                     $doc_info['large_image']=$passport_copy_image_names[$i];
                     $doc_info['user_id']=$user_id_created;
                     $doc_info['doc_category']=6; // 6=> nid from db column comment
                     $doc_info['done_by']= Auth::user()->id;
                     $doc_info['created_at']= Carbon::now();
                     $doc_info['updated_at']= Carbon::now();

                     $doc_info_all[]=$doc_info;

                }// end of for loop




                
                
                for($i=0; $i<count($medical_doc_labels); $i++){

                     $doc_info=array();
                     $doc_info['description']=$medical_doc_labels[$i];
                     $pdf_doc = $medical_pdf_names[$i];
                     $doc_info['pdf_doc'] =$pdf_doc;
                     $doc_info['thumbnail']=$medical_image_names[$i];
                     $doc_info['large_image']=$medical_image_names[$i];
                     $doc_info['user_id']=$user_id_created;
                     $doc_info['doc_category']=5; // 6=> nid from db column comment
                     $doc_info['done_by']= Auth::user()->id;
                     $doc_info['created_at']= Carbon::now();
                     $doc_info['updated_at']= Carbon::now();

                     $doc_info_all[]=$doc_info;

                }// end of for loop


                Doc::insert($doc_info_all);



        });// end of DB::transaction


         return response()->json(['success'=>true],200);  
        }

    }


    /**
     * 
     * generate a random numerical string of the given length
     *
     * 
     * @param  int  $id
     * @return string of the given length 
     * 
     */
    function random_numerical_string($length) {

            $key = '';
            $keys = array_merge(range(0, 9), range(0,9));

            for ($i = 0; $i < $length; $i++) {
                $key .= $keys[array_rand($keys)];
            }

            return $key;

    }// end of function random_string


    /**
     * 
     * generate a random string of the given length
     *
     * 
     * @param  int  $id
     * @return string of the given length 
     * 
     */
    function random_string($length) {

            $key = '';
            $keys = array_merge(range(0, 9), range('a', 'z'));

            for ($i = 0; $i < $length; $i++) {
                $key .= $keys[array_rand($keys)];
            }

            return $key;

    }// end of function random_string


    /**
     * 
     * Delete uploaded doc 
     * Upload any doc from  the add user page
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     * 
     */

    public function doc_delete_now(Request $request){

            $pdf_doc=$request->pdf_doc; 
            $large_image=$request->large_image;

            $thumbnail_image=$request->thumbnail_image;

            if($pdf_doc!=null){
/*
                $padf_full_path= URL::to('/assets/');

                File::delete();*/

            }
            

            return Response::json([

              'success' =>true,
              'thumbnail_image'=>$thumbnail_image,
              'large_image'=> $large_image,
              'pdf_doc' => $pdf_doc,
              'description' => $description
              
            ]);


                    

    }// end of function doc_delete_now

    /**
     * 
     * Upload any doc from  the add user page
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     * 
     */


    public function doc_upload_now(Request $request){

        $description=""; 
        $doc_type=0;
        if($request->description){

            $description=$request->description;

        }

        

        if($request->doc_type){

            $doc_type=trim($request->doc_type);

        }

        // echo " doc_type = ".$request->doc_type;



        if ($request->hasFile('files')) {

            $file= $request->file('files');
        
            // $destinationPath = 'uploads/';
            //$filenameNew = time().'.'.$file->getClientOriginalName();
            $filenameNew= $this->random_string(50).'.'.$file->extension();
            //Input::file('image')->move($destinationPath, $filename);



            if($doc_type==trim("nid_photo")){

                $destinationPath = public_path('/thumbnails/nid_photo');    

            }elseif($doc_type==trim("passport_size_photo")){

                $destinationPath = public_path('/thumbnails/passport_size_photo');

            }elseif($doc_type==trim("medical_photo")){

                $destinationPath = public_path('/thumbnails/medical_photo');

            }elseif($doc_type==trim("calling_photo")){

                $destinationPath = public_path('/thumbnails/calling_photo');

            }elseif($doc_type==trim("flight_photo")){

                $destinationPath = public_path('/thumbnails/flight_photo');    

            }elseif($doc_type==trim("passport_copy")){

                $destinationPath = public_path('/thumbnails/passport_copy');

            }elseif($doc_type==trim("visa_stamping_photo")){

                $destinationPath = public_path('/thumbnails/visa_stamping_photo');

            }elseif($doc_type==trim("working_selection")){

                $destinationPath = public_path('/thumbnails/working_selection');
            }    


            $allowedMimeTypes = ['image/jpeg','image/gif','image/png','image/jpg','image/bmp']; // 'image/jpeg',image/bmp, added by me later. Is that really necessary ?
            
            $contentType = $file->getClientMimeType();
            $is_image=0;
            if(in_array($contentType, $allowedMimeTypes) ){

              $is_image=1;
            }

            $is_pdf=0;

            if($contentType==trim('application/pdf')){

                $is_pdf=1;

            }

            

            

            
            

            $thumbnail_image=null;
            if($is_image){

                $imgFile = Image::make($file->getRealPath());

                $imgFile->resize(200, 200, function ($constraint) {

                    $constraint->aspectRatio();

                })->save($destinationPath.'/'.$filenameNew);

                $thumbnail_image= $filenameNew;

            }



            $doc_category=0;

            

            if($doc_type==trim("passport_size_photo")){

                $doc_category=1;

                $destinationPath = public_path('/uploads/passport_size_photo');

            }
            elseif($doc_type==trim("nid_photo")){

                $doc_category=2;

                $destinationPath = public_path('/uploads/nid_photo');    

            }elseif($doc_type==trim("calling_photo")){

                $doc_category=3;

                $destinationPath = public_path('/uploads/calling_photo');

            }elseif($doc_type==trim("flight_photo")){

                $doc_category=4;

                $destinationPath = public_path('/uploads/flight_photo');    

            }elseif($doc_type==trim("medical_photo")){

                $doc_category=5;

                $destinationPath = public_path('/uploads/medical_photo');

            }elseif($doc_type==trim("passport_copy")){

                $doc_category=6;

                $destinationPath = public_path('/uploads/passport_copy');

            }elseif($doc_type==trim("visa_stamping_photo")){

                $doc_category=7;

                $destinationPath = public_path('/uploads/visa_stamping_photo');

            }elseif($doc_type==trim("working_selection")){

                $doc_category=8;

                $destinationPath = public_path('/uploads/working_selection');
            }
            
            
            

            $file->move($destinationPath, $filenameNew);

            $pdf_doc=$large_image=null;

            if(!$is_image){

                $pdf_doc= $filenameNew;

            }else{

                $large_image=$filenameNew;

            }
            

            return Response::json([

              'success' =>true,
              'thumbnail_image'=>$thumbnail_image,
              'large_image'=> $large_image,
              'pdf_doc' => $pdf_doc,
              'description' => $description
              
            ]);


        }            

    }// end of funvtion doc_upload_now

    public function doc_upload_now_0000(Request $request){



        if ($request->hasFile('passport_size_photo')) {

            $file= $request->file('passport_size_photo');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/passport_size_photo');

            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/passport_size_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->passport_size_photo=$filenameNew;

        }


        if ($request->hasFile('nid_photo')) {

            $file= $request->file('nid_photo');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            // echo 'nid filename new = '.$filenameNew;

            $destinationPath = public_path('/thumbnails/nid_photo');
            
            
            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/nid_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->nid_photo=$filenameNew;

        }


        if ($request->hasFile('passport_copy')) {

            $file= $request->file('passport_copy');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/passport_copy');

            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/passport_copy');
            


            $file->move($destinationPath, $filenameNew);
            $user->passport_copy=$filenameNew;

        }

        if ($request->hasFile('vaccine_photo')) {

            $file= $request->file('vaccine_photo');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/medical_photo');



            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/medical_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->vaccine_photo=$filenameNew;

        }




        if ($request->hasFile('calling_photo')) {

            $file= $request->file('calling_photo');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/calling_photo');

            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/calling_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->calling_photo=$filenameNew;

        }



        if ($request->hasFile('visa_stamping_photo')) {

            $file= $request->file('visa_stamping_photo');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/visa_stamping_photo');

            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/visa_stamping_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->visa_stamping_photo=$filenameNew;

        }






        if ($request->hasFile('flight_photo')) {

            $file= $request->file('flight_photo');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/flight_photo');

            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/flight_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->flight_photo=$filenameNew;

        }



    }// end of function doc_upload_now_0000
     


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOr($id, function(){

              return 'Wrong place to explore!';

        });

        $countries=Country::get(); 

        $divisions=Division::get();

        $docs_all=Doc::where(['user_id'=>$id])->get();

        $companies = Company::get();
        return view('content.tables.user-edit', compact('user', 'docs_all','divisions','countries','companies'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

             $id=$request->user_id;           
             $rules=array(
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth'=> 'required',
            /*
            'first_lang'=> 'required',
            'countryOfCitizenship'=> 'required',*/
            'passport_no'=> ['required','unique:users,passport_num,'.$id,'min:3'],
            /*
            'passport_expiry_date'=> 'required',
            'nid_number'=> 'required',
            */
            // 'marital_status'=> 'required',
            'gender'=> 'required',
            /*
            'address'=> 'required',
            'city'=> 'required',
            'country'=> 'required',
            'state_province'=> 'required',
            'zip'=> 'required',*/
             'email'=> ['unique:users,email,'.$id],
            // 'phone'=> 'required'
            
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

        $id=$request->user_id;   
        $user = User::find($id);
            
         
        $first_name = $request->first_name;
        $middle_name = $request->middle_name;
        $last_name = $request->last_name;
        $date_of_birth= $request->date_of_birth;
    
        if(trim($date_of_birth)!==trim('')){
                
                $date_of_birth_array=explode('-', $date_of_birth);
                
                $date_of_birth=$date_of_birth_array[2].'-'.$date_of_birth_array[1].'-'.$date_of_birth_array[0];

                
        }


        $passport_submission_date = $request->passport_submission_date;

        if(trim($passport_submission_date)!=trim('')){

            $passport_submission_date_array = explode('-', $passport_submission_date);
            $passport_submission_date = $passport_submission_date_array[2].'-'.$passport_submission_date_array[1].'-'.$passport_submission_date[0];

        }

        $medical_formalities_ok=$request->medical_formalities_ok;
        $calling_visa_ok = $request->calling_visa_ok;
        $flight_ok = $request->flight_ok;
        $approach_mode = $request->approach_mode;
        $agent_id = $request->agent;
        $medical_condition=$request->medical_condition;
        $company=trim($request->company);

        $first_lang = $request->first_lang;
        $countryOfCitizenship = $request->countryOfCitizenship;
        $nationality = $request->nationality;
        $passport_no = $request->passport_no;
        $passport_expiry_date = $request->passport_expiry_date;

        if(trim($passport_expiry_date)!=trim('')){
            $passport_expiry_date_array = explode('-',$passport_expiry_date);
            $passport_expiry_date= $passport_expiry_date_array[2].'-'.$passport_expiry_date_array[1].'-'.$passport_expiry_date_array[0];

        }

        $nid_number = $request->nid_number;
        $marital_status=$request->marital_status;
        $gender = $request->gender;

        $division = $request->division;
        if(empty(trim($division))){
            $division=0;

        }


        $district = $request->district;
        if(empty($district)){
            $district=0;

        }
        $thana= $request->thana;
        if(empty(trim($thana))){
            $thana=0;

        }
        $postal_code= $request->post_code;


        $address= $request->address;
        $city = $request->city;
        $country = $request->country;
        $state_province = $request->state_province;
        // $email = $user->email;
        $zip = $request->zip;
        $phone = $request->phone;
        $organization_category = $request->organization_category;
        $company = $request->company;
        $medical_centre=$request->medical_centre;
        $medical_date = $request->medical_date;
        if(trim($medical_date)!=trim('')){

            $medical_date_array = explode('-',$medical_date);
            $medical_date=$medical_date_array[2].'-'.$medical_date_array[1].'-'.$medical_date_array[0];
        }

        $job_designation = $request->job_designation;
        $departure_date = $request->departure_date;


        if(trim($departure_date)!=trim('')){

                $daparture_date_array =explode('-',$departure_date);
                $departure_date=$daparture_date_array[2].'-'.$daparture_date_array[1].'-'.$daparture_date_array[0];
        }

        $esd_to_reach = $request->esd_to_reach;

        if(trim($esd_to_reach)!=trim('')){
            
            $esd_to_reach_array=explode('-',$esd_to_reach);
            $esd_to_reach= $esd_to_reach_array[2].'-'.$esd_to_reach_array[1].'-'.$esd_to_reach_array[0];



        }




        
        $user = User::find($id);
        $user->first_name=trim($first_name);
        $user->middle_name=trim($middle_name);
        $user->last_name= trim($last_name);

        
        if(!empty(trim($date_of_birth))){

            $user->dob= trim($date_of_birth);
        }







        if(!empty(trim($passport_submission_date))){

            $user->passport_submission_date = trim($passport_submission_date);

        }

        if($medical_formalities_ok){

            $user->medical_ok = 1;

        }else{

            $user->medical_ok = 0;

        }

        
        if($calling_visa_ok){
            
            $user->calling_visa_ok=1;

        }else{

            $user->calling_visa_ok=0;

        }

        if($flight_ok){
         
            $user->flight_ok = 1;

        }else{


            $user->flight_ok = 0;

        }

        if($agent_id){

            $user->agent_id=$agent_id;
        }

        
        if(!empty($medical_condition)){

            $user->medical_condition = $medical_condition;

        }

        if(!empty($approach_mode)){

            $user->approach_mode = $approach_mode;

        }

        
        
        
        $user->first_lang=trim($first_lang);
        $user->country_of_citizenship= trim($countryOfCitizenship);
        $user->nationality= trim($nationality);
        $user->passport_num= trim($passport_no);

        if(!empty(trim($passport_expiry_date))){

                $user->passport_expiry_date= trim($passport_expiry_date);
        }
        
        $user->nid_num = trim($nid_number);
        $user->marital_status=trim($marital_status);
        $user->gender=trim($gender);


        $user->division_id = $division;
        $user->district_id = $district;
        $user->thana_id= $thana;
        $user->postal_code= $postal_code;

        $user->address = trim($address);
        $user->city= trim($city);
        $user->country= trim($country);
        $user->state_province= trim($state_province);
        // $user->email= trim($email);
        $user->zip = trim($zip);
        $user->phone = trim($phone);
        $user->organization_category= trim($organization_category);
        $user->company= trim($company);
        $user->medical_center= trim($medical_centre);

        if(!empty(trim($medical_date))){

            $user->medical_date = trim($medical_date);    

        }
        
        $user->job_designation = trim($job_designation);

        if(!empty(trim($departure_date))){

            $user->departure_date = trim($departure_date);

        }
        
        if(!empty(trim($esd_to_reach))){

            // echo ' esd_to_reach = '.$esd_to_reach;
            
            $user->esd_to_reach= trim($esd_to_reach);
        }


        


        if ($request->hasFile('passport_size_photo')) {

            $file= $request->file('passport_size_photo');

            $passport_size_photo_found=$user->passport_size_photo;

            /*******************************/

            if($passport_size_photo_found){

                if(File::exists(public_path('uploads/passport_size_photo/'.$passport_size_photo_found))){

                    File::delete(public_path('uploads/passport_size_photo/'.$passport_size_photo_found));

                }



            }


        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/passport_size_photo');

            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/passport_size_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->passport_size_photo=$filenameNew;




        }


        /*


        if ($request->hasFile('nid_photo')) {

            $file= $request->file('nid_photo');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            // echo 'nid filename new = '.$filenameNew;

            $destinationPath = public_path('/thumbnails/nid_photo');
            
            
            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/nid_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->nid_photo=$filenameNew;

        }


        if ($request->hasFile('passport_copy')) {

            $file= $request->file('passport_copy');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/passport_copy');

            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/passport_copy');
            


            $file->move($destinationPath, $filenameNew);
            $user->passport_copy=$filenameNew;

        }

        if ($request->hasFile('vaccine_photo')) {

            $file= $request->file('vaccine_photo');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/medical_photo');



            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/medical_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->vaccine_photo=$filenameNew;

        }




        if ($request->hasFile('calling_photo')) {

            $file= $request->file('calling_photo');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/calling_photo');

            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/calling_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->calling_photo=$filenameNew;

        }



        if ($request->hasFile('visa_stamping_photo')) {

            $file= $request->file('visa_stamping_photo');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/visa_stamping_photo');

            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/visa_stamping_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->visa_stamping_photo=$filenameNew;

        }






        if ($request->hasFile('flight_photo')) {

            $file= $request->file('flight_photo');
        
            // $destinationPath = 'uploads/';
            $filenameNew = time().'.'.$file->getClientOriginalName();
            //Input::file('image')->move($destinationPath, $filename);


            $destinationPath = public_path('/thumbnails/flight_photo');

            $imgFile = Image::make($file->getRealPath());
            
            $imgFile->resize(200, 200, function ($constraint) {

                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$filenameNew);
            
            
            $destinationPath = public_path('/uploads/flight_photo');
            


            $file->move($destinationPath, $filenameNew);
            $user->flight_photo=$filenameNew;

        }


        */


        $user->added_by = Auth::user()->id;

        DB::transaction(function() use ($user, $request){


                
                $user->save();

                $user_id_created= $user->id;


                

                $nid_doc_labels = json_decode($request->nid_doc_labels);
                
                if(!$nid_doc_labels){

                    $nid_doc_labels=[];

                }    


                $nid_image_names = json_decode($request->nid_image_names);

                if(!$nid_image_names){

                    $nid_image_names=[];

                }



                $nid_pdf_names = json_decode($request->nid_pdf_names);

                if(!$nid_pdf_names){

                    $nid_pdf_names=[];

                }



                $passport_copy_labels = json_decode($request->passport_copy_labels);

                if(!$passport_copy_labels){

                    $passport_copy_labels=[];

                }
                $passport_copy_image_names = json_decode($request->passport_copy_image_names);
                
                if(!$passport_copy_image_names){

                    $passport_copy_image_names=[];

                }
                $passport_copy_pdf_names = json_decode($request->passport_copy_pdf_names);

                if(!$passport_copy_pdf_names){

                    $passport_copy_pdf_names=[];

                }



                $medical_doc_labels = json_decode($request->medical_doc_labels);
                if(!$medical_doc_labels){

                    $medical_doc_labels=[];

                }
                $medical_image_names = json_decode($request->medical_image_names);

                if(!$medical_image_names){
                    $medical_image_names=[];

                }
                $medical_pdf_names = json_decode($request->medical_pdf_names);

                if(!$medical_pdf_names){

                    $medical_pdf_names=[];

                }


                $visa_stamping_doc_labels = json_decode($request->visa_stamping_doc_labels);
 
                if(!$visa_stamping_doc_labels){

                    $visa_stamping_doc_labels=[];

                }
                $visa_stamping_image_names = json_decode($request->visa_stamping_image_names);

                if(!$visa_stamping_image_names){
                    $visa_stamping_image_names=[];

                }
                $visa_stamping_pdf_names = json_decode($request->visa_stamping_pdf_names);

                if(!$visa_stamping_pdf_names){

                    $visa_stamping_pdf_names=[];

                }


                $calling_doc_labels = json_decode($request->calling_doc_labels);
 
                if(!$calling_doc_labels){

                    $calling_doc_labels=[];

                }
                $calling_image_names = json_decode($request->calling_image_names);

                if(!$calling_image_names){
                    $calling_image_names=[];

                }
                $calling_pdf_names = json_decode($request->calling_pdf_names);

                if(!$calling_pdf_names){

                    $calling_pdf_names=[];

                }


                $flight_doc_labels = json_decode($request->flight_doc_labels);
 
                if(!$flight_doc_labels){

                    $flight_doc_labels=[];

                }
                $flight_image_names = json_decode($request->flight_image_names);

                if(!$flight_image_names){
                    $flight_image_names=[];

                }
                $flight_pdf_names = json_decode($request->flight_pdf_names);

                if(!$flight_pdf_names){

                    $flight_pdf_names=[];

                }




                $doc_info_all=array();


                for($i=0; $i<count($nid_doc_labels); $i++){

                     $doc_info=array();
                     $doc_info['description']=$nid_doc_labels[$i];
                     $pdf_doc = $nid_pdf_names[$i];
                     $doc_info['pdf_doc'] =$pdf_doc;
                     $doc_info['thumbnail']=$nid_image_names[$i];
                     $doc_info['large_image']=$nid_image_names[$i];
                     $doc_info['user_id']=$user_id_created;
                     $doc_info['doc_category']=2; // 2=> nid from db column comment
                     $doc_info['done_by']= Auth::user()->id;
                     $doc_info['created_at']= Carbon::now();
                     $doc_info['updated_at']= Carbon::now();
                     

                     $doc_info_all[]=$doc_info;

                }// end of for loop



                
                
                for($i=0; $i<count($passport_copy_labels); $i++){

                     $doc_info=array();
                     $doc_info['description']=$passport_copy_labels[$i];
                     $pdf_doc = $passport_copy_pdf_names[$i];
                     $doc_info['pdf_doc'] =$pdf_doc;
                     $doc_info['thumbnail']=$passport_copy_image_names[$i];
                     $doc_info['large_image']=$passport_copy_image_names[$i];
                     $doc_info['user_id']=$user_id_created;
                     $doc_info['doc_category']=6; // 6=> nid from db column comment
                     $doc_info['done_by']= Auth::user()->id;
                     $doc_info['created_at']= Carbon::now();
                     $doc_info['updated_at']= Carbon::now();

                     $doc_info_all[]=$doc_info;

                }// end of for loop




                
                
                for($i=0; $i<count($medical_doc_labels); $i++){

                     $doc_info=array();
                     $doc_info['description']=$medical_doc_labels[$i];
                     $pdf_doc = $medical_pdf_names[$i];
                     $doc_info['pdf_doc'] =$pdf_doc;
                     $doc_info['thumbnail']=$medical_image_names[$i];
                     $doc_info['large_image']=$medical_image_names[$i];
                     $doc_info['user_id']=$user_id_created;
                     $doc_info['doc_category']=5; // 6=> nid from db column comment
                     $doc_info['done_by']= Auth::user()->id;
                     $doc_info['created_at']= Carbon::now();
                     $doc_info['updated_at']= Carbon::now();

                     $doc_info_all[]=$doc_info;

                }// end of for loop



                // var_dump($visa_stamping_doc_labels);    

                for($i=0; $i<count($visa_stamping_doc_labels); $i++){

                     $doc_info=array();
                     $doc_info['description']=$visa_stamping_doc_labels[$i];
                     $pdf_doc = $visa_stamping_pdf_names[$i];
                     $doc_info['pdf_doc'] =$pdf_doc;
                     $doc_info['thumbnail']=$visa_stamping_image_names[$i];
                     $doc_info['large_image']=$visa_stamping_image_names[$i];
                     $doc_info['user_id']=$user_id_created;
                     $doc_info['doc_category']=7; // 6=> nid from db column comment
                     $doc_info['done_by']= Auth::user()->id;
                     $doc_info['created_at']= Carbon::now();
                     $doc_info['updated_at']= Carbon::now();

                     $doc_info_all[]=$doc_info;

                }// end of for loop


                for($i=0; $i<count($calling_doc_labels); $i++){

                     $doc_info=array();
                     $doc_info['description']=$calling_doc_labels[$i];
                     $pdf_doc = $calling_pdf_names[$i];
                     $doc_info['pdf_doc'] =$pdf_doc;
                     $doc_info['thumbnail']=$calling_image_names[$i];
                     $doc_info['large_image']=$calling_image_names[$i];
                     $doc_info['user_id']=$user_id_created;
                     $doc_info['doc_category']=3; // 6=> nid from db column comment
                     $doc_info['done_by']= Auth::user()->id;
                     $doc_info['created_at']= Carbon::now();
                     $doc_info['updated_at']= Carbon::now();

                     $doc_info_all[]=$doc_info;

                }// end of for loop





                for($i=0; $i<count($flight_doc_labels); $i++){

                     $doc_info=array();
                     $doc_info['description']=$flight_doc_labels[$i];
                     $pdf_doc = $flight_pdf_names[$i];
                     $doc_info['pdf_doc'] =$pdf_doc;
                     $doc_info['thumbnail']=$flight_image_names[$i];
                     $doc_info['large_image']=$flight_image_names[$i];
                     $doc_info['user_id']=$user_id_created;
                     $doc_info['doc_category']=4; // 4=> flight from db column comment
                     $doc_info['done_by']= Auth::user()->id;
                     $doc_info['created_at']= Carbon::now();
                     $doc_info['updated_at']= Carbon::now();

                     $doc_info_all[]=$doc_info;

                }// end of for loop



                // var_dump($doc_info_all);




                Doc::insert($doc_info_all);



        });// end of DB::transaction


        

        $user->save();


         return response()->json(['success'=>true],200);  
        }


    }// end of method update

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
