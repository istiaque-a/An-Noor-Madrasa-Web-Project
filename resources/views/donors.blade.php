@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    
                     <div class="container">
               <h2>Donors</h2>
            <table class="table table-bordered" id="table">
               <thead>
                  <tr>
                      <th>Id</th>
                     <th>Name</th>
                     <th>Profession</th>

                     <th>Working Institution</th>
                     <th>Rank</th>
                     <th>Address</th>

                     <th>Donation Types</th>
                     <th>Donation Amount</th>
                     <th>Donation Fields</th>
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
               ajax: '{{ url('donorsDataTable') }}',
               columns: [
                       
                         // { data: 'id', name: 'id' },

                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'name', name: 'name' },
                        { data: 'profession', name: 'profession' },
                        
                        { data: 'current_working_institution', name: 'current_working_institution' },
                        { data: 'rank', name:'rank' },
                        { data: 'temporary_address', name:'temporary_address'  },

                        { data: 'donation_type', name:'donation_type' },
                        { data: 'donation_amount', name:'donation_amount' },
                        { data: 'donation_fields', name:'donation_fields' },

                        { data: 'intro', name:'intro'}

                     
 
                        
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
                        data:{"_token": _token ,'id':userId, 'approved_found':approved_found,'user_type':4},
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
