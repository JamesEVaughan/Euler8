<html>

<head>
    <title>Project Euler: Problem 8</title>
</head>

<body>
    <b>Problem:</b> Find the greatest product of five consecutive digits in the 
	1000-digit number. <br />
	
    <b>Solution: </b> <br />
	<?php
		// Using <br /> tags to make line breaks output properly
	    echo "Running PHP code now, hope you have number.dat<br />";
		
		// number.dat should have the number save as plain text with no whitespace
		$fTheNum = @fopen("number.dat", "rb");
		// If the file isn't there, just don't bother
		if ($fTheNum === false) {
			echo "Couldn't find number.dat, do you have it in your local directory?<br />";
			return;
		}
		
		$tempArr = array();
		
		// Main loop
		while (!feof($fTheNum)) {
			$digit = ord(fgetc($fTheNum)) - 48;	// Sets $digit to the actaul digit value
			if ($digit > 9 || $digit < 0) {
				// Then it ain't a real number
				continue;
			}
			$tempArr[] = $digit;
			
			if (!$digit) {
				// It's a zero, pop it off and find the largest product
				array_pop($tempArr);
				foreach ($tempArr as $tempy) {
					echo $tempy;
				}
				echo "<br />";
				$tempArr = array();
			}
		}
	?>
</body>
</html>