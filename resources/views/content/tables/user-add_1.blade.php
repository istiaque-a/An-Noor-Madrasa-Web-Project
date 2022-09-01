@extends('layouts/contentNavbarLayout')

@section('title', 'Add Candidates')

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
    <div class="table-responsive text-nowrap">
      
        <form    class="requires-validation g-3" novalidate >



<div class="col-md-12">
                               <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                               <div class="valid-feedback">Username field is valid!</div>
                               <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>

          <div class="mb-3 mt-3">
              <label for="uname" class="form-label">Username:</label>
              <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
          </div>

          <div class="row mb-3">

            <div class="col-sm-4">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" name="firstName" class="form-control" id="firstName" placeholder="First Name" value=""  required>

              <div class="invalid-feedback">
                Please choose a username.
              </div>
              
            </div>



            <div class="col-sm-4">
              <label for="middleName" class="form-label">Middle Name</label>
              <input type="text" name="middleName" class="form-control" id="middleName" placeholder="Middle Name" value="" >
              
            </div>


            <div class="col-sm-4">
              <label for="lastName" class="form-label">Last Name</label>
              <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Last Name" value="" >
              
            </div>

          </div>


          <div class="row mb-3 gy-4">

            <div class="col-sm-3">
              <label for="dob" class="form-label">Date of Birth</label>
              <input type="date" name="dob" class="form-control" id="dob" placeholder="Date of Birth" value="" >
              
            </div>
            


            <div class="col-sm-3">
              <label for="firstLang" class="form-label">First Language</label>
              <input type="text" name="firstLang" class="form-control" id="firstLang" placeholder="First Language" value="" >
              
            </div>
            
          </div><!-- end of class row-->


          <div class="row mb-3 gy-4">

            <div class="col-sm-4 ">
              <label for="countryOfCitizenship" class="form-label">Country Of Citizenship</label>
              <input type="text" name="countryOfCitizenship" id="countryOfCitizenship" class="form-control" placeholder="Country Of Citizenship" value="">
            </div>


            <div class="col-sm-4 ">
              <label for="passport_no" class="form-label">Passport Number</label>
              <input type="text" name="passport_no" id="passport_no" class="form-control" placeholder="Passport Number" value="">
              
            </div>


            <div class="col-sm-4">
              <label for="passport_expiry_date" class="form-label">Passport Expiry Date</label>
              <input type="date" name="passport_expiry_date" id="passport_expiry_date" class="form-control" placeholder="Passport Expiry Date" value="">
              
            </div>
          </div>


        <div class="row mb-3 gy-4">
            <div class="col-sm-4">
              <label for="nid_number" class="form-label">NID NUmber</label>
              <input type="text" name="nid_number" id="nid_number" class="form-control" placeholder="NID Number" value="">
              
            </div>


            <div class="col-sm-4">

             <label  class="form-label">Marital Status</label>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">Single</label>
                </div>
                
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                  <label class="form-check-label" for="flexRadioDefault2">
                  Married
                  </label>
                </div>


            </div>





            <div class="col-sm-4">

             <label  class="form-label">Gender</label>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">Male</label>
                </div>
                
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                  <label class="form-check-label" for="flexRadioDefault2">
                  Female
                  </label>
                </div>


            </div>
          </div><!-- end of class row-->


        <div class="row mb-3 gy-3">
          
          <div class="col-sm-7">
            <label for="address"  class="form-label">ADDRESS</label>

            <input type="text" id="address" name="address" class="form-control" placeholder="Address" value="" />
            
          </div>

          <div class="col-sm-5">

            <label for="city" for="city" class="form-label">CITY</label>

            <input type="text" id="city" name="city" class="form-control" placeholder="City/Town" value=""  />
            
          </div>

        </div><!-- end of class row-->
        
        <div class="row mb-3 gy-3">

          <div class="col-sm-4">
            <label for="country"  class="form-label">COUNTRY</label>
            <input type="text" name="country" id="country" class="form-control" value="" placeholder="Country">
          </div>

          <div class="col-sm-4">
            <label class="form-label" for="state_province">STATE/PROVINCE</label>
            <input type="text" name="state_province" class="form-control" id="state_province" value="" placeholder="State/Province">
            
          </div>



          <div class="col-sm-4">
            <label class="form-label" for="zip">Zip Code</label>
            <input type="text" name="zip" id="zip" class="form-control" value="" placeholder="Zip Code" value="">
            
          </div>
          
        </div><!-- end of class row -->



        <div class="row  mb-3 gy-3">

          <div class="col-sm-4">
            <label for="email"  class="form-label">EMAIL</label>
            <input type="text" name="email" id="email" class="form-control" value="" placeholder="Email">
          </div>

          <div class="col-sm-4">
            <label class="form-label" for="phone">PHONE</label>
            <input type="text" name="phone" class="form-control" id="phone" value="" placeholder="Phone">
            
          </div>



          <div class="col-sm-4">
            
            
          </div>
          
        </div><!-- end of class row -->

        <div class="mb-4">Documentation</div>
 
        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Passport Size Photo</div>

          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable formats of the photocopy are PDF, JPEG or PNG, Please be advised that the file size limit of the photocopy is 20 MB</small>
          </div><!-- end of class user_add_file_indiv_instruction -->

        </div><!-- end of class user_add_file_indiv  -->
        


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">NID Copy</div>

          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable formats of the photocopy are PDF, JPEG or PNG, Please be advised that the file size limit of the photocopy is 20 MB</small>
          </div><!-- end of class user_add_file_indiv_instruction -->
          
        </div><!-- end of class user_add_file_indiv  -->



        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Passport Copy</div>

          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable size is 35mm x 45mm. Formats are JPG or PNG</small>
          </div><!-- end of class user_add_file_indiv_instruction -->
          
        </div><!-- end of class user_add_file_indiv  -->
        


        <div class="user_add_file_indiv mb-5">

          <div class="user_add_file_indiv_label fw-bold mb-3">Vaccine Certificate</div>

          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          
          <div  class="user_add_file_indiv_instruction mb-2">
              <small >The acceptable size is 35mm x 45mm. Formats are JPG or PNG</small>
          </div><!-- end of class user_add_file_indiv_instruction -->
          
        </div><!-- end of class user_add_file_indiv  -->
        

        <div class="col-12_000 text-end">
          <button type="submit" class="btn  btn-danger">Add Candidates</button>
        </div>
      </form>


    </div>
<!--/ Bordered Table -->

  </div>
</div>




@endsection

@section('vendor-script')

<script type="text/javascript">
  
  $(document).ready(function(){

      $('.first.circle').circleProgress({
    value: 0.6,
    thickness:10,
    fill:'#6C5DD3',
    size:40,
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
  });


  $('.second.circle').circleProgress({
    value: 0.6,
    thickness:10,
    fill:'#F98338',
    size:40,
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
  });




  $('.third.circle').circleProgress({
    value: 0.6,
    thickness:10,
    fill:'#2ED480',
    size:40,
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
  });


  $('.fourth.circle').circleProgress({
    value: 0.6,
    thickness:10,
    fill:'#FE6D8E',
    size:40,
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
  });


  });
</script>

 
@endsection
