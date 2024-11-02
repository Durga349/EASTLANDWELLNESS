
 function increaseQuantity() {
    const quantityInput = document.getElementById("quantityInput");
    quantityInput.value = parseInt(quantityInput.value) + 1;
    updateHiddenField();
}

function decreaseQuantity() {
    const quantityInput = document.getElementById("quantityInput");
    const currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
         updateHiddenField();
    }
}
 function updateHiddenField() {
        var quantityInput = document.getElementById('quantityInput');
        var hiddenField = document.getElementById('hidQuant');
        var OverAllPrice = document.getElementById('OverAllPrice');
        hiddenField.value = quantityInput.value;
    }

function addToCart() {
    if ($("form[name='addformpage']").valid()) {
        let formdata = new FormData();
        let x = $('#addformpage').serializeArray();
        $.each(x, function(i, field){
            formdata.append(field.name, field.value);
        });
        formdata.append('action', 'save');

        $.ajax({
            type: "POST",
            url: "./actions/save_cart", 
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            data: formdata,
            success: function (data) {
                if (data.trim() == 'true') {
                  toastr.success('Added to cart successfully...!');
                    setTimeout(function () {
                        location.href = "cart.php"; 
                    }, 1000);
                } else {
                    toastr.error("Data not saved successfully");
                }
            }
        });
    }
}

function buyNow() {
    // var hidQuantValue = document.getElementById('hidQuant').value;
   // var prodId =<?php echo $prodId; ?>;
    //console.log(prodId);
     if ($("form[name='addformpage']").valid()) {
        let formdata = new FormData();
        let x = $('#addformpage').serializeArray();
        $.each(x, function(i, field){
            formdata.append(field.name, field.value);
        });
        formdata.append('Submit', 'Save');

        $.ajax({
            type: "POST",
            url: "./actions/save_cart", 
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            data: formdata,
            success: function (data) {
                if (data.trim() == 'true') {
                  //toastr.success('Added to cart successfully...!');
                    setTimeout(function () {
                        location.href = "payment_address?action=buynow"; 
                    }, 1000);
                } else {
                    toastr.error("Data not saved successfully");
                }
            }
        });
    }
}
   



