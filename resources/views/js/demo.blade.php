/*
 * jQuery File Upload Demo
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

/* global $ */
<script type="text/javascript">
  passport_docs=[];
  passport_doc_labels=[];
  fileupload_label_input="";
  fileupload_label_input_val="";
  passport_doc_counter=0;
  $passport_doc_input=null;
  $closest_tr=null;
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () {
  'use strict';



  $('#fileupload_1111').fileupload({
    uploadTemplateId: null,
    downloadTemplateId: null,
    uploadTemplate: function (o) {
        var rows = $();
        $.each(o.files, function (index, file) {
            var row = $('<tr class="template-upload fade">' +
                '<td><span class="preview"></span></td>' +
                '<td><p class="name"></p>' +
                '<div class="error"></div>' +
                '</td>' +
                '<td><p class="size"></p>' +
                '<div class="progress"></div>' +
                '</td>' +
                '<td>' +
                (!index && !o.options.autoUpload ?
                    '<button class="start" disabled>Start</button>' : '') +
                (!index ? '<button class="cancel">Cancel</button>' : '') +
                '</td>' +
                '</tr>');
            row.find('.name').text(file.name);
            row.find('.size').text(o.formatFileSize(file.size));
            if (file.error) {
                row.find('.error').text(file.error);
            }
            rows = rows.add(row);
        });
        return rows;
    },
    downloadTemplate: function (o) {
        var rows = $();
        $.each(o.files, function (index, file) {
            var row = $('<tr class="template-download fade">' +
                '<td><span class="preview"></span></td>' +
                '<td><p class="name"></p>' +
                (file.error ? '<div class="error"></div>' : '') +
                '</td>' +
                '<td><span class="size"></span></td>' +
                '<td><button class="delete">Delete</button></td>' +
                '</tr>');
            row.find('.size').text(o.formatFileSize(file.size));
            if (file.error) {
                row.find('.name').text(file.name);
                row.find('.error').text(file.error);
            } else {
                row.find('.name').append($('<a></a>').text(file.name));
                if (file.thumbnailUrl) {
                    row.find('.preview').append(
                        $('<a></a>').append(
                            $('<img>').prop('src', file.thumbnailUrl)
                        )
                    );
                }
                row.find('a')
                    .attr('data-gallery', '')
                    .prop('href', file.url);
                row.find('button.delete')
                    .attr('data-type', file.delete_type)
                    .attr('data-url', file.delete_url);
            }
            rows = rows.add(row);
        });
        return rows;
    }
});


  // Initialize the jQuery File Upload widget:
  $('#fileupload_000000').fileupload({
    // Uncomment the following to send cross-domain cookies:
    //xhrFields: {withCredentials: true},
    url: '{{URL::to("/doc/upload")}}',

    formData: {
                    label_value: fileupload_label_input
                    
              }

  })
    .on('fileuploadchange', function (e, data) {

      /* ... */

      // alert('{{URL::to("/doc/upload")}}');

      //fileupload_label_input=$("#fileupload .label_input").val().trim();

      // alert("fileuploadchange = " + $("#fileupload .label_input").length);

    }).on('fileuploadadd', function (e, data) {
        
          // alert("fileuploadchange = " + $("#fileupload .label_input").length);


    }).on('fileuploadadded', function (e, data) {


          /*var input = $('#input');
          data.formData = {example: input.val()};*/
          // if (!data.formData.example) {
            // data.context.find('button').prop('disabled', false);

            $closest_tr=data.context.find('button').closest('tr');

            // input.focus();
            // return false;

          // }

          // alert("upload added ");
          ++passport_doc_counter;

          alert(" length = "+$("#fileupload .label_input").length);

          $passport_doc_input= $("#fileupload .label_input");


          $passport_doc_input.addClass('passport_doc_input_'+passport_doc_counter);

          // alert("fileuploadchange = " + $("#fileupload .label_input").length);
          fileupload_label_input=  $("#fileupload .label_input").val().trim();

          passport_doc_labels.push(fileupload_label_input);
          $closest_tr.find('.label_input').val('ppppppp');

          if(window.console){
            console.log(" passport_doc_labels = ");
            console.log(passport_doc_labels);

            console.log(e);

            console.log(" $closest_tr = ");
            console.log($closest_tr);

          }

          }).on('fileuploadfinished', function (e, data) {

                alert(" fileuploadfinished");
                $passport_doc_input.val(fileupload_label_input_val);

          });

  $("#fileupload_nid").fileupload({
    // Uncomment the following to send cross-domain cookies:
    //xhrFields: {withCredentials: true},
    url: '{{URL::to("/doc/upload")}}',

    formData: {
                    doc_categpry: 'nid'.trim()
                    
              }

  });

  $('#fileupload').bind('fileuploaddone', function (e, data) {

      var image_file=data.result.files[0].name;
      passport_docs.push(image_file);

      var passport_doc_label_found = $("#fileupload .label_input").val().trim();
      passport_doc_labels.push(passport_doc_label_found);


      $("#passport_docs_names").val(JSON.stringify(passport_docs));
      $("#passport_doc_labels").val(JSON.stringify(passport_doc_labels));



    if(window.console){

      console.log("data ===== finished -==== ");
      console.log(data);
      // objectFound=data; 
      console.log(data.response);
      
      console.log(image_file);
      

    }
  });


  $('#fileupload_nid').bind('fileuploaddone', function (e, data) {

      var image_file=data.result.files[0].name;
      passport_docs.push(image_file);

      $("#nid_docs_names").val(JSON.stringify(passport_docs));

    if(window.console){

      console.log("data ===== finished -==== ");
      console.log(data);
      // objectFound=data; 
      console.log(data.response);
      
      console.log(image_file);
      

    }
  }); 
 

  // Enable iframe cross-domain access via redirect option:
  $('#fileupload').fileupload(
    'option',
    'redirect',
    window.location.href.replace(/\/[^/]*$/, '/cors/result.html?%s')
  );

  if (window.location.hostname === 'blueimp.github.io') {
    // Demo settings:
    $('#fileupload').fileupload('option', {
      url: '//jquery-file-upload.appspot.com/',
      // Enable image resizing, except for Android and Opera,
      // which actually support image resizing, but fail to
      // send Blob objects via XHR requests:
      disableImageResize: /Android(?!.*Chrome)|Opera/.test(
        window.navigator.userAgent
      ),
      maxFileSize: 999000,
      acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
    });
    // Upload server status check for browsers with CORS support:
    if ($.support.cors) {
      $.ajax({
        url: '//jquery-file-upload.appspot.com/',
        type: 'HEAD'
      }).fail(function () {
        $('<div class="alert alert-danger"></div>')
          .text('Upload server currently unavailable - ' + new Date())
          .appendTo('#fileupload');
      });
    }
  } else {
    // Load existing files:
    $('#fileupload').addClass('fileupload-processing');
    $.ajax({
      // Uncomment the following to send cross-domain cookies:
      //xhrFields: {withCredentials: true},
      url: $('#fileupload').fileupload('option', 'url'),
      dataType: 'json',
      context: $('#fileupload')[0]
    })
      .always(function () {
        $(this).removeClass('fileupload-processing');
      })
      .done(function (result) {
        $(this)
          .fileupload('option', 'done')
          // eslint-disable-next-line new-cap
          .call(this, $.Event('done'), { result: result });
                    
      });
  }
});
</script>