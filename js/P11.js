function deleteCard(card_id){
    // var card = document.getElementById(card_id);
    // var name = card.querySelector("#FirstName").innerHTML;

    var ans = confirm("This will delete " + "Joe's" + "'s Order.");

    if (ans == false){
        alert("order will NOT be deleted.")
        return false;
    }
    else{
        card.remove();
        return true;
    }
}