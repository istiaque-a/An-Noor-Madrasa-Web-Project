@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Notice') }}</div>

                <div class="card-body">
                    
                     <div class="container">
                              <h2>All  Majlishe Shuras</h2>
            
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

                    $counter=0;
                    foreach($masjlishe_shuras_all as $masjlishe_shuras_all_indiv){
                        ++$counter;
                        ?>

                        <div class="masjlishe_shura_indiv">
                            <?php echo $counter; ?> ) Creation date: <?php echo $masjlishe_shuras_all_indiv[
                                'creation_date']; ?> Expiry date: <?php echo $masjlishe_shuras_all_indiv[
                                'expiry_date']; ?> <a href="{{route('masjlishe_shura_indiv', $masjlishe_shuras_all_indiv['id'])}}">Details</a>
                            
                        </div><!-- end of class masjlishe_shura_indiv-->




                        <?php

                    }// end of foreach loop
                           
                           
                           
                  ?>



                 






                </div>
             </div>
          </div>
      </div>
</div>

<style type="text/css">
	#add_person_container{
		border:1px solid red;

	}
	.person_info_label{
		width:150px;
		border:1px solid red;
		margin-right: 20px;
		vertical-align: top;
	}

	#target_area{
		border:1px solid green;
		
	}

	.person_info_section_indiv{
		margin-top: 10px;
		margin-bottom: 10px;
		border:1px solid green;
	}
	.person_info_indiv{
		margin-bottom: 5px;
	}
</style>
<script type="text/javascript">

   counter=1;



	var person_indiv_info_html=`<div class="person_info_section_indiv">

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

                  	<div class="person_info_indiv"><span class="inline_block person_info_label">Photo:</span><input type="file" value="" name="photo[]"  />
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
 
    alert('About to submit: \n\n' + queryString); 
 
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
 
    alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
        '\n\nThe output div should have already been updated with the responseText.'); 


    $("#result").html();
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
        rules: {
            creation_date:{
               required:true
            },
            expiry_date:{
              required:true 
            }

         }
      });


      var newPersonSectionFirst = $("#target_area").find(".person_info_section_indiv").first();

            newPersonSectionFirst.find(".person_name,  .position,  .address, .mobile_no").each(function() {

                $(this).rules("add", {

                    required: true // Or any other rules you need
                });


            });

		
		$("#creation_date, #expiry_date").datepicker({

  					dateFormat: "dd-mm-yy",
  					changeMonth: true,
     				changeYear: true,
     				yearRange: "-40:+40"
		});


		
		$("#btn_add_person").click(function(){
			++counter;

				/*$("#target_area").append('<div>aaaaaa '+counter+'</div>');*/

				$("#target_area").append(person_indiv_info_html);

            $("#total_persons").val(counter);

            $(".remove_btn:last").attr('data-counter',counter);


            // Assign validation rules to dynamically added elements
            var newPersonSection = $("#target_area").find(".person_info_section_indiv").last();

            newPersonSection.find(".person_name,  .position,  .address, .mobile_no").each(function() {

                $(this).rules("add", {

                    required: true // Or any other rules you need
                });


            });

				

		});


      

      $(document).on('click','.remove_btn', function(e){

         e.preventDefault();

         $remove_btn = $(this);
         var counter_found =$remove_btn.data('counter');   
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

