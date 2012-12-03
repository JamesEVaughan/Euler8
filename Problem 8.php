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
		
		// number.dat should have the number save as plain text with no whitespace
		$fTheNum = @fopen("number.dat", "rb");
		// If the file isn't there, just don't bother
		if ($fTheNum === false) {
			echo "Couldn't find number.dat, do you have it in your local directory?<br />";
			return;
		}
		
		$tempArr = array();
		$answer = 0;
		
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
				
				$tempy = findGreatest5($tempArr);
				if ($answer < $tempy) {
					$answer = $tempy;
				}
				// Reset values and continue the search
				$tempArr = array();
			}
		}
		
		echo "The answer we found was: ".$answer."<br />";
		echo "I hope we got it right! ^_^<br />";
		
		echo "<br />Ed: We did!";
		
		/******************Function definitions**************************/
		function findGreatest5($array)
		{
			// Finds the five consecutive elements of an array with the greatest product
			// Returns largest the product found or a negative if there are none
			
			if (count($array) < 5) {
				// This covers arrays being too small and not being arrays at all
				return -1;
			}
			
			$theKeys = array_keys($array);
			$total = -1;	// Reigning champ total
			$tempTotal = 1;	// Upstart total
			$tempAns = array_shift($theKeys);	// Upstart, err, start
			
			$counter = 4;
			
			foreach ($array as $i => $elem) {
				$tempTotal *= $elem;
				
				if ($counter) {
					$counter--;
				} else {
					if ($total < $tempTotal) {
						// New total has been found
						$total = $tempTotal;
					}
					
					// Divide off the previous first elem and get a new one
					$tempTotal /= $array[$tempAns];
					$tempAns = array_shift($theKeys);
				}
			}
			
			// Now we should have the five with the greatest product
			return $total;
		}
	?>
</body>
</html>