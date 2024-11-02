$(function() 
{
   
   $("form[name='addformpage']").validate({

    rules: 
    { 
       fname        : "required", 
       lname        : "required", 
       email        : "required", 
       phone        : "required", 
       enq_type     : "required", 
       message      : "required", 
    },
    // Specify validation error messages
    messages: 
    { 
       fname        : "Please Enter your First Name", 
       lname        : "Please Enter your Last Name", 
       email        : "Please Enter your Email", 
       phone        : "Please Enter your Phone Number", 
       enq_type     : "Please Select  your Subject", 
       message      : "Please Enter your Message", 
   },
   
    submitHandler: function(form) 
    {
      
        let formdata = new FormData();
        let x = $('#addformpage').serializeArray();
        $.each(x, function(i, field)
        {
          formdata.append(field.name,field.value);
        });
        formdata.append('submit' , 'Save');
          
        $.ajax({
          type: "POST",
          url: "./actions/save_contact",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('The email message was sent Successfully');
              setTimeout(function (){
                location.href = "contact_us";
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

 
