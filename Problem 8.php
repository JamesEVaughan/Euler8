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
		
		// The number is stored in number.dat
		$fTheNum = @fopen("number.dat", "rb");
		// If the file isn't there, just don't bother
		if ($fTheNum === false) {
			echo "Couldn't find number.dat, do you have it in your local directory?<br />";
			return;
		}
		
		$zeroCounter = 0;
		
		while (!feof($fTheNum)) {
			$digit = ord(fgetc($fTheNum)) - 48;
			if (!$digit) {
				$zeroCounter++;
				echo "Found a zero!".$zeroCounter."<br />";
			}
		}
	?>
</body>
</html>