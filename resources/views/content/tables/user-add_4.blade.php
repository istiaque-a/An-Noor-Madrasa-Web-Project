@extends('layouts/contentNavbarLayout')

@section('title', 'Add Candidates')

@section('page-style')

    <!-- <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous"
    /> -->

<!-- blueimp Gallery styles -->
    <!-- <link
      rel="stylesheet"
      href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css"
    /> -->

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

      
    </style>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home -></span>
   Candidates -> Add Candidates
  
</h4>

<div id="above_table_info_area" class="mb-2">

</div><!-- end of id above_table_info_area -->



<div class="row" id="latest_candidates_area">
  



</div><!-- end of id latest_candidates_area-->


<!-- Bordered Table -->
<div class="card">
  <!-- <h5 class="card-header">Bordered Table</h5> -->
  <div class="card-body">
    <div id="result" class="text-center"></div>
      
        <form method="POST" enctype="multipart/form-data" id="form-user-add" action="{{URL::to('/user/add-now')}}"  class="requires-validation g-3" novalidate  >





          <div class="row mb-3">

            <div class="col-sm-4 form-group required">
              <label for="first_name" class="form-label control-label">First Name</label>
              <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value=""  required>

              <div class="invalid-feedback" id="first_name_error">
                First name is necessary.
              </div>
              
            </div>



            <div class="col-sm-4">
              <label for="middle_name" class="form-label">Middle Name</label>
              <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="Middle Name" value="" >

              <!-- <div class="invalid-feedback" id="date_of_birth_error">Date of birth is necessary </div> -->
              
            </div>


            <div class="col-sm-4 form-group required">
              <label for="last_name" class="form-label control-label">Last Name</label>
              <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="" >

              <div class="invalid-feedback" id="last_name_error">Last name is necessary</div>
              
            </div>

          </div>


          <div class="row mb-3 gy-4">

            <div class="col-sm-3 form-group required">
              <label for="date_of_birth" class="form-label control-label">Date of Birth</label>
              <input type="text" name="date_of_birth" class="form-control" id="date_of_birth" placeholder="Date of Birth" value=""  readonly>

              <div class="invalid-feedback" id="date_of_birth_error">
                Date of birth is necessary
                
              </div>
              
            </div>
            


            <div class="col-sm-3">
              <label for="first_lang" class="form-label">First Language</label>
              <input type="text" name="first_lang" class="form-control" id="first_lang" placeholder="First Language" value="" >

              <div class="invalid-feedback" id="first_lang_error">First language is necessary</div>
              
            </div>
            
          </div><!-- end of class row-->


          <div class="row mb-3 gy-4">

            <div class="col-sm-3 ">
              <label for="countryOfCitizenship" class="form-label">Country Of Citizenship</label>
              <!-- <input type="text" name="countryOfCitizenship" id="countryOfCitizenship" class="form-control" placeholder="Country Of Citizenship" value=""> -->

              <select id="countryOfCitizenship" name="countryOfCitizenship" class="form-control" autocomplete=off>
                <option value="0">Select a  Country</option>

                <?php

                    foreach($countries as $country_indiv){

                      ?>

                      <option value="<?php echo $country_indiv->id; ?>"><?php  echo $country_indiv->en_short_name;  ?></option>


                      <?php



                    }// end of foreach loop

                ?>
              </select>

              <div class="invalid-feedback" id="countryOfCitizenship_error">
                Country of citizenship is necessary
                
              </div>
            </div>


            <div class="col-sm-3 ">
              <label for="nationality" class="form-label">Nationality</label>
              <!-- <input type="text" name="nationality" id="nationality" class="form-control" placeholder="Nationality" value=""> -->

              <select id="nationality" name="nationality" class="form-control" autocomplete=off>
                <option value="0">Select a Nationality</option>
                <?php 

                    foreach($countries as $country_indiv){
                      ?>

                      <option value="<?php echo $country_indiv->id; ?>"><?php echo $country_indiv->en_short_name.' ('.$country_indiv->nationality.' )' ; ?></option>



                      <?php



                    }// end of foreach loop



                ?>
              </select>

              <div class="invalid-feedback" id="nationality_error">
                
              </div>
              
            </div>  

            <div class="col-sm-3 form-group required">
              <label for="passport_no" class="form-label control-label">Passport Number</label>
              <input type="text" name="passport_no" id="passport_no" class="form-control" placeholder="Passport Number" value="">

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
              <label for="passport_submission_date" class="form-label">Passport Receiving  Date</label>
              <input type="text" name="passport_submission_date" id="passport_submission_date" class="form-control" placeholder="Passport Submission  Date" value="" readonly>

              <div class="invalid-feedback" id="nid_number_error">Passport Receive Date is necessary</div>
              
            </div>



            <div class="col-sm-3">
              <label for="nid_number" class="form-label">NID NUmber</label>
              <input type="text" name="nid_number" id="nid_number" class="form-control" placeholder="NID Number" value="">

              <div class="invalid-feedback" id="nid_number_error">NID number is necessary</div>
              
            </div>


            <div class="col-sm-3">

             <label  class="form-label">Marital Status</label>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="marital_status" id="marital_status_1" value="<?php echo trim('single');?>" >
                    <label class="form-label" for="marital_status">Single</label>
                </div>
                
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="marital_status" id="marital_status2" value="<?php echo trim('married') ;?>" >
                  <label class="form-label" for="marital_status2">
                  Married
                  </label>
                </div>

                <div class="invalid-feedback" id="marital_status_error">Marital status is necessary</div>


            </div>





            <div class="col-sm-3 form-group required">

             <label  class="form-label control-label ">Gender</label>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender1" value="male">
                    <label class="form-label" for="gender1">Male</label>
                </div>
                
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="gender2" value="female" >
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

            <input type="text" id="city" name="city" class="form-control" placeholder="City/Town" value=""  />
            <div class="invalid-feedback" id="city_error">City is necessary</div>
            
          </div>
          
          <div class="col-sm-8">
            <label for="address"  class="form-label">ADDRESS</label>

            <input type="text" id="address" name="address" class="form-control" placeholder="Address" value="" />

            <div class="invalid-feedback" id="address_error">Address is necessary</div>
            
          </div>

          

        </div><!-- end of class row-->
        
        <div class="row mb-3 gy-3">

          <div class="col-sm-3">
            <label for="country"  class="form-label">DESTINATION COUNTRY</label>
            <!-- <input type="text" name="country" id="country" class="form-control" value="" placeholder="Country"> -->
            <select id="country" name="country" class="form-control" autocomplete=off>
              <option value="0">Select a Country</option>
              <?php
                foreach($countries as $country_indiv){

                  ?>


                  <option value="<?php echo $country_indiv->id; ?>"><?php echo $country_indiv->en_short_name;  ?></option>


                  <?php

                }

              ?>
            </select>
            <div class="invalid-feedback" id="country_error">Country is necessary</div>
          </div>

          <div class="col-sm-2">
            <label class="form-label" for="state_province">STATE/PROVINCE</label>
            <input type="text" name="state_province" class="form-control" id="state_province" value="" placeholder="State/Province">

            <div class="invalid-feedback" id="state_province_error">State/province is necessary</div>
            
          </div>



          <div class="col-sm-2">
            <label class="form-label" for="zip">Zip Code</label>
            <input type="text" name="zip" id="zip" class="form-control" value="" placeholder="Zip Code" value="">
            <div class="invalid-feedback" id="zip_error">ZIP is necessary</div>
          </div>


          <div class="col-sm-5">
            <label for="email"  class="form-label">EMAIL</label>
            <input type="text" name="email" id="email" class="form-control" value="" placeholder="Email">
            <div class="invalid-feedback" id="email_error">A valid and unique email is necessary</div>
          </div>
          
        </div><!-- end of class row -->



          <div class="row  mb-3 gy-3">

          

          <div class="col-sm-3">
            <label class="form-label" for="phone">Candidate's PHONE</label>
            <input type="text" name="phone" class="form-control" id="phone" value="" placeholder="Phone">
            <div class="invalid-feedback" id="phone_error">Phone number is necessary</div>
            
          </div>



        <div class="col-sm-3">
            <label class="form-label" for="guardian_phone">Guardian's PHONE</label>
            <input type="text" name="guardian_phone" class="form-control" id="guardian_phone" value="" placeholder="Guardian's Phone">
            <div class="invalid-feedback" id="guardian_phone_error">Guardian's phone number is necessary</div>
            
        </div>          





        <div class="col-sm-3">
            <label class="form-label" for="spouse_sibling_phone">Spouse / Sibling's PHONE</label>
            <input type="text" name="spouse_sibling_phone" class="form-control" id="spouse_sibling_phone" 
            value="" placeholder="Spouse / Sibling's Phone">
            <div class="invalid-feedback" id="spouse_sibling_phone_error">Spouse/Sibling's phone number is necessary</div>
            
        </div>          




        <div class="col-sm-3">
            <label class="form-label" for="overseas_phone">overseas PHONE</label>
            <input type="text" name="overseas_phone" class="form-control" id="overseas_phone" value="" placeholder="Overseas Phone">
            <div class="invalid-feedback" id="overseas_phone_error">Overseas phone number is necessary</div>
            
        </div>          


        </div><!-- end of class row -->

        <div class="row  mb-3 gy-3">

          

          <!-- <div class="col-sm-4">
            <label class="form-label" for="phone">PHONE</label>
            <input type="text" name="phone" class="form-control" id="phone" value="" placeholder="Phone">
            <div class="invalid-feedback" id="phone_error">Phone number is necessary</div>
            
          </div>
 -->


        </div><!-- end of class row -->





        <div class="row  mb-3 gy-3">

          

          <div class="col-sm-3">
            <label class="form-label" for="company">Company</label>
            <!-- <input type="text" name="company" class="form-control" id="company" value="" placeholder="Company"> -->


            <select class="form-select_000 form-control" name="company" id="company"  autocomplete=off>
                      <option value="" selected>Select a Company</option>
                      <?php

                          foreach($companies as $company_indiv){
                            ?>

                            <option value="<?php echo $company_indiv->id; ?>">
                              <?php echo $company_indiv->company_name;  ?> (<?php echo $company_indiv->company_type; ?>)</option>

                            <?php


                          }// end of foreach loop

                      ?>
                </select>
            <div class="invalid-feedback" id="company_error"></div>
            
          </div>




          <div class="col-sm-2">
                <label for="organization_category"  class="form-label">Organization Category</label>
                <input type="text" name="organization_category" id="organization_category" class="form-control" value="" placeholder="Organization Category">
                <div class="invalid-feedback" id="organization_category_error"></div>
          </div>
          



          <div class="col-sm-2">
            <label class="form-label" for="medical_centre">Medical Center</label>
            <input type="text" name="medical_centre" class="form-control" id="medical_centre" value="" placeholder="Medical Centre">
            <div class="invalid-feedback" id="medical_centre_error"></div>
            
          </div>



          <div class="col-sm-2">
            <label class="form-label" for="medical_date">Medical Date</label>
            <input type="text" name="medical_date" class="form-control" id="medical_date" value="" placeholder="Medical Date" readonly>
            <div class="invalid-feedback" id="medical_date_error"></div>
            
          </div>


          <div class="col-sm-2">

             <label  class="form-label">Medical Condition</label>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="medical_condition" id="medical_condition" value="1" >
                    <label class="form-label" for="medical_condition">Fit</label>
                </div>
                
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="medical_condition" id="medical_condition_unfit" value="0" >
                  <label class="form-label" for="marital_status2">
                  Unfit
                  </label>
                </div>


                <div class="form-check">
                  <input class="form-check-input" type="radio" name="medical_condition" id="medical_condition_unfit" value=""  checked>
                  <label class="form-label" for="marital_status2">
                  UnKnown
                  </label>
                </div>

                <div class="invalid-feedback" id="marital_status_error">Marital status is necessary</div>


            </div>

          
        </div><!-- end of class row -->





        <div class="row  mb-3 gy-3">

          

          <div class="col-sm-4">
            <label class="form-label" for="job_designation">Job Designation</label>
            <input type="text" name="job_designation" class="form-control" id="job_designation" value="" placeholder="Job Designation">
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








        
        <div class="row  mb-3 gy-3">

          

          <div class="col-sm-4 form-check_000">
            
            <input type="checkbox" name="medical_formalities_ok" class="form-check-input" id="medical_formalities_ok"  >

            <label class="form-label" for="medical_formalities_ok">Medical Formalities OK</label>
            <div class="invalid-feedback" id="medical_formalities_ok_error"></div>
            
          </div>


          <div class="col-sm-4 form-check_000">
            
            <input type="checkbox" name="calling_visa_ok" class="form-check-input" id="calling_visa_ok" 
             >
            <label class="form-label" for="calling_visa_ok">Calling Visa Ok</label>
            <div class="invalid-feedback" id="calling_visa_ok_error"></div>
            
          </div>


          <div class="col-sm-4 form-check_000">
            
            <input type="checkbox" name="flight_ok" class="form-check-input" id="flight_ok"  >
            <label class="form-label" for="flight_ok">Flight OK</label>
            <div class="invalid-feedback" id="flight_ok_error"></div>
            
          </div>

        </div>



        <div class="row  mb-3 gy-3">

          <div class="col-sm-3">

             <label  class="form-label">Approach</label>

                <div class="form-check">
                    <input class="form-check-input approach_mode" type="radio" name="approach_mode" id="approach_mode_direct" checked value="1" >
                    <label class="form-label" for="approach_mode_direct">Direct</label>
                </div>
                
                <div class="form-check">
                  <input class="form-check-input approach_mode" type="radio" name="approach_mode" id="approach_mode_via_agent" value="2" >
                  <label class="form-label" for="approach_mode_via_agent">
                  Via Agent
                  </label>
                </div>

                <div class="invalid-feedback" id="marital_status_error">Marital status is necessary</div>


            </div>



            <div class="col-sm-3">

             <label  class="form-label">Agents</label>

                <select class="form-select_000 form-control" name="agent" id="agent" disabled autocomplete=off>
                      <option value="" selected>Select an Agent</option>
                      <?php

                          foreach($agents as $agent_indiv){
                            ?>

                            <option value="<?php echo $agent_indiv->id; ?>">
                              <?php echo $agent_indiv->first_name.' '.$agent_indiv->middle_name.' '.$agent_indiv->last_name;  ?></option>

                            <?php


                          }// end of foreach loop

                      ?>
                </select>
                
                
                <div class="invalid-feedback" id="marital_status_error">Agent  is necessary</div>


            </div>




            

        </div>




        <div class="mb-4">Documentation</div>
 
        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Passport Size Photo</div>

          
          

          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="passport_size_photo" name="passport_size_photo">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>

          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable formats of the photocopy are GIF,JPEG or PNG, Please be advised that the file size limit of the photocopy is 20 MB</small>
          </div><!-- end of class user_add_file_indiv_instruction -->

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

          passport_copy_labels:<input type="text" value="" id="passport_copy_labels" class="user_info_input_category_indiv" name="passport_copy_labels" />
          passport_copy_image_names:<input type="text" value="" id="passport_copy_image_names"  class="user_info_input_category_indiv" name="passport_copy_image_names" />
          passport_copy_pdf_names:<input type="text" value="" id="passport_copy_pdf_names" class="user_info_input_category_indiv" name="passport_copy_pdf_names" />

<br/><br/>
          medical_doc_labels:<input type="text" value="" id="medical_doc_labels" class="user_info_input_category_indiv" name="medical_doc_labels" />
          medical_image_names:<input type="text" value="" id="medical_image_names" class="user_info_input_category_indiv" name="medical_image_names" />
          medical_pdf_names: <input type="text" value="" id="medical_pdf_names" class="user_info_input_category_indiv" name="medical_pdf_names"> 
  

        </div><!-- end of id hidden_inputs -->






        </div><!-- end of class user_add_file_indiv  -->
        

        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">NID Copy</div>

          <div id="eventsmessage" style="border:1px solid #ccc;"></div>

          
          <div id="fileuploader">Upload</div>
          <div id="extrabutton" class="ajax-file-upload-green">Start Upload</div>


          <div class="ajax-file-upload-container"></div>

          <!-- <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div> -->
          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable formats of the photocopy are GIF,JPG, PNG or PDF. Please be advised that the file size limit of the photocopy is 20 MB</small>
          </div><!-- end of class user_add_file_indiv_instruction -->
          
        </div><!-- end of class user_add_file_indiv  -->




        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Passport Copy</div>

          <div id="eventsmessage_passport_copy" style="border:1px solid #ccc;"></div>

          
          <div id="fileuploader_passport_copy">Upload Passport Copy</div>
          <div id="extrabutton_passport_copy" class="ajax-file-upload-green">Start Upload</div>


          <div class="ajax-file-upload-container"></div>


          <!-- <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div> -->
          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable formats of the photocopy are GIF,JPG, PNG or PDF. Please be advised that the file size limit of the photocopy is 20 MB</small>
          </div><!-- end of class user_add_file_indiv_instruction -->
          
        </div><!-- end of class user_add_file_indiv  -->




          <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Medical Certificate</div>


          <div id="eventsmessage_medical_doc" style="border:1px solid #ccc;"></div>

          
          <div id="fileuploader_medical_doc">Upload Medical Docs</div>
          <div id="extrabutton_medical_doc" class="ajax-file-upload-green">Start Upload</div>


          <div class="ajax-file-upload-container"></div>

<!--           <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
 -->          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable formats of the photocopy are GIF,JPG, PNG or PDF. Please be advised that the file size limit of the photocopy is 20 MB</small>
          </div><!-- end of class user_add_file_indiv_instruction -->
          
        </div><!-- end of class user_add_file_indiv  -->







        
        @csrf
        <div class="col-12_000 text-end">
          <button type="submit" class="btn  btn-danger">Add Candidates</button>
        </div>
      </form>


<!--/ Bordered Table -->

  </div>
</div>




@endsection

@section('vendor-script')

<!-- <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"
      integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
      crossorigin="anonymous"
    ></script>
 -->

<script type="text/javascript" src="{{URL::to('/assets/js/form-master/dist/jquery.form.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('/assets/js/jquery-validation-1.19.5/dist/jquery.validate.min.js')}}"></script>

    
<script type="text/javascript" src="{{URL::to('/assets/js/jquery-upload-file-master/js/jquery.uploadfile.min.js')}}"></script>

<script type="text/javascript" src="{{URL::to('/assets/js/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js')}}"></script>

 

<script type="text/javascript">

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});  

upload_counter=0;
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
    $("#agent,#country,#nationality,#countryOfCitizenship,#division,#district,#thana,#company").select2();

    $(".approach_mode").click(function(){

        var $approach_mode= $(this);

        var approach_mode_found=$approach_mode.val();

        if(approach_mode_found==1){

          $("#agent").attr('disabled', true);

        }else if(approach_mode_found==2){
              
              $("#agent").removeAttr('disabled');


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





$("#passport_size_photo_preview_wrapper").imagefill();

  $("#passport_size_photo").change(function(){

          readURL(this);
       
    });

      var extraObj = $("#fileuploader").uploadFile({
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
        showDownload:true,
        statusBarWidth:600,
        dragdropWidth:600,
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
            
            // $("#eventsmessage").html($("#eventsmessage").html()+"<br/>Success for: "+JSON.stringify(data));

            $(".nid_desc").attr('readonly',true);


            
          },
          onError: function(files,status,errMsg,pd)
          {
            $("#eventsmessage").html($("#eventsmessage").html()+"<br/>Error for: "+JSON.stringify(files));
          },




      });


      $("#extrabutton").click(function()
        {

          extraObj.startUpload();
        });








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
        showDownload:true,
        statusBarWidth:600,
        dragdropWidth:600,
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

            // $("#eventsmessage_passport_copy").html($("#eventsmessage_passport_copy").html()+"<br/>Success for: "+JSON.stringify(data));

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
        showDownload:true,
        statusBarWidth:600,
        dragdropWidth:600,
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
              /*  var html = "<div><b>File Tags:</b><input type='text' name='tags' value='' class='doc_label_"+upload_counter+"' /> <br/>";
              html += "<b>Category</b>:<select name='category'><option value='1'>ONE</option><option value='2'>TWO</option></select>";
              */
              var html="<div><input type='text' name='description' class='medical_desc' placeholder='Description' />";
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
            $(".medical_desc").attr('readonly', true);


            
          },
          onError: function(files,status,errMsg,pd)
          {
            $("#eventsmessage_passport_copy").html($("#eventsmessage_passport_copy").html()+"<br/>Error for: "+JSON.stringify(files));
          },


      });


      $("#extrabutton_medical_doc").click(function()
        {

          extraObj_medical_doc.startUpload();
        });

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
 
    // alert('About to submit: \n\n' + queryString); 



    $(".invalid-feedback").hide();
    $(".invalid").removeClass("invalid");
    $("#result").html('<span class="wait">Please wait....</span>');
 
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
 
/*    alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
        '\n\nThe output div should have already been updated with the responseText.'); 
*/
    // if(window.console){

      /*responseText=$.parseJSON( responseText.responseText);

      if(window.console){
        console.log(responseText.errors);
        console.log( $.type(responseText.errors));
      }

      $.each(responseText.errors, function(keyName, keyValue) {
      
            console.log(keyName + ': ' + keyValue);
            $('#'+keyName+'_error').show();
            $('#'+keyName).addClass('invalid');
      });*/

            $(".user_info_input_category_indiv").val('');

            if(responseText.hasOwnProperty('responseText')){
           
              responseText=$.parseJSON( responseText.responseText);

            }
            window.scrollTo(0,0);











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


   
  // }
} 



</script>

 
@endsection
