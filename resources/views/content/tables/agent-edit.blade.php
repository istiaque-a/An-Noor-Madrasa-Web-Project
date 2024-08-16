@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Agents - Admin')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection



@section('content')

<div class="container-xxl">
  <div class="authentication-wrapper_0000 authentication-basic container-p-y" id="agent_add_wrapper">
    <div class="authentication-inner">

      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <div class="text-center"><h4 class="fw-bold py-3">Edit the Agent</h4></div>
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <!-- <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'#696cff'])</span> -->
              <!-- <span class="app-brand-logo demo"><img src="{{URL::to('/assets/img/logo.png')}}" alt="logo" /></span> -->
              <!-- <span class="app-brand-text demo text-body fw-bolder">{{config('variables.templateName')}}</span> -->
            </a>
          </div>
          <!-- /Logo -->
          <!-- <h4 class="mb-2">Adventure starts here 🚀</h4>
          <p class="mb-4">Make your app management easy and fun!</p> -->
          <div class="text-success text-center">
          @if (session('message')) 
                {{ session('message') }} 
          @endif
          </div>


          <?php 

            if(gettype($agent)==trim("string")){

                ?>

                <div class="text-center">
                  <h4 class="text-danger text-center">Sorry,wrong place to explore</h4>
                </div>


                <?php

            }else{

              $first_name=$agent->first_name;
              $middle_name=$agent->middle_name;
              $last_name = $agent->last_name;
              $email = $agent->email;
              $mobile = $agent->phone;

              ?>


          <div id="result" class="text-center"></div>    

          <form id="form-agent-edit" class="mb-3" action="{{route('edit_agent_now')}}" method="POST">

            
                        @csrf


            <div class="mb-3">
              <label for="first_name" class="form-label">First Name</label>
              <!-- <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus>
               -->

               <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $first_name }}" required autocomplete="first_name" placeholder="First Name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>




            <div class="mb-3">
              <label for="middle_name" class="form-label">Middle Name</label>
              <!-- <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus>
               -->

               <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ $middle_name }}"  autocomplete="middle_name" placeholder="Middle Name" autofocus>

                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>



            <div class="mb-3">
              <label for="last_name" class="form-label">Last Name</label>
              <!-- <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus>
               -->

               <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $last_name }}" required autocomplete="last_name" placeholder="Last Name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>


            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <!-- <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email"> -->


            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email }}" required_000 autocomplete="email" placeholder="Email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div id="email_error" class="invalid-feedback"></div>


            </div>

            <div class="mb-3">
              <label for="mobile" class="form-label">Mobile</label>
              <!-- <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email"> -->


            <input id="mobile" type="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ $mobile }}" required autocomplete="mobile" placeholder="Mobile Number">

            @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div id="mobile_error" class="invalid-feedback"></div>


            </div>

            <!-- <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Password</label>
              <div class="input-group input-group-merge">
                
                

               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
 -->



           <!--  <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Confirm Password</label>
              <div class="input-group input-group-merge">
                

               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
 -->



            <?php

              

              $agent_id_found=request()->segment(count(request()->segments())) ; 

            ?>
            <input type="hidden" name="agent_id" value="<?php echo $agent_id_found  ?>" />



<!-- 
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                <label class="form-check-label" for="terms-conditions">
                  I agree to
                  <a href="javascript:void(0);">privacy policy & terms</a>
                </label>
              </div>
            </div> -->
            
            <button type="submit" id="btn_signup" class="btn btn-primary d-grid w-100">
              Edit The Agent
            </button>

            

          </form>

          <p class="text-center">
            <span>Already have an account?</span>
            <!-- <a href="{{url('auth/login-basic')}}"> -->

            <a href="{{url('login')}}">
              <span>Sign in instead</span>
            </a>
          </p>


              <?php




            }// end of else of if if(gettype($agent)==trim("string")){

          ?>
        </div>


      </div>


    </div>
    <!-- Register Card -->


  </div>
</div>
</div>



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

    token_value=$('meta[name="csrf-token"]').attr('content').trim();



$(document).ready(function(){





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
    $('#form-agent-edit').submit(function() { 
      $("#result").html('<span class="text-success">Please wait...</span>')
      window.scrollTo(0,0);
        // inside event callbacks 'this' is the DOM element so we first 
        // wrap it in a jQuery object and then invoke ajaxSubmit 
        $(this).ajaxSubmit(options); 
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
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

        window.scrollTo(0,0);

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
            
            if(window.console){


              console.log(" keyname = "+keyName + ': ' +" keyValue= "+ keyValue);
            // $('#'+keyName+'_error').show();  

            }
            

            $('#'+keyName+'_error').html(responseText.errors[keyName]).show();

           + $('#'+keyName).addClass('invalid');
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





});// end of $(document).ready(function(){
</script>
@endsection