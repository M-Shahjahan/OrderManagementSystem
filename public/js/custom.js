$( document ).ready(function() {
    document.getElementById('placeOrder').disabled=true;
    var addItemButtons =document.getElementsByClassName('btn-danger');
    var removeItemButtons =document.getElementsByClassName('btn-outline-primary');
    var priceTagOfItems = document.getElementsByClassName('priceTag');
    var itemQuantity = document.getElementsByClassName('itemQuantity');
    for(let i=0;i<addItemButtons.length;++i){
        addItemButtons[i].addEventListener('click',function () {
            var qty=parseInt(itemQuantity[i].defaultValue)+1;
            itemQuantity[i].defaultValue=qty.toString();
            var price = parseInt(priceTagOfItems[i].innerHTML);
            var sum=parseInt(document.getElementById('amount').innerHTML);
            sum+=price;
            document.getElementById('amount').innerHTML=sum.toString();
            document.getElementById('placeOrder').disabled=false;
        })
    }
    for(let i=0;i<removeItemButtons.length;++i){
        removeItemButtons[i].addEventListener('click',function () {
            var qty=parseInt(itemQuantity[i].defaultValue)-1;

            var price = parseInt(priceTagOfItems[i].innerHTML);
            var sum=parseInt(document.getElementById('amount').innerHTML);
            sum-=price;

            if(sum<=0){
                document.getElementById('amount').innerHTML="0";
                document.getElementById('placeOrder').disabled=true;
                itemQuantity[i].defaultValue=0;
            }
            else{
                itemQuantity[i].defaultValue=qty.toString();
                document.getElementById('amount').innerHTML=sum.toString();
                document.getElementById('placeOrder').disabled=true;
            }
        })
    }

});

$('#placeOrder').on('click',function () {
    var amount = parseInt(document.getElementById('amount').innerHTML);

    $.ajax({
            type:'get',
            url:'/addOrder',
            data:{
                "orderPrice":amount
            },
            dataType:'json',

        }
    );
    console.log('Clicked');
    var itemID = document.getElementsByClassName('itemID');
    var priceTagOfItems = document.getElementsByClassName('priceTag');
    var itemQuantity = document.getElementsByClassName('itemQuantity');
    for(let i=0;i<itemID.length;++i){
        if(itemQuantity[i].defaultValue!=0){
            var price = parseInt(priceTagOfItems[i].innerHTML);
            var qty=parseInt(itemQuantity[i].defaultValue);


            $.ajax({
                type: 'get',
                url: "/addOrderDetails",
                data:{
                    "productID":parseInt(itemID[i].defaultValue),
                    "productPrice": price,
                    "quantity":qty,
                    "orderPrice":(price*qty),
                },
                dataType: 'json',
                success: function (returnedData) {
                    if(returnedData['code']==200){
                        alert('Order Placed');
                        window.location.href='order';
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('Sorry! there is some issue at server side please try later.');
                }
            });

        }
    }
});

$('#password, #password-confirm').on('keyup', function () {
    if($("#password").val().length<8){
        $('#passwordLength').html('Weak').css('color','red');
    }
    else if($("#password").val().length>=8 && $("#password").val().length<12){
        $('#passwordLength').html('Average').css('color','orange');
    }
    else{
        $('#passwordLength').html('Strong').css('color','green');
    }
    if ($('#password').val() == $('#password-confirm').val()) {
        $('#message').html('Matching').css('color', 'green');
        document.getElementById('register-button').disabled=false;
    } else{
        $('#message').html('Not Matching ! Passwords Must Match').css('color', 'red');
        document.getElementById('register-button').disabled=true;
    }
});
$('#show-password').on('click',function () {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
})
