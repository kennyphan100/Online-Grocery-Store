<?php
    session_start();
	include("../php/P9_10_head_and_header.php");
	
	$file = fopen("../database/users.csv", "r");
	
	$numberOfTheUser = 0;
	$userNumber = 0;

    while(!feof($filename)) {
		if($userNumber != $numberOfTheUser) {
			$line = fgets($filename);
			$array = explode(",", $line);
			$userNumber = $array[1];
		}
    }

	//$DELETE = $line;
	//$data = file($filename);
	//$out = array();
	//foreach($data as $Line) {
	//	if(trim($Line) != $DELETE) {
	//		$out[] = $Line;
	//	}
	//}
	//$fp = fopen($filename, "w+");
	//flock($fp, LOCK_EX);
	//foreach($out as $Line) {
	//	fwrite($fp, $Line);
	//}
	//flock($fp, LOCK_UN);
?>

	<br/>
	<div style="text-align:center;">
		<h3>Login information of the user:</h3>
		<form action="Save_User_Info.php" method="POST">
			<label>Username:</label>
			<input type ="text" name="Username" value =""/>
			<br/> <br/>
			<label>Users password:</label>
			<input type ="text" name="Password" />
			<br/> <br/> <br/>

			<h3>Personnal information of the user:</h3>
			<label>First name of the user:</label>
			<input type ="text" name="Firstname" />
			<br/> <br/>
			<label>Last name of the user:</label>
			<input type ="text" name="Lastname" />
			<br/> <br/>

			<label>Users email:</label>
			<input type="text" name="email">
			<!--This following srcipt has been found on the website: 
				https://stackoverflow.com/questions/469357/html-text-input-allow-only-numeric-input-->
			<script>
			function validate(evt) {
				var theEvent = evt || window.event;
				// Handle paste
				if (theEvent.type === 'paste') {
					key = event.clipboardData.getData('text/plain');
				} else {
				// Handle key press
					var key = theEvent.keyCode || theEvent.which;
					key = String.fromCharCode(key);
				}
				var regex = /[0-9]|\./;
				if( !regex.test(key) ) {
					theEvent.returnValue = false;
					if(theEvent.preventDefault) theEvent.preventDefault();
				}
			}</script>
			<br/> <br/>
			<label>Phone number:</label>
			(<input name="tel1" type="tel" pattern="[0-9]{3}" placeholder="XXX" aria-label="3-digit area code" size="1" maxlength="3" onkeypress='validate(event)'/>)
			<input name="tel2" type="tel" pattern="[0-9]{3}" placeholder="XXX" aria-label="3-digit prefix" size="1" maxlength="3" onkeypress='validate(event)'/> -
			<input name="tel3" type="tel" pattern="[0-9]{4}" placeholder="XXXX" aria-label="4-digit number" size="1" maxlength="4" onkeypress='validate(event)'/>
			<br/> <br/> <br/>

			<h3>Address information of the user:</h3>
			<label>House number:</label>
				<input type="address_info" name="HouseNumber">  
			<br/> <br/>

			<label>Address type:</label>
			<select name="address_type" onchange="if(this.options[this.selectedIndex].value=='Other'){
				toggleField(this,this.nextSibling);this.selectedIndex='0';}">
				<option></option>
				<option>Alley</option>
				<option>Avenue</option>
				<option>Boulevard</option>
				<option>Street</option>
				<option value="Other">Other</option>
			</select>
			<input name="AddressType" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
			<br/> <br/>

			<label>Street name:</label>&nbsp;
			<textarea name ="StreetName" rows = "2" columns = "20"></textarea>
			<br/> <br/>

			<label>City:</label>&nbsp;
			<input type="text" name="City">
			<br/> <br/>

			<label>Postal code:</label>
			<input type="text" name="PostalCode">
			<br/> <br/>

			<label>Country:</label>
			<input type="text" name="Country">
			<br/> <br/> <br/> <br/>

			<h6> Click to confirm any changes </h6>
			<input type="submit" name = "submit" value ="Save" class="button button1" id = "save"/>
		</form>
	</div>
<?php
	include("../php/Save_User_Info.php");
	
	//if($userNumber == $numberOfTheUser) {
		//	$fileContents = file_get_contents($filename);
		//	$fileContents = str_replace($line, '', $fileContents);
		//	file_put_contents($filename, $fileContents);
	//}
	
	fclose($filename);
	include("../php/P9_10_footer.php");
?>