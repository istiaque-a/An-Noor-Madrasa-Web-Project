<?php

namespace App\Http\Controllers\tables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Request;
use Response;
use Image; // From intervention image package
use File;
use App\Models\User;
use App\Models\Doc;
use App\Models\Country;
use App\Models\Division;
use App\Models\CompanyCategory;
use App\Models\Company;

use DataTables;
use Auth;
use DB;

class Basic extends Controller
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
  
  public function index()
  {
    return view('content.tables.tables-basic');
  }

  public function show_candidates(Request $request)
  {

    $user_id_logged_in = Auth::user()->id;    
    if ($request->ajax()) {

            $data=User::where(['added_by'=> $user_id_logged_in,'user_type'=>2,'passport_returned'=>0])->get();

 
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('full_name', function ($data) {

                        $url = url('/show-personal-details/'.$data->id);
                      
                         return '<a href="'.$url.'">'.$data->first_name.' '.$data->middle_name.' '.$data->last_name.
                          '</a>';
                      
                      })
                    ->addColumn('passport_date', function($data){


                        $passport_submission_date_formatted="";
                        $passport_submission_date=$data->passport_submission_date;

                        // return $passport_submission_date;

                        if($passport_submission_date){
                            
                            $passport_submission_date_array = explode('-',$passport_submission_date);


                            $passport_submission_date_formatted = $passport_submission_date_array[2].'-'.
                            $passport_submission_date_array[1].'-'.$passport_submission_date_array[0];



                        }

                        })


                        ->addColumn('agent_name', function($data){


                            $approach_mode=$data->approach_mode;

                            $agent_name="";

                            if($approach_mode==1){

                                $agent_name="Direct";

                            }elseif($approach_mode==2){

                                $agent_id=$data->agent_id;

                                $agent_found=User::find($agent_id);

                                if($agent_found){
                                        $agent_name=$agent_found->first_name.' '.$agent_found->middle_name.' '.$agent_found->last_name;

                                    }

                            }    

                            return $agent_name;


                    })



              ->addColumn('nationality_found', function($data){


                            $nationality=$data->nationality;

                            $nationality_name="";

                            $results=DB::table('countries')->where('id',$nationality)->get();    

                            

                                foreach($results as $result_indiv){

                                    $nationality_name= $result_indiv->nationality ;

                                }



                                // $nationality_name=$query[0]->nationality;
                            

                            return $nationality_name;


                    })


              ->addColumn('company_found', function($data){

                                $company_id = $data->company;    

                                $company_name="";

                                
                                if($company_id){


                                    $company_info=Company::find($company_id);
                                    $company_name=$company_info->company_name;

                                }
                                

                                return $company_name;



              })



              ->addColumn('country_found', function($data){


                            $country=$data->country ;

                            $country_name="";

                            $results=DB::table('countries')->where('id',$country)->get();    

                            

                                foreach($results as $result_indiv){

                                    $country_name= $result_indiv->en_short_name;

                                }



                                // $nationality_name=$query[0]->nationality;
                            

                            return $country_name;


                    })




              ->addColumn('passport_submission_date_found', function($data){


                            $passport_submission_date=$data->passport_submission_date ;

                            $passport_submission_date_formatted="";

                            if(!empty(trim($passport_submission_date))){

                                $passport_submission_date_array = explode('-', $passport_submission_date);

                                $passport_submission_date_formatted=$passport_submission_date_array[2].'-'.$passport_submission_date_array[1].'-'.$passport_submission_date_array[0];

                            }


                            return $passport_submission_date_formatted;




                    })




                    ->addColumn('status', function($row){

                            if($row->calling_photo==null){

                              $btn = '<a href="javascript:void(0)" class="edit btn btn-warning btn-sm">Pending</a>';

                            }else{

                              $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Received</a>';
                            }

      

                            return $btn;

                    })

                    ->addColumn('action', function($row){

                        $href=url('user/edit/'.$row->id);

                        $link='<a href="'.$href.'">Edit<a/>';

                        return $link;


                    })

                    ->rawColumns(['status','action','full_name','nationality_found','company_found'])

                    ->make(true);

        }

    

    
   return view('content.tables.show-candidates');
  }

  public function calling(Request $request)
  {
    $user_id_logged_in = Auth::user()->id;    
    if ($request->ajax()) {

            $data=User::where(['added_by' =>  $user_id_logged_in, 'calling_visa_ok'=>1 ])->get();

 
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('full_name', function ($data) {

                        // $url = url('/show/user/'.$data->id);

                        $url = url('/show-calling/'.$data->id);

                        
                      
                         return '<a href="'.$url.'">'.$data->first_name.' '.$data->last_name.
                          '</a>';
                      
                      })
                    /*->addColumn('id',function($data){
                        return '123456';
                    })*/




                    ->addColumn('nationality_found', function($data){


                            $nationality=$data->nationality;

                            $nationality_name="";

                            $results=DB::table('countries')->where('id',$nationality)->get();    

                            

                                foreach($results as $result_indiv){

                                    $nationality_name= $result_indiv->nationality ;

                                }



                                // $nationality_name=$query[0]->nationality;
                            

                            return $nationality_name;


                    })


              ->addColumn('company_found', function($data){

                                $company_id = $data->company;    

                                $company_name="";

                                
                                if($company_id){


                                    $company_info=Company::find($company_id);
                                    $company_name=$company_info->company_name;

                                }
                                

                                return $company_name;



              })



              ->addColumn('country_found', function($data){


                            $country=$data->country ;

                            $country_name="";

                            $results=DB::table('countries')->where('id',$country)->get();    

                            

                                foreach($results as $result_indiv){

                                    $country_name= $result_indiv->en_short_name;

                                }



                                // $nationality_name=$query[0]->nationality;
                            

                            return $country_name;


                    })





                    ->addColumn('status', function($row){

                            if($row->calling_photo==null){

                              $btn = '<a href="javascript:void(0)" class="edit btn btn-warning btn-sm">Pending</a>';

                            }else{

                              $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Received</a>';
                            }

      

                            return $btn;

                    })



                    ->rawColumns(['status','action','full_name'])

                    ->make(true);

        }

    

    return view('content.tables.calling-all',['users','users']);
  }


  


  public function visa_all(Request $request)
  {
    
    $user_id_logged_in = Auth::user()->id;    
    if ($request->ajax()) {

            $data=User::where(['added_by'=>$user_id_logged_in])->get();

 
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('full_name', function ($data) {

                        $url = url('/show-visa/'.$data->id);
                      
                         return '<a href="'.$url.'">'.$data->first_name.' '.$data->last_name.
                          '</a>';
                      
                      })
                    
                    /*->addColumn('id',function($data){
                        return '123456';
                    })
*/
                    ->addColumn('action', function($row){

                            if($row->visa_stamping_photo==null){

                              $btn = '<a href="javascript:void(0)" class="edit btn btn-warning btn-sm">Pending</a>';

                            }else{

                              $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Received</a>';
                            }

      

                            return $btn;

                    })



                    ->addColumn('nationality_found', function($row){

                            
                            $nationality=$row->nationality;

                            $nationality_name="";

                            $results=DB::table('countries')->where('id',$nationality)->get();    

                            

                                foreach($results as $result_indiv){

                                    $nationality_name= $result_indiv->nationality ;

                                }



                                // $nationality_name=$query[0]->nationality;
                            

                            return $nationality_name;

      

                            

                    })



              ->addColumn('company_found', function($data){

                                $company_id = $data->company;    

                                $company_name="";

                                
                                if($company_id){


                                    $company_info=Company::find($company_id);
                                    $company_name=$company_info->company_name;

                                }
                                

                                return $company_name;



              })



              ->addColumn('country_found', function($data){


                            $country=$data->country ;

                            $country_name="";

                            $results=DB::table('countries')->where('id',$country)->get();    

                            

                                foreach($results as $result_indiv){

                                    $country_name= $result_indiv->en_short_name;

                                }



                                // $nationality_name=$query[0]->nationality;
                            

                            return $country_name;


                    })

                    ->rawColumns(['action','full_name'])

                    ->make(true);

        }

    

    return view('content.tables.visa_all',['users','users']);
  }

  public function flight_all(Request $request){


    $user_id_logged_in = Auth::user()->id;    
    
    if ($request->ajax()) {

            $data=User::where(['added_by'=>$user_id_logged_in,'flight_ok'=>1])->get();
      
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('full_name', function ($data) {

                        $url = url('/show-flight/'.$data->id);
                      
                         return '<a href="'.$url.'">'.$data->first_name.' '.$data->last_name.
                          '</a>';
                      
                      })
                    /*->addColumn('id',function($data){
                        return '123456';
                    })
*/
                    ->addColumn('action', function($row){



                            if($row->company == null || $row->organization_category ==null || $row->job_designation == null){

                                  $btn = '<a href="javascript:void(0)" class="edit btn btn-warning btn-sm">Pending</a>';

                            }else{

                              $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Done</a>';

                            }

       

                            

      

                            return $btn;

                    })

                    ->rawColumns(['action','full_name'])

                    ->make(true);

        }

    return view('content.tables.flight-all');  

  }// end of function flight_all


  public function medicalFormalities(Request $request){

       $user_id_logged_in = Auth::user()->id;    
     
       if ($request->ajax()) {

            $data=User::where(['added_by'=>$user_id_logged_in, 'medical_ok'=>1])->get();

 
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('full_name', function ($data) {

                        $url = url('/show-medical-formalities/'.$data->id);
                      
                         return '<a href="'.$url.'">'.$data->first_name.' '.$data->last_name.
                          '</a>';
                      
                      })

                    /*->addColumn('id',function($data){
                        return '123456';
                    })
*/
                    ->addColumn('action', function($row){


                            $btn="";

                            if($row->medical_center!=null && $row->medical_date != null && $row->vaccine_photo != null){

                              $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Received</a>';

                            }else{

                              if($row->medical_center==null || $row->medical_date != null || $row->vaccine_photo == null){

                                  $btn = '<a href="javascript:void(0)" class="edit btn btn-warning btn-sm">Pending</a>';

                                }


                              // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Received</a>';
                            }

      

                            return $btn;

                    })

                    ->rawColumns(['action','full_name'])

                    ->make(true);

        }

 
    return view('content.tables.medical-formalities-all');  
 
  }// end of function medicalFormalities

  public function workingCategory(Request $request){

    
    $user_id_logged_in = Auth::user()->id;    
    if ($request->ajax()) {

            $data=User::where(['added_by'=>$user_id_logged_in])->get();
      
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('full_name', function ($data) {

                        $url = url('/show-working/'.$data->id);
                      
                         return '<a href="'.$url.'">'.$data->first_name.' '.$data->last_name.
                          '</a>';
                      
                      })

                    /*->addColumn('id',function($data){
                        return '123456';
                    })
                    */


                    ->addColumn('company_found', function($data){

                                $company_id = $data->company;    

                                $company_name="";

                                
                                if($company_id){


                                    $company_info=Company::find($company_id);
                                    $company_name=$company_info->company_name;

                                }
                                

                                return $company_name;



              })
                    
                    ->addColumn('action', function($row){



                            if($row->company == null || $row->organization_category ==null || $row->job_designation == null){

                                  $btn = '<a href="javascript:void(0)" class="edit btn btn-warning btn-sm">Pending</a>';

                            }else{

                              $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Done</a>';

                            }

       

                            

      

                            return $btn;

                    })

                    ->rawColumns(['action','full_name'])

                    ->make(true);

        }

    return view('content.tables.working-category-all');  

  }// end of function working-category

  public function smartCard(Request $request){

    $user_id_logged_in = Auth::user()->id;    
    
    if ($request->ajax()) {

            $data=User::where(['added_by'=>$user_id_logged_in])->get();
      
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('full_name', function ($data) {

                        $url = url('/show-smart-card/'.$data->id);
                      
                         return '<a href="'.$url.'">'.$data->first_name.' '.$data->last_name.
                          '</a>';
                      
                      })
                    /*->addColumn('id',function($data){
                        return '123456';
                    })*/

                    ->addColumn('action', function($row){

                  
                            if($row->nid_num  == null || $row->nid_photo ==null ){

                                  $btn = '<a href="javascript:void(0)" class="edit btn btn-warning btn-sm">Pending</a>';

                            }else{

                              $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Done</a>';

                            }

       
                            

      

                            return $btn;

                    })


                    ->addColumn('nationality_found', function($data){


                            $nationality=$data->nationality;

                            $nationality_name="";

                            $results=DB::table('countries')->where('id',$nationality)->get();    

                            

                                foreach($results as $result_indiv){

                                    $nationality_name= $result_indiv->nationality ;

                                }



                                // $nationality_name=$query[0]->nationality;
                            

                            return $nationality_name;


                    })


              ->addColumn('company_found', function($data){

                                $company_id = $data->company;    

                                $company_name="";

                                
                                if($company_id){


                                    $company_info=Company::find($company_id);
                                    $company_name=$company_info->company_name;

                                }
                                

                                return $company_name;



              })



              ->addColumn('country_found', function($data){


                            $country=$data->country ;

                            $country_name="";

                            $results=DB::table('countries')->where('id',$country)->get();    

                            

                                foreach($results as $result_indiv){

                                    $country_name= $result_indiv->en_short_name;

                                }



                                // $nationality_name=$query[0]->nationality;
                            

                            return $country_name;


                    })




                    ->rawColumns(['action','full_name'])

                    ->make(true);

        }

    return view('content.tables.smart-card-all');  

  }// end of function smartCard

  public function userAdd(){

        $agents=User::where(['user_type'=>1])->get();
        $countries=Country::get(); 

        $divisions=Division::get();
        $company_categories=CompanyCategory::get();
        $companies = Company::get();

        return view('content.tables.user-add_4', compact('agents','countries','divisions','companies','company_categories'));  

  }// end oif function userAdd



  public function agentAdd(){


        return view('content.tables.agent-add');  

  }// end oif function agentAdd


  public function agentAll(Request $request){



     $user_id_logged_in = Auth::user()->id;    
    if ($request->ajax()) {

            $data=User::where(['user_type'=>1])->get();

 
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('full_name', function ($data) {

                        $url = url('/show-personal-details/'.$data->id);
                      
                         /*return '<a href="'.$url.'">'.$data->first_name.' '.$data->middle_name.' '.$data->last_name.
                          '</a>';*/


                          return $data->first_name.' '.$data->middle_name.' '.$data->last_name;
                      
                      })





                    ->addColumn('status', function($row){

                            if($row->calling_photo==null){

                              $btn = '<a href="javascript:void(0)" class="edit btn btn-warning btn-sm">Pending</a>';

                            }else{

                              $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Received</a>';
                            }

      

                            return $btn;

                    })

                    ->addColumn('action', function($row){

                        $href=url('agent/edit/'.$row->id);

                        $link='<a href="'.$href.'">Edit<a/>';

                        return $link;


                    })

                    ->rawColumns(['status','action','full_name','nationality_found'])

                    ->make(true);

        }

    

        
        return view('content.tables.agent-all');      

  }// end of function agentAll

  public function userAddNow(Request $request){



        $rules=array(
            'first_name' => 'required',
            'last_name' => 'required',
            /*'date_of_birth'=> 'required',
            'first_lang'=> 'required',
            'countryOfCitizenship'=> 'required',*/
            /*'passport_no'=> 'required',
            'passport_expiry_date'=> 'required',
            'nid_number'=> 'required',
            'marital_status'=> 'required',
            'gender'=> 'required',
            'address'=> 'required',
            'city'=> 'required',
            'country'=> 'required',
            'state_province'=> 'required',
            'zip'=> 'required',*/
            'email'=> ['required','unique:users'],
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



          return response()->json(['success'=>true],200);  
        }
        

  }// end oif function userAddNow



  public function showMedicalFormalities(Request $request, $id)
  {

       $user=User::findOr($id, function (){

            return 'Wrong place to explore !!';

       } );


       $docs_all =  Doc::where(['user_id'=>$id,'doc_category'=>5])->get();

       

       return view('content.tables.showMedicalFormalities',compact('user','docs_all'));
  }

  public function showPersonalDetails(Request $request, $id){

    $user=User::findOr($id, function (){

            return 'Wrong place to explore !!';

       } ); 


     $agents=User::where(['user_type'=>1])->get();
        $countries=Country::get(); 

        $divisions=Division::get();
        $company_categories=CompanyCategory::get();
        $companies = Company::get();


    $docs_all=Doc::where(['user_id'=>$id])->get();

       

       return view('content.tables.showPersonalDetails',compact('user','docs_all','agents','countries','divisions','companies')); 

  }// end of function showPersonalDetails

  public function showWorking(Request $request, $id)
  {

       $user=User::findOr($id, function (){

            return 'Wrong place to explore !!';

       } ); 

       $docs_all =  Doc::where(['user_id'=>$id,'doc_category'=>8])->get();

       

       return view('content.tables.showWorking',compact('user','docs_all'));
  }

  public function showCalling(Request $request, $id)
  {

       $user=User::findOr($id, function (){

            return 'Wrong place to explore !!';

       } ); 


         $docs_all =  Doc::where(['user_id'=>$id,'doc_category'=>3])->get();


       

       return view('content.tables.show-calling',compact('user','docs_all'));
  }

  

  public function showVisa(Request $request, $id)
  {

       $user=User::findOr($id, function (){

            return 'Wrong place to explore !!';

       } ); 

       $docs_all =  Doc::where(['user_id'=>$id,'doc_category'=>7])->get();

       

       return view('content.tables.showVisa',compact('user','docs_all'));
  }

  

  public function showFlight(Request $request, $id)
  {

       $user=User::findOr($id, function (){

            return 'Wrong place to explore !!';

       } ); 


        $docs_all =  Doc::where(['user_id'=>$id,'doc_category'=>4])->get();


       

       return view('content.tables.showFlight',compact('user','docs_all'));
  }  
  public function showSmartCard(Request $request, $id)
  {     
        $user=User::findOr($id, function (){

            return 'Wrong place to explore !!';

       } ); 

       return view('content.tables.showSmartCard', compact('user'));
  }

  public function docUploadNow(Request $request){

      // dd($request->files);

     /* return Response::json([
        'success' =>true, 
        'file' =>'a.jpg'
        //asset($destinationPath.$filename)
      ]);*/


        // $file = Request::file('files[]');
      // $file = $request->files;
      $file= $request->file('files');
        $input = array('image' =>
        $file);
        $rules = array( 'files' =>
        'image');
        $validator = \Validator::make($input, $rules);
    
     if ( $validator->fails() ){
    
        return Response::json(['success' =>
        false, 'errors' =>
        $validator->getMessageBag()->toArray()]);


    } else {

        $file= $request->file('files');
    
        // $destinationPath = 'uploads/';
        $filenameNew = time().'.'.$file->getClientOriginalName();
        //Input::file('image')->move($destinationPath, $filename);


        $destinationPath = public_path('/thumbnails');

        $imgFile = Image::make($file->getRealPath());
        
        $imgFile->resize(80, 80, function ($constraint) {

            $constraint->aspectRatio();

        })->save($destinationPath.'/'.$filenameNew);
        
        $destinationPath = public_path('/uploads');
        //$image->move($destinationPath, $input['file']);


        $file->move($destinationPath, $filenameNew);

        $files_all=array();
        
        $file_indiv=new \stdClass();
        $file_indiv->name= $filenameNew;
        $file_indiv->url=url('/uploads/'.$filenameNew);
        $file_indiv->thumbnailUrl=url('/thumbnails/'.$filenameNew);
        $file_indiv->deleteUrl=url('/uploads/delete/'.$filenameNew);
        $file_indiv->deleteType="POST";

        // $imageSize = $file->getSize();
        $imageSize= File::size($destinationPath.'/'. $filenameNew);
        $file_indiv->size = ($imageSize );


        $files_all[]=$file_indiv;


        return Response::json([
          'success' =>true, 
          // 'file' =>asset($destinationPath.$filename)
          'files'=> $files_all

        ]);
    }

    /*
      $photos = [];
    if ($request->hasFile('files')) {
    //foreach ($request->file['files'] as $photo) {
      
      foreach ($request->files as $photo) {
      
        $filename = $photo->store('photos');
                $photo_object = new \stdClass();
        $photo_object->name = str_replace('photos/', '',$photo->getClientOriginalName());
        $photo_object->size = round(Storage::size($filename) / 1024, 2);
        $photo_object->fileID = $product_photo->id;
        $photos[] = $photo_object;
    }

    return response()->json(array('files' => $photos), 200);

  }else{
    echo 'No files';
  }

  */


  }// end of function docUploadNow

}
