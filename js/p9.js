function editing() {
    
}

function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

// Current product being edited
var editRow = null;

function productUpdate() {
    if ($("#save").text() == " Save ") {
        productUpdateInTable();
    }
    else {
        productAddToTable();
    }
}

function productUpdateInTable() {
    // Add changed product to table
    $(editRow).after(productBuildTableRow());
    // Remove original product
    $(editRow).remove();
    // Clear form fields
    formClear();
    // Change Update Button Text
    $("#updateButton").text("Add");
}

function productBuildTableRow() {
    var addedRow =
    "<tr>" +
		"<td id='FirstName'>" + $("#Firstname").val(""); + "</td>" +
		"<td id='LastName'>" + $("#Lastname").val(""); + "</td>" +
		"<td id='FirstName'>" + $("#Username").val(""); + "</td>" +
		"<th>" +
			"<button type='button' onclick='' class='btn btn-default'> <i class='fas fa-edit'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></button>" +
		"</th>" +
		"<th>" +
			"<button type='button' onclick='deleteRow(this);' class='btn btn-default'> <i class='far fa-trash-alt'></i></button>" +
		"</th>" +
    "</tr>"
    return addedRow;
}

// Add product to <table>
function productAddToTable() {
    // First check if a <tbody> tag exists, add one if not
    if ($("#userlist tbody").length == 0) {
        $("#userlist").append("<tbody></tbody>");
    }
    // Append product to table
    $("#userlist tbody").append(productBuildTableRow());
}

function formClear() {
    $("#Firstname").val("");
    $("#Lastname").val("");
    $("#Username").val("");
}
