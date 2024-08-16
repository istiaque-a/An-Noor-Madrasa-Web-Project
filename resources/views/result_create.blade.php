@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Insert Exam Result </div>

                <div class="card-body">
                    
                     <div class="container">
                        

                   <div id="add_person_container" class="mt-3">

                    <div id="result" class="text-center"></div>             

                  <form method="POST" enctype="multipart/form-data" action="<?php echo route(
                    'add_exam_result_now'); ?>" id="activity_form" name="activity_form">

                     @csrf

                     <input type="text" value="" class="form-control" id="exam_name" name="exam_name" placeholder="Exam name">

                    <br/>

                     <input type="text" placeholder="Publish Date" id="publish_date" name="publish_date" class="form-control" value="" />
                     


                     <br/>
                     <input type="text" placeholder="url" id="url" name="url" class="form-control" value="" />

                     <br/>
                 
                  
                     
                  </div><!-- end of id add_person_container-->

                  <input type="submit" class="btn btn-primary" name="submit" value="Add">

              </form>
                              
            
                     </div>

                     
                     
                    


                </div>
             </div>
          </div>
      </div>
</div>


<script type="text/javascript">



   counter=1;

   photos_indices=[];



    var person_indiv_info_html=`<div class="person_info_section_indiv"><div class="counter_person_info_section_indiv"></div>

                    <div class="person_info_indiv"><span class="inline_block person_info_label">Name: </span><input type="text" value="" required="required" class="person_name" name="person_name[]" />
                    </div>

                    <div class="person_info_indiv"><span class="inline_block person_info_label">Position:</span> <input type="text" value="" required="required" class="position" name="position[]" />
                    </div>

                    <div class="person_info_indiv"><span class="inline_block person_info_label">Address:</span> <textarea class="address" name="address[]" required="required" ></textarea>
                    </div>

                    <div class="person_info_indiv"><span class="inline_block person_info_label">Educational Qualification:</span> <textarea name="education[]" ></textarea>
                    </div>

                    <div class="person_info_indiv"><span class="inline_block person_info_label">Mobile No:</span> <input text="tel" required="required" class="mobile_no" name="mobile_no[]" value="" />
                    </div>

                    <div class="person_info_indiv"><span class="inline_block person_info_label">Photo:</span><input type="file" class="photo" value="" name="photo[]"  />
                    </div><a href="#" class="remove_btn" data-counter="0" >Remove</a>
                    
                  </div>`;


// pre-submit callback 
function showRequest(formData, jqForm, options) { 
    // formData is an array; here we use $.param to convert it to a string to display it 
    // but the form plugin does this for you automatically when it submits the data 
    var queryString = $.param(formData); 
 
    // jqForm is a jQuery object encapsulating the form element.  To access the 
    // DOM element for the form do this: 
    // var formElement = jqForm[0]; 
 
    // alert('About to submit: \n\n' + queryString); 

    $("#result").html('<span class="wait">Please wait....</span>');
    window.scrollTo(0,0);

 
    // here we could return false to prevent the form from being submitted; 
    // returning anything other than false will allow the form submit to continue 
    return true; 
} 
 
// post-submit callback 
function showResponse(responseText, statusText, xhr, $form)  { 
    // for normal html responses, the first argument to the success callback 
    // is the XMLHttpRequest object's responseText property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'xml' then the first argument to the success callback 
    // is the XMLHttpRequest object's responseXML property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'json' then the first argument to the success callback 
    // is the json data object returned by the server 
 
    /*alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
        '\n\nThe output div should have already been updated with the responseText.'); 
*/

    $("#result").html('<span class="wait">'+responseText+'</span>');
}



options = { 
        target:        '#result',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback 
 
        // other available options: 
        //url:       url         // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
        //clearForm: true        // clear all form fields after successful submit 
        //resetForm: true        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    }; 



    $(document).ready(function(){

        $("#publish_date").datepicker({
            dateFormat:'dd-mm-yy'
        });
      
      $("#activity_form").validate({
        ignore: [],
        rules: {

            "exam_name": {

                  required:true
            },

            "publish_date": {

                  required:true
            },

            "url": {

                required:true

            }

         }
      });


        


 
 $('#majlishe_shura_form_000').submit(function(e){

    e.preventDefault();

    // bind form using 'ajaxForm' 
    $('#majlishe_shura_form').ajaxForm(options); 
    // alert("Prevented");


 });


 $('#activity_form').submit(function(e) {

   e.preventDefault(); 

        $form =$(this);

        if($form.valid()){

               // inside event callbacks 'this' is the DOM element so we first 
              // wrap it in a jQuery object and then invoke ajaxSubmit 
              $(this).ajaxSubmit(options);  

              $("#exam_name,#url, #publish_date").val('');
          
        }

        
        
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
    }); 
    

    });
</script>

@endsection
