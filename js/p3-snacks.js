function addToCart(){
    var list = document.getElementById("select");
    var index = list.selectedIndex;
    var item_name = document.getElementById("item_name").innerText;
    var item_amount = list.options[index].value;

    if (item_amount == 0){
        alert("Please choose an amount.");
    }
    else{
        alert("Added " + item_amount + " " + item_name + " into cart!");
    }
}