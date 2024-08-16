@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    
                     <div class="container">
               <h2>Students</h2>
            <table class="table table-bordered" id="table">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Father</th>
                     <th>Date of Birth</th>
                     <th>Permanent Address</th>
                     <th>Temporary Address </th>
                     <th>Marital Status</th>
                     <th>FB ID </th>
                     <th>Faragat Year </th>
                     <th>Blood Group</th>
                     <th>Last Jamaat</th>
                     
                     <th>Mobile Own</th>
                     <th>Mobile Guardian</th>
                     <!-- <th>Current Working Institution </th> -->
                     <th>Whatsapp </th>
                     <th>Mashgala Workplaces</th>
                     <th>Tasnif</th>
                     <th>Social and Organizational Contribution</th>
                     <th>Action</th>
                  </tr>
               </thead>
            </table>
</div>


 <script>
         

            $(document).ready(function(){
               $('#table').DataTable({
               processing: true,
               serverSide: true,
               scrollX: true,
               ajax: '{{ url('studentsDataTable') }}',
               columns: [
                        // { data: 'id', name: 'id' },
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'father_name', name: 'father_name' },
                        { data: 'dob', name: 'dob' },
                        { data: 'permanent_address_found', name: 'permanent_address_found' },
                        { data: 'temporary_address', name: 'temporary_address' },
                        { data: 'marital_status', name: 'marital_status' },
                        { data: 'facebook_id', name: 'facebook_id' },
                        { data: 'faragat_year_found', name: 'faragat_year_found' },
                        { data: 'blood_group', name: 'blood_group' },
                        { data: 'last_jamat_attended', name: 'last_jamat_attended' },
                        { data: 'mobile_own', name: 'mobile_own' },
                        { data: 'mobile_guardian', name: 'mobile_guardian' },


                        // { data: 'current_working_institution', name: 'current_working_institution' },
                        { data: 'whatsapp', name:'whatsapp' },
                        { data: 'mashgala_work_fields_found', name:'mashgala_work_fields_found' },
                        { data: 'tasnif', name:'tasnif' },

                        { data: 'social_organizational_contribution', name:
                         'social_organizational_contribution' },

                         
                        
                        { data: 'intro', name:'intro'},
 
                        
                     ]
               });


               $(document).on( 'click', '.approve_or_disapprove',function(){

                     $approve_or_disapprove=$(this);

                     var userId = $approve_or_disapprove.data('id');

                     var approved_found= $approve_or_disapprove.data('approved');

                     var url_found='{{route('approve_disapprove_now')}}';

                     var _token="{{ csrf_token() }}";

                     $.ajax({
                        method:"POST",
                        url: url_found,
                        // data:{"_token": _token ,'userId':userId, 'approved_found':approved_found},
                        data:{"_token": _token ,'id':userId, 'approved_found':approved_found,'user_type':3},

                        success:function(data, status, xhr){

                           if(approved_found==0){

                              approved_found=1;

                           }else if(approved_found==1){

                              approved_found=0;

                           }

                           

                           if(data ==1 ){

                              $approve_or_disapprove.data('approved',approved_found);

                              if(approved_found==0){

                                 
                                 $approve_or_disapprove.text('Approve');

                              }else{

                                 
                                 $approve_or_disapprove.text('Disapprove');

                              }

                              

                           }

                        },
                        error: function(jqXhr, textStatus, errorMessage){

                        }
                        
                     });

               });// end of click 
         });
         </script>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
