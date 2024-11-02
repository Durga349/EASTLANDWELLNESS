function login() {
    let email = $('#loginEmail').val().trim();
    let password = $('#loginPassword').val().trim();

    if (email == '') {
      toastr.error('Please Enter Email / Username');
      $('#loginEmail').focus();
      return;
    }if (password == '') {
      toastr.error('Please Enter Password');
      $('#loginPassword').focus();
      return;
    }

    $.ajax({
        url  : './actions/save_register',
        type : 'POST',
        data : {'action' : 'login','email' : email, 'password' : password},
        success : function(data){

            if (data.trim() == "true"){
              toastr.success("Login successfully...!");
              window.location.href = "index";
            }
            else{
              toastr.error('invalid logins');
            }
        }
    });
  }


  function register() {
    let fname = $('#regFname').val().trim();
    let lname = $('#regLname').val().trim();
    let email = $('#regEmail').val().trim();
    let phone = $('#regPhone').val().trim();
    let password = $('#regPassword').val().trim();

    if (fname == '') {
      toastr.error('Please Enter First Name');
      $('#regFname').focus();
      return;
    }
    if (lname == '') {
      toastr.error('Please Enter Last Name');
      $('#regLname').focus();
      return;
    }
    if (email == '') {
      toastr.error('Please Enter Email');
      $('#regEmail').focus();
      return;
    }
    if (phone == '') {
      toastr.error('Please Enter Phone Number');
      $('#regPhone').focus();
      return;
    }
    if (password == '') {
      toastr.error('Please Enter Password');
      $('#regPassword').focus();
      return;
    }
   let regData = new FormData();
    regData.append('fname', fname);
    regData.append('lname', lname);
    regData.append('email', email);
    regData.append('phone', phone);
    regData.append('password', password);
    regData.append('action', 'save_reg');
  //alert("hai");
    $.ajax({
        url: './actions/save_register',
        type: 'POST',
        data: regData,
        processData: false,  // Important for FormData
        contentType: false,  // Important for FormData
        success: function(data) {
            if (data.trim() == "true") {
                toastr.success('Registered Successfully');
                setTimeout(function(){
                $('#registerModal').modal('hide');
                $('#loginModal').modal('show');
                },1000);
            }
        }
    });
  }


function forget() {

    let useremail = $('#forgotEmail').val().trim();

    if (useremail == '') {
      toastr.error('Please Enter Email');
      $('#forgotEmail').focus();
      return;
    }
    
   $.ajax({
    url: './actions/save_register',
    type: 'POST',
    data: {'action': 'userValidate', 'useremail': useremail},
    success: function (data) {
        console.log('Server Response:', data);

        if (data.trim() == "true") {
            toastr.success('Email sent Successfully');
            setTimeout(function () {
                $('#FooterModal').modal('hide');
                $('#VerifyModal').modal('show');
            }, 1000);
        } else {
            toastr.error('Invalid logins');
        }
    },
    error: function (jqXHR, textStatus, errorThrown) {
        console.error('AJAX Error:', textStatus, errorThrown);
    }
});
  }

function validation() {

    let OTP = $('#OTP').val();
    let verifyOTP  = $('#verifyOTP').val();

    if (OTP == verifyOTP){
            toastr.success("Captcha verified successfully..!");
            setTimeout(function(){
                    $('#VerifyModal').modal('hide');
                    $('#ChangePassModal').modal('show');
                }, 1000);
            }
            else{
              toastr.error('Captcha Doesnt Match');
            }
}

function validate() {
    // alert('aaaa');
    let username = $('#username').val();
    let npassword = $('#npassword').val();
    let cpassword = $('#cpassword').val();

    if(npassword == ''){
      toastr.error("Enter New Password...");
      //alert('enter password');
      $('#npassword').focus();
      return false;
    }else if(cpassword == ''){
      toastr.error("Please Confirm Password...");
      //alert('confirm password');
      $('#cpassword').focus();
      return false;
    }else if(cpassword != npassword){
      toastr.error("Passwords Mismatch...");
      $('#cpassword').focus();
      return false;
    }else{
      return true;
    }
  }
 function loginval(){
    //alert('hhhh');
    let hid = $('#hiddenid').val();
    let cpass = $('#cpassword').val();


    if(validate()){
      
    //alert("haiii");
  $.ajax({
    url: './actions/save_register',
    type: 'POST',
     data : {'action' : 'forPassword' ,'hid' : hid , 'cpass' :cpass},
    success: function (data) {
        console.log('Server Response:', data);

        if (data.trim() == "true") {
            toastr.success('Password Change Successfully');
            window.location.href ='index';
        } else {
            toastr.error('Invalid logins');
        }
    },
    error: function (jqXHR, textStatus, errorThrown) {
        console.error('AJAX Error:', textStatus, errorThrown);
    }
});
    }
  }




function checkemail(email) {
    //alert(email);

    $.ajax({
        url: './actions/save_register',
        type: 'POST',
        data: { email: email, 'action1': 'user_email' },
        success: function (data) {
            if (data.trim() == "true") {
                $('#footerEmailError').text('Email Already Exists');
                setTimeout(function (){
                 $('#footerEmailError').text('');
               
                 },3000);

                // console.log(data);
                //toastr.error("Email Already Exists");
                // alert('Email Already Exists');
                $("#footerEmail").val(''); // Corrected the ID here
            }
        }
    });
}


$(function() {
   
   $("form[name='addform']").validate({

    rules: 
    { 
       footerEmail      : "required", 
        },
    // Specify validation error messages
    messages: { 
       footerEmail      : "Please Enter your email", 
    
   },
   
    submitHandler: function(form) {
      
        let formdata = new FormData();
        let x = $('#addform').serializeArray();
        $.each(x, function(i, field){
          formdata.append(field.name,field.value);
        });
        formdata.append('submit' , 'Save');
          
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
              toastr.success('saved successfully...!');
              setTimeout(function (){
                location.href = "index";
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