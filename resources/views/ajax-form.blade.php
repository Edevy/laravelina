<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel 5.7 Ajax Form Submission Example </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    <style>
    .error{ color:red; } 
    </style>
  </head>
  
<body>
  
<div class="container">
    <h2 style="margin-top: 10px;">Laravel 5.7 Ajax Form Submission Example - <a href="https://www.tutsmake.com" target="_blank">TutsMake</a></h2>
    <br>
    <br>
    <div class="alert" style="display: none">
      <small id="message"></small>
    </div>
    <form id="contact_us" method="post" action="javascript:void(0)">
      @csrf
      <div class="form-group input-name">
        <label for="formGroupExampleInput">Name</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Please enter name">
        <div class="invalid-feedback invalid-name"></div>
      </div>
      <div class="form-group input-email">
        <label for="email">Email Id</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email id">
        <div class="invalid-feedback invalid-email"></div>
      </div>      
      <div class="form-group input-mobile_number">
        <label for="mobile_number">Mobile Number</label>
        <input type="text" name="mobile_number" class="form-control" id="mobile_number" placeholder="Please enter mobile number" maxlength="10">
        <div class="invalid-feedback invalid-mobile_number"></div>
      </div>
      <div class="alert alert-success d-none" id="msg_div">
              <span id="res_message"></span>
      </div>
      <div class="form-group">
       <button type="submit" id="send_form" class="btn btn-success">Submit</button>
      </div>
    </form>
  
</div>
<script>
  // $(document).ready(function () {
  //   $(selector).submit(function (e) { 
  //     e.preventDefault();
      
  //     $.ajax({
  //       type: "method",
  //       url: "url",
  //       data: "data",
  //       dataType: "dataType",
  //       success: function (response) {
  //         if (response.warning) {
  //           $.each(collection, function (indexInArray, valueOfElement) { 
  //              $()
  //           });
  //         }
  //       }
  //     });
  //   });
  // });
  $(document).ready(function () {
      $('#contact_us').submit(function (e) { 
        // page doesn't load
        e.preventDefault();

       $.ajax({
         type: "POST",
         url: "{{route('saveform')}}",
         data: new FormData(this),
         dataType: "json",
         processData : false,
         contentType : false,
         cache : false,
         success: function (response) {
            if(response.warning){
                $.each(response.warning, function (index, value) { 
                  // console.log(index +" ---> " +value)
                    $('input[name='+index+']').addClass('is-invalid')
                    $('.invalid-'+index+'').append(value)

                    $('input[name='+index+']').keydown(function (e) { 
                        $(this).removeClass('is-invalid')
                        $('.invalid-'+index+'').empty()
                    });

                    $('input[name='+index+']').empty(function(e){
                      $(this).addClass('is-invalid')
                    });

                });
            }

            if(response.success){
                $('.alert')
                .css('display','block')
                .addClass('alert-'+response.success.status+'')
                .append(response.success.message)
            }
            if(response.error){
                console.log(response.error)
            }
         }
       });
        
      });
  });
</script>
</body>
</html>