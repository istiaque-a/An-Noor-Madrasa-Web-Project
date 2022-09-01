@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Candidates')

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


  if(gettype($user)!=trim('string')){
     
     $first_name = $user->first_name;
     $middle_name= $user->middle_name;
     $last_name = $user->last_name;
     $dob= $user->dob;
     $first_lang= $user->first_lang;
     $country_of_citizenship= $user->country_of_citizenship ;
     $nationality= $user->nationality;
     $passport_no= $user->passport_num ;
     $passport_expiry_date = $user->passport_expiry_date;
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
     $job_designation= $user->job_designation;
     $departure_date = $user->departure_date;
     $esd_to_reach= $user->esd_to_reach;
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

            <div class="col-sm-4">
              <label for="first_name" class="form-label">First Name</label>
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


            <div class="col-sm-4">
              <label for="last_name" class="form-label">Last Name</label>
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
              <input type="text" name="countryOfCitizenship" id="countryOfCitizenship" class="form-control" placeholder="Country Of Citizenship" value="{{$country_of_citizenship}}">

              <div class="invalid-feedback" id="countryOfCitizenship_error">
                Country of citizenship is necessary
                
              </div>
            </div>


            <div class="col-sm-3 ">
              <label for="nationality" class="form-label">Nnationality</label>
              <input type="text" name="nationality" id="nationality" class="form-control" placeholder="Nationality" value="{{$nationality}}">

              <div class="invalid-feedback" id="nationality_error">
                
              </div>
              
            </div>  

            <div class="col-sm-3 ">
              <label for="passport_no" class="form-label">Passport Number</label>
              <input type="text" name="passport_no" id="passport_no" class="form-control" placeholder="Passport Number" value="{{$passport_no}}">

              <div class="invalid-feedback" id="passport_no_error">
                Passport number is necessary
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
            <div class="col-sm-4">
              <label for="nid_number" class="form-label">NID NUmber</label>
              <input type="text" name="nid_number" id="nid_number" class="form-control" placeholder="NID Number" value="{{$nid_number}}">

              <div class="invalid-feedback" id="nid_number_error">NID number is necessary</div>
              
            </div>


            <div class="col-sm-4">

             <label  class="form-label">Marital Status</label>

             <?php 
                  echo " marital_status = ".$marital_status;


             ?>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="marital_status" id="marital_status_1" 
                    value="<?php echo trim('single');?>"  <?php if($marital_status==trim("single")){ echo 'checked';} ?>>
                    <label class="form-check-label" for="marital_status">Single</label>
                </div>
                
                <div class="form-check">
                  <input class="form-check-input"  value="<?php echo trim('married');?>" type="radio" name="marital_status" 
                  id="marital_status2" <?php if($marital_status==trim("married")){ echo 'checked';} ?> 
                  value="<?php echo trim('married') ;?>" >
                  <label class="form-check-label" for="marital_status2">
                  Married
                  </label>
                </div>

                <div class="invalid-feedback" id="marital_status_error">Marital status is necessary</div>


            </div>





            <div class="col-sm-4">

             <label  class="form-label">Gender</label>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender1" value="<?php echo trim('male');?>"  <?php if($gender==trim("male")){ echo 'checked';} ?>>
                    <label class="form-check-label" for="gender1">Male</label>
                </div>
                
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="gender2" value="<?php echo trim('female');?>"  <?php if($gender==trim("female")){ echo 'checked';} ?> >
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

            <input type="text" id="address" name="address" class="form-control" placeholder="Address" value="{{$address}}" />

            <div class="invalid-feedback" id="address_error">Address is necessary</div>
            
          </div>

          <div class="col-sm-5">

            <label for="city" for="city" class="form-label">CITY</label>

            <input type="text" id="city" name="city" class="form-control" placeholder="City/Town" value="{{$city}}"  />
            <div class="invalid-feedback" id="city_error">City is necessary</div>
            
          </div>

        </div><!-- end of class row-->
        
        <div class="row mb-3 gy-3">

          <div class="col-sm-4">
            <label for="country"  class="form-label">COUNTRY</label>
            <input type="text" name="country" id="country" class="form-control" value="{{$country}}" placeholder="Country">
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

          

          <div class="col-sm-4">
            <label class="form-label" for="company">Company</label>
            <input type="text" name="company" class="form-control" id="company" value="{{$company}}" placeholder="Company">
            <div class="invalid-feedback" id="company_error"></div>
            
          </div>



          <div class="col-sm-4">
            <label class="form-label" for="medical_centre">Medical Center</label>
            <input type="text" name="medical_centre" class="form-control" id="medical_centre" value="{{$medical_centre}}" placeholder="Medical Centre">
            <div class="invalid-feedback" id="medical_centre_error"></div>
            
          </div>



          <div class="col-sm-4">
            <label class="form-label" for="medical_date">Medical Date</label>
            <input type="text" name="medical_date" class="form-control" id="medical_date" value="" placeholder="Medical Date" readonly>
            <div class="invalid-feedback" id="medical_date_error"></div>
            
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


        <input type="text" value="<?php echo request()->segment(count(request()->segments())) ?>"  name="user_id">


        <div class="mb-4">Documentation</div>
 
        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Passport Size Photo</div>
          
          <div id="passport_size_photo_area" class="edit_photo_area">

            <img src="{{URL::to('/thumbnails/passport_size_photo/'.$passport_size_photo)}}" alt="passport size photo" />
            

          </div><!-- end of id passport_size_photo_area-->

          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="passport_size_photo" name="passport_size_photo">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable formats of the photocopy are GIF, JPEG or PNG, Please be advised that the file size limit of the photocopy is 20 MB</small>
          </div><!-- end of class user_add_file_indiv_instruction -->

          
           Preview:<br/>
          <div id="preview_passport_size_photo" class="preview_upload_indiv">

            <img id="passport_size_photo_preview" src="{{URL::to('/assets/img/preview.jpeg')}}" alt=" " />
            
          </div><!-- end of id preview_passport_size_photo -->


          


        </div><!-- end of class user_add_file_indiv  -->
        

   



     

    <!-- endddddddddddddddddd --->


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">NID Copy</div>



         <div id="nid_photo_area" class="edit_photo_area">

            <img src="{{URL::to('/thumbnails/nid_photo/'.$nid_photo)}}" alt="nid photo" />
            

          </div><!-- end of id nid_photo_area-->

          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="nid_photo" name="nid_photo" value="">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable formats of the photocopy are GIF, JPEG or PNG, Please be advised that the file size limit of the photocopy is 20 MB</small>
          </div><!-- end of class user_add_file_indiv_instruction -->


          Preview:<br/>
          <div id="preview_nid_photo" class="preview_upload_indiv">

            <img id="nid_photo_preview" src="{{URL::to('/assets/img/preview.jpeg')}}" alt=" " />
            
            
          </div><!-- end of id preview_nid_photo -->







          
        </div><!-- end of class user_add_file_indiv  -->








        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Passport Copy</div>


          <div id="passport_copy_area" class="edit_photo_area">

            <img src="{{URL::to('/thumbnails/passport_copy/'.$passport_photo)}}" alt="passport size photo" />
            

          </div><!-- end of id passport_copy_area-->


          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="passport_copy" name="passport_copy" value="">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>

          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable size is 35mm x 45mm. Formats are JPG or PNG</small>
          </div><!-- end of class user_add_file_indiv_instruction -->


           Preview:<br/>
          <div id="preview_passport_copy" class="preview_upload_indiv">

            <img id="passport_copy_preview" src="{{URL::to('/assets/img/preview.jpeg')}}" alt=" " />
            
            
          </div><!-- end of id preview_passport_copy -->
          


          
        </div><!-- end of class user_add_file_indiv  -->
        


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Vaccine Certificate</div> 

          <div id="vaccine_photo_area" class="edit_photo_area">

            <img src="{{URL::to('/thumbnails/medical_photo/'.$medical_photo)}}" alt="medical photo" />
            

          </div><!-- end of id vaccine_photo-->

        

          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="vaccine_photo" name="vaccine_photo">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable size is 35mm x 45mm. Formats are JPG or PNG</small>
          </div><!-- end of class user_add_file_indiv_instruction -->


           Preview:<br/>
          <div id="preview_vaccine_photo" class="preview_upload_indiv">

            <img id="vaccine_photo_preview" src="{{URL::to('/assets/img/preview.jpeg')}}" alt=" " />
          
          </div><!-- end of id preview_vaccine_photo -->

          
        </div><!-- end of class user_add_file_indiv  -->
        


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Calling Process Document</div>

          <div id="passport_copy_area" class="edit_photo_area">

            <img src="{{URL::to('/thumbnails/calling_photo/'.$calling_photo)}}" alt="calling photo" />
            

          </div><!-- end of id passport_copy_area-->


          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="calling_photo" name="calling_photo">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small > Formats are JPG or PNG</small>
          </div><!-- end of class user_add_file_indiv_instruction -->


          
           Preview:<br/>
          <div id="preview_calling_photo" class="preview_upload_indiv">

            <img id="calling_photo_preview" src="{{URL::to('/assets/img/preview.jpeg')}}" alt=" " />
            
            
          </div><!-- end of id preview_calling_photo -->



          
          
        </div><!-- end of class user_add_file_indiv  -->
        


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Visa Stamping Document</div>

          <div id="visa_stamping_photo_area" class="edit_photo_area">

            <img src="{{URL::to('/thumbnails/visa_stamping_photo/'.$visa_photo)}}" alt="visa stamping photo" />
            

          </div><!-- end of id passport_copy_area-->



          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="visa_stamping_photo" name="visa_stamping_photo">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small > Formats are JPG or PNG</small>
          </div><!-- end of class user_add_file_indiv_instruction -->


         Preview:<br/>
          <div id="preview_visa_stamping_photo" class="preview_upload_indiv">

            <img id="visa_stamping_photo_preview" src="{{URL::to('/assets/img/preview.jpeg')}}" alt=" " />
            
            
          </div><!-- end of id preview_vaccine_photo -->





          
        </div><!-- end of class user_add_file_indiv  -->
        


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Flight</div>


           <div id="flight_photo_area" class="edit_photo_area">

            <img src="{{URL::to('/thumbnails/flight_photo/'.$flight_photo)}}" alt="flight photo" />
            

          </div><!-- end of id flight_photo_area-->


          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="flight_photo" name="flight_photo">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small > Formats are JPG or PNG</small>
          </div><!-- end of class user_add_file_indiv_instruction -->



           Preview:<br/>
          <div id="preview_flight_photo" class="preview_upload_indiv">

            <img id="flight_photo_preview" src="{{URL::to('/assets/img/preview.jpeg')}}" alt=" " />
            
            
          </div><!-- end of id preview_vaccine_photo -->


         
          
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
<!-- 
<script
      src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"
      integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
      crossorigin="anonymous"
    ></script> -->


<script type="text/javascript" src="{{URL::to('/assets/js/form-master/dist/jquery.form.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('/assets/js/jquery-validation-1.19.5/dist/jquery.validate.min.js')}}"></script>


<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="{{URL::to('/assets/js/jQuery-File-Upload-master/js/vendor/jquery.ui.widget.js')}}"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <!-- blueimp Gallery script -->
    <script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="{{URL::to('/assets/js/jQuery-File-Upload-master/js/jquery.iframe-transport.js')}}"></script>
    <!-- The basic File Upload plugin -->
    <script src="{{URL::to('/assets/js/jQuery-File-Upload-master/js/jquery.fileupload.js')}}"></script>
    <!-- The File Upload processing plugin -->
    <script src="{{URL::to('/assets/js/jQuery-File-Upload-master/js/jquery.fileupload-process.js')}}"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="{{URL::to('/assets/js/jQuery-File-Upload-master/js/jquery.fileupload-image.js')}}"></script>
    <!-- The File Upload audio preview plugin -->
    <script src="{{URL::to('/assets/js/jQuery-File-Upload-master/js/jquery.fileupload-audio.js')}}"></script>
    <!-- The File Upload video preview plugin -->
    <script src="{{URL::to('/assets/js/jQuery-File-Upload-master/js/jquery.fileupload-video.js')}}"></script>
    <!-- The File Upload validation plugin -->
    <script src="{{URL::to('/assets/js/jQuery-File-Upload-master/js/jquery.fileupload-validate.js')}}"></script>
    <!-- The File Upload user interface plugin -->
    <script src="{{URL::to('/assets/js/jQuery-File-Upload-master/js/jquery.fileupload-ui.js')}}"></script>
    <!-- The main application script -->
    <!-- <script src="{{URL::to('/assets/js/jQuery-File-Upload-master/js/demo.js')}}"></script> -->

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

    $(".preview_upload_indiv").imagefill();

    

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

  $("#date_of_birth,#passport_expiry_date,#departure_date,#esd_to_reach,#medical_date").datepicker({  dateFormat: "dd-mm-yy" });




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

         setTimeout(function () {
            window.scrollTo(0, 0);
        },200);
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
