@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    
                     <div class="container">
                              <h2>Add a Fujala High Committee</h2>
            
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
                  	'add_fujala-high-committee_now'); ?>" id="majlishe_shura_form" name="majlishe_shura_form">

                     @csrf

                     <div class="row">
                        <div class="notice_title col-sm-5">
                           Creation Date <input id="creation_date" name="creation_date" type="text" readonly="readonly" value="" placeholder="Creation Date" />
                           
                        </div>

                        <div class="notice_title col-sm-5">
                           Expiry Date <input id="expiry_date" name="expiry_date" type="text" readonly="readonly" value="" placeholder="Expiry Date" />
                           
                        </div>
                     </div><!-- end of class row-->



                  

                  <!-- <div class="person_info_section_indiv">

                  	<div class="person_info_indiv"><span class="inline_block person_info_label">Name: </span><input type="text" value="" name="person_name[]" />
                  	</div>

                  	<div class="person_info_indiv"><span class="inline_block person_info_label">Position:</span> <input type="text" value="" name="position[]" />
                  	</div>

                  	<div class="person_info_indiv"><span class="inline_block person_info_label">Address:</span> <textarea name="address[]" ></textarea>
                  	</div>

                  	<div class="person_info_indiv"><span class="inline_block person_info_label">Educational Qualification:</span> <textarea name="address[]" ></textarea>
                  	</div>

                  	<div class="person_info_indiv"><span class="inline_block person_info_label">Mobile No:</span> <textarea name="mobile_no[]" ></textarea>
                  	</div>

                  	<div class="person_info_indiv"><span class="inline_block person_info_label">Photo:</span><input type="file" value="" name="photo[]"  />
                  	</div>
                  	
                  </div> -->

                  <!-- end of class person_info_section_indiv -->

           	       <div id="target_area" style="border_0000:2px dashed green;">
                    <?php
                      $counter=0;

                    ?>
                      
                     <div class="person_info_section_indiv">

                        <?php echo $counter+1; ?> )

                           <div class="person_info_indiv"><span class="inline_block person_info_label">Name: </span><input type="text" value="" required="required" class="person_name" name="person_name[<?php echo $counter; ?>]" />
                           </div>

                           <div class="person_info_indiv"><span class="inline_block person_info_label">Position:</span> <input type="text" value="" required="required" class="position" name="position[<?php echo $counter; ?>]" />
                           </div>

                           <div class="person_info_indiv"><span class="inline_block person_info_label">Address:</span> <textarea class="address" name="address[<?php echo $counter; ?>]" required="required" ></textarea>
                           </div>

                           <div class="person_info_indiv"><span class="inline_block person_info_label">Educational Qualification:</span> <textarea name="education[<?php echo $counter; ?>]" ></textarea>
                           </div>

                           <div class="person_info_indiv"><span class="inline_block person_info_label">Mobile No:</span> <input text="tel" required="required" class="mobile_no" name="mobile_no[<?php echo $counter; ?>]" value="" />
                           </div>

                           <div class="person_info_indiv"><span class="inline_block person_info_label">Photo:</span><input type="file" value="" class="photo" name="photo[<?php echo $counter; ?>]"  />
                           </div><a href="#" class="remove_btn" data-counter="1" >Remove</a>
                     
                     </div><!-- end of class person_info_section_indiv -->

                   </div><!-- end of id target_area -->


                   <div id="add_person_container" class="mt-3">

                     <input type="button" name="btn_add_person" class="btn btn-primary" id="btn_add_person" value="Add Person" />
                     
                  </div><!-- end of id add_person_container-->



                  <br/>
                  <input type="hidden" id="total_persons" name="total_persons" value="1" />
                 <input type="hidden" id="photos_indices" name="photos_indices" value="[]" />
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
      
      $("#majlishe_shura_form").validate({
        ignore: [],
        rules: {
            creation_date:{
               required:true
            },
            expiry_date:{
              required:true 
            },
             "person_name[]": {

                  required:true
            },
            "position[]": {

                required:true

            }

         }
      });

/*
      var newPersonSectionFirst = $("#target_area").find(".person_info_section_indiv").first();

            newPersonSectionFirst.find(".person_name,  .position,  .address, .mobile_no").each(function() {

                $(this).rules("add", {

                    required: true // Or any other rules you need
                });


            });*/

		
		$("#creation_date, #expiry_date").datepicker({

  					dateFormat: "dd-mm-yy",
  					changeMonth: true,
     				changeYear: true,
     				yearRange: "-40:+40"
		});


        $(document).on('change','.photo',function(){

            $photo_field = $(this);

            var index_found = $photo_field.index('.photo');

            var search_result=$.inArray(index_found, photos_indices);

            // alert(" search_result = "+ search_result);
            if(search_result == -1){

                // alert("Yes !== -1");

            photos_indices.push(index_found); 

            var photos_indices_stringified = JSON.stringify(photos_indices);

            $("#photos_indices").val(photos_indices_stringified);


            }

            

        });
		
		$("#btn_add_person").click(function(){
			++counter;

				/*$("#target_area").append('<div>aaaaaa '+counter+'</div>');*/

				$("#target_area").append(person_indiv_info_html);

            $("#total_persons").val(counter);

            $(".remove_btn:last").attr('data-counter',counter);


            // Assign validation rules to dynamically added elements
            var newPersonSection = $("#target_area").find(".person_info_section_indiv").last();

            newPersonSection.find('.counter_person_info_section_indiv').html(counter+')');

            // newPersonSection.find(".person_name").val('32323232332');
            // alert(" person name length  = "+newPersonSection.find(".person_name").length);

            newPersonSection.find(".person_name,  .position,  .address, .education, .mobile_no").each(function() {

                $elem=$(this);

                var class_name_found = $elem.attr('class');

                var class_name_found_array =class_name_found.split(' ');
                if(window.console){

                    console.log("class_name_found_array = ");

                    console.log(class_name_found_array);

                }

                if($.inArray('person_name', class_name_found_array) !== -1){

                

                    var index_found_for_element=parseInt(counter)-1;

                    var name_attribute_value='person_name['+index_found_for_element+']';

                    $elem.attr('name',name_attribute_value)

                }


                if($.inArray('position', class_name_found_array) !== -1){

                

                    var index_found_for_element=parseInt(counter)-1;

                    var name_attribute_value='position['+index_found_for_element+']';

                    $elem.attr('name',name_attribute_value)

                }


                if($.inArray('address', class_name_found_array) !== -1){

                

                    var index_found_for_element=parseInt(counter)-1;

                    var name_attribute_value='address['+index_found_for_element+']';

                    $elem.attr('name',name_attribute_value)

                }


                if($.inArray('mobile_no', class_name_found_array) !== -1){

                

                    var index_found_for_element=parseInt(counter)-1;

                    var name_attribute_value='mobile_no['+index_found_for_element+']';

                    $elem.attr('name',name_attribute_value)

                }


                
                if($.inArray('education', class_name_found_array) == -1){ //Ensuring that education field is not made mandatory 

                    $(this).rules("add", {

                            required: true // Or any other rules you need
                    });


                }
                


            }); //end of each 

				

		});


      

      $(document).on('click','.remove_btn', function(e){

         e.preventDefault();

         $remove_btn = $(this);
         var counter_found =$remove_btn.data('counter');   

         var index_found = parseInt(counter_found)-1;
         // alert(" index_found when remove ===== "+ index_found);
         var search_index = $.inArray(index_found, photos_indices);
         photos_indices.splice(search_index,1);

         for(var i=0; i<photos_indices.length; i++){

            var elem_value_found = photos_indices[i];

            if(elem_value_found> index_found){

                photos_indices[i]= parseInt(elem_value_found)-1;

            }

         }//end of for loop

         $("#photos_indices").val(JSON.stringify(photos_indices));
         $remove_btn.closest('.person_info_section_indiv').remove();
         --counter;
         $("#total_persons").val(counter);
         


      });


 
 $('#majlishe_shura_form_000').submit(function(e){

 	e.preventDefault();

 	// bind form using 'ajaxForm' 
    $('#majlishe_shura_form').ajaxForm(options); 
 	// alert("Prevented");


 });


 $('#majlishe_shura_form').submit(function(e) {

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

