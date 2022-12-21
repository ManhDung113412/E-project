var quantityVal = $("#quantity").val();
quantityVal = 1;

$(#)
$(document).ready(function(){
    $("#incrementQuantity").click(function(){
        quantityVal++;
        console.log(quantityVal);
    });

    $("#decrementQuantity").click(function(){
        if(quantityVal > 1){
            quantityVal--;
            console.log(quantityVal);
        }
    });
    // $.ajax({
    //     url: '{{  url()  }}',
    //     method: 'GET',
    //     data: {qty: qtyVal2, item_id: itemidVal2, id: idVal2, cart_id: cartidVal2 },
    //     cache: false,
    //     dataType: 'html',
    //     success: function(data) {
    
    //     },
    // });

});





