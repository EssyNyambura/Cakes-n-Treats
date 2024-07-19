var pickupMessage = "Please choose either delivery or pick up";
var deliveryMessage = "Please choose either delivery or pick up";

function check(event) { 
    event.preventDefault(); // Prevents default form submission

    var delivery = document.getElementById('deliveryCheckbox').checked;
    var pickup = document.getElementById('pickupCheckbox').checked;

    if (!delivery && !pickup) {
        alert(pickupMessage);
    } else {
        ordermsg();
        
    }
}

function ordermsg(){
    alert("Order received! Thank you for your order!"); 
}

