<?php
	// Program for creating a randomly generated password from two actual English words
	// so it is slightly easier to remember.
	
	$lines = file("word.list");
	$size = sizeof($lines);
	
	$rand_one = rand(0, $size);
	$rand_two = rand(0, $size);
	
	$word_one = ucfirst(trim($lines[$rand_one]));
	$word_two = ucfirst(trim($lines[$rand_two]));
	
	$password = $word_one . $word_two;
	
	if (stristr($password, "A")) {
		echo "Found 'A'" . "\n"; 
		$password = str_replace("A", "4", $password);
		$password = str_replace("a", "4", $password); 
	} else if (stristr($password, "E")) {
		echo "Found 'E'" . "\n";
		$password = str_replace("E", "3", $password);
		$password = str_replace("e", "3", $password);
	} else if (stristr($password, "G")) {
		echo "Found 'G'" . "\n";
		$password = str_replace("G", "9", $password);
		$password = str_replace("g", "9", $password);
	} else if (stristr($password, "L")) {
		echo "Found 'L'" . "\n";
		$password = str_replace("L", "1", $password);
		$password = str_replace("l", "1", $password);
	} else if (stristr($password, "T")) {
		echo "Found 'T'" . "\n";
		$password = str_replace("T", "7", $password);
		$password = str_replace("t", "7", $password);
	}
	
	echo $password . "\n";
?>