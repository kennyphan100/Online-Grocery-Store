
function addProductToWeeklyDeals(name, price, imageSrc) {
    var node1 = document.createElement("div");
    node1.className = "col-sm-4";

    // var node2 = document.createElement("div");
    // node2.id = "pizza";

    var productImage = document.createElement("img");
    productImage.src = imageSrc;
    productImage.alt = "Pizza";

    var productName = document.createElement("h4");
    productName.textContent = name;
   
    var productPrice = document.createElement("p");
    productPrice.textContent = "$" + price + " each";

    node1.appendChild(productImage);
    node1.appendChild(productName);
    node1.appendChild(productPrice);

    //node1.appendChild(node2);

    var node0 = document.getElementById("featured-products");
    node0.appendChild(node1);
}
