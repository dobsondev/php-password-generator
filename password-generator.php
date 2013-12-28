<?php
   // Program for creating a randomly generated password from two actual English words
   // so it is slightly easier to remember (although some of the words are not common).

   $words = file('tiny-word.list');
   $size = sizeof($words);

   $rand_one = rand(0, $size);
   $rand_two = rand(0, $size);

   $word_one = ucfirst(trim($words[$rand_one]));
   $word_two = ucfirst(trim($words[$rand_two]));

   $password = $word_one . $word_two;

   // Check the newly made password for particular characters that can be replaced by
   // either numbers or symbols. Those that are found are added to an array so that
   // the program can keep track of all the valid characters.
   $valid_characters = array();
   $valid_characters_count = 0;

   // Cover all my vowels
   if (stristr($password, "A")) {
      array_push($valid_characters, "A");
      $valid_characters_count++;
   }
   if (stristr($password, "E")) {
      array_push($valid_characters, "E");
      $valid_characters_count++;
   }
   if (stristr($password, "I")) {
      array_push($valid_characters, "I");
      $valid_characters_count++;
   }
   if (stristr($password, "O")) {
      array_push($valid_characters, "O");
      $valid_characters_count++;
   }
   if (stristr($password, "U")) {
      array_push($valid_characters, "U");
      $valid_characters_count++;
   }
   // Cover a couple of consonants
   if (stristr($password, "G")) {
      array_push($valid_characters, "G");
      $valid_characters_count++;
   }
   if (stristr($password, "S")) {
      array_push($valid_characters, "S");
      $valid_characters_count++;
   }
   if (stristr($password, "T")) {
      array_push($valid_characters, "T");
      $valid_characters_count++;
   }

   // The program shuffles the array of valid characters, thus "randomizing" which character
   // is replaced from the valid characters. We take the first element of the shuffled array
   // as the character to be replaced in the password.
   shuffle($valid_characters);

   // Go through all the valid charcters, replacing them with either a number or symbol to make
   // the password stronger
   for ($i = 0; $i <= $valid_characters_count; $i++) {
      $changing_character = $valid_characters[$i];

      if ($changing_character == "A") {
         $password = str_replace("A", "4", $password);
         $password = str_replace("a", "@", $password);
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
         $password = str_replace("S", "$", $password);
         $password = str_replace("s", "5", $password);
      }
      else if ($changing_character == "T") {
         $password = str_replace("T", "7", $password);
         $password = str_replace("t", "7", $password);
      }
   }

   // There is a 20% that an '!' will be added to the end of the password
   if (rand(0, 7) == 5) {
      $password = $password . "!";
   }
   if (rand(0, 7) == 5) {
      $password = "#" . $password;
   }

   echo json_encode($password);
?>