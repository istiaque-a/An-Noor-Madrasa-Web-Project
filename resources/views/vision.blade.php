@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    
                     <div class="container">
                              <h2>Vision</h2>
            
                     </div>


               <div class="notice_indiv">

                  @if (count($errors) > 0)
                     <div class = "alert alert-danger">
                        <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     </div>
                  @endif

                  <?php

                        if (Session::has('message'))
                           {
                              echo '<div class="alert alert-success">'.Session::get('message').'</div>';

                              
                           }


                           
                           
                           
                  ?>

     				<div id="result" class="text-center"></div>             

                     <form method="POST" enctype="multipart/form-data" action="<?php echo route(
                    'add_vision_now'); ?>" id="vision_form" name="vision_form">

                     @csrf

                     



                   

                   <div id="add_person_container" class="mt-3">

                     

                    

                     <br/>
                     <textarea id="vision_body" name="vision_body" placeholder="vision " class="form-control"><?php echo $vision; ?></textarea>
                     
                  </div><!-- end of id add_person_container-->



                  <br/>
                 
                  <input type="submit" class="btn btn-primary" name="submit" value="Add">
                  
                  </form>            





               </div><!-- end of class notice_indiv -->






                </div>
             </div>
          </div>
      </div>
</div>

<style type="text/css">
	#add_person_container{
/*		border:1px solid red;*/

	}
	.person_info_label{
		width:150px;
/*		border:1px solid red;*/
		margin-right: 20px;
		vertical-align: top;
	}

	#target_area{
/*		border:1px solid green;*/
		
	}

	.person_info_section_indiv{
		margin-top: 10px;
		margin-bottom: 10px;
		border:1px solid green;
        padding: 10px;
	}
	.person_info_indiv{
		margin-bottom: 5px;
	}
</style>
<script type="text/javascript">



   counter=1;

   photos_indices=[];





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
      
      $("#vision_form").validate({
        ignore: [],
        rules: {

            "vision_body": {

                  required:true
            }
            

         }
      });


		




 $('#vision_form').submit(function(e) {

   e.preventDefault(); 

        $form =$(this);

        if($form.valid()){

            

               // inside event callbacks 'this' is the DOM element so we first 
              // wrap it in a jQuery object and then invoke ajaxSubmit 
              $(this).ajaxSubmit(options);  
          
        }

        
        
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
    }); 
    

	});
</script>
@endsection

