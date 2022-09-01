@extends('layouts/contentNavbarLayout')

@section('title', 'Personal Details')

@section('page-style')

    <!-- <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous"
    /> -->

<!-- blueimp Gallery styles -->
    <link
      rel="stylesheet"
      href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css"
    />
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="{{URL::to('/assets/js/jQuery-File-Upload-master/css/jquery.fileupload.css')}}" />
    <link rel="stylesheet" href="{{URL::to('/assets/js/jQuery-File-Upload-master/css/jquery.fileupload-ui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/assets/js/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.css')}}"/>

    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript
      ><link rel="stylesheet" href="{{URL::to('/assets/js/jQuery-File-Upload-master/css/jquery.fileupload-noscript.css')}}"
    /></noscript>
    <noscript
      ><link rel="stylesheet" href="{{URL::to('/assets/js/jQuery-File-Upload-master/css/jquery.fileupload-ui-noscript.css')}}"
    /></noscript>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home -></span>
   Candidates -> Show Candidate Info
  
</h4>

@include('content.tables.candidate-section-headings')

<div id="above_table_info_area" class="mb-2">

</div><!-- end of id above_table_info_area -->



<div class="row" id="latest_candidates_area">
  



</div><!-- end of id latest_candidates_area-->

<?php


  $first_name="";
  $middle_name="";
  $last_name="";
  $dob="";
  $first_lang="";
  $country_of_citizenship="";
  $nationality="";
  $passport_no="";
  $passport_expiry_date="";
  $nid_number="";
  $marital_status="";
  $gender="";
  $address="";
  $city="";
  $country="";
  $state_province="";
  $zip="";
  $phone="";
  $organization_category="";
  $company="";
  $medical_centre="";
  $medical_date="";
  $job_designation="";
  $departure_date="";
  $esd_to_reach="";
  $passport_size_photo="";
  $nid_photo="";
  $passport_photo="";
  $medical_photo="";
  $calling_photo="";
  $visa_photo="";
  $flight_photo="";
  $user_code="";

  $dob_year=$dob_month=$dob_day="";
  $passport_expiry_date_year=$passport_expiry_date_month = $passport_expiry_date_day="";
  $medical_date_year = $medical_date_month = $medical_date_day="";
  $departure_date_year = $departure_date_month = $departure_date_day="";
  $esd_to_reach_year= $esd_to_reach_month=$esd_to_reach_day="";

  if(gettype($user)!=trim('string')){
     
     $first_name = $user->first_name;
     $middle_name= $user->middle_name;
     $last_name = $user->last_name;
     $dob= $user->dob;


     if($dob){

      $dob_array=explode('-',$dob);
      $dob_year=$dob_array[0];
      $dob_month = $dob_array[1];
      $dob_day = $dob_array[2];

     }
     
     $first_lang= $user->first_lang;
     $country_of_citizenship= $user->country_of_citizenship ;
     $nationality= $user->nationality;
     $passport_no= $user->passport_num ;
     $passport_expiry_date = $user->passport_expiry_date;
     
     if($passport_expiry_date){

        $passport_expiry_date_array = explode('-',$passport_expiry_date);
        $passport_expiry_date_year = $passport_expiry_date_array[0];
        $passport_expiry_date_month = $passport_expiry_date_array[1];
        $passport_expiry_date_day = $passport_expiry_date_array[2];


     }


     $nid_number= $user->nid_num;
     $marital_status= $user->marital_status;
     $gender= $user->gender;
     $address= $user->address;
     $city = $user->city;
     $country = $user->country;
     $state_province= $user->state_province;
     $zip= $user->zip;
     $email= $user->email;
     $phone = $user->phone;
     $organization_category= $user->organization_category;
     $company = $user->company;
     $medical_centre = $user->medical_center;
     $medical_date = $user->medical_date;
     $user_code = $user->user_code;

     if($medical_date){

      $medical_date_array = explode('-',$medical_date);
      $medical_date_year = $medical_date_array[0];
      $medical_date_month= $medical_date_array[1];
      $medical_date_day = $medical_date_array[2];

     }
     $job_designation= $user->job_designation;
     $departure_date = $user->departure_date;
     
     if($departure_date){

        $departure_date_array = explode('-',$departure_date);
        $departure_date_year = $departure_date_array[0];
        $departure_date_month = $departure_date_array[1];
        $departure_date_day = $departure_date_array[2];

     }
     $esd_to_reach= $user->esd_to_reach;
     if($esd_to_reach){

        $esd_to_reach_array = explode('-',$esd_to_reach);
        $esd_to_reach_year = $esd_to_reach_array[0];
        $esd_to_reach_month = $esd_to_reach_array[1];
        $esd_to_reach_day = $esd_to_reach_array[2];

     }
     $passport_size_photo = $user->passport_size_photo;
     $nid_photo = $user->nid_photo;
     $passport_photo = $user->passport_copy;
     $medical_photo=$user->vaccine_photo ;
     $calling_photo= $user->calling_photo ;
     $visa_photo= $user->visa_stamping_photo;
     $flight_photo = $user->flight_photo ;

     $user_id = $user->id;




    ?>


<!-- Bordered Table -->
<div class="card">
  <!-- <h5 class="card-header">Bordered Table</h5> -->
  <div class="card-body">
    <div id="result" class="text-center"></div>
      
        <form method="POST" enctype="multipart/form-data" id="form-user-add" action="{{URL::to('/user/update-now')}}"  class="requires-validation g-3" novalidate  >



          <div id="personal_details_profile_photo" class="text-center">
            <?php 
                $default_image= URL::to('/assets/img/avatars/1.png');
            ?>
            <img src="{{URL::to('/thumbnails/passport_size_photo/'.$passport_size_photo)}}" onerror="this.onerror=null; this.src='<?php  echo $default_image; ?>'" alt="profile photo">
            
          </div><!-- end of id personal_details_profile_photo-->
          

          <div id="personal_details_profile_name" class="text-center">
            {{$first_name.' '.$middle_name.' '.$last_name}}
            
          </div>

          <div id="personal_details_profile_code_no" class="text-center fw-semibold">
            User Code: {{$user_code}}
          </div>
          <div id="personal_details_profile_passport_no" class="text-center fw-semibold">
            Passport no: {{$passport_no}}
          </div>

          

          <div id="user_edit_link" class="text-center mb-3">

            <a class="text-warning fw-bold" href="{{URL::to('/user/edit/'.$user_id)}}">Edit the User</a>
            
          </div><!-- en dof id user_edit_link-->

          <div class="row mb-3">

            <div class="col-sm-4">
              <label for="first_name" class="form-label">First Name</label>
              <input readonly  type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="{{$first_name}}"  required>

              <div class="invalid-feedback" id="first_name_error">
                Please choose a username.
              </div>
              
            </div>



            <div class="col-sm-4">
              <label for="middle_name" class="form-label">Middle Name</label>
              <input readonly  type="text" name="middle_name" class="form-control" id="middle_name" placeholder="Middle Name" value="{{$middle_name}}" >

              <!-- <div class="invalid-feedback" id="date_of_birth_error">Date of birth is necessary </div> -->
              
            </div>


            <div class="col-sm-4">
              <label for="last_name" class="form-label">Last Name</label>
              <input readonly  type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="{{$last_name}}" >

              <div class="invalid-feedback" id="last_name_error">Last name is necessary</div>
              
            </div>

          </div>


          <div class="row mb-3 gy-4">
            
            <div class="col-sm-3">
              <label for="date_of_birth" class="form-label">Date of Birth</label>
              <input readonly  type="text" name="date_of_birth" class="form-control" id="date_of_birth" placeholder="Date of Birth" value="" >

              <div class="invalid-feedback" id="date_of_birth_error">
                Date of birth is necessary
                
              </div>
              
            </div>
            


            <div class="col-sm-3">
              <label for="first_lang" class="form-label">First Language</label>
              <input readonly  type="text" name="first_lang" class="form-control" id="first_lang" placeholder="First Language" value="{{$first_lang}}" >

              <div class="invalid-feedback" id="first_lang_error">First language is necessary</div>
              
            </div>
            
          </div><!-- end of class row-->


          <div class="row mb-3 gy-4">

            <div class="col-sm-3 ">
              <label for="countryOfCitizenship" class="form-label">Country Of Citizenship</label>
              <input readonly  type="text" name="countryOfCitizenship" id="countryOfCitizenship" class="form-control" placeholder="Country Of Citizenship" value="{{$country_of_citizenship}}">

              <div class="invalid-feedback" id="countryOfCitizenship_error">
                Country of citizenship is necessary
                
              </div>
            </div>


            <div class="col-sm-3 ">
              <label for="nationality" class="form-label">Nnationality</label>
              <input readonly  type="text" name="nationality" id="nationality" class="form-control" placeholder="Nationality" value="{{$nationality}}">

              <div class="invalid-feedback" id="nationality_error">
                
              </div>
              
            </div>  

            <div class="col-sm-3 ">
              <label for="passport_no" class="form-label">Passport Number</label>
              <input readonly  type="text" name="passport_no" id="passport_no" class="form-control" placeholder="Passport Number" value="{{$passport_no}}">

              <div class="invalid-feedback" id="passport_no_error">
                Passport number is necessary
              </div>
              
            </div>


            <div class="col-sm-3">
              <label for="passport_expiry_date" class="form-label">Passport Expiry Date</label>
              <input readonly  type="text" name="passport_expiry_date" id="passport_expiry_date" class="form-control" placeholder="Passport Expiry Date" value="" >
              
              <div class="invalid-feedback" id="passport_expiry_date_error">
                Passport expiry date is necessary
              </div>
            </div>
          </div>


        <div class="row mb-3 gy-4">
            <div class="col-sm-4">
              <label for="nid_number" class="form-label">NID NUmber</label>
              <input readonly  type="text" name="nid_number" id="nid_number" class="form-control" placeholder="NID Number" value="{{$nid_number}}">

              <div class="invalid-feedback" id="nid_number_error">NID number is necessary</div>
              
            </div>


            <div class="col-sm-4">

             <label  class="form-label">Marital Status</label>

                <div class="form-check">
                    <input readonly  class="form-check-input" type="radio" name="marital_status" id="marital_status_1" 
                    value="<?php echo trim('single');?>"  <?php if($marital_status==trim("single")){ echo 'checked';} ?>>
                    <label class="form-check-label" for="marital_status">Single</label>
                </div>
                
                <div class="form-check">
                  <input readonly  class="form-check-input"  value="<?php echo trim('married');?>" type="radio" name="marital_status" 
                  id="marital_status2" <?php if($marital_status==trim("married")){ echo 'checked';} ?> >
                  <label class="form-check-label" for="marital_status2">
                  Married
                  </label>
                </div>

                <div class="invalid-feedback" id="marital_status_error">Marital status is necessary</div>


            </div>





            <div class="col-sm-4">

             <label  class="form-label">Gender</label>

                <div class="form-check">
                    <input readonly  class="form-check-input" type="radio" name="gender" id="gender1" value="<?php echo trim('male');?>"  <?php if($gender==trim("male")){ echo 'checked';} ?>>
                    <label class="form-check-label" for="gender1">Male</label>
                </div>
                
                <div class="form-check">
                  <input readonly  class="form-check-input" type="radio" name="gender" id="gender2" value="<?php echo trim('female');?>"  <?php if($gender==trim("female")){ echo 'checked';} ?> >
                  <label class="form-check-label" for="gender2">
                  Female
                  </label>
                </div>

                <div class="invalid-feedback" id="gender_error">
                  Gender is necessary
                  
                </div>


            </div>
          </div><!-- end of class row-->


        <div class="row mb-3 gy-3">
          
          <div class="col-sm-7">
            <label for="address"  class="form-label">ADDRESS</label>

            <input readonly  type="text" id="address" name="address" class="form-control" placeholder="Address" value="{{$address}}" />

            <div class="invalid-feedback" id="address_error">Address is necessary</div>
            
          </div>

          <div class="col-sm-5">

            <label for="city" for="city" class="form-label">CITY</label>

            <input readonly  type="text" id="city" name="city" class="form-control" placeholder="City/Town" value="{{$city}}"  />
            <div class="invalid-feedback" id="city_error">City is necessary</div>
            
          </div>

        </div><!-- end of class row-->
        
        <div class="row mb-3 gy-3">

          <div class="col-sm-4">
            <label for="country"  class="form-label">COUNTRY</label>
            <input readonly  type="text" name="country" id="country" class="form-control" value="{{$country}}" placeholder="Country">
            <div class="invalid-feedback" id="country_error">Country is necessary</div>
          </div>

          <div class="col-sm-4">
            <label class="form-label" for="state_province">STATE/PROVINCE</label>
            <input readonly  type="text" name="state_province" class="form-control" id="state_province" value="{{$state_province}}" placeholder="State/Province">

            <div class="invalid-feedback" id="state_province_error">State/province is necessary</div>
            
          </div>



          <div class="col-sm-4">
            <label class="form-label" for="zip">Zip Code</label>
            <input readonly  type="text" name="zip" id="zip" class="form-control" value="" placeholder="Zip Code" value="{{$zip}}">
            <div class="invalid-feedback" id="zip_error">ZIP is necessary</div>
          </div>
          
        </div><!-- end of class row -->



        <div class="row  mb-3 gy-3">

          <div class="col-sm-4">
            <label for="email"  class="form-label">EMAIL</label>
            <input readonly  type="text" readonly name="email" id="email" class="form-control" value="{{$email}}" placeholder="Email">
            <div class="invalid-feedback" id="email_error">A valid and unique email is necessary</div>
          </div>

          <div class="col-sm-4">
            <label class="form-label" for="phone">PHONE</label>
            <input readonly  type="text" name="phone" class="form-control" id="phone" value="" placeholder="Phone">
            <div class="invalid-feedback" id="phone_error">Phone number is necessary</div>
            
          </div>



          <div class="col-sm-4">
                <label for="organization_category"  class="form-label">Organization Category</label>
                <input readonly  type="text" name="organization_category" id="organization_category" class="form-control" value="{{$organization_category}}" placeholder="Organization Category">
                <div class="invalid-feedback" id="organization_category_error"></div>
          </div>
          
        </div><!-- end of class row -->





        <div class="row  mb-3 gy-3">

          

          <div class="col-sm-4">
            <label class="form-label" for="company">Company</label>
            <input readonly  type="text" name="company" class="form-control" id="company" value="{{$company}}" placeholder="Company">
            <div class="invalid-feedback" id="company_error"></div>
            
          </div>



          <div class="col-sm-4">
            <label class="form-label" for="medical_centre">Medical Center</label>
            <input readonly  type="text" name="medical_centre" class="form-control" id="medical_centre" value="{{$medical_centre}}" placeholder="Medical Centre">
            <div class="invalid-feedback" id="medical_centre_error"></div>
            
          </div>



          <div class="col-sm-4">
            <label class="form-label" for="medical_date">Medical Date</label>
            <input readonly  type="text" name="medical_date" class="form-control" id="medical_date" value="" placeholder="Medical Date" readonly>
            <div class="invalid-feedback" id="medical_date_error"></div>
            
          </div>

          
        </div><!-- end of class row -->





        <div class="row  mb-3 gy-3">

          

          <div class="col-sm-4">
            <label class="form-label" for="job_designation">Job Designation</label>
            <input readonly  type="text" name="job_designation" class="form-control" id="job_designation" value="{{$job_designation}}" placeholder="Job Designation">
            <div class="invalid-feedback" id="job_designation_error"></div>
            
          </div>


          <div class="col-sm-4">
            <label class="form-label" for="departure_date">Departure Date</label>
            <input readonly  type="text" name="departure_date" class="form-control" id="departure_date" value="" placeholder="Departure Date">
            <div class="invalid-feedback" id="departure_date_error"></div>
            
          </div>


          <div class="col-sm-4">
            <label class="form-label" for="esd_to_reach">ESD to reach</label>
            <input readonly  type="text" name="esd_to_reach" class="form-control" id="esd_to_reach" value="" placeholder="ESD to Reach">
            <div class="invalid-feedback" id="esd_to_reach_error"></div>
            
          </div>

        </div>


        <!-- <input readonly  type="text" value="<?php echo request()->segment(count(request()->segments())) ?>"  name="user_id"> -->


        <div class="mb-4">Documentation</div>
 
        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Passport Size Photo:</div>
          
          <div id="passport_size_photo_area" class="edit_photo_area">

            <img src="{{URL::to('/thumbnails/passport_size_photo/'.$passport_size_photo)}}" alt="passport size photo" />
            

          </div><!-- end of id passport_size_photo_area-->

          

          


        </div><!-- end of class user_add_file_indiv  -->
        

   



     

    <!-- endddddddddddddddddd --->


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">NID Copy:</div>


<!-- 
         <div id="nid_photo_area" class="edit_photo_area">

            <img src="{{URL::to('/thumbnails/nid_photo/'.$nid_photo)}}" alt="nid photo" />
            

          </div> -->
          <!-- end of id nid_photo_area-->

  <div id="personal_details_docs_all">
          <?php

            foreach($docs_all as $doc_indiv){

              $is_pdf=0;

              $pdf_doc=$doc_indiv->pdf_doc;

              if($pdf_doc){

                $is_pdf=1;

              }

              $large_image = $doc_indiv->large_image;

              $thumbnail = $doc_indiv->thumbnail;

              $description = $doc_indiv->description;
              if(!$description){
                $description='...';

              }
              $doc_category=$doc_indiv->doc_category;


                if($doc_category==2){ // from DB column

                
                if(!$is_pdf){

                  ?>



              <div class="personal_details_doc_indiv_wrapper">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/nid_photo/'.$large_image )}}" data-fancybox="images" data-caption="<?php echo $description; ?>">
                    <img  src="{{URL::to('/thumbnails/nid_photo/'.$thumbnail)}}" alt="photo" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->


                  <?php

                }else{


                  ?>



              <div class="personal_details_doc_indiv_wrapper">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/nid_photo/'.$pdf_doc )}}" data-fancybox="iframe" data-caption="<?php echo $description; ?>">
                    
                    <img  src="{{URL::to('/assets/img/pdf.png')}}" alt="pdf" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->

                  <?php
                }

                }// end of if($doc_category==2){ // from DB column

              ?>



              <?php


            }// end of foreach loop

          ?>

          </div><!-- end of id personal_details_docs_all-->


          
        </div><!-- end of class user_add_file_indiv  -->








        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Passport Copy:</div>


       
  <div id="personal_details_docs_all">
          <?php

            foreach($docs_all as $doc_indiv){

              $is_pdf=0;

              $pdf_doc=$doc_indiv->pdf_doc;

              if($pdf_doc){

                $is_pdf=1;

              }

              $large_image = $doc_indiv->large_image;

              $thumbnail = $doc_indiv->thumbnail;

              $description = $doc_indiv->description;
              if(!$description){
                $description='...';

              }
              $doc_category=$doc_indiv->doc_category;


                if($doc_category==6){ // from DB column 6=> passport copy

                
                if(!$is_pdf){

                  ?>



              <div class="personal_details_doc_indiv_wrapper">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/passport_copy/'.$large_image )}}" data-fancybox="images" data-caption="<?php echo $description; ?>">
                    <img  src="{{URL::to('/thumbnails/passport_copy/'.$thumbnail)}}" alt="photo" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->


                  <?php

                }else{


                  ?>



              <div class="personal_details_doc_indiv_wrapper">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/passport_copy/'.$pdf_doc )}}" data-fancybox="iframe" data-caption="<?php echo $description; ?>">
                    
                    <img  src="{{URL::to('/assets/img/pdf.png')}}" alt="pdf" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->

                  <?php
                }

                }// end of if($doc_category==6){ // from DB column

              ?>



              <?php


            }// end of foreach loop

          ?>

          </div><!-- end of id personal_details_docs_all-->


          


          
        </div><!-- end of class user_add_file_indiv  -->
        


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Medical Docs:</div> 

          <!-- <div id="vaccine_photo_area" class="edit_photo_area">

            <img src="{{URL::to('/thumbnails/medical_photo/'.$medical_photo)}}" alt="medical photo" />
            

          </div> --><!-- end of id vaccine_photo-->

          


  <div id="personal_details_docs_all">
          <?php

            foreach($docs_all as $doc_indiv){

              $is_pdf=0;

              $pdf_doc=$doc_indiv->pdf_doc;

              if($pdf_doc){

                $is_pdf=1;

              }

              $large_image = $doc_indiv->large_image;

              $thumbnail = $doc_indiv->thumbnail;

              $description = $doc_indiv->description;
              if(!$description){
                $description='...';

              }
              $doc_category=$doc_indiv->doc_category;


                if($doc_category==5){ // from DB column 5=> Medical 
 
                
                if(!$is_pdf){

                  ?>



              <div class="personal_details_doc_indiv_wrapper">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/medical_photo/'.$large_image )}}" data-fancybox="images" data-caption="<?php echo $description; ?>">
                    <img  src="{{URL::to('/thumbnails/medical_photo/'.$thumbnail)}}" alt="photo" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->


                  <?php

                }else{


                  ?>



              <div class="personal_details_doc_indiv_wrapper">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/medical_photo/'.$pdf_doc )}}" data-fancybox="iframe" data-caption="<?php echo $description; ?>">
                    
                    <img  src="{{URL::to('/assets/img/pdf.png')}}" alt="pdf" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->

                  <?php
                }

                }// end of if($doc_category==5){ // from DB column

              ?>



              <?php


            }// end of foreach loop

          ?>

          </div><!-- end of id personal_details_docs_all-->        

          
          
        </div><!-- end of class user_add_file_indiv  -->
        


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Calling Process Document:</div>
<!-- 
          <div id="passport_copy_area" class="edit_photo_area">

            <img src="{{URL::to('/thumbnails/calling_photo/'.$calling_photo)}}" alt="calling photo" />
            

          </div> --><!-- end of id passport_copy_area-->



  <div id="personal_details_docs_all">
          <?php

            foreach($docs_all as $doc_indiv){

              $is_pdf=0;

              $pdf_doc=$doc_indiv->pdf_doc;

              if($pdf_doc){

                $is_pdf=1;

              }

              $large_image = $doc_indiv->large_image;

              $thumbnail = $doc_indiv->thumbnail;

              $description = $doc_indiv->description;
              if(!$description){
                $description='...';

              }
              $doc_category=$doc_indiv->doc_category;


                if($doc_category==3){ // from DB column, 3=> Calling Process

                
                if(!$is_pdf){

                  ?>



              <div class="personal_details_doc_indiv_wrapper">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/calling_photo/'.$large_image )}}" data-fancybox="images" data-caption="<?php echo $description; ?>">
                    <img  src="{{URL::to('/thumbnails/calling_photo/'.$thumbnail)}}" alt="photo" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->


                  <?php

                }else{


                  ?>



              <div class="personal_details_doc_indiv_wrapper">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/calling_photo/'.$pdf_doc )}}" data-fancybox="iframe" data-caption="<?php echo $description; ?>">
                    
                    <img  src="{{URL::to('/assets/img/pdf.png')}}" alt="pdf" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->

                  <?php
                }

                }// end of if($doc_category==3){ // from DB column

              ?>



              <?php


            }// end of foreach loop

          ?>

          </div><!-- end of id personal_details_docs_all-->

          
        </div><!-- end of class user_add_file_indiv  -->
        


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Visa/Stamping Document:</div>

          <!-- <div id="visa_stamping_photo_area" class="edit_photo_area">

            <img src="{{URL::to('/thumbnails/visa_stamping_photo/'.$visa_photo)}}" alt="visa stamping photo" />
            

          </div> --><!-- end of id passport_copy_area-->



  <div id="personal_details_docs_all">
          <?php

            foreach($docs_all as $doc_indiv){

              $is_pdf=0;

              $pdf_doc=$doc_indiv->pdf_doc;

              if($pdf_doc){

                $is_pdf=1;

              }

              $large_image = $doc_indiv->large_image;

              $thumbnail = $doc_indiv->thumbnail;

              $description = $doc_indiv->description;
              if(!$description){
                $description='...';

              }
              $doc_category=$doc_indiv->doc_category;


                if($doc_category==7){ // from DB column

                
                if(!$is_pdf){

                  ?>



              <div class="personal_details_doc_indiv_wrapper">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/visa_stamping_photo/'.$large_image )}}" data-fancybox="images" data-caption="<?php echo $description; ?>">
                    <img  src="{{URL::to('/thumbnails/visa_stamping_photo/'.$thumbnail)}}" alt="photo" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->


                  <?php

                }else{


                  ?>



              <div class="personal_details_doc_indiv_wrapper">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/visa_stamping_photo/'.$pdf_doc )}}" data-fancybox="iframe" data-caption="<?php echo $description; ?>">
                    
                    <img  src="{{URL::to('/assets/img/pdf.png')}}" alt="pdf" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->

                  <?php
                }

                }// end of if($doc_category==7){ // from DB column

              ?>



              <?php


            }// end of foreach loop

          ?>

          </div><!-- end of id personal_details_docs_all-->




          
        </div><!-- end of class user_add_file_indiv  -->
        


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Flight:</div>

<!-- 
           <div id="flight_photo_area" class="edit_photo_area">

            <img src="{{URL::to('/thumbnails/flight_photo/'.$flight_photo)}}" alt="flight photo" />
            

          </div> --><!-- end of id flight_photo_area-->



  <div id="personal_details_docs_all">
          <?php

            foreach($docs_all as $doc_indiv){

              $is_pdf=0;

              $pdf_doc=$doc_indiv->pdf_doc;

              if($pdf_doc){

                $is_pdf=1;

              }

              $large_image = $doc_indiv->large_image;

              $thumbnail = $doc_indiv->thumbnail;

              $description = $doc_indiv->description;
              if(!$description){
                $description='...';

              }
              $doc_category=$doc_indiv->doc_category;


                if($doc_category==4){ // from DB column, 4=> Flight

                
                if(!$is_pdf){

                  ?>



              <div class="personal_details_doc_indiv_wrapper">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/flight_photo/'.$large_image )}}" data-fancybox="images" data-caption="<?php echo $description; ?>">
                    <img  src="{{URL::to('/thumbnails/flight_photo/'.$thumbnail)}}" alt="photo" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->


                  <?php

                }else{


                  ?>



              <div class="personal_details_doc_indiv_wrapper">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/flight_photo/'.$pdf_doc )}}" data-fancybox="iframe" data-caption="<?php echo $description; ?>">
                    
                    <img  src="{{URL::to('/assets/img/pdf.png')}}" alt="pdf" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->

                  <?php
                }

                }// end of if($doc_category==4){ // from DB column

              ?>



              <?php


            }// end of foreach loop

          ?>

          </div><!-- end of id personal_details_docs_all-->  


         
          
        </div><!-- end of class user_add_file_indiv  -->
        
        
        
        @csrf
        <div class="col-12_000 text-end">
          <!-- <button type="submit" class="btn  btn-danger">Add Candidates</button> -->
        </div>
      </form>


<!--/ Bordered Table -->

  </div>
</div>

<?php
  }else{

    ?>

        <h1 class="text-danger text-center mt-5">Wrong place to explore!</h1>

    <?php


  }// end of if gettype $user != string

?>




@endsection

@section('vendor-script')
<style type="text/css">
  .show-personal-details{
     background-color: #009C10;
  }
</style>

<!-- <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"
      integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
      crossorigin="anonymous"
    ></script>
 -->

<script type="text/javascript" src="{{URL::to('/assets/js/form-master/dist/jquery.form.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('/assets/js/jquery-validation-1.19.5/dist/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('/assets/js/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js')}}"></script>



    <script src="{{ asset('assets/js/johnpolacek-imagefill.js-4165b58/js/jquery-imagefill.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded-master/imagesloaded.pkgd.min.js') }}"></script>    

    <!-- @include('js/demo') -->
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
    <!--[if (gte IE 8)&(lt IE 10)]>
      <script src="{{URL::to('/assets/js/jQuery-File-Upload-master/js/cors/jquery.xdr-transport.js')}}"></script>
    <![endif]-->
 

<script type="text/javascript">
  

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
              var input_id=$(input).attr('id');

              // alert("inpout id = "+input_id);
                $('#'+input_id+"_preview").attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }// end of function readUrl
  // prepare the form when the DOM is ready 
$(document).ready(function() { 


    $(".date,#date_of_birth,#passport_expiry_date,#departure_date,#esd_to_reach,#medical_date").datepicker(
                  {
                    format: 'dd-mm-yyyy',
                    autoclose:true
                  
                });

var dob_found='{{$dob}}';
    
    if(dob_found){

      var dob_year='{{$dob_year}}';
      var dob_month='{{$dob_month}}';
      var dob_day= '{{$dob_day}}';
      var dob=new Date(dob_year+'-'+dob_month+'-'+dob_day);
      
      $("#date_of_birth").datepicker('update', dob);

    }

    var passport_expiry_date_found ='<?php echo  $passport_expiry_date; ?>';
    if(passport_expiry_date_found){

      var passport_expiry_date_year='<?php echo $passport_expiry_date_year; ?>';
      var passport_expiry_date_month ='<?php echo $passport_expiry_date_month; ?>';
      var passport_expiry_date_day = '<?php echo $passport_expiry_date_day; ?>';

      var passport_expiry_date = new Date(passport_expiry_date_year+'-'+passport_expiry_date_month+'-'+passport_expiry_date_day);

      $("#passport_expiry_date").datepicker('update', passport_expiry_date);

    }



    var medical_date_found ='<?php echo  $medical_date; ?>';
    if(medical_date_found){

      var medical_date_year='<?php echo $medical_date_year; ?>';
      var medical_date_month ='<?php echo $medical_date_month; ?>';
      var medical_date_day = '<?php echo $medical_date_day; ?>';

      // var medical_date = new Date(medical_date_year, medical_date_month, medical_date_day);
      var medical_date = new Date( medical_date_year+'-'+medical_date_month+'-'+medical_date_day);

      $("#medical_date").datepicker('update', medical_date);

    }

    var departure_date_found ='<?php echo  $departure_date; ?>';
    if(departure_date_found){

      var departure_date_year='<?php echo $departure_date_year; ?>';
      var departure_date_month ='<?php echo $departure_date_month; ?>';
      var departure_date_day = '<?php echo $departure_date_day; ?>';

      // var departure_date = new Date(departure_date_year, departure_date_month, departure_date_day);
      var departure_date = new Date(departure_date_year+'-'+ departure_date_month+'-'+departure_date_day);

      $("#departure_date").datepicker('update', departure_date);

    }

    var esd_to_reach_found ='<?php echo  $esd_to_reach; ?>';
    if(esd_to_reach_found){

      var esd_to_reach_year='<?php echo $esd_to_reach_year; ?>';
      var esd_to_reach_month ='<?php echo $esd_to_reach_month; ?>';
      var esd_to_reach_day = '<?php echo $esd_to_reach_day; ?>';

      // var esd_to_reach = new Date(esd_to_reach_year, esd_to_reach_month, esd_to_reach_day);

      var esd_to_reach =new Date(esd_to_reach_year+'-'+esd_to_reach_month+'-'+esd_to_reach_day);

      $("#esd_to_reach").datepicker('update', esd_to_reach);

    }





    

    $(".preview_upload_indiv,#personal_details_profile_photo").imagefill();
    $(".personal_details_doc_indiv").imagefill();

    $('input[type="file"]').change(function(){

          

    var val = $(this).val();

    switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
        case 'gif': case 'jpg': case 'png':
            readURL(this);
            break;
        default:
            $(this).val('');
            // error message here
            alert("The image file must be of gif, png or jpg type");
            break;
    }

       
    });

  // $("#passport_size_photo_area.,#nid_photo_area,#passport_copy_area").imagefill();
  $(".edit_photo_area").imagefill();
    var options = { 
        target:        '#result',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse,  // post-submit callback 
        error:       showResponse,  // post-submit callback 
 
        // other available options: 
        //url:       url         // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
        //clearForm: true        // clear all form fields after successful submit 
        //resetForm: true        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    }; 
 
    // bind to the form's submit event 
    $('#form-user-add').submit(function() { 

      window.scrollTo(0,0);
        // inside event callbacks 'this' is the DOM element so we first 
        // wrap it in a jQuery object and then invoke ajaxSubmit 
        $(this).ajaxSubmit(options); 
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
    }); 


    
}); 
 
// pre-submit callback 
function showRequest(formData, jqForm, options) { 
    // formData is an array; here we use $.param to convert it to a string to display it 
    // but the form plugin does this for you automatically when it submits the data 
    var queryString = $.param(formData); 
 
    // jqForm is a jQuery object encapsulating the form element.  To access the 
    // DOM element for the form do this: 
    // var formElement = jqForm[0]; 
    window.scrollTo(0,0);
    // alert('About to submit: \n\n' + queryString); 



    $(".invalid-feedback").hide();
    $(".invalid").removeClass("invalid");
    
    // here we could return false to prevent the form from being submitted; 
    // returning anything other than false will allow the form submit to continue 
    return true; 
} 
 
// post-submit callback 
function showResponse(responseText, statusText, xhr, $form)  { 
    // for normal html responses, the first argument to the success callback 
    // is the XMLHttpRequest object's responseText property 
 
    // if the ajaxSubmit method was passed an Options Object with the dataType 
    // property set to 'xml' then the first argument to the success callback 
    // is the XMLHttpRequest object's responseXML property 
 
    // if the ajaxSubmit method was passed an Options Object with the dataType 
    // property set to 'json' then the first argument to the success callback 
    // is the json data object returned by the server 
 
    //alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
      //  '\n\nThe output div should have already been updated with the responseText.'); 

      if(window.console){

        console.log(responseText);

        if(responseText.hasOwnProperty('responseText')){
            console.log(responseText.responseText);
        }

        

      }

      if(responseText.hasOwnProperty('responseText')){
           
            responseText=$.parseJSON( responseText.responseText);

      }
      window.scrollTo(0,0);
      // responseText=$.parseJSON( responseText.responseText);


        

      if(responseText.success==false){

        $("#result").html('<span class="text-danger">Please fix the problems</span>');


         $.each(responseText.errors, function(keyName, keyValue) {
      
         if(window.console){
            console.log(keyName + ': ' + keyValue);
         }   
            if(keyName.trim()=="email".trim()){

                $('#'+keyName+'_error').html(responseText.errors.email).show();
            }else{


            $('#'+keyName+'_error').show();
            $('#'+keyName).addClass('invalid');

          }
      });

      }else{
        $("#result").html('<span class="text-success">Successfully done !</span>');
      }


    if(window.console){

      
      console.log(responseText);
      console.log(responseText.errors);
      console.log( $.type(responseText.errors));

   

   
  }
} 

</script>

 
@endsection
