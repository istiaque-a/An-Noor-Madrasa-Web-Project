@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Notice Board') }}</div>

                <div class="card-body">
                    
                     <div class="container">
                              <h2>Notice Board</h2>
            
                     </div>

                     <?php

                        for($i=0; $i<count($notices); $i++){

                           $notice_indiv = $notices[$i];
                           ?>

               <div class="notice_indiv">
                <div class="row">    
                        <div class="notice_title col-sm-5" >

                            <select class="form-control" disabled autocomplete="off">
                                <option value="">Public or Not</option>
                                <option value="0" <?php if($notice_indiv->isPublic==0){ echo 'selected="selected"'; } ?> >Private</option>
                                <option value="1" 
                                <?php if($notice_indiv->isPublic==1){ echo 'selected="selected"'; } ?> >Public</option>
                                
                            </select>
                               
                        </div> 
                    </div>
                

                  <div class="notice_title"><?php echo $notice_indiv['title']; ?></div><!-- end of class notice_title-->
                  <div class="notice_body"><?php echo $notice_indiv['notice_body'];?> </div><!-- end of class notice_body-->
                  <div class="notice_edit_link"><a href="<?php echo URL('/notice/edit/'.$notice_indiv->id) ?>"> Edit </a></div>
                              


               </div><!-- end of class notice_indiv -->




                           <?php



                        }//end of for loop



                     ?>
                     
                    {{ $notices->links('vendor.pagination.default') }}


                </div>
             </div>
          </div>
      </div>
</div>
@endsection
