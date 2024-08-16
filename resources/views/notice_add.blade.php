@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Notice') }}</div>

                <div class="card-body">
                    
                     <div class="container">
                              <h2>Add a notice</h2>
            
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

                  

                  <form method="POST" enctype="multipart/form-data" action="<?php echo route('add_notice_now'); ?>" id="notice_form" name="notice_form">

                     @csrf

                     <div class="row">
                        <div class="notice_title col-sm-5">
                           <select name="public" class="form-control " autocomplete="off">
                              <option value="">Public or not</option>
                              <option value="0" <?php if(old('public')=='0'){ echo 'selected="selected"';} ?>>Private</option>
                              <option value="1" <?php if(old('public')=='1'){ echo 'selected="selected"';} ?>>Public</option>
                           </select>
                           
                        </div>
                     </div><!-- end of class row-->


                  <div class="notice_title"><input placeholder="title" type="text" name="notice_title" class="form-control" value="{{old('notice_title' ) }}" /></div><!-- end of class notice_title-->
                  <div class="notice_body"><textarea placeholder="Notice body" name="notice_body" class="form-control">{{ old('notice_body')}}</textarea> </div><!-- end of class notice_body-->

                  <br/>
                  <input type="submit" class="btn btn-primary" name="submit" value="Add">
                  
                  </form>            


               </div><!-- end of class notice_indiv -->






                </div>
             </div>
          </div>
      </div>
</div>
@endsection
