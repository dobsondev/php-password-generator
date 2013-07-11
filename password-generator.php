<?php
	// Program for creating a randomly generated password from two actual English words
	// so it is slightly easier to remember.
	
	$lines = file("word.list"); // Put in location on server ect...
	$size = sizeof($lines);
	
	$rand_one = rand(0, $size);
	$rand_two = rand(0, $size);
	
	$word_one = ucfirst(trim($lines[$rand_one]));
	$word_two = ucfirst(trim($lines[$rand_two]));
	
	$password = $word_one . $word_two;
	
	$valid_characters = array();
	// Cover all my vowels
	if (stristr($password, "A")) {
		array_push($valid_characters, "A");
	} 
	if (stristr($password, "E")) {
		array_push($valid_characters, "E");
	}
	if (stristr($password, "I")) {
		array_push($valid_characters, "I");
	}
	if (stristr($password, "O")) {
		array_push($valid_characters, "O");
	}
	if (stristr($password, "U")) {
		array_push($valid_characters, "U");
	}
	// Get a couple of consonants
	if (stristr($password, "G")) {
		array_push($valid_characters, "G");
	}
	if (stristr($password, "S")) {
		array_push($valid_characters, "S");
	}
	if (stristr($password, "T")) {
		array_push($valid_characters, "T");
	}
	shuffle($valid_characters);
	$changing_character = $valid_characters[0];
	
	if ($changing_character == "A") {
		$password = str_replace("A", "4", $password);
		$password = str_replace("a", "4", $password); 
	} 
	else if ($changing_character == "E") {
		$password = str_replace("E", "3", $password);
		$password = str_replace("e", "3", $password); 
	} 
	else if ($changing_character == "I") {
		$password = str_replace("I", "1", $password);
		$password = str_replace("i", "1", $password); 
	} 
	else if ($changing_character == "O") {
		$password = str_replace("O", "0", $password);
		$password = str_replace("o", "0", $password); 
	} 
	else if ($changing_character == "U") {
		$password = str_replace("U", "Ü", $password);
		$password = str_replace("u", "ü", $password); 
	} 
	else if ($changing_character == "G") {
		$password = str_replace("G", "9", $password);
		$password = str_replace("g", "9", $password); 
	} 
	else if ($changing_character == "S") {
		$password = str_replace("S", "\$", $password);
		$password = str_replace("s", "\$", $password); 
	} 
	else if ($changing_character == "T") {
		$password = str_replace("T", "7", $password);
		$password = str_replace("t", "7", $password); 
	}
	
	// Be sure to edit this code to display more eliquently on your webpage, example below:
	/*
		echo "<h2>";
		echo "Your password is: ";
		echo "</h2>";
	
		echo "<h3 style=\"text-align: center; border: 1px solid black; padding: 3px 3px 3px 3px;\">";
		echo $password;
		echo "</h3>";
	*/
	echo $password . "\n";
?>