function increaseQuantity(itemId, price) {
    // alert(itemId);
    // alert(price);
        const quantityDisplay = document.getElementById("quantityDisplay" + itemId);
        const currentValue = parseInt(quantityDisplay.textContent);
        quantityDisplay.textContent = currentValue + 1;
        updateTotal(itemId, price);
        UpdateCart(itemId);
    }

    function decreaseQuantity(itemId, price) {
        const quantityDisplay = document.getElementById("quantityDisplay" + itemId);
        const currentValue = parseInt(quantityDisplay.textContent);
        if (currentValue > 1) {
            quantityDisplay.textContent = currentValue - 1;
            updateTotal(itemId, price);
             UpdateCart(itemId);
        }
    }
       
    window.addEventListener("DOMContentLoaded", (event) => {
        updateTotalAmount();
    });


    function updateTotal(itemId, price) {
    const quantityDisplay = document.getElementById("quantityDisplay" + itemId);
    const totalElement = document.getElementById("totalDisplay" + itemId);
    const itemPriceElement = document.getElementById("itemPrice" + itemId);

    if (itemPriceElement) {
        // const itemPrice = parseFloat(itemPriceElement.textContent.trim().replace('$', ''));
        const quantity = parseInt(quantityDisplay.textContent);
        const total = quantity * price;
        // console.log(total);
        totalElement.textContent = `$${total.toFixed(2)}`;
        updateTotalAmount();
    } else {
        console.error("Item Price element not found");
    }
}

    function updateTotalAmount() {
       
        const totalElements = document.querySelectorAll('[id^="totalDisplay"]');
        let cartTotal = 0;

        totalElements.forEach((totalElement) => {
            const totalAmount = parseFloat(totalElement.textContent.replace('$', ''));
            cartTotal += totalAmount;
        });

        
        const cartTotalDisplay = document.getElementById("cartTotal");
        cartTotalDisplay.textContent = `$${cartTotal.toFixed(2)}`;
    }

   function deleteProduct(id) {
    //alert(id);
  let check = confirm('Are You Sure You want To delete This Data..?');
  if(check) {
  $.ajax({
      url  : "./actions/save_cart",
      type : "post",
      data : { id : id, action : 'delete' },
      success: function(data) {
        //console.log(data);
        if(data.trim() == 'true') {
          toastr.success('deleted successfully...!');
         location.href = "cart";         

        }       
      }
    });
  }
  return false;
}

function UpdateCart(id) {
    //alert(id);
    
    const quantityInput = document.getElementById("quantityDisplay" + id);
    const newQuantity = quantityInput.innerHTML;
    console.log(quantityInput);
    console.log(newQuantity);

    $.ajax({
        url: "./actions/save_cart",
        type: "post",
        data: { id: id, quantity: newQuantity, action: 'update_cart' },
        success: function (data) {
            if (data.trim() == 'true') {
               // toastr.success('Updated successfully...!');
                location.href = "cart";
            }
        }
    });
    return false;
}