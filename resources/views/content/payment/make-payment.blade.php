@extends('layouts/contentNavbarLayout')

@section('title', 'Make Payment')

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
   Payment -> Make Payment 
  
</h4>

<div id="above_table_info_area" class="mb-2">

</div><!-- end of id above_table_info_area -->



<div class="row" id="latest_candidates_area">
  



</div><!-- end of id latest_candidates_area-->


<!-- Bordered Table -->
<div class="card"   data-capture=".base, .date, .datepicker">
  <!-- <h5 class="card-header">Bordered Table</h5> -->
  <div class="card-body">
    <div id="payment_area" class_0="d-flex justify-content-center">
      <div id="result" class="text-center"></div>
      
        <form method="POST" enctype="multipart/form-data" id="form-payment-schedule" action="{{URL::to('/payment/create-schedule-now')}}"  class="requires-validation g-3" novalidate  >





          <div class="row mb-3">

            <div class="col-sm-4_00">
              <label for="schedule_name" class="form-label  ">Payment Schedule Name</label>
              <!-- <input type="text" name="schedule_name" class="form-control" id="schedule_name" placeholder="Schedule Name" value=""  required> -->

              <select id="schedule_name" class="form-control" name="schedule_name" required > 
                <option value="">Select a payment schedule</option>
                <?php

                  foreach($payment_schedules as $payment_schedule){

                    ?>

                      <option value="<?php echo $payment_schedule->id; ?>">
                      <?php echo  $payment_schedule->schedule_name; ?>
                        
                      </option>
                    <?php


                  }// end of foreach loop
                ?>
                
              </select>

              <div class="invalid-feedback" id="schedule_name_error">
                Please give the name of the payment schedule.
              </div>
              
            </div>

          </div>


          <div class="row mb-3"> 
            <div class="col-sm-4_00">
              <label for="agent" class="form-label">Agent</label>
              <select name="agent" class="form-control" id="agent" readonly >
                <option value="">Select an agent</option>
                <?php

                  foreach($agents as $agent){

                    ?>
                      <option value="<?php echo $agent->id; ?>"><?php echo $agent->first_name.' '.$agent->last_name;  ?></option>

                    <?php

                  }// end of foreach loop

                ?>
              </select>

              <div class="invalid-feedback" id="last_date_error">
                Please enter the last date.
              </div>
              
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-4_00">
              <label for="candidate" class="form-label">Candidate</label>
              <select id="candidate" name="candidate" class="form-control">
                <option value="">Select a Candidate</option>

              </select>

              <div class="invalid-feedback" id="amount_error">Amount is necessary and should be greater than 0 </div>
              
            </div>

          </div>


          

 
        @csrf
        <div class="col-12_000 text-start">
          <button type="submit" class="btn  btn-danger">Make a schedule</button>
        </div>
      </form>

    </div><!-- end of id payment_area-->


<!--/ Bordered Table -->

  </div>
</div>




@endsection

@section('vendor-script')

<!-- <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"
      integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
      crossorigin="anonymous"
    ></script> -->


<script type="text/javascript" src="{{URL::to('/assets/js/form-master/dist/jquery.form.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('/assets/js/jquery-validation-1.19.5/dist/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('/assets/js/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js')}}"></script>


    
 

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

        $image_parent_container=$(input).closest('.user_add_file_indiv').find('.preview_upload_indiv').off('imagefill').imagefill();
        //.imagefill();
    }
}// end of function readUrl



  // prepare the form when the DOM is ready 
$(document).ready(function() { 

  // $(".preview_upload_indiv").imagefill();


  $("#schedule_name,#agent,#candidate").select2();
  $("#agent").change(function(){

    var agent=$("#agent").val().trim();
    var token = $('meta[name="csrf-token"]').attr('content').trim();
    var data={'_token':token,'agent':agent};

        $.ajax({

          url:'{{URL::to('/fetch_candidates_agentwise')}}',
          data: data,
          method:'POST',
          success: function(response){

            for(i=0; i<response.length; i++){

              $("#candidate").append('<option value='+response[i].id+'>'+response[i].first_name+' '+response[i].last_name+'</option>');

            }// end of for loop

          },
          failure: function(response){



          }
        });

  });// end of #agent change 

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

  /*$("#date_of_birth,#passport_expiry_date,#departure_date,#esd_to_reach,#medical_date").datepicker(
    {  
      dateFormat: "dd-mm-yy",
      yearRange: "1900:2010",
      changeYear: true
    });
*/

// document.addEventListener('DOMContentLoaded', function() {
                
                /*const dp = $('.base').datepicker().data('datepicker');

                dp.focusDate = new Date(Date.UTC(2013, 7, 14));
                dp.update();
                dp.show();
*/
                // $('.date').datepicker({
                $("#last_date").datepicker(
                  {
                    format: 'dd-mm-yyyy',
                    autoclose:true
                  
                });
                //.datepicker('show');

                // $('.inline').datepicker();
            // });  





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
    $('#form-payment-schedule').submit(function() { 

      window.scrollTo(0,0);
      $("#result").html('<span class="text-success">Please wait...</span>')
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

      /*if ('scrollRestoration' in window.history) {
           window.history.scrollRestoration = 'manual'
      }*/
      // window.focus();
      // window.scrollTo(0,0);
       setTimeout(function () {
            window.scrollTo(0, 0);
        },200);
      // $('body').animate({ scrollTop: top }, 0);
      // responseText=$.parseJSON( responseText.responseText);


      // alert(" responseText.success = "+ responseText.success);        

      if(responseText.success==false){

        

        $("#result").html('<span class="text-danger">Please fix the problems</span>');


         $.each(responseText.errors, function(keyName, keyValue) {
      
         if(window.console){
            console.log(keyName + ': ' + keyValue);

            console.log(" keyname again = ");
            console.log(responseText.errors.keyName);
         }   
           
                $('#'+keyName+'_error').html(keyValue).show();
           
      });

      }else if(responseText.success==true){
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
