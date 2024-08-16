<?php

namespace App\Http\Controllers;

use App\Models\FoundationCommittee;
use App\Models\FoundationCommitteeDetail;
use App\Http\Requests\StoreFoundationCommitteeRequest;
use App\Http\Requests\UpdateFoundationCommitteeRequest;

use Illuminate\Http\Request;
use DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class FoundationCommitteeController extends Controller
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
        return view('foundation_committee_add');
    }


    public function get_foundation_committees_data(Request $request){


              $foundation_committee_latest_result=FoundationCommittee::orderBy('expiry_date','desc')->limit(1)->get();

        $present_committee=[];

        $present_committee_id=0;

        foreach($foundation_committee_latest_result as $foundation_committee_indiv){
            
            $present_committee_id=$foundation_committee_indiv['id'];

        }//end of foreach loop





$current_committee_query=FoundationCommittee::
        
        join('foundation_committee_details',
            'foundation_committees.id', '=',
            'foundation_committee_details.foundation_committee_id')
        ->where('foundation_committees.id','=',$present_committee_id)
        ->select('foundation_committees.*','foundation_committee_details.*', 
            'foundation_committee_details.id as foundation_committee_detail_id_found',
            'foundation_committees.id as foundation_committee_id_found'
        
        )->limit(1)
        ->get();



        



        $current_committee_info=[];

        foreach($current_committee_query as $current_committee_indiv){

            $current_committee_info_indiv=[];
            $current_committee_info_indiv['creation_date']=$current_committee_indiv['creation_date'];
            $current_committee_info_indiv['expiry_date']=$current_committee_indiv['expiry_date'];

            $current_committee_info_indiv['member_name']=$current_committee_indiv['member_name'];

            $current_committee_info_indiv['position']=$current_committee_indiv['position'];

            $current_committee_info_indiv['address']=$current_committee_indiv['address'];

            $current_committee_info_indiv['educational_qualification']=
                $current_committee_indiv['educational_qualification'];

            $current_committee_info_indiv['photo']=
                $current_committee_indiv['photo'];

            $current_committee_info[]=$current_committee_info_indiv;




        }//end of foreach loop


        
        $all_committees_old= FoundationCommittee::where('id','!=',$present_committee_id)->get();

        $old_commitee_info=[];
        foreach($all_committees_old as $all_committees_old_indiv){

            $old_commitee_info_indiv=[];
            $old_commitee_info_indiv['id']=$all_committees_old_indiv['id'];
            $old_commitee_info_indiv['creation_date']=$all_committees_old_indiv['creation_date'];
            $old_commitee_info_indiv['expiry_date']=$all_committees_old_indiv['expiry_date'];

            $old_commitee_info[]=$old_commitee_info_indiv;




        }// end of foreach loop




        return response()->json(['current_committee'=>$current_committee_info,
            'old_commitee_info'=>$old_commitee_info], 200);






    }// end of function get_foundation_committees_data



      public function get_foundation_committees_data_indiv(Request $request, $id){

        // \DB::enableQueryLog(); // Enable query log

        $current_committee_query=FoundationCommittee::
            
            join('foundation_committee_details',
                'foundation_committees.id', '=',
                'foundation_committee_details.foundation_committee_id')
            ->where('foundation_committees.id','=',$id)
            ->select('foundation_committees.*','foundation_committee_details.*', 
                'foundation_committee_details.id as foundation_committee_detail_id_found',
                'foundation_committees.id as foundation_committee_id_found'
            
            )
            ->get();

        // dd(\DB::getQueryLog()); // Show results of log



        $current_committee_info=[];

        foreach($current_committee_query as $current_committee_indiv){

            $current_committee_info_indiv=[];
            $current_committee_info_indiv['creation_date']=$current_committee_indiv['creation_date'];
            $current_committee_info_indiv['expiry_date']=$current_committee_indiv['expiry_date'];

            $current_committee_info_indiv['member_name']=$current_committee_indiv['member_name'];

            $current_committee_info_indiv['position']=$current_committee_indiv['position'];

            $current_committee_info_indiv['address']=$current_committee_indiv['address'];

            $current_committee_info_indiv['educational_qualification']=
                $current_committee_indiv['educational_qualification'];

             $current_committee_info_indiv['photo']=
                $current_committee_indiv['photo'];

                $current_committee_info[]=$current_committee_info_indiv;

            




        }//end of foreach loop


                return response()->json(['committee'=>$current_committee_info], 200);


        





    }// end of function get_foundation_committees_data_indiv


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFoundationCommitteeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoundationCommitteeRequest $request)
    {
        
        //var_dump($request->input());


           $validator = \Validator::make($request->all(), [

           
                'person_name.*'=> 'required',
                'position.*'=> 'required',
                'address.*' => 'required',
                'mobile_no.*' => 'required',
            
            
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $creation_date=$request->input('creation_date');
        $expiry_date=$request->input('expiry_date');

        $creation_date_array = explode('-', $creation_date);
        $creation_date_formatted = $creation_date_array[2].'-'.$creation_date_array[1].'-'.$creation_date_array[0];


        $expiry_date_array = explode('-', $expiry_date);
        $expiry_date_formatted = $expiry_date_array[2].'-'.$expiry_date_array[1].'-'.$expiry_date_array[0];

        $committee=FoundationCommittee::create([
            
            'creation_date'=> $creation_date_formatted,
            'expiry_date'=> $expiry_date_formatted,

        ]);

        $committee_id=$committee->id;


        $total_persons = $request->input('total_persons');
        $photos_indices = $request->input('photos_indices');

        /*if($photos_indices_obtained==null){
            $photos_indices_obtained=[];

        }
        $photos_indices= array_values($photos_indices_obtained);*/

        $photos_indices =json_decode( $photos_indices);

        // echo " photos_indices === ";
        // var_dump($photos_indices);

        $images = $request->file('photo',[]);

        $personNames = array_values($request->input('person_name', []));

        $positions = array_values($request->input('position', []));

        $addresses = array_values($request->input('address', []));

        $educations = array_values($request->input('education', []));

        $mobile_nos= array_values($request->input('mobile_no'));
        

        // echo " personNames length = ".count($personNames);

        // var_dump($personNames);
        // $addresses = $request->input('address', []);
        $photos = $request->file('photo', []);

        // echo "photos count = ".count($photos);

        foreach (range(0, count($personNames) - 1) as $index) {
         
                    $personName = $personNames[$index];
                    // $address = $addresses[$index];
                    $photo = $photos[$index] ?? null; // Access empty photo fields as null

                    // echo "<br/> Photo found ==== ";

                   // var_dump($photo);

                    // Store data in the database, handling empty photo fields appropriately
                    // ...


        }

        // exit(0);

        //$photos = $request->file('photo',[]);

        


        // echo " total photo fields = ".count($photos);
        $photo_index=0;

        for($i=0; $i<$total_persons; $i++){


                // $member_name =$request->input('person_name')[$i];
                   $member_name =$personNames[$i];
                        
                /*$position = $request->input('position')[$i];*/
                $position = $positions[$i];
                
                

                

                /*$address  = $request->input('address')[$i];*/
                $address  = $addresses[$i];

                /*$educational_qualification  = $request->input('education')[$i];*/

                $educational_qualification  = $educations[$i];

                $mobile  = $mobile_nos[$i];

                $imagename_new ="";

                $search_result = in_array($i, $photos_indices);

                // echo " <br/>search result = <br/>";

                // var_dump($search_result);

                $photo_uploaded=0;

                 if($search_result){
                    $photo_uploaded=1;

                            $image = $photos[$photo_index];
                            ++$photo_index;



                                        
                            // $input['imagename'] = time().'.'.$image->extension();
                            $imagename_new = time().'-'.rand().'-'.rand().'.'.$image->extension();

                         

                            $destinationPath = public_path('/thumbnails');

                            $img = Image::make($image->path());

                            $img->resize(200, 200, function ($constraint) {

                                $constraint->aspectRatio();

                            // })->save($destinationPath.'/'.$input['imagename']);
                            })->save($destinationPath.'/'.$imagename_new);

                       

                            $destinationPath = public_path('/images');

                            // $image->move($destinationPath, $input['imagename']);

                            $image->move($destinationPath, $imagename_new);



                 }  //end of if($search_result){


                 // echo " committee id = ".$committee_id;
  
                $info=[
                    'foundation_committee_id'=>$committee_id,
                    'member_name'=>$member_name,
                    'position'=>$position, 

                    
                    'address'=>$address, 
                    'educational_qualification'=>$educational_qualification, 
                    'mobile'=>$mobile,
                   
                ]; 

                  
                
                if($photo_uploaded){

                    $info['photo']= $imagename_new;

                } 

                // echo "Infooo ===== ";

                // var_dump($info);  

                FoundationCommitteeDetail::create($info);


        }// end of for loop



        

        echo 'Done!!';
        
        //return response()->json(['committee_id'=>$committee_id], 200);

    }//end of store method 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoundationCommittee  $foundationCommittee
     * @return \Illuminate\Http\Response
     */
    public function show(FoundationCommittee $foundationCommittee, $id)
    
    // public function show(MajlisheShura $majlisheShura, $id)
    {
        
        $foundation_committee_info=FoundationCommittee::
        
        join('foundation_committee_details','foundation_committees.id', '=',
            'foundation_committee_details.foundation_committee_id')
        ->where('foundation_committees.id','=',$id)
        ->select('foundation_committees.*','foundation_committee_details.*', 
            'foundation_committee_details.id as   foundation_committee_details_id_found',
            'foundation_committees.id as foundation_committee_id_found'
        
        )
        ->get();
        
        // ->get(['majlishe_shuras.*','majlishe_shura_details.*', 'majlishe_shuras.id as 
        //     majlishe_shura_id_found' ]);


        

        return view('foundation_committee_indiv_info', compact('foundation_committee_info'));


    }//end of method show 



    public function show_all_foundation_committee(Request $request){

         $foundation_committee_all=FoundationCommittee::all();

        return view('foundation_committee_all', compact('foundation_committee_all'));

    }// end of function show_all_foundation_committee

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoundationCommittee  $foundationCommittee
     * @return \Illuminate\Http\Response
     */
    public function edit(FoundationCommittee $foundationCommittee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFoundationCommitteeRequest  $request
     * @param  \App\Models\FoundationCommittee  $foundationCommittee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoundationCommitteeRequest $request, FoundationCommittee $foundationCommittee)
    {
         $validator = \Validator::make($request->all(), [

           
                'person_name.*'=> 'required',
                'position.*'=> 'required',
                'address.*' => 'required',
                'mobile_no.*' => 'required',
            
            
        ]);
         

        $creation_date=$request->input('creation_date');
        $expiry_date=$request->input('expiry_date');

        $creation_date_array = explode('-', $creation_date);
        $creation_date_formatted = $creation_date_array[2].'-'.$creation_date_array[1].'-'.$creation_date_array[0];


        $expiry_date_array = explode('-', $expiry_date);
        $expiry_date_formatted = $expiry_date_array[2].'-'.$expiry_date_array[1].'-'.$expiry_date_array[0];



        $detail_ids_obtained = $request->input('detail_id');

        if($detail_ids_obtained==null){

            $detail_ids_obtained=[];

        }
        $detail_ids=array_values($detail_ids_obtained);

        $shura_id = $request->input('shura_id');

        $person_names_obtained=$request->input('person_name');

        if($person_names_obtained==null){

            $person_names_obtained=[];

        }


        $person_names =array_values($person_names_obtained);
        $positions_obtained=$request->input('position');
        if($positions_obtained==null){

            $positions_obtained=[];

        }

        $positions = array_values($positions_obtained);

        $addresses_obtained=$request->input('address');

        if($addresses_obtained==null){

            $addresses_obtained=[];

        }

        $addresses = array_values($addresses_obtained);
        $educations_obtained=$request->input('education');
        if($educations_obtained==null){
            $educations_obtained=[];

        }
        $educations = array_values($educations_obtained);


        $mobile_nos_obtained=$request->input('mobile_no');

        if($mobile_nos_obtained==null){
            $mobile_nos_obtained=[];

        }

        $mobile_nos = array_values($mobile_nos_obtained);

        $total_persons = $request->input('total_persons');


        $photos_indices = $request->input('photos_indices');

        $photos_indices =json_decode( $photos_indices);


        // echo " photos_indices === ";
        // var_dump($photos_indices);

        $images = $request->file('photo',[]);

        $personNames = array_values($request->input('person_name', []));

        $positions = array_values($request->input('position', []));

        $addresses = array_values($request->input('address', []));

        $educations = array_values($request->input('education', []));

        $mobile_nos= array_values($request->input('mobile_no'));
        

        // echo " personNames length = ".count($personNames);

        // var_dump($personNames);
        // $addresses = $request->input('address', []);
        $photos = $request->file('photo', []);

        // echo "photos count = ".count($photos);

        // var_dump($person_names);



        $detail_ids_from_db=FoundationCommitteeDetail::where(array('foundation_committee_id'=>$shura_id))->pluck('id')->toArray() ;

        
        // echo "detail_ids === ";
        // var_dump($detail_ids);
        $ids_to_delete=array_diff($detail_ids_from_db, $detail_ids)  ; 

        /*DB::beginTransaction();
        try{*/

                FoundationCommittee::where(array('id'=>$shura_id))->update(['creation_date'=>$creation_date_formatted,'expiry_date'=>$expiry_date_formatted]);



                $FoundationCommitteeDetailToDelete=FoundationCommitteeDetail::whereIn('id',$ids_to_delete)->get();

                for($j=0; $j<count($FoundationCommitteeDetailToDelete); $j++){


                    $photo_found = $FoundationCommitteeDetailToDelete[$j]['photo'];

                    if(trim($photo_found)!=trim('')){

                        $file_path_thumbnail=base_path().'/public/thumbnails/'.$photo_found;

                        $file_path_large=base_path().'/public/images/'.$photo_found;

                        // echo "<br/>\n file_path_thumbnail = ".$file_path_thumbnail;
                        // echo "\n  file_path_large = ".$file_path_large;

                        $thumbnail_exists_result= file_exists($file_path_thumbnail);

                        // echo " thumbnail_exists_result = ";
                        // var_dump($thumbnail_exists_result);

                        // echo " large image exists result = ";
                        // var_dump(file_exists($file_path_large));

                        if(file_exists($file_path_thumbnail)){

                            File::delete($file_path_thumbnail);
                        }    

                        if(file_exists($file_path_large)){

                            File::delete($file_path_large);

                        }
                        

                    }

                }//end of for loop

                
                // echo " ids_to_delete = ";
                // var_dump($ids_to_delete);



                // FoundationCommitteeDetail::whereIn('id', $ids_to_delete)->delete();
                $result_delete=FoundationCommitteeDetail::whereIn('id', $ids_to_delete)->delete();

                // var_dump($result_delete);



                // exit(0);


                for($i=0; $i<count($detail_ids); $i++){

                    $detail_id_found = $detail_ids[$i];
                     $person_name_found=$person_names[$i];

                     $position_found=$positions[$i];
                     $address_found = $addresses[$i];
                     $education_found = $educations[$i];

                     $mobile_no_found=$mobile_nos[$i];

                        







                        /*----------------------------*/



                        $photos = $request->file('photo',[]);

        


        // echo " total photo fields = ".count($photos);
        $photo_index=0;

        


            $detail_id_found= $detail_ids[$i];


                // $member_name =$request->input('person_name')[$i];
                   $member_name =$personNames[$i];
                        
                /*$position = $request->input('position')[$i];*/
                $position = $positions[$i];
                
                

                

                /*$address  = $request->input('address')[$i];*/
                $address  = $addresses[$i];

                /*$educational_qualification  = $request->input('education')[$i];*/

                $educational_qualification  = $educations[$i];

                $mobile  = $mobile_nos[$i];

                $imagename_new ="";

                $search_result = in_array($i, $photos_indices);

                // echo " <br/>search result = <br/>";

                // var_dump($search_result);
                 $photo_uploaded=0;
                 if($search_result){

                    $photo_uploaded=1;

                            $image = $photos[$photo_index];
                            ++$photo_index;



                                        
                            // $input['imagename'] = time().'.'.$image->extension();
                            $imagename_new = time().'-'.rand().'-'.rand().'.'.$image->extension();

                         

                            $destinationPath = public_path('/thumbnails');

                            $img = Image::make($image->path());

                            $img->resize(200, 200, function ($constraint) {

                                $constraint->aspectRatio();

                            // })->save($destinationPath.'/'.$input['imagename']);
                            })->save($destinationPath.'/'.$imagename_new);

                       

                            $destinationPath = public_path('/images');

                            // $image->move($destinationPath, $input['imagename']);

                            $image->move($destinationPath, $imagename_new);



                 }  //end of if($search_result){
                

                $update_info = ['member_name'=>$person_name_found,'position'=>$position_found,'address'=>$address_found,
                        'educational_qualification'=>$education_found,'mobile'=>$mobile_no_found];


                if($photo_uploaded){
                    $update_info['photo']=$imagename_new;

                }


                FoundationCommitteeDetail::where(array('id'=>$detail_id_found))->update($update_info);

                


        

                        /*-----------------------------*/









                     /*FoundationCommitteeDetail::where(array('id'=>$detail_id_found))->update(['member_name'=>$person_name_found,'position'=>$position_found,'address'=>$address_found,
                        'educational_qualification'=>$education_found,'mobile'=>$mobile_no_found]);*/


                    }//end of for loop



                for($i=count($detail_ids); $i<$total_persons; $i++){

                    $person_name_found=$person_names[$i];

                     $position_found=$positions[$i];
                     $address_found = $addresses[$i];
                     $education_found = $educations[$i];

                     $mobile_no_found=$mobile_nos[$i];



                                     $imagename_new ="";

                $search_result = in_array($i, $photos_indices);

                // echo " <br/>search result for newly added member = <br/>";

                // var_dump($search_result);
                 $photo_uploaded=0;
                 if($search_result){

                    $photo_uploaded=1;

                            $image = $photos[$photo_index];
                            ++$photo_index;



                                        
                            // $input['imagename'] = time().'.'.$image->extension();
                            $imagename_new = time().'-'.rand().'-'.rand().'.'.$image->extension();

                         

                            $destinationPath = public_path('/thumbnails');

                            $img = Image::make($image->path());

                            $img->resize(200, 200, function ($constraint) {

                                $constraint->aspectRatio();

                            // })->save($destinationPath.'/'.$input['imagename']);
                            })->save($destinationPath.'/'.$imagename_new);

                       

                            $destinationPath = public_path('/images');

                            // $image->move($destinationPath, $input['imagename']);

                            $image->move($destinationPath, $imagename_new);



                 }  //end of if($search_result){





                $member_info = ['foundation_committee_id'=>$shura_id,'member_name'=>$person_name_found,'position'=>$position_found,'address'=>$address_found,
                        'educational_qualification'=>$education_found,'mobile'=>$mobile_no_found];


                if($photo_uploaded){
                    $member_info['photo']=$imagename_new;

                }
                



                     
                     FoundationCommitteeDetail::create($member_info);   


                }   //end of second for loop 


                echo 'Done !!!';


        /*}catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }*/

        
    }//end of update method 


    public function search_foundation_committee(Request $request){

            $search_string=$request->input('searchString');

            $search_string=trim(str_replace(['"', "'"], '', $search_string));
            $matchAgainst = "MATCH(`member_name`, `position`,`address`, `educational_qualification`, `mobile`) AGAINST ('".$search_string."' IN BOOLEAN MODE)";

            // Construct the WHERE clause for searching each keyword in multiple columns
            //$keywords = explode(" ", $search_string);


            $keywords = array_map(function($keyword) {
                return trim(str_replace(['"', "'"], '', $keyword));
            }, explode(" ", $search_string));


            $conditions = [];
            foreach ($keywords as $keyword) {
                $conditions[] = "(member_name LIKE '%".$keyword."%' OR 
                                 address LIKE '%".$keyword."%' OR 
                                 educational_qualification LIKE '%".$keyword."%' OR 
                                 mobile LIKE '%".$keyword."%')";
            }


            $whereClause = implode(" OR ", $conditions);

            // Construct the full query with relevance sorting
            $query = "SELECT *, ($matchAgainst) AS relevance 
                      FROM foundation_committee_details  
                      WHERE $matchAgainst OR ($whereClause) 
                      ORDER BY relevance DESC";



           
        $results=DB::select($query);

        return response()->json(['members'=>$results], 200);

    }// end of function search_foundation_committee

    

    public function foundation_committee_member_indiv(Request $request, $id){

        // \DB::enableQueryLog(); // Enable query log

        $current_committee_query=FoundationCommittee::
            
            join('foundation_committee_details',
                'foundation_committees.id', '=',
                'foundation_committee_details.foundation_committee_id')
            ->where('foundation_committee_details.id','=',$id)
            ->select('foundation_committees.*','foundation_committee_details.*', 
                'foundation_committee_details.id as foundation_committee_detail_id_found',
                'foundation_committees.id as foundation_committee_id_found'
            
            )
            ->get();

        // dd(\DB::getQueryLog()); // Show results of log



        $current_committee_info=[];

        foreach($current_committee_query as $current_committee_indiv){

            $current_committee_info_indiv=[];
            $current_committee_info_indiv['creation_date']=$current_committee_indiv['creation_date'];
            $current_committee_info_indiv['expiry_date']=$current_committee_indiv['expiry_date'];

            $current_committee_info_indiv['member_name']=$current_committee_indiv['member_name'];

            $current_committee_info_indiv['position']=$current_committee_indiv['position'];

            $current_committee_info_indiv['address']=$current_committee_indiv['address'];

            $current_committee_info_indiv['educational_qualification']=
                $current_committee_indiv['educational_qualification'];

             $current_committee_info_indiv['photo']=
                $current_committee_indiv['photo'];

                $current_committee_info[]=$current_committee_info_indiv;

            




        }//end of foreach loop


                return response()->json(['committee'=>$current_committee_info], 200);


        





    }// end of function foundation_committee_member_indiv



    public function majlishe_shura_member_indiv_info(Request $request, $user_id){


        $member_info=MajlisheShura::
        join('majlishe_shura_details',
            'majlishe_shuras.id', '=',
            'majlishe_shura_details.majlishe_sura_id')
        ->where('majlishe_shura_details.majlishe_sura_id','=',$user_id)
        ->select('majlishe_shuras.*','majlishe_shura_details.*', 
            'majlishe_shura_details.id as majlishe_shura_detail_id_found',
            'majlishe_shuras.id as majlishe_shura_id_found'
        
        )->limit(1)
        ->get();


        return response()->json(['member_info'=>$member_info],200);


    }// end of function majlishe_shura_member_indiv_info

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoundationCommittee  $foundationCommittee
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoundationCommittee $foundationCommittee)
    {
        //
    }
}
