function add(target) {
    var b = target.parentNode;
    b = b.parentNode;
    var name = b.getElementsByClassName("productName")[0].getElementsByTagName("h2")[0].innerText;
    var quantity = b.getElementsByClassName("addProduct")[0].getElementsByTagName("span")[0].innerText;
    var price = b.getElementsByClassName("price")[0].getElementsByTagName("h3")[0].innerText;
    console.log(quantity);
    quantity = parseFloat(quantity);
    console.log(price);
    quantity = quantity + 1;
    increase(b, quantity);
    b.getElementsByClassName("addProduct")[0].getElementsByTagName("span")[0].innerText = quantity;
    cart();
    b.getElementsByClassName("addProduct")[0].getElementsByTagName("span")[0].value = quantity;
    // var writephp = "<?php $productArra = $_SESSION[\"productArray\"];foreach($productArra as $value){if(strcmp($value[\"productName\"],$name)){$value[\"quantity\"] =" + quantity + ";}}?>";


}
var emptyCart = document.createElement("div");
emptyCart.setAttribute("class", "container-fluid mt-100");
emptyCart.innerHTML = "<div class=\"row\"><div class=\"col-md-12\"><div class=\"card\"><div class=\"card-body cart\"><div class=\"col-sm-12 empty-cart-cls text-center\"> <img src=\"https://i.imgur.com/dCdflKN.png\" width=\"130\" height=\"130\" class=\"img-fluid mb-4 mr-3\"><h3><strong>Your Cart is Empty</strong></h3><a href=\"#\" class=\"btn btn-primary cart-btn-transform m-3\" data-abc=\"true\">continue shopping</a></div></div></div></div></div>"
empty = false;
var cartNode = document.getElementById("prod").getElementsByClassName("item");
console.log(cartNode);
if (cartNode.length == 0) {
    empty = true;
    document.getElementById("prod").appendChild(emptyCart);
}
document.addEventListener("load", cart());

// function deleteItem(target) {
//     var container = document.getElementsByClassName("products");
//     var a = target.parentNode;
//     a = a.parentNode;
//     a = a.parentNode;
//     a = a.parentNode;
//     container[0].removeChild(a);
//     console.log(container[0].children.length);
//     if (container[0].children.length == 1) {
//         console.log("hello");
//         container[0].appendChild(emptyCart);
//         empty = true;
//     }
//     cart();
// }

function sub(target) {
    var b = target.parentNode;
    b = b.parentNode;
    var quantity = b.getElementsByClassName("addProduct")[0].getElementsByTagName("span")[0].innerText;
    var price = b.getElementsByClassName("price")[0].getElementsByTagName("h3")[0].innerText;
    quantity = parseFloat(quantity);
    if (quantity - 1 == 0) {
        deleteItem(target);
    }
    quantity = quantity - 1;
    subtract(b, quantity, price);
    b.getElementsByClassName("addProduct")[0].getElementsByTagName("span")[0].innerText = quantity;
    cart();


}

function subtract(parentNode, quantity, price) {
    p = parentNode.getElementsByClassName("totalPrice")[0].getElementsByTagName("h3")[0];
    price = price.slice(1, price.length);
    price = parseFloat(price);
    var totalPrice = quantity * price;
    totalPrice = totalPrice.toPrecision(3);
    totalPrice = "$" + totalPrice;
    p.innerText = totalPrice;

}

function increase(parentNode, quantity) {
    var a = parentNode.children;
    var c = a[2];
    c = c.getElementsByTagName("h3");
    var price = c[0].innerText;
    price = price.slice(1, price.length);
    console.log(price)
    price = parseFloat(price);
    var totalPrice = quantity * price;
    totalPrice = totalPrice.toPrecision(3);
    totalPrice = "$" + totalPrice;
    c = a[3].getElementsByTagName("h3")[0];
    c.innerText = totalPrice;

}


function cart() {
    if (empty == true) {
        var ele = document.getElementsByClassName("total")[0].getElementsByTagName("dl");
        ele[0].innerText = "$" + 0;
        ele[3].innerText = "$" + 0;
        ele[2].innerText = "$" + 0;
    }
    var price = 0;
    for (var i = 1; i < (document.getElementsByClassName("products")[0].children.length); i++) {
        var total = document.getElementsByClassName("products")[0].children[i].getElementsByClassName("totalPrice")[0].getElementsByTagName("h3")[0].innerText;
        total = total.slice(1, total.length);
        price = price + parseFloat(total);
    }
    var ele = document.getElementsByClassName("total")[0].getElementsByTagName("dl");
    ele[0].innerText = "$" + price;
    price = price + 5;
    ele[3].innerText = "$" + price;

}

document.addEventListener("load", add());
var quantity = document.getElementsByClassName("addProduct")[0].getElementsByTagName("span")[0].innerText;
var price = document.getElementsByClassName("totalPrice")[0].getElementsByTagName("")

function checkout() {
    if (empty == true) {
        alert("You have not Selected any Item");
    }
}