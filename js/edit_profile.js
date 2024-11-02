
   $(function() {
  
  $("form[name='addformpage']").validate({
   rules: {         
       first_name     : "required",
       last_name      : "required",
       email          : "required",
       phone_number   : "required",
       // password       : "required",
    },
    // Specify validation error messages
     messages: {         
       first_name     : "Please Enter First Name",
       last_name      : "Please Enter Last Name",
       email          : "Please Enter your Email",
       phone_number   : "Please Enter Phone Number",
       // password       : "Please Enter your Password",
    },
    submitHandler: function(form) {
      
      let formdata = new FormData();
      let x = $('#addformpage').serializeArray();
        $.each(x, function(i, field){
        formdata.append(field.name, field.value);
        });
        formdata.append('action' , 'update');
     
        $.ajax({
          type: "POST",
          url: "./actions/save_register",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,

          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('Profile Updated Successfully...!');
              setTimeout(function (){
                location.href = "edit_profile";
              },1000);
            }
            else{
              toastr.error(data);
            }
          }
        });
      }
  });
});
