<?php
    session_start();
	include("../php/P9_10_head_and_header.php");
	$filename = "users.csv";

	if(file_exists($filename) && is_readable($filename) && is_writable($filename))
        $file = fopen($filename, "r+");
?>

		<br/>
		<div style="text-align:center;">
			<input type = "button" Value = "Add" onclick = 'addRow();'>

			<script>
				function addRow($users_array) {
					var row = document.getElementById('userlist').insertRow();

					var cellFirstName = row.insertCell(0);
					var cellLasttName = row.insertCell(1);
					var cellUserName = row.insertCell(2);
					var cellEdit = row.insertCell(3);
					var cellDelete = row.insertCell(4);
					
					cellFirstName.id = 'Firstname';
					cellLasttName.id = 'Lastname';
					cellUserName.id = 'Username';
					cellEdit.id = 'Edit';
					cellDelete.id = 'Delete';
					
					cellFirstName.innerHTML = $users_array[2];
					cellLasttName.innerHTML = $users_array[3];
					cellUserName.innerHTML = $users_array[0];
					cellEdit.innerHTML = "<button type='button' class='btn btn-default'> <i class='fas fa-edit'></i></button>";
					cellDelete.innerHTML = "<button type='button' onclick='deleteRow(this);' class='btn btn-default'> <i class='far fa-trash-alt'></i></button>";

					$numberOfTheUser = 0;
					$userNumber = 0;
					while(!feof($filename)) {
						if($userNumber != $numberOfTheUser) {
							$line = fgets($filename);
							$array = explode(",", $line);
							$userNumber = $array[1];
						}
					}
					row.id = $userNumber + 1;
				}
			</script>
		
			<table border="2" id = "userlist" width = "60%">

				<tr id = "0">
					<th width = "20%" id ='Firstname'>First name</th>
					<th id = 'Lastname'>Last name</th>
					<th id = 'Username'>Username</th>
					<th id = 'Edit'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
					<th id = 'Delete'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delete&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
				</tr>
				<?php
				if (($file = fopen("../database/users.csv", "r")) != FALSE)
				{
					while (($user_data = fgetcsv($file, 1000, ",")) != FALSE)
					{
						$users_array[]= $user_data;
					}
				}
				$users_number = count($users_array);

				for($i = 0; $i < $users_number; $i++) {
					addRow();
				}
				?>
			</table>

			<script>
				deleteRow(item) {
					var row = document.getElementById(item);
					var ans = confirm("Delete " + item + "?");

					if (ans == true){
						row.remove();
					}
					else{
						alert(item + " will not be deleted.")
					}
				}
			</script>
		</div>
<?php
	include("../php/P9_10_footer.php");
?>