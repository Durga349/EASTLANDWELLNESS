var shippingAmountElement;

$('input[name="shipping_type"]').change(function () {
    var selectedShippingType = $('input[name="shipping_type"]:checked').val();
    var action = $('#action').text(); 
    //console.log(action);
    if (action == 'buynow') {
        if (selectedShippingType == 'standard') 
        {
            shippingAmountElement = $('#shipping_amount').text();
        } 
        else 
        if (selectedShippingType == 'express') 
        {
            shippingAmountElement = $('#shipping_amount1').text();
        }

    } 
    else 
    if (action == 'checkout') 
    {
        if (selectedShippingType == 'standard') 
        {
            shippingAmountElement = $('#shipping_amount2').text();
        }
         else 
         if (selectedShippingType == 'express') 
        {
            shippingAmountElement = $('#shipping_amount3').text();
        }
    }

    console.log(shippingAmountElement);

});


function checkemail(email)
{
// alert(email); 

    $.ajax({
            url : './actions/save_checkout',
            type : 'POST',
            data: {email : email, 'action1' : 'user_email'},
            success : function(data)
            {
                if (data == "true")
                {
                  alert('Email Already Exists');
                  $("#email").val('');
                }
               
            }
        });
   
}

$(function () {
    $("form[name='addressForm']").validate({
    rules: { 
       email          : "required", 
       first_name     : "required", 
       last_name      : "required", 
       address        : "required", 
       city           : "required", 
       state          : "required", 
       zip_code       : "required", 
       ph_number      : "required", 
       shipping_type  : "required", 
       payment_type   : "required", 
    },
    
    messages:  { 
       email          : "Please Enter your Email", 
       first_name     : "Please Enter your First Name", 
       last_name      : "Please Enter your Last Name", 
       address        : "Please Enter your Address", 
       city           : "Please Enter your City", 
       state          : "Please Enter your State", 
       zip_code       : "Please Enter your Zip Code", 
       ph_number      : "Please Enter your Phone Number", 
       shipping_type  : "Please Select your Shipping Type", 
       payment_type   : "Please Select your Payment Type", 
    },
        submitHandler: function (form) {
             // alert("hai");
            var tax_amount = $('#tax_amount').text();
            var subTotal = $('#subtotal').text();
            // console.log(subTotal);
             
            var action = $('#action').text();
            
            var ProId = $('#ProId').text();
            var proCount = $('.singleCount').text();
           // console.log(proCount);

            let formdata = new FormData();
            let x = $('#addressForm').serializeArray();
            $.each(x, function (i, field) {
                formdata.append(field.name, field.value);
            });

            formdata.append('submit', 'Save');
            formdata.append('subTotal', subTotal);
            formdata.append('shippingAmountElement', shippingAmountElement);
            formdata.append('tax_amount', tax_amount);
            formdata.append('ProId', ProId);
            formdata.append('proCount', proCount);
          
            $.ajax({
                type: "POST",
                url: "./actions/save_checkout",
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                data: formdata,
                success: function (data) {
                    if (data.trim() == 'true') {
                        toastr.success('Save Address Successfully');
                        setTimeout(function (){
                        location.href = "payment_review?action="+action;                
                        }, 1000);
                    }else{
                        toastr.error(data);
                    }
                }
            });
        }
    });
});
