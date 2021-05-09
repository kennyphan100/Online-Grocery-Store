function editAmount(item){
    var valid = false;
    while (!valid){
        var newAmount = prompt("Changing the amount to... ")
        var isNumber = newAmount.search(/[1-9]{1,}/);
        if (isNumber == -1){
            alert("Invalid attempt, trying again,");
        }
        else if (isNumber == 0){
            valid = true;
        }
    }

    var oldAmount = document.getElementById("amount_" + item);
    oldAmount.innerHTML = newAmount;
}


function deleteItem(item){
    var row = document.getElementById(item);
    var ans = confirm("Delete " + item + "?");
    if (ans == true){
        row.remove();
    }
    else{
        alert(item + " will not be deleted.")
    }
}


function addItem(){
    //Retrieves information of the new item
    var list = document.getElementById("new_item");
    var index = list.selectedIndex;
    var itemName = list.options[index].value;
    var itemAmount = document.getElementById("number_item").value;

    var table = document.getElementById("order_table");
    var isNumber = itemAmount.search(/[1-9]{1,}/);

    //Checks if the item already exists in the order or if the amount is invalid
    if (document.body.contains(document.getElementById(itemName))){
        alert("Item already exists! Change the amount or delete it.");
    }else if (isNumber == -1){
        alert("Invalid amount. Please input again.")
    }else{
        var row = table.insertRow(-1);
        var itemCell = row.insertCell(0);
        var editCell = row.insertCell(1);
        var deleteCell = row.insertCell(2);

        row.setAttribute('id', itemName);
    
        //Adding item image and name into first cell
        var img = document.createElement('IMG');
        var p = document.createElement('INS');
        p.innerText = itemName;
        img.setAttribute('src', '../images/' + itemName + '.jpg');
        itemCell.setAttribute('id', 'item');
        itemCell.appendChild(img);
        itemCell.appendChild(p);
    
        //Setting attribute to editCell
        editCell.setAttribute('id',"amount_" + itemName);
    
        //Adding Textfield to change amount
        var editText = document.createElement('input');
        editText.setAttribute('type', 'text');
        editText.setAttribute('placeholder', "> 0");
        editText.setAttribute('pattern', "^[1-9][0-9]*$");
        editText.setAttribute('name', itemName);
        editText.setAttribute('value', itemAmount);
        editText.setAttribute('required', "true");
        editCell.appendChild(editText);
    
        //Adding Delete button in the last cell
        var delButton = document.createElement('BUTTON');
        delButton.setAttribute('type', 'button');
        delButton.setAttribute('class', 'button');
        delButton.setAttribute('id', 'delete');
        delButton.setAttribute('onclick', "deleteItem('" + itemName + "')");
        delButton.innerText = "Delete";
        deleteCell.appendChild(delButton);
    }
}