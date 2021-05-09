let phone = document.getElementById("phone");
let order = document.getElementById("order");
let email = document.getElementById("email");
let form = document.getElementById("form");
let checkOrderNumber = document.getElementById("checkOrderNumber");
let checkPhoneNumber = document.getElementById("checkPhoneNumber");
let checkEmailNumber = document.getElementById("checkEmailAddress");

let phoneValidity = -1;
let orderValidity = -1;
let emailValidity = -1;

// Checks if the form is valid
function validateForm() {

    // Validate the phone number
    let phoneNumber = form.phone.value;
    phoneValidity = phoneNumber.search(/^\d{3}-\d{3}-\d{4}$/);
    if (phoneValidity == 0) {
        checkPhoneNumber.style.visibility = "hidden";
    } else {
        checkPhoneNumber.style.visibility = "visible";
        preventSubmit();
    }

    // Validate the email
    let emailAddress = form.email.value;
    emailValidity = emailAddress.search(/^([a-zA-Z0-9\._]+)@([a-zA-Z0-9])+\.([a-z]+)(.[a-z]+)?$/);
    if (emailValidity == 0) {
        checkEmailAddress.style.visibility = "hidden";
    } else {
        checkEmailAddress.style.visibility = "visible";
        preventSubmit();
    }

    // Validate the order number
    let orderNumber = form.order.value;
    orderValidity = orderNumber.search(/^[#]\d{5}[A-Za-z][A-Za-z]$/);
    if (orderValidity == 0) {
        checkOrderNumber.style.visibility = "hidden";
    } else {
        checkOrderNumber.style.visibility = "visible";
        preventSubmit();
    }
}

// Prevent the form to reload the page
function preventSubmit() {
    form.addEventListener("submit", function(event) {

        if (phoneValidity != 0 || orderValidity != 0 || emailValidity != 0) {
            event.preventDefault();
        } else {
            form.submit();
        }

    })
}


