@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    
                     <div class="container">
                              <h2>Create Activities</h2>
            
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
                  	'add_activity_now'); ?>" id="activity_form" name="activity_form">

                     @csrf

                     



                  <!-- end of class person_info_section_indiv -->

           	       <div id="target_area" style="border_0000:2px dashed green;">
                    <?php
                      $counter=0;

                    ?>
                      
                     <!-- <div class="person_info_section_indiv">


                     
                     </div> --><!-- end of class person_info_section_indiv -->

                   </div><!-- end of id target_area -->


                   <div id="add_person_container" class="mt-3">


                    <select id="activity_cat" name="activity_cat" class="form-control">
                         <option value="" selected="selected">Select a category</option>
                         <option value="1">Mosque</option>
                         <option value="2">Madrasa</option>
                         <option value="3">An Noor Foundation</option>
                         <option value="4">An Noor Online Media</option>

                     </select>

                     <br/>



                     <select id="activity_type" name="activity_type" class="form-control">
                         <option value="">Select an option</option>
                         <option value="1">Past Activity</option>
                         <option value="2">Present Activity</option>
                         <option value="3">Future Activity</option>
                     </select>

                    <br/>

                     <input type="text" placeholder="Activity Heading" id="activity_heading" name="activity_heading" class="form-control" />
                     


                     <br/>
                     <textarea id="activity_body" name="activity_body" placeholder="Activity Description" class="form-control"></textarea>

                     <br/>

                     <input type="text" placeholder="URl" id="url" name="url" class="form-control hide_me" value="" />

                     <br/>

                     <input type="text" placeholder="Publish date" id="publish_date" name="publish_date" class="form-control hide_me" />
                     
                     

                     
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


    .hide_me{
        display: none !important;
    }


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

        $("#activity_cat").val('').change();

        $("#publish_date").datepicker({
            dateFormat:'dd-mm-yy'
        });
      
      $("#activity_cat").change(function(){

        $(".error").html('');



        $activity=$(this);

        var activity_cat_id = $activity.val().trim();

        
        if(activity_cat_id==4){

            $("#url,#publish_date").removeClass('hide_me');

            $("#activity_type,#activity_body").addClass('hide_me');



        }else{


            $("#url,#publish_date").addClass('hide_me');

            $("#activity_type,#activity_body").removeClass('hide_me');



        }



      }); //end of activity_cat change 


      $("#activity_form").validate({
        ignore: [],
        rules: {

            "activity_cat": {
                required:true
            },


            "activity_heading": {

                  required:true
            },

            "activity_type": {

                  
                required: function() {
                  return $("#activity_cat").val() != 4;
                }
            
            },

            "activity_body": {

                
                required: function() {
                  return $("#activity_cat").val() != 4;
                }
            },

            "url": {

            
                required: function() {
                    var cat_val=$("#activity_cat").val().trim();

                    // alert('cat_val = '+ cat_val);
                    if(cat_val==4){

                        return true;

                    }else{
                        return false;
                    }
                  // return $("#activity_cat").val() === '4';
                }
            },

            "publish_date": {

                
                required: function() {
                  return $("#activity_cat").val() == 4;
                }
            },

            

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
          
        }

        
        
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
    }); 
    

	});
</script>
@endsection

