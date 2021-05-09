
/* Detailed Description Button*/
let acc = document.getElementsByClassName("accordion");
for (let i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    let slide = this.nextElementSibling;
    if (slide.style.maxHeight) {
      slide.style.maxHeight = null;
    } else {
      slide.style.maxHeight = slide.scrollHeight + "px";
    }
  });
}

/* Change quantity and update subtotal*/
let quantity = document.getElementById("quantity");
let subtotal = document.getElementById("subtotalPrice");
let itemPrice = subtotal.innerText.substring(1); //Gets the price without the "$" symbol

function changeSubtotal() {
  subtotal.innerHTML = "$" + (parseFloat(itemPrice)*parseFloat(quantity.innerHTML)).toFixed(2);
}

function add() {
    quantity.innerHTML = parseFloat(quantity.innerHTML) + 1;
    changeSubtotal();
}

function remove() {
    if (quantity.innerHTML > 0) {
        quantity.innerHTML = parseFloat(quantity.innerHTML) - 1;
        changeSubtotal();
    }
}

/* Remove item from cart */
function trash() {
  alert("Successfully removed from the cart.")
  quantity.innerText = 0;
  changeSubtotal();
}

/* Add item to cart */
function add2Cart() {
    alert("Successfully added " + quantity.innerHTML +  " items into the cart.")
}


