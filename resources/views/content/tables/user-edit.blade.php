@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Candidates')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{URL::to('/assets/js/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.css')}}"/>

<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="{{URL::to('/assets/js/jQuery-File-Upload-master/css/jquery.fileupload.css')}}" />
<link rel="stylesheet" href="{{URL::to('/assets/js/jQuery-File-Upload-master/css/jquery.fileupload-ui.css')}}" />
<link rel="stylesheet" type="text/css" href="{{URL::to('/assets/js/jquery-upload-file-master/css/uploadfile.css')}}">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript
  ><link rel="stylesheet" href="{{URL::to('/assets/js/jQuery-File-Upload-master/css/jquery.fileupload-noscript.css')}}"
/></noscript>
<noscript
  ><link rel="stylesheet" href="{{URL::to('/assets/js/jQuery-File-Upload-master/css/jquery.fileupload-ui-noscript.css')}}"
/></noscript>
<style type="text/css">
  .fade.in{
       opacity: 1 !important;
  }


  .form-group.required .control-label:after { 
          content: " *";
          color: red;
          vertical-align: middle;
          font-weight: bold;
          font-size: 20px;
}
</style>



@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home -></span>
   Candidates -> Edit Candidates
  
</h4>

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
  $medical_condition="";
  $medical_ok=0;
  $calling_visa_ok=0;
  $flight_ok=0;


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
     $medical_condition = $user->medical_condition;
     $medical_ok = $user->medical_ok;
     $calling_visa_ok= $user->calling_visa_ok;
     $flight_ok = $user->flight_ok;

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




    ?>


<!-- Bordered Table -->
<div class="card">
  <!-- <h5 class="card-header">Bordered Table</h5> -->
  <div class="card-body">
    <div id="result" class="text-center"></div>
      
        <form method="POST" enctype="multipart/form-data" id="form-user-add" action="{{URL::to('/user/update-now')}}"  class="requires-validation g-3" novalidate  >





          <div class="row mb-3">

            <div class="col-sm-4 form-group required">
              <label for="first_name" class="form-label control-label">First Name11</label>
              <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="{{$first_name}}"  required>

              <div class="invalid-feedback" id="first_name_error">
                Please choose a username.
              </div>
              
            </div>



            <div class="col-sm-4">
              <label for="middle_name" class="form-label">Middle Name</label>
              <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="Middle Name" value="{{$middle_name}}" >

              <!-- <div class="invalid-feedback" id="date_of_birth_error">Date of birth is necessary </div> -->
              
            </div>


            <div class="col-sm-4 form-group required">
              <label for="last_name" class="form-label control-label">Last Name</label>
              <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="{{$last_name}}" >

              <div class="invalid-feedback" id="last_name_error">Last name is necessary</div>
              
            </div>

          </div>


          <div class="row mb-3 gy-4">
            
            <div class="col-sm-3">
              <label for="date_of_birth" class="form-label">Date of Birth</label>
              <input type="text" name="date_of_birth" class="form-control" id="date_of_birth" placeholder="Date of Birth" value="" readonly >

              <div class="invalid-feedback" id="date_of_birth_error">
                Date of birth is necessary
                
              </div>
              
            </div>
            


            <div class="col-sm-3">
              <label for="first_lang" class="form-label">First Language</label>
              <input type="text" name="first_lang" class="form-control" id="first_lang" placeholder="First Language" value="{{$first_lang}}" >

              <div class="invalid-feedback" id="first_lang_error">First language is necessary</div>
              
            </div>
            
          </div><!-- end of class row-->


          <div class="row mb-3 gy-4">

            <div class="col-sm-3 ">
              <label for="countryOfCitizenship" class="form-label">Country Of Citizenship</label>
              <!-- <input type="text" name="countryOfCitizenship" id="countryOfCitizenship" class="form-control" placeholder="Country Of Citizenship" value="{{$country_of_citizenship}}"> -->




              <select id="countryOfCitizenship" name="countryOfCitizenship" class="form-control" autocomplete=off >
                <option value="0">Select a  Country</option>

                <?php

                    foreach($countries as $country_indiv){

                      $country_id = $country_indiv->id;

                      ?>

                      <option <?php if($country_id== $country_of_citizenship){echo 'selected="selected"';} ?> value="<?php echo $country_indiv->id; ?>"><?php  echo $country_indiv->en_short_name;  ?></option>


                      <?php



                    }// end of foreach loop

                ?>
              </select>

              <div class="invalid-feedback" id="countryOfCitizenship_error">
                Country of citizenship is necessary
                
              </div>
            </div>


            <div class="col-sm-3 ">
              <label for="nationality" class="form-label">Nnationality</label>
              <!-- <input type="text" name="nationality" id="nationality" class="form-control" placeholder="Nationality" value="{{$nationality}}"> -->


              <select id="nationality" name="nationality" class="form-control" autocomplete=off >
                <option value="0">Select a Nationality</option>
                <?php 

                    foreach($countries as $country_indiv){

                      $country_id = $country_indiv->id;
                      ?>

                      <option <?php if($country_id== $nationality){ echo 'selected="selected"';} ?> value="<?php echo $country_indiv->id; ?>"><?php echo $country_indiv->en_short_name.' ('.$country_indiv->nationality.' )' ; ?></option>



                      <?php



                    }// end of foreach loop



                ?>
              </select>

              <div class="invalid-feedback" id="nationality_error">
                
              </div>
              
            </div>  

            <div class="col-sm-3 form-group required ">
              <label for="passport_no" class="form-label control-label">Passport Number</label>
              <input type="text" name="passport_no" id="passport_no" class="form-control" placeholder="Passport Number" value="{{$passport_no}}">

              <div class="invalid-feedback" id="passport_no_error">
                A unique passport number is necessary
              </div>
              
            </div>


            <div class="col-sm-3">
              <label for="passport_expiry_date" class="form-label">Passport Expiry Date</label>
              <input type="text" name="passport_expiry_date" id="passport_expiry_date" class="form-control" placeholder="Passport Expiry Date" value="" readonly>
              
              <div class="invalid-feedback" id="passport_expiry_date_error">
                Passport expiry date is necessary
              </div>
            </div>
          </div>


        <div class="row mb-3 gy-4">


          <div class="col-sm-3">
              <label for="passport_submission_date" class="form-label">Passport Submission  Date</label>
              <input type="text" name="passport_submission_date" id="passport_submission_date" class="form-control" placeholder="Passport Submission  Date" value="">

              <div class="invalid-feedback" id="nid_number_error">Passport Submission Date is necessary</div>
              
            </div>

            <div class="col-sm-3">
              <label for="nid_number" class="form-label">NID NUmber</label>
              <input type="text" name="nid_number" id="nid_number" class="form-control" placeholder="NID Number" value="{{$nid_number}}">

              <div class="invalid-feedback" id="nid_number_error">NID number is necessary</div>
              
            </div>


            <div class="col-sm-3">

             <label  class="form-label">Marital Status</label>


                <div class="form-check">
                    <input class="form-check-input" type="radio" name="marital_status" id="marital_status_1" 
                    value="<?php echo trim('single');?>"  <?php if($marital_status==trim("single")){ echo 'checked';} ?>>
                    <label class="form-label" for="marital_status">Single</label>
                </div>
                
                <div class="form-check">
                  <input class="form-check-input"  value="<?php echo trim('married');?>" type="radio" name="marital_status" 
                  id="marital_status2" <?php if($marital_status==trim("married")){ echo 'checked';} ?> 
                  value="<?php echo trim('married') ;?>" >
                  <label class="form-label" for="marital_status2">
                  Married
                  </label>
                </div>

                <div class="invalid-feedback" id="marital_status_error">Marital status is necessary</div>


            </div>





            <div class="col-sm-3 form-group required">

             <label  class="form-label control-label">Gender</label>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender1" value="<?php echo trim('male');?>"  <?php if($gender==trim("male")){ echo 'checked';} ?>>
                    <label class="form-label" for="gender1">Male</label>
                </div>
                
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="gender2" value="<?php echo trim('female');?>"  <?php if($gender==trim("female")){ echo 'checked';} ?> >
                  <label class="form-label" for="gender2">
                  Female
                  </label>
                </div>

                <div class="invalid-feedback" id="gender_error">
                  Gender is necessary
                  
                </div>


            </div>
          </div><!-- end of class row-->



        <div class="row mb-3 gy-3">

          <div class="col-sm-4">
            <label for="division"  class="form-label">Division</label>

            <select id="division" name="division" class="form-control" autocomplete=off>
              <option value="">Select a Division</option>
              <?php

                foreach($divisions as $division_indiv){
                  ?>

                  <option value="<?php  echo $division_indiv->id; ?>"><?php echo $division_indiv->name; ?></option>


                  <?php


                }// end of foreach loop


              ?>
            </select>

            <div class="invalid-feedback" id="division_error">Division is necessary</div>
            
          </div>



          <div class="col-sm-4">
            <label for="district"  class="form-label">District</label>

            <select id="district" name="district" class="form-control" autocomplete=off>
              <option value="">Select a District</option>
              
            </select>

            <div class="invalid-feedback" id="district_error">District is necessary</div>
            
          </div>





          <div class="col-sm-4">
            <label for="district"  class="form-label">Thana</label>

            <select id="thana" name="thana" class="form-control" autocomplete=off>
              <option value="">Select a Thana</option>
              
            </select>

            <div class="invalid-feedback" id="thana_error">Thana is necessary</div>
            
          </div>

        
        </div>  


        <div class="row mb-3 gy-3">
          
          <div class="col-sm-2">
            <label for="post_code"  class="form-label">Postal Code</label>

            <input type="text" id="post_code" name="post_code" class="form-control" placeholder="Postal Code" value="" />

            <div class="invalid-feedback" id="post_code_error">Postal Code is necessary</div>
            
          </div>



          <div class="col-sm-2">

            <label for="city" for="city" class="form-label">CITY</label>

            <input type="text" id="city" name="city" class="form-control" placeholder="City/Town" value="{{$city}}"  />
            <div class="invalid-feedback" id="city_error">City is necessary</div>
            
          </div>

          <div class="col-sm-8">
            <label for="address"  class="form-label">ADDRESS</label>

            <input type="text" id="address" name="address" class="form-control" placeholder="Address" value="{{$address}}" />

            <div class="invalid-feedback" id="address_error">Address is necessary</div>
            
          </div>


        </div><!-- end of class row-->
        
        <div class="row mb-3 gy-3">

          <div class="col-sm-4">
            <label for="country"  class="form-label">COUNTRY</label>
            <!-- <input type="text" name="country" id="country" class="form-control" value="{{$country}}" placeholder="Country"> -->


            <select id="country" name="country" class="form-control" autocomplete=off>
              <option value="0">Select a Country</option>
              <?php
                foreach($countries as $country_indiv){

                  $country_id=$country_indiv->id;

                  ?>


                  <option <?php if($country_id== $country){ echo 'selected="selected"';}  ?> value="<?php echo $country_indiv->id; ?>"><?php echo $country_indiv->en_short_name;  ?></option>


                  <?php

                }

              ?>
            </select>
            <div class="invalid-feedback" id="country_error">Country is necessary</div>
          </div>

          <div class="col-sm-4">
            <label class="form-label" for="state_province">STATE/PROVINCE</label>
            <input type="text" name="state_province" class="form-control" id="state_province" value="{{$state_province}}" placeholder="State/Province">

            <div class="invalid-feedback" id="state_province_error">State/province is necessary</div>
            
          </div>



          <div class="col-sm-4">
            <label class="form-label" for="zip">Zip Code</label>
            <input type="text" name="zip" id="zip" class="form-control" value="" placeholder="Zip Code" value="{{$zip}}">
            <div class="invalid-feedback" id="zip_error">ZIP is necessary</div>
          </div>
          
        </div><!-- end of class row -->



        <div class="row  mb-3 gy-3">

          <div class="col-sm-4">
            <label for="email"  class="form-label">EMAIL</label>
            <input type="text" readonly name="email" id="email" class="form-control" value="{{$email}}" placeholder="Email">
            <div class="invalid-feedback" id="email_error">A valid and unique email is necessary</div>
          </div>

          <div class="col-sm-4">
            <label class="form-label" for="phone">PHONE</label>
            <input type="text" name="phone" class="form-control" id="phone" value="" placeholder="Phone">
            <div class="invalid-feedback" id="phone_error">Phone number is necessary</div>
            
          </div>



          <div class="col-sm-4">
                <label for="organization_category"  class="form-label">Organization Category</label>
                <input type="text" name="organization_category" id="organization_category" class="form-control" value="{{$organization_category}}" placeholder="Organization Category">
                <div class="invalid-feedback" id="organization_category_error"></div>
          </div>
          
        </div><!-- end of class row -->





        <div class="row  mb-3 gy-3">

          

          <div class="col-sm-3">
            <label class="form-label" for="company">Company</label>
            <!-- <input type="text" name="company" class="form-control" id="company" value="{{$company}}" placeholder="Company"> -->


            <select class="form-select_000 form-control" name="company" id="company"  autocomplete=off>
                      <option value="" selected>Select a Company</option>
                      <?php

                          foreach($companies as $company_indiv){
                            ?>

                            <option <?php if($company_indiv->id == $company){ echo 'selected="selected"';}  ?> value="<?php echo $company_indiv->id; ?>">
                              <?php echo $company_indiv->company_name;  ?></option>

                            <?php


                          }// end of foreach loop

                      ?>
                </select>
            <div class="invalid-feedback" id="company_error"></div>
            
          </div>



          <div class="col-sm-3">
            <label class="form-label" for="medical_centre">Medical Center</label>
            <input type="text" name="medical_centre" class="form-control" id="medical_centre" value="{{$medical_centre}}" placeholder="Medical Centre">
            <div class="invalid-feedback" id="medical_centre_error"></div>
            
          </div>



          <div class="col-sm-3">
            <label class="form-label" for="medical_date">Medical Date</label>
            <input type="text" name="medical_date" class="form-control" id="medical_date" value="" placeholder="Medical Date" readonly>
            <div class="invalid-feedback" id="medical_date_error"></div>
            
          </div>



            <div class="col-sm-3">

             <label  class="form-label">Medical Condition</label>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="medical_condition" id="medical_condition" value="1" <?php if($medical_condition==1){ echo 'checked'; } ?> >
                    <label class="form-label" for="medical_condition">Fit</label>
                </div>
                
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="medical_condition" id="medical_condition_unfit" value="0"  <?php if($medical_condition==0){ echo 'checked'; } ?>>
                  <label class="form-label" for="marital_status2">
                  Unfit
                  </label>
                </div>

                <div class="invalid-feedback" id="marital_status_error">Marital status is necessary</div>


            </div>

          
        </div><!-- end of class row -->





        <div class="row  mb-3 gy-3">

          

          <div class="col-sm-4">
            <label class="form-label" for="job_designation">Job Designation</label>
            <input type="text" name="job_designation" class="form-control" id="job_designation" value="{{$job_designation}}" placeholder="Job Designation">
            <div class="invalid-feedback" id="job_designation_error"></div>
            
          </div>


          <div class="col-sm-4">
            <label class="form-label" for="departure_date">Departure Date</label>
            <input type="text" name="departure_date" class="form-control" id="departure_date" value="" placeholder="Departure Date" readonly>
            <div class="invalid-feedback" id="departure_date_error"></div>
            
          </div>


          <div class="col-sm-4">
            <label class="form-label" for="esd_to_reach">ESD to reach</label>
            <input type="text" name="esd_to_reach" class="form-control" id="esd_to_reach" value="" placeholder="ESD to Reach" readonly>
            <div class="invalid-feedback" id="esd_to_reach_error"></div>
            
          </div>

        </div>

<!-- 
        <div class="form-check-0000">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
              Checked checkbox
            </label>
        </div> -->

        <div class="row  mb-3 gy-3">

          

          <div class="col-sm-4 form-check_000">
            
            <input type="checkbox" name="medical_formalities_ok" class="form-check-input" id="medical_formalities_ok"  <?php if($medical_ok==1){
              echo 'checked'; } ?> >

            <label class="form-label" for="medical_formalities_ok">Medical Formalities OK</label>
            <div class="invalid-feedback" id="medical_formalities_ok_error"></div>
            
          </div>


          <div class="col-sm-4 form-check_000">
            
            <input type="checkbox" name="calling_visa_ok" class="form-check-input" id="calling_visa_ok" 
              <?php if($calling_visa_ok==1){
              echo 'checked'; } ?> >
            <label class="form-label" for="calling_visa_ok">Calling Visa Ok</label>
            <div class="invalid-feedback" id="calling_visa_ok_error"></div>
            
          </div>


          <div class="col-sm-4 form-check_000">
            
            <input type="checkbox" name="flight_ok" class="form-check-input" id="flight_ok" 
             <?php if($flight_ok==1){echo 'checked'; } ?> >
             
            <label class="form-label" for="flight_ok">Flight OK</label>
            <div class="invalid-feedback" id="flight_ok_error"></div>
            
          </div>

        </div>

  

        <input type="text" value="<?php echo request()->segment(count(request()->segments())) ?>"  name="user_id">


        <div class="mb-4">Documentation</div>
 
        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Passport Size Photo</div>
           
          <div id="user_existing_photo">

            <img src="{{URL::to('/thumbnails/passport_size_photo/'.$user->passport_size_photo)}}" alt="passport size photo" />
            
          </div><!-- end of id user_existing_photo -->

          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="passport_size_photo" name="passport_size_photo">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>

          <div id="passport_size_photo_preview_wrapper">

            <img id="passport_size_photo_preview" src="{{URL::to('/assets/img/preview.jpeg')}}" alt=" " />
            
          </div>
          <b>Preview</b>
          <br/>



<div id="hidden_inputs">
          Passport labels:<input type="text" value="" id="passport_doc_labels" class="user_info_input_category_indiv"  name="passport_doc_labels">
          Passport Doc Names:<input type="text" value="" id="passport_doc_names" class="user_info_input_category_indiv" name="passport_doc_names" />
<br/><br/>
          nid_doc_labels:<input type="text" value="" id="nid_doc_labels" class="user_info_input_category_indiv" name="nid_doc_labels" />
          nid_image_names:<input type="text" value="" id="nid_image_names" class="user_info_input_category_indiv" name="nid_image_names" />
          nid_pdf_names:<input type="text" value="" id="nid_pdf_names" class="user_info_input_category_indiv" name="nid_pdf_names" />
          
<br/><br/>

          passport_copy_labels:<input type="text" value="" id="passport_copy_labels"  class="user_info_input_category_indiv" name="passport_copy_labels" />
          passport_copy_image_names:<input type="text" value="" id="passport_copy_image_names" class="user_info_input_category_indiv" name="passport_copy_image_names" />
          passport_copy_pdf_names:<input type="text" value="" id="passport_copy_pdf_names" class="user_info_input_category_indiv" name="passport_copy_pdf_names" />

<br/><br/>
          medical_doc_labels:<input type="text" value="" id="medical_doc_labels" class="user_info_input_category_indiv" name="medical_doc_labels" />
          medical_image_names:<input type="text" value="" id="medical_image_names" class="user_info_input_category_indiv" name="medical_image_names" />
          medical_pdf_names: <input type="text" value="" id="medical_pdf_names" class="user_info_input_category_indiv" name="medical_pdf_names"> 
  
  

<br/><br/>
          calling_doc_labels:<input type="text" value="" id="calling_doc_labels" class="user_info_input_category_indiv" name="calling_doc_labels" />
          calling_image_names:<input type="text" value="" id="calling_image_names" class="user_info_input_category_indiv" name="calling_image_names" />
          calling_pdf_names: <input type="text" value="" id="calling_pdf_names" class="user_info_input_category_indiv" name="calling_pdf_names"> 
<br/><br/>
          visa_stamping_doc_labels:<input type="text" value="" id="visa_stamping_doc_labels" class="user_info_input_category_indiv" name="visa_stamping_doc_labels" />
          
          visa_stamping_image_names:<input type="text" value="" id="visa_stamping_image_names"  class="user_info_input_category_indiv" name="visa_stamping_image_names" />

          visa_stamping_pdf_names: <input type="text" value="" id="visa_stamping_pdf_names" class="user_info_input_category_indiv" name="visa_stamping_pdf_names"> 
          
<br/><br/>
          flight_doc_labels:<input type="text" value="" id="flight_doc_labels" class="user_info_input_category_indiv" name="flight_doc_labels" />
          flight_image_names:<input type="text" value="" id="flight_image_names" class="user_info_input_category_indiv" name="flight_image_names" />
          flight_pdf_names: <input type="text" value="" id="flight_pdf_names" class="user_info_input_category_indiv" name="flight_pdf_names"> 


        </div>

          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable formats of the photocopy are GIF, JPEG or PNG, Please be advised that the file size limit of the photocopy is 20 MB</small>
          </div><!-- end of class user_add_file_indiv_instruction -->

          <!-- 
           Preview:<br/>
          <div id="preview_passport_size_photo" class="preview_upload_indiv">

            <img id="passport_size_photo_preview" src="{{URL::to('/assets/img/preview.jpeg')}}" alt=" " />
            
          </div> -->


          <!--  <div id="eventsmessage_passport_size_photo" style="border:1px solid #ccc;"></div>

          <div id="fileuploader_passport_size_photo">Upload</div>
          <div id="extrabutton_passport_size_photo" class="ajax-file-upload-green">Start Upload</div>


          <div class="ajax-file-upload-container"></div> -->

          <!-- end of id preview_passport_size_photo -->


          


        </div><!-- end of class user_add_file_indiv  -->
        

   



     

    <!-- endddddddddddddddddd --->


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">NID Copy</div>



         <div id="nid_photo_area" class="edit_photo_area_000_00000">

            <!-- <img onerror="this.onerror=null; this.src='{{URL::to('/assets/img/doc.png')}}'" src="{{URL::to('/thumbnails/nid_photo/'.$nid_photo)}}" alt="nid photo" />
             -->




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
              $doc_category=$doc_indiv->doc_category;


                if($doc_category==2){ // from DB column




                
                if(!$is_pdf){

                  ?>



              <div class="personal_details_doc_indiv_wrapper float-start">

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



              <div class="personal_details_doc_indiv_wrapper float-start">

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

          <div class="clearfix"></div>

          </div><!-- end of id personal_details_docs_all-->


          </div><!-- end of id nid_photo_area-->
<!-- 
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="nid_photo" name="nid_photo" value="">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div> -->
          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable formats of the photocopy are GIF, JPEG or PNG, Please be advised that the file size limit of the photocopy is 20 MB</small>
          </div><!-- end of class user_add_file_indiv_instruction -->


          Preview:<br/>
          <!-- <div id="preview_nid_photo" class="preview_upload_indiv">

            <img id="nid_photo_preview" src="{{URL::to('/assets/img/preview.jpeg')}}" alt=" " />
            
            
          </div>--> <!-- end of id preview_nid_photo  -->

          <div id="eventsmessage_nid" style="border:1px solid #ccc;"></div>

          <div id="fileuploader_nid">Upload</div>
          <div id="extrabutton_nid" class="ajax-file-upload-green">Start Upload</div>


          <div class="ajax-file-upload-container"></div>





          
        </div><!-- end of class user_add_file_indiv  -->








        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Passport Copy</div>

 
          <div id="passport_copy_area" class="edit_photo_area_000_0000">

            <!-- <img onerror="this.onerror=null; this.src='{{URL::to('/assets/img/doc.png')}}'" src="{{URL::to('/thumbnails/passport_copy/'.$passport_photo)}}" alt="passport size photo" /> -->





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
              $doc_category=$doc_indiv->doc_category;


                if($doc_category==6){ // from DB column




                
                if(!$is_pdf){

                  ?>



              <div class="personal_details_doc_indiv_wrapper float-start">

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



              <div class="personal_details_doc_indiv_wrapper float-start">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/passport_copy/'.$pdf_doc )}}" data-fancybox="iframe" data-caption="<?php echo $description; ?>">
                    
                    <img  src="{{URL::to('/assets/img/pdf.png')}}" alt="pdf" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->

                  <?php
                }

                }// end of if($doc_category==6){ // from DB column 6=> passport copy

              ?>



              <?php


            }// end of foreach loop

          ?>

          <div class="clearfix"></div>

          </div><!-- end of id personal_details_docs_all-->
            

          </div> 

<!-- 
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="passport_copy" name="passport_copy" value="">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div> -->

          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable formats of the photocopy are GIF, JPEG or PNG, Please be advised that the file size limit of the photocopy is 20 MB</small>
          </div><!-- end of class user_add_file_indiv_instruction -->

<!-- 
           Preview:<br/>
          <div id="preview_passport_copy" class="preview_upload_indiv">

            <img id="passport_copy_preview" src="{{URL::to('/assets/img/preview.jpeg')}}" alt=" " />
            
            
          </div> -->




          <div id="eventsmessage_passport_copy" style="border:1px solid #ccc;"></div>

          <div id="fileuploader_passport_copy">Upload</div>
          <div id="extrabutton_passport_copy" class="ajax-file-upload-green">Start Upload</div>


          <div class="ajax-file-upload-container"></div>





          <!-- end of id preview_passport_copy -->
          


          
        </div><!-- end of class user_add_file_indiv  -->
        


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Medical Docs</div> 

          <div id="vaccine_photo_area" class="edit_photo_area_000">

            <!-- <img onerror="this.onerror=null; this.src='{{URL::to('/assets/img/doc.png')}}'" src="{{URL::to('/thumbnails/medical_photo/'.$medical_photo)}}" alt="medical photo" /> -->



            


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
              $doc_category=$doc_indiv->doc_category;


                if($doc_category==5){ // from DB column 5=> Medical Photo




                
                if(!$is_pdf){

                  ?>



              <div class="personal_details_doc_indiv_wrapper float-start">

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



              <div class="personal_details_doc_indiv_wrapper float-start">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/medical_photo/'.$pdf_doc )}}" data-fancybox="iframe" data-caption="<?php echo $description; ?>">
                    
                    <img  src="{{URL::to('/assets/img/pdf.png')}}" alt="pdf" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->

                  <?php
                }

                }// end of if($doc_category==5){ // from DB column 5=>Medical photo

              ?>



              <?php


            }// end of foreach loop

          ?>

          <div class="clearfix"></div>

          </div><!-- end of id personal_details_docs_all-->


          </div><!-- end of id vaccine_photo-->

        
<!-- 
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="vaccine_photo" name="vaccine_photo">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div> -->

          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable formats of the photocopy are GIF, JPEG or PNG, Please be advised that the file size limit of the photocopy is 20 MB</small>
          </div><!-- end of class user_add_file_indiv_instruction -->


          <div id="eventsmessage_medical_doc" style="border:1px solid #ccc;"></div>

          
          <div id="fileuploader_medical_doc">Upload</div>
          <div id="extrabutton_medical_doc" class="ajax-file-upload-green">Start Upload</div>


          <div class="ajax-file-upload-container"></div>

          <!-- 
          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable size is 35mm x 45mm. Formats are JPG or PNG</small>
          </div>--><!-- end of class user_add_file_indiv_instruction -->

          <!--
           Preview:<br/>
          <div id="preview_vaccine_photo" class="preview_upload_indiv">

            <img id="vaccine_photo_preview" src="{{URL::to('/assets/img/preview.jpeg')}}" alt=" " />
          
          </div> -->



          <!-- end of id preview_vaccine_photo -->

          
        </div><!-- end of class user_add_file_indiv  -->
        


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Calling Process Document</div>

          <div id="passport_copy_area" class="edit_photo_area_000">

            <!-- <img onerror="this.onerror=null; this.src='{{URL::to('/assets/img/doc.png')}}'" src="{{URL::to('/thumbnails/calling_photo/'.$calling_photo)}}" alt="calling photo" /> -->
            


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
              $doc_category=$doc_indiv->doc_category;


                if($doc_category==3){ // from DB column 3=> Medical Photo




                
                if(!$is_pdf){

                  ?>



              <div class="personal_details_doc_indiv_wrapper float-start">

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



              <div class="personal_details_doc_indiv_wrapper float-start">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/calling_photo/'.$pdf_doc )}}" data-fancybox="iframe" data-caption="<?php echo $description; ?>">
                    
                    <img  src="{{URL::to('/assets/img/pdf.png')}}" alt="pdf" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->

                  <?php
                }

                }// end of if($doc_category==3){ // from DB column 3=>Medical photo

              ?>



              <?php


            }// end of foreach loop

          ?>

          <div class="clearfix"></div>

          </div><!-- end of id personal_details_docs_all-->

          </div><!-- end of id passport_copy_area-->


          <!-- <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="calling_photo" name="calling_photo">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small > Formats are JPG or PNG</small>
          </div> --><!-- end of class user_add_file_indiv_instruction -->



          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable formats of the photocopy are GIF, JPEG or PNG, Please be advised that the file size limit of the photocopy is 20 MB</small>
          </div><!-- end of class user_add_file_indiv_instruction -->

          <div id="eventsmessage_calling" style="border:1px solid #ccc;"></div>

          <div id="fileuploader_calling_doc">Upload Calling Process Docs</div>
          <div id="extrabutton_calling_doc" class="ajax-file-upload-green">Start Upload</div>


          <div class="ajax-file-upload-container"></div>
                   
          
           <!-- Preview:<br/>
          <div id="preview_calling_photo" class="preview_upload_indiv">

            <img id="calling_photo_preview" src="{{URL::to('/assets/img/preview.jpeg')}}" alt=" " />
            
            
          </div> --><!-- end of id preview_calling_photo -->



          
          
        </div><!-- end of class user_add_file_indiv  -->
        


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Visa/Stamping Document</div>

          <div id="visa_stamping_photo_area" class="edit_photo_area_000">

            <!-- <img  onerror="this.onerror=null; this.src='{{URL::to('/assets/img/doc.png')}}'" src="{{URL::to('/thumbnails/visa_stamping_photo/'.$visa_photo)}}" alt="visa stamping photo" /> -->
            


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
              $doc_category=$doc_indiv->doc_category;


                if($doc_category==7){ // from DB column 7=> Medical Photo




                
                if(!$is_pdf){

                  ?>



              <div class="personal_details_doc_indiv_wrapper float-start">

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



              <div class="personal_details_doc_indiv_wrapper float-start">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/visa_stamping_photo/'.$pdf_doc )}}" data-fancybox="iframe" data-caption="<?php echo $description; ?>">
                    
                    <img  src="{{URL::to('/assets/img/pdf.png')}}" alt="pdf" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->

                  <?php
                }

                }// end of if($doc_category==7){ // from DB column 7=>Medical photo

              ?>



              <?php


            }// end of foreach loop

          ?>

          <div class="clearfix"></div>

          </div><!-- end of id personal_details_docs_all-->

          </div><!-- end of id passport_copy_area-->


<!-- 
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="visa_stamping_photo" name="visa_stamping_photo">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small > Formats are JPG or PNG</small>
          </div> -->
          <!-- end of class user_add_file_indiv_instruction -->

<!-- 
         Preview:<br/>
          <div id="preview_visa_stamping_photo" class="preview_upload_indiv">

            <img  onerror="this.onerror=null; this.src='{{URL::to('/assets/img/doc.png')}}'" id="visa_stamping_photo_preview" src="{{URL::to('/assets/img/preview.jpeg')}}" alt=" " />
            
            
          </div> -->



          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable formats of the photocopy are GIF, JPEG or PNG, Please be advised that the file size limit of the photocopy is 20 MB</small>
          </div><!-- end of class user_add_file_indiv_instruction -->



          <div id="eventsmessage_visa_stamping" style="border:1px solid #ccc;"></div>

          <div id="fileuploader_visa_stamping_doc">Upload Calling Process Docs</div>
          <div id="extrabutton_visa_stamping_doc" class="ajax-file-upload-green">Start Upload</div>


          <div class="ajax-file-upload-container"></div>


          <!-- end of id preview_vaccine_photo -->





          
        </div><!-- end of class user_add_file_indiv  -->
        


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Flight</div>


           <div id="flight_photo_area" class="edit_photo_area_000">

            <!-- <img  onerror="this.onerror=null; this.src='{{URL::to('/assets/img/doc.png')}}'" src="{{URL::to('/thumbnails/flight_photo/'.$flight_photo)}}" alt="flight photo" /> -->



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
              $doc_category=$doc_indiv->doc_category;


                if($doc_category==4){ // from DB column 4=> Medical Photo




                
                if(!$is_pdf){

                  ?>



              <div class="personal_details_doc_indiv_wrapper float-start">

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



              <div class="personal_details_doc_indiv_wrapper float-start">

                <div class="personal_details_doc_indiv">


                  <a href="{{URL::to('/uploads/flight_photo/'.$pdf_doc )}}" data-fancybox="iframe" data-caption="<?php echo $description; ?>">
                    
                    <img  src="{{URL::to('/assets/img/pdf.png')}}" alt="pdf" />
                    
                </a>
                  
                </div><!-- end of class personal_details_doc_indiv -->

                <div class="description text-center">{{$description}}</div>
                
              </div><!--end of class personal_details_doc_indiv_wrapper -->

                  <?php
                }

                }// end of if($doc_category==4){ // from DB column 4=>Medical photo

              ?>



              <?php


            }// end of foreach loop

          ?>

          <div class="clearfix"></div>

          </div><!-- end of id personal_details_docs_all-->
            

          </div><!-- end of id flight_photo_area-->


<!--           <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="flight_photo" name="flight_photo">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small > Formats are JPG or PNG</small>
          </div> --><!-- end of class user_add_file_indiv_instruction -->



          <!--  Preview:<br/>
          <div id="preview_flight_photo" class="preview_upload_indiv">

            <img id="flight_photo_preview" src="{{URL::to('/assets/img/preview.jpeg')}}" alt=" " />
            
            
          </div> --><!-- end of id preview_vaccine_photo -->



        <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable formats of the photocopy are GIF, JPEG or PNG, Please be advised that the file size limit of the photocopy is 20 MB</small>
          </div><!-- end of class user_add_file_indiv_instruction -->
          
          <div id="eventsmessage_flight" style="border:1px solid #ccc;"></div>

          <div id="fileuploader_flight_doc">Upload Calling Process Docs</div>
          <div id="extrabutton_flight_doc" class="ajax-file-upload-green">Start Upload</div>


          <div class="ajax-file-upload-container"></div>
          
        </div><!-- end of class user_add_file_indiv  -->
        
        
        
        @csrf
        <div class="col-12_000 text-start">
          <button type="submit" class="btn  btn-danger">Edit the Candidate</button>
        </div>
      </form>


<!--/ Bordered Table -->

  </div>
</div>

<?php
  }// end of if gettype $user == string

?>




@endsection

@section('vendor-script')


<script type="text/javascript" src="{{URL::to('/assets/js/form-master/dist/jquery.form.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('/assets/js/jquery-validation-1.19.5/dist/jquery.validate.min.js')}}"></script>

<script type="text/javascript" src="{{URL::to('/assets/js/jquery-upload-file-master/js/jquery.uploadfile.min.js')}}"></script>

<script type="text/javascript" src="{{URL::to('/assets/js/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js')}}"></script>


 <!-- The main application script -->

    <script src="{{ asset('assets/js/johnpolacek-imagefill.js-4165b58/js/jquery-imagefill.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded-master/imagesloaded.pkgd.min.js') }}"></script>    

    <!-- @include('js/demo') -->
 

<script type="text/javascript">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    upload_counter=0;


    passport_size_photo_doc_thumbnails_all=[];
    passport_size_photo_doc_large_images_all=[];
    passport_size_photo_doc_pdfs_all=[];
    passport_size_photo_doc_labels_all=[];


    nid_doc_thumbnails_all=[];
    nid_doc_large_images_all=[];
    nid_doc_pdfs_all=[];
    nid_doc_labels_all=[];

    passport_copy_doc_labels_all=[]
    passport_copy_doc_thumbnails_all=[];
    passport_copy_doc_large_images_all=[];
    passport_copy_doc_pdfs_all=[];


    medical_doc_labels_all=[]
    medical_doc_thumbnails_all=[];
    medical_doc_large_images_all=[];
    medical_doc_pdfs_all=[];

    calling_doc_labels_all=[]
    calling_doc_thumbnails_all=[];
    calling_doc_large_images_all=[];
    calling_doc_pdfs_all=[];


    visa_stamping_doc_labels_all=[]
    visa_stamping_doc_thumbnails_all=[];
    visa_stamping_doc_large_images_all=[];
    visa_stamping_doc_pdfs_all=[];


    flight_doc_labels_all=[]
    flight_doc_thumbnails_all=[];
    flight_doc_large_images_all=[];
    flight_doc_pdfs_all=[];


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
              var input_id=$(input).attr('id');

              // alert("inpout id = "+input_id);
                //$('#'+input_id+"_preview").attr('src', e.target.result);

                $("#passport_size_photo_preview").attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);
        }
    }// end of function readUrl




  // prepare the form when the DOM is ready 
$(document).ready(function() { 

    $(".date,#date_of_birth,#passport_expiry_date,#departure_date,#esd_to_reach,#medical_date,#passport_submission_date").datepicker(
                  {
                    format: 'dd-mm-yyyy',
                    autoclose:true
                  
                });

$("#division").val('').change();

$("#agent,#country,#nationality,#countryOfCitizenship,#division,#district,#thana").select2();

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



    $("#division").change(function(){

        $("#thana").find('option').not(':first').remove();
        var $division = $(this);

        var division_id = $division.val().trim();

        $.ajax({
            method:"POST",
            url:"{{URL::to('/fetch_districts_accordingly')}}",
            data:{'division_id':division_id},
            success: function(data, status, xhr){
              var options='';
              data_parsed= $.parseJSON(data);
              if(window.console){
                console.log(data_parsed);

              }
              for( var  i=0; i<data_parsed.length; i++){
                var data_indiv= data_parsed[i];
                var data_id=data_indiv.id;
                var data_name=data_indiv.name;

                options+='<option value="'+data_id+'">'+data_name+'</option>';


              }//end of foreach

              if(window.console){

                console.log(options);

              }

              $("#district").find('option').not(':first').remove();
              $("#district").append(options).fadeOut(1000).fadeIn(9999999);

            },
            error: function(jqXhr, textStatus, errorMessage){

            }

        });



    });// end of division change 




    $("#district").change(function(){

        var $district = $(this);

        var district_id = $district.val().trim();

        $.ajax({
            method:"POST",
            url:"{{URL::to('/fetch_thanas_accordingly')}}",
            data:{'district_id':district_id},
            success: function(data, status, xhr){
              var options='';
              data_parsed= $.parseJSON(data);
              if(window.console){
                console.log(data_parsed);

              }
              for( var  i=0; i<data_parsed.length; i++){
                var data_indiv= data_parsed[i];
                var data_id=data_indiv.id;
                var data_name=data_indiv.name;

                options+='<option value="'+data_id+'">'+data_name+'</option>';


              }//end of foreach

              if(window.console){

                console.log(options);

              }

              $("#thana").find('option').not(':first').remove();
              $("#thana").append(options).fadeOut(1000).fadeIn(9999999);

            },
            error: function(jqXhr, textStatus, errorMessage){

            }

        });



    });// end of district change 




    var dob_found='{{$dob}}';
    
    if(dob_found){

      var dob_year='{{$dob_year}}';
      var dob_month='{{$dob_month}}';
      var dob_day= '{{$dob_day}}';
      var dob=new Date(dob_year+'-'+dob_month+'-'+dob_day);
      
      $("#date_of_birth").datepicker('update', dob);

    }

    // $(".user_info_input_category_indiv").hide();

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



    // $(".edit_photo_area_000").imagefill();
    $("#user_existing_photo").imagefill();
    $(".preview_upload_indiv").imagefill();
    $(".personal_details_doc_indiv").imagefill();
    $("#passport_size_photo_preview_wrapper").imagefill();

    

     // $('input[type="file"]').change(function(){
      $("#passport_size_photo").change(function(){

          readURL(this);
/*
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
          }*/

       
    });

  /*$("#date_of_birth,#passport_expiry_date,#departure_date,#esd_to_reach,#medical_date").datepicker({  dateFormat: "dd-mm-yy" });*/




  // $("#passport_size_photo_area.,#nid_photo_area,#passport_copy_area").imagefill();
  $(".edit_photo_area").imagefill();


/***************************Passport size photo  startsss***********************************************/

/*
var extraObj_passport_size_photo = $("#fileuploader_passport_size_photo").uploadFile({
        url:'{{URL::to("/doc/upload_now")}}',
        fileName:"files",

        sequential:true,
        sequentialCount:1,


        allowedTypes:"jpg,jpeg,png,gif,pdf",
        showPreview:true,
        previewHeight: "50px",
        previewWidth: "50px",

        dragDrop: false,
        returnType: "json",maxFileSize:20*1024*1024,
        showDelete: true,
        showDownload:false,
        statusBarWidth:600,
        dragdropWidth:600,

        multiple:false,
        dragDrop:false,
        maxFileCount:1,

        deleteCallback: function (data, pd) {
            for (var i = 0; i < data.length; i++) {
                $.post("delete.php", {op: "delete",name: data[i]},
                    function (resp,textStatus, jqXHR) {
                        //Show Message  
                        alert("File Deleted");
                    });
            }
            pd.statusbar.hide(); //You choice.

        },
        downloadCallback:function(filename,pd)
          {
            location.href="download.php?filename="+filename;
          },


          extraHTML:function()
          {     
                ++upload_counter;
              var html="<div><input type='text' name='description' class='passport_size_photo_desc' placeholder='Description' />";
              html += "<input type='text' name='doc_index' value='"+upload_counter+"'  /><input type='text' value='passport_size_photo' name='doc_type' /></div>";
              return html;        
          },
          autoSubmit:false,


          onSuccess:function(files,data,xhr,pd)
          {


            var description_found = data.description;
            var thumbnail_found = data.thumbnail_image;
            var large_image_found = data.large_image;
            var pdf_doc_found = data.pdf_doc;


            passport_size_photo_doc_labels_all.push(description_found);
            passport_size_photo_doc_thumbnails_all.push(thumbnail_found);
            passport_size_photo_doc_large_images_all.push(large_image_found);
            passport_size_photo_doc_pdfs_all.push(pdf_doc_found);


            $("#passport_size_photo_doc_labels").val(JSON.stringify(passport_size_photo_doc_labels_all));

            $("#passport_size_photo_image_names").val(JSON.stringify(passport_size_photo_doc_large_images_all));

            $("#passport_size_photo_pdf_names").val(JSON.stringify(passport_size_photo_doc_pdfs_all));




            if(window.console){

              console.log(" data found =    ");

              console.log(data);

              console.log(data.description);

            }
            $("#eventsmessage_passport_size_photo").html($("#eventsmessage_passport_size_photo").html()+"<br/>Success for: "+JSON.stringify(data));

            $(".passport_size_photo_desc").attr('readonly',true);


            
          },
          onError: function(files,status,errMsg,pd)
          {
            $("#eventsmessage_passport_size_photo").html($("#eventsmessage_passport_size_photo").html()+"<br/>Error for: "+JSON.stringify(files));
          },




      });


      $("#extrabutton_passport_size_photo").click(function()
        {

          extraObj_passport_size_photo.startUpload();
        });

*/

/***************************Passport size photo  endsss***********************************************/

/***************************NID copy  startsss***********************************************/
var extraObj_nid = $("#fileuploader_nid").uploadFile({
        url:'{{URL::to("/doc/upload_now")}}',
        fileName:"files",

        sequential:true,
        sequentialCount:1,


        allowedTypes:"jpg,jpeg,png,gif,pdf",
        showPreview:true,
        previewHeight: "50px",
        previewWidth: "50px",

        dragDrop: false,
        returnType: "json",maxFileSize:20*1024*1024,
        showDelete: true,
        showDownload:false,
        statusBarWidth:600,
        dragdropWidth:600,
        deleteCallback: function (data, pd) {

            /*
            for (var i = 0; i < data.length; i++) {
                $.post("delete.php", {op: "delete",name: data[i]},
                    function (resp,textStatus, jqXHR) {
                        //Show Message  
                        alert("File Deleted");
                    });
            }
            pd.statusbar.hide(); //You choice.

            */

            if(window.console){

              console.log("");

              console.log(data);

            }



            var description_found = data.description;
            var thumbnail_found = data.thumbnail_image;
            var large_image_found = data.large_image;
            var pdf_doc_found = data.pdf_doc;

            if(pdf_doc_found!= null){

              var index_found=nid_doc_pdfs_all.indexOf(pdf_doc_found);
              nid_doc_pdfs_all.indexof

              nid_doc_pdfs_all.splice(index_found,1);

              nid_doc_labels_all.splice(index_found,1);

              nid_doc_thumbnails_all.splice(index_found,1);

              nid_doc_large_images_all.splice(index_found,1);


            }else{


              var index_found=nid_doc_large_images_all.indexOf(large_image_found);

              nid_doc_pdfs_all.splice(index_found,1);

              nid_doc_labels_all.splice(index_found,1);

              nid_doc_thumbnails_all.splice(index_found,1);

              nid_doc_large_images_all.splice(index_found,1);



            }


            



            $("#nid_doc_labels").val('').val(JSON.stringify(nid_doc_labels_all));

            $("#nid_image_names").val('').val(JSON.stringify(nid_doc_large_images_all));

            $("#nid_pdf_names").val('').val(JSON.stringify(nid_doc_pdfs_all));


            


            



        },
        downloadCallback:function(filename,pd)
          {
            location.href="download.php?filename="+filename;
          },


          extraHTML:function()
          {     
                ++upload_counter;
              /*  var html = "<div><b>File Tags:</b><input type='text' name='tags' value='' class='doc_label_"+upload_counter+"' /> <br/>";
              html += "<b>Category</b>:<select name='category'><option value='1'>ONE</option><option value='2'>TWO</option></select>";
              */
              var html="<div><input type='text' name='description' class='nid_desc' placeholder='Description' />";
              html += "<input type='text' name='doc_index' value='"+upload_counter+"'  /><input type='text' value='nid_photo' name='doc_type' /></div>";
              return html;        
          },
          autoSubmit:false,


          onSuccess:function(files,data,xhr,pd)
          {


            var description_found = data.description;
            var thumbnail_found = data.thumbnail_image;
            var large_image_found = data.large_image;
            var pdf_doc_found = data.pdf_doc;


            nid_doc_labels_all.push(description_found);
            nid_doc_thumbnails_all.push(thumbnail_found);
            nid_doc_large_images_all.push(large_image_found);
            nid_doc_pdfs_all.push(pdf_doc_found);


            $("#nid_doc_labels").val(JSON.stringify(nid_doc_labels_all));

            $("#nid_image_names").val(JSON.stringify(nid_doc_large_images_all));

            $("#nid_pdf_names").val(JSON.stringify(nid_doc_pdfs_all));




            if(window.console){

              console.log(" data found =    ");

              console.log(data);

              console.log(data.description);

            }
            // $("#eventsmessage_nid").html($("#eventsmessage_nid").html()+"<br/>Success for: "+JSON.stringify(data));

            $(".nid_desc").attr('readonly',true);


            
          },
          onError: function(files,status,errMsg,pd)
          {
            $("#eventsmessage_nid").html($("#eventsmessage_nid").html()+"<br/>Error for: "+JSON.stringify(files));
          },




      });


      $("#extrabutton_nid").click(function()
        {

          extraObj_nid.startUpload();
        });



/***************************NID copy endsss ***********************************************/


/******************Passport Copy beginsss*******************/
var extraObj_passport_copy = $("#fileuploader_passport_copy").uploadFile({
        url:'{{URL::to("/doc/upload_now")}}',
        fileName:"files",

        sequential:true,
        sequentialCount:1,


        allowedTypes:"jpg,jpeg,png,gif,pdf",
        showPreview:true,
        previewHeight: "50px",
        previewWidth: "50px",

        dragDrop: false,
        returnType: "json",maxFileSize:20*1024*1024,
        showDelete: true,
        showDownload:false,
        statusBarWidth:600,
        dragdropWidth:600,
        deleteCallback: function (data, pd) {


          /*
            for (var i = 0; i < data.length; i++) {
                $.post("delete.php", {op: "delete",name: data[i]},
                    function (resp,textStatus, jqXHR) {
                        //Show Message  
                        alert("File Deleted");
                    });
            }
            pd.statusbar.hide(); //You choice.

            */





            var description_found = data.description;
            var thumbnail_found = data.thumbnail_image;
            var large_image_found = data.large_image;
            var pdf_doc_found = data.pdf_doc;

            if(pdf_doc_found!= null){

              var index_found=passport_copy_doc_pdfs_all.indexOf(pdf_doc_found);
              

              passport_copy_doc_pdfs_all.splice(index_found,1);

              passport_copy_doc_labels_all.splice(index_found,1);

              passport_copy_doc_thumbnails_all.splice(index_found,1);

              passport_copy_doc_large_images_all.splice(index_found,1);


            }else{


              var index_found=passport_copy_doc_large_images_all.indexOf(large_image_found);

              passport_copy_doc_pdfs_all.splice(index_found,1);

              passport_copy_doc_labels_all.splice(index_found,1);

              passport_copy_doc_thumbnails_all.splice(index_found,1);

              passport_copy_doc_large_images_all.splice(index_found,1);



            }


            



            $("#passport_copy_labels").val('').val(JSON.stringify(passport_copy_doc_labels_all));

            $("#passport_copy_image_names").val('').val(JSON.stringify(passport_copy_doc_large_images_all));

            $("#passport_copy_pdf_names").val('').val(JSON.stringify(passport_copy_doc_pdfs_all));


            


        },
        downloadCallback:function(filename,pd)
          {
            location.href="download.php?filename="+filename;
          },


          extraHTML:function()
          {     
                ++upload_counter;
              /*  var html = "<div><b>File Tags:</b><input type='text' name='tags' value='' class='doc_label_"+upload_counter+"' /> <br/>";
              html += "<b>Category</b>:<select name='category'><option value='1'>ONE</option><option value='2'>TWO</option></select>";
              */
              var html="<div><input type='text' name='description' class='passport_copy_desc' placeholder='Description' />";
              html += "<input type='text' name='doc_index' value='"+upload_counter+"'  /><input type='text' value='passport_copy' name='doc_type' /></div>";
              return html;        
          },
          autoSubmit:false,


          onSuccess:function(files,data,xhr,pd)
          {


            var description_found = data.description;
            var thumbnail_found = data.thumbnail_image;
            var large_image_found = data.large_image;
            var pdf_doc_found = data.pdf_doc;


            passport_copy_doc_labels_all.push(description_found);
            passport_copy_doc_thumbnails_all.push(thumbnail_found);
            passport_copy_doc_large_images_all.push(large_image_found);
            passport_copy_doc_pdfs_all.push(pdf_doc_found);


            $("#passport_copy_labels").val(JSON.stringify(passport_copy_doc_labels_all));

            $("#passport_copy_image_names").val(JSON.stringify(passport_copy_doc_large_images_all));

            $("#passport_copy_pdf_names").val(JSON.stringify(passport_copy_doc_pdfs_all));




            if(window.console){

              console.log(" data found =    ");

              console.log(data);

              console.log(data.description);

            }
            /*
            $("#eventsmessage_passport_copy").html($("#eventsmessage_passport_copy").html()+"<br/>Success for: "+JSON.stringify(data));
*/
            $(".passport_copy_desc").attr('readonly',true);


            
          },
          onError: function(files,status,errMsg,pd)
          {
            $("#eventsmessage_passport_copy").html($("#eventsmessage_passport_copy").html()+"<br/>Error for: "+JSON.stringify(files));
          },




      });


      $("#extrabutton_passport_copy").click(function()
        {

          extraObj_passport_copy.startUpload();
        });


/******************Passport Copy endssss**********************************/
/******************Medical Doc startssss*********************************************/


var extraObj_medical_doc = $("#fileuploader_medical_doc").uploadFile({
        url:'{{URL::to("/doc/upload_now")}}',
        fileName:"files",

        sequential:true,
        sequentialCount:1,


        allowedTypes:"jpg,jpeg,png,gif,pdf",
        showPreview:true,
        previewHeight: "50px",
        previewWidth: "50px",

        dragDrop: false,
        returnType: "json",maxFileSize:20*1024*1024,
        showDelete: true,
        showDownload:false,
        statusBarWidth:600,
        dragdropWidth:600,
        deleteCallback: function (data, pd) {

          /*   
               for (var i = 0; i < data.length; i++) {
                $.post("delete.php", {op: "delete",name: data[i]},
                    function (resp,textStatus, jqXHR) {
                        //Show Message  
                        alert("File Deleted");
                    });
            }
            pd.statusbar.hide(); //You choice.


          */


          


            var description_found = data.description;
            var thumbnail_found = data.thumbnail_image;
            var large_image_found = data.large_image;
            var pdf_doc_found = data.pdf_doc;

            if(pdf_doc_found!= null){

              var index_found=medical_doc_pdfs_all.indexOf(pdf_doc_found);
              

              medical_doc_pdfs_all.splice(index_found,1);

              medical_doc_labels_all.splice(index_found,1);

              medical_doc_thumbnails_all.splice(index_found,1);

              medical_doc_large_images_all.splice(index_found,1);


            }else{


              var index_found=medical_doc_large_images_all.indexOf(large_image_found);

              medical_doc_pdfs_all.splice(index_found,1);

              medical_doc_labels_all.splice(index_found,1);

              medical_doc_thumbnails_all.splice(index_found,1);

              medical_doc_large_images_all.splice(index_found,1);



            }


            



            $("#medical_doc_labels").val('').val(JSON.stringify(medical_doc_labels_all));

            $("#medical_image_names").val('').val(JSON.stringify(medical_doc_large_images_all));

            $("#medical_pdf_names").val('').val(JSON.stringify(medical_doc_pdfs_all));

          
        },
        downloadCallback:function(filename,pd)
          {
            location.href="download.php?filename="+filename;
          },


          extraHTML:function()
          {     
                ++upload_counter;
              /*  var html = "<div><b>File Tags:</b><input type='text' name='tags' value='' class='doc_label_"+upload_counter+"' /> <br/>";
              html += "<b>Category</b>:<select name='category'><option value='1'>ONE</option><option value='2'>TWO</option></select>";
              */
              var html="<div><input type='text' name='description' class='medical_doc_desc' placeholder='Description' />";
              html += "<input type='text' name='doc_index' value='"+upload_counter+"'  /><input type='text' value='medical_photo' name='doc_type' /></div>";
              return html;        
          },
          autoSubmit:false,


          onSuccess:function(files,data,xhr,pd)
          {


            var description_found = data.description;
            var thumbnail_found = data.thumbnail_image;
            var large_image_found = data.large_image;
            var pdf_doc_found = data.pdf_doc;


            medical_doc_labels_all.push(description_found);
            medical_doc_thumbnails_all.push(thumbnail_found);
            medical_doc_large_images_all.push(large_image_found);
            medical_doc_pdfs_all.push(pdf_doc_found);


            $("#medical_doc_labels").val(JSON.stringify(medical_doc_labels_all));

            $("#medical_image_names").val(JSON.stringify(medical_doc_large_images_all));

            $("#medical_pdf_names").val(JSON.stringify(medical_doc_pdfs_all));




            if(window.console){

              console.log(" data found =    ");

              console.log(data);

              console.log(data.description);

            }

            /*$("#eventsmessage_medical_doc").html($("#eventsmessage_medical_doc").html()+"<br/>Success for: "+JSON.stringify(data));
*/
            $(".medical_doc_desc").attr('readonly',true);


            
          },
          onError: function(files,status,errMsg,pd)
          {
            $("#eventsmessage_medical_doc").html($("#eventsmessage_medical_doc").html()+"<br/>Error for: "+JSON.stringify(files));
          },




      });


      $("#extrabutton_medical_doc").click(function()
        {

          

          extraObj_medical_doc.startUpload();
        });


/******************Medical DOc Endssss*************************************************/

/******************Calling Process Doc startssss***************************************/
    
var extraObj_calling_doc = $("#fileuploader_calling_doc").uploadFile({
        url:'{{URL::to("/doc/upload_now")}}',
        fileName:"files",

        sequential:true,
        sequentialCount:1,


        allowedTypes:"jpg,jpeg,png,gif,pdf",
        showPreview:true,
        previewHeight: "50px",
        previewWidth: "50px",

        dragDrop: false,
        returnType: "json",maxFileSize:20*1024*1024,
        showDelete: true,
        showDownload:false,
        statusBarWidth:600,
        dragdropWidth:600,
        deleteCallback: function (data, pd) {

          /*
            for (var i = 0; i < data.length; i++) {
                $.post("delete.php", {op: "delete",name: data[i]},
                    function (resp,textStatus, jqXHR) {
                        //Show Message  
                        alert("File Deleted");
                    });
            }
            pd.statusbar.hide(); //You choice.

            */



                        var description_found = data.description;
            var thumbnail_found = data.thumbnail_image;
            var large_image_found = data.large_image;
            var pdf_doc_found = data.pdf_doc;

            if(pdf_doc_found!= null){

              var index_found=calling_doc_pdfs_all.indexOf(pdf_doc_found);
              

              calling_doc_pdfs_all.splice(index_found,1);

              calling_doc_labels_all.splice(index_found,1);

              calling_doc_thumbnails_all.splice(index_found,1);

              calling_doc_large_images_all.splice(index_found,1);


            }else{


              var index_found=calling_doc_large_images_all.indexOf(large_image_found);

              calling_doc_pdfs_all.splice(index_found,1);

              calling_doc_labels_all.splice(index_found,1);

              calling_doc_thumbnails_all.splice(index_found,1);

              calling_doc_large_images_all.splice(index_found,1);



            }


            



            $("#calling_doc_labels").val('').val(JSON.stringify(calling_doc_labels_all));

            $("#calling_image_names").val('').val(JSON.stringify(calling_doc_large_images_all));

            $("#calling_pdf_names").val('').val(JSON.stringify(calling_doc_pdfs_all));



        },
        downloadCallback:function(filename,pd)
          {
            location.href="download.php?filename="+filename;
          },


          extraHTML:function()
          {     
                ++upload_counter;
              /*  var html = "<div><b>File Tags:</b><input type='text' name='tags' value='' class='doc_label_"+upload_counter+"' /> <br/>";
              html += "<b>Category</b>:<select name='category'><option value='1'>ONE</option><option value='2'>TWO</option></select>";
              */
              var html="<div><input type='text' name='description' class='calling_doc_desc' placeholder='Description' />";
              html += "<input type='text' name='doc_index' value='"+upload_counter+"'  /><input type='text' value='calling_photo' name='doc_type' /></div>";
              return html;        
          },
          autoSubmit:false,


          onSuccess:function(files,data,xhr,pd)
          {


            var description_found = data.description;
            var thumbnail_found = data.thumbnail_image;
            var large_image_found = data.large_image;
            var pdf_doc_found = data.pdf_doc;


            calling_doc_labels_all.push(description_found);
            calling_doc_thumbnails_all.push(thumbnail_found);
            calling_doc_large_images_all.push(large_image_found);
            calling_doc_pdfs_all.push(pdf_doc_found);


            $("#calling_doc_labels").val(JSON.stringify(calling_doc_labels_all));

            $("#calling_image_names").val(JSON.stringify(calling_doc_large_images_all));

            $("#calling_pdf_names").val(JSON.stringify(calling_doc_pdfs_all));




            if(window.console){

              console.log(" data found =    ");

              console.log(data);

              console.log(data.description);

            }

            /*$("#eventsmessage_calling_doc").html($("#eventsmessage_calling_doc").html()+"<br/>Success for: "+JSON.stringify(data));
*/
            $(".calling_doc_desc").attr('readonly',true);


            
          },
          onError: function(files,status,errMsg,pd)
          {
            $("#eventsmessage_calling_doc").html($("#eventsmessage_calling_doc").html()+"<br/>Error for: "+JSON.stringify(files));
          },




      });


      $("#extrabutton_calling_doc").click(function()
        {

          extraObj_calling_doc.startUpload();
        });



/******************Calling process doc endssss *************************************************/
/******************Visa/Stamping doc startsss***************************************************/
  
      var extraObj_visa_stamping_doc = $("#fileuploader_visa_stamping_doc").uploadFile({
        url:'{{URL::to("/doc/upload_now")}}',
        fileName:"files",

        sequential:true,
        sequentialCount:1,


        allowedTypes:"jpg,jpeg,png,gif,pdf",
        showPreview:true,
        previewHeight: "50px",
        previewWidth: "50px",

        dragDrop: false,
        returnType: "json",maxFileSize:20*1024*1024,
        showDelete: true,
        showDownload:false,
        statusBarWidth:600,
        dragdropWidth:600,
        deleteCallback: function (data, pd) {

            /*
            for (var i = 0; i < data.length; i++) {
                $.post("delete.php", {op: "delete",name: data[i]},
                    function (resp,textStatus, jqXHR) {
                        //Show Message  
                        alert("File Deleted");
                    });
            }
            pd.statusbar.hide(); //You choice.

            */



          


            var description_found = data.description;
            var thumbnail_found = data.thumbnail_image;
            var large_image_found = data.large_image;
            var pdf_doc_found = data.pdf_doc;

            if(pdf_doc_found!= null){

              var index_found=visa_stamping_doc_pdfs_all.indexOf(pdf_doc_found);
              

              visa_stamping_doc_pdfs_all.splice(index_found,1);

              visa_stamping_doc_labels_all.splice(index_found,1);

              visa_stamping_doc_thumbnails_all.splice(index_found,1);

              visa_stamping_doc_large_images_all.splice(index_found,1);


            }else{


              var index_found=visa_stamping_doc_large_images_all.indexOf(large_image_found);

              visa_stamping_doc_pdfs_all.splice(index_found,1);

              visa_stamping_doc_labels_all.splice(index_found,1);

              visa_stamping_doc_thumbnails_all.splice(index_found,1);

              visa_stamping_doc_large_images_all.splice(index_found,1);



            }


            



            $("#visa_stamping_doc_labels").val('').val(JSON.stringify(visa_stamping_doc_labels_all));

            $("#visa_stamping_image_names").val('').val(JSON.stringify(visa_stamping_doc_large_images_all));

            $("#visa_stamping_pdf_names").val('').val(JSON.stringify(visa_stamping_doc_pdfs_all));

          
          


          
          

        },
        downloadCallback:function(filename,pd)
          {
            location.href="download.php?filename="+filename;
          },


          extraHTML:function()
          {     
                ++upload_counter;
              /*  var html = "<div><b>File Tags:</b><input type='text' name='tags' value='' class='doc_label_"+upload_counter+"' /> <br/>";
              html += "<b>Category</b>:<select name='category'><option value='1'>ONE</option><option value='2'>TWO</option></select>";
              */
              var html="<div><input type='text' name='description' class='visa_stamping_doc_desc' placeholder='Description' />";
              html += "<input type='text' name='doc_index' value='"+upload_counter+"'  /><input type='text' value='visa_stamping_photo' name='doc_type' /></div>";
              return html;        
          },
          autoSubmit:false,


          onSuccess:function(files,data,xhr,pd)
          {


            var description_found = data.description;
            var thumbnail_found = data.thumbnail_image;
            var large_image_found = data.large_image;
            var pdf_doc_found = data.pdf_doc;


            visa_stamping_doc_labels_all.push(description_found);
            visa_stamping_doc_thumbnails_all.push(thumbnail_found);
            visa_stamping_doc_large_images_all.push(large_image_found);
            visa_stamping_doc_pdfs_all.push(pdf_doc_found);


            $("#visa_stamping_doc_labels").val(JSON.stringify(visa_stamping_doc_labels_all));

            $("#visa_stamping_image_names").val(JSON.stringify(visa_stamping_doc_large_images_all));

            $("#visa_stamping_pdf_names").val(JSON.stringify(visa_stamping_doc_pdfs_all));




            if(window.console){

              console.log(" data found =    ");

              console.log(data);

              console.log(data.description);

            }

            /*$("#eventsmessage_visa_stamping_doc").html($("#eventsmessage_visa_stamping_doc").html()+"<br/>Success for: "+JSON.stringify(data));
*/
            $(".visa_stamping_doc_desc").attr('readonly',true);


            
          },
          onError: function(files,status,errMsg,pd)
          {
            $("#eventsmessage_visa_stamping_doc").html($("#eventsmessage_visa_stamping_doc").html()+"<br/>Error for: "+JSON.stringify(files));
          },




      });


      $("#extrabutton_visa_stamping_doc").click(function()
        {

          extraObj_visa_stamping_doc.startUpload();
        });



/******************Visa/Stamping doc endssss ***************************************************/


/******************Flight doc startssssss********************************************************/

        var extraObj_flight_doc = $("#fileuploader_flight_doc").uploadFile({
        url:'{{URL::to("/doc/upload_now")}}',
        fileName:"files",

        sequential:true,
        sequentialCount:1,


        // allowedTypes:"jpg,jpeg,png,gif,pdf",
        allowedTypes:"jpg,jpeg,png,gif,pdf",
        showPreview:true,
        previewHeight: "50px",
        previewWidth: "50px",

        dragDrop: false,
        returnType: "json",maxFileSize:20*1024*1024,
        showDelete: true,
        showDownload:false,
        statusBarWidth:600,
        dragdropWidth:600,
        deleteCallback: function (data, pd) {

          /*
          if(window.console){

            console.log(" data ======");
            console.log(data);

            console.log("pd====");
            console.log(pd);

          }
            for (var i = 0; i < data.length; i++) {
                $.post("delete.php", {op: "delete",name: data[i]},
                    function (resp,textStatus, jqXHR) {
                        //Show Message  
                        alert("File Deleted");
                    });
            }
            pd.statusbar.hide(); //You choice.

            */




          


            var description_found = data.description;
            var thumbnail_found = data.thumbnail_image;
            var large_image_found = data.large_image;
            var pdf_doc_found = data.pdf_doc;

            if(pdf_doc_found!= null){

              var index_found=flight_doc_pdfs_all.indexOf(pdf_doc_found);
              

              flight_doc_pdfs_all.splice(index_found,1);

              flight_doc_labels_all.splice(index_found,1);

              flight_doc_thumbnails_all.splice(index_found,1);

              flight_doc_large_images_all.splice(index_found,1);


            }else{


              var index_found=flight_doc_large_images_all.indexOf(large_image_found);

              flight_doc_pdfs_all.splice(index_found,1);

              flight_doc_labels_all.splice(index_found,1);

              flight_doc_thumbnails_all.splice(index_found,1);

              flight_doc_large_images_all.splice(index_found,1);



            }


            



            $("#flight_doc_labels").val('').val(JSON.stringify(flight_doc_labels_all));

            $("#flight_image_names").val('').val(JSON.stringify(flight_doc_large_images_all));

            $("#flight_pdf_names").val('').val(JSON.stringify(flight_doc_pdfs_all));

          

          

        },
        downloadCallback:function(filename,pd)
          {
            location.href="download.php?filename="+filename;
          },


          extraHTML:function()
          {     
                ++upload_counter;
              /*  var html = "<div><b>File Tags:</b><input type='text' name='tags' value='' class='doc_label_"+upload_counter+"' /> <br/>";
              html += "<b>Category</b>:<select name='category'><option value='1'>ONE</option><option value='2'>TWO</option></select>";
              */
              var html="<div><input type='text' name='description' class='flight_doc_desc' placeholder='Description' />";
              html += "<input type='text' name='doc_index' value='"+upload_counter+"'  /><input type='text' value='flight_photo' name='doc_type' /></div>";
              return html;        
          },
          autoSubmit:false,


          onSuccess:function(files,data,xhr,pd)
          {


            var description_found = data.description;
            var thumbnail_found = data.thumbnail_image;
            var large_image_found = data.large_image;
            var pdf_doc_found = data.pdf_doc;


            flight_doc_labels_all.push(description_found);
            flight_doc_thumbnails_all.push(thumbnail_found);
            flight_doc_large_images_all.push(large_image_found);
            flight_doc_pdfs_all.push(pdf_doc_found);


            $("#flight_doc_labels").val(JSON.stringify(flight_doc_labels_all));

            $("#flight_image_names").val(JSON.stringify(flight_doc_large_images_all));

            $("#flight_pdf_names").val(JSON.stringify(flight_doc_pdfs_all));




            if(window.console){

              console.log(" data found =    ");

              console.log(data);

              console.log(data.description);

            }

            /*$("#eventsmessage_flight_doc").html($("#eventsmessage_flight_doc").html()+"<br/>Success for: "+JSON.stringify(data));
*/
            $(".flight_doc_desc").attr('readonly',true);


            
          },
          onError: function(files,status,errMsg,pd)
          {
            $("#eventsmessage_flight_doc").html($("#eventsmessage_flight_doc").html()+"<br/>Error for: "+JSON.stringify(files));
          },




      });


      $("#extrabutton_flight_doc").click(function()
        {

          extraObj_flight_doc.startUpload();
        });




/******************Flight doc endsss***************************************************************/
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
      $("#result").html('<span class="text-success">Please wait...</span>')
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

    $("#result").html('<span class="wait">Please wait...</span>');

     setTimeout(function () {
            window.scrollTo(0, 0);
        },200);
    
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

      $(".user_info_input_category_indiv").val('');

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


        /* $.each(responseText.errors, function(keyName, keyValue) {
      
         if(window.console){
            console.log(keyName + ': ' + keyValue);
         }   
            if(keyName.trim()=="email".trim()){

                $('#'+keyName+'_error').html(responseText.errors.email).show();
            }else{


            $('#'+keyName+'_error').show();
            $('#'+keyName).addClass('invalid');

          }
      });*/



      // responseText=$.parseJSON( responseText.responseText);

      if(window.console){
        console.log(responseText.errors);
        console.log( $.type(responseText.errors));
      }

      $.each(responseText.errors, function(keyName, keyValue) {
      
            console.log(keyName + ': ' + keyValue);
            $('#'+keyName+'_error').show();
            $('#'+keyName).addClass('invalid');
      });




      }else{

         setTimeout(function () {
            window.scrollTo(0, 0);
        },200);

         if(responseText.success==true){

            $("#result").html('<span class="text-success">Successfully done !</span>');  
            
         }
        
      }


    if(window.console){

      
      console.log(responseText);
      console.log(responseText.errors);
      console.log( $.type(responseText.errors));

   

   
  }
} 

</script>

 
@endsection
