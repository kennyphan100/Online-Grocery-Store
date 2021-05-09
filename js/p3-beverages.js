var modal = document.getElementById("PopUp");
var quantity = document.getElementById("quantity");
var total = document.getElementById("subtotalPrice");
var price = total.innerText.substring(1);

document.getElementById("description_button").onclick = function() {
  modal.style.display = "block";
}

document.getElementsByClassName("exit")[0].onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
function validate(evt) {
    var theEvent = evt || window.event;

    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
        }
    else {
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        }
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
       theEvent.returnValue = false;
       if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

function toggleField(hideObj, showObj) {
    hideObj.disabled = true;
    hideObj.style.display = 'none';
    showObj.disabled = false;
    showObj.style.display = 'inline';
    showObj.focus();
}


function add2Cart() {
    alert(quantity.innerHTML +" items have been added to the cart !");
}

function trash() {
    alert("Your quantity selection has been reset !");
    quantity.innerHTML = 1;
}
function add() {
    quantity.innerHTML ++;
    totalDisplay();
}
function remove() {
    if (quantity.innerHTML>0){
    quantity.innerHTML --;}
    else{
        alert("You cannot choose less than 0 item.")
    }
    totalDisplay();
}
function totalDisplay(){
    total.innerHTML = "$" + (parseFloat(price)*parseFloat(quantity.innerHTML)).toFixed(2);
}

function toggleDescription() {
    desc = document.getElementById("PopUp").style

    if (desc.visibility == "visible") {
        desc.visibility == "hidden"
    }
    else
        desc.visibility == "visible"
}
