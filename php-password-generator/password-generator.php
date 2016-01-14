<?php
   // Program for creating a randomly generated password from two actual English words
   // so it is slightly easier to remember (although some of the words are not common).

   // Readability is passed to the script to tell it how readable the user wants their
   // password to be. If the user wants a more memorable password, then it will be more
   // readable but less secure. Of course the reverse could happen as well with a very
   // secure password that is not that memorable (or readable).
   $readability = $_POST["readability"];

   // Grab the word list file and get its size.
   $adjectives = file('adjectives.list');
   $animals = file('animals.list');
   $size_adjectives = sizeof($adjectives);
   $size_animals = sizeof($animals);

   // Get two random index from the word list file
   $rand_adjective = rand(0, $size_adjectives);
   $rand_animal = rand(0, $size_animals);

   // Select the two words from the word list file using the random indexes
   $word_one = ucfirst(trim($adjectives[$rand_adjective]));
   $word_two = ucfirst(trim($animals[$rand_animal]));

   // If the readability is 3, then we use the harder word list rather than the
   // adjectives and animals word lists.
   if ($readability == 3) {
      $words = file('tiny-word.list');
      $size = sizeof($words);

      // Get two random index from the word list file
      $rand_one = rand(0, $size);
      $rand_two = rand(0, $size);

      // Select the two words from the word list file using the random indexes
      $word_one = ucfirst(trim($words[$rand_one]));
      $word_two = ucfirst(trim($words[$rand_two]));
   }

   // Check the newly made password for particular characters that can be replaced by
   // either numbers or symbols. Those that are found are added to an array so that
   // the program can keep track of all the valid characters.

   // Check for Word One
   $valid_characters_one = array();
   $valid_characters_count_one = 0;

   // Cover all my vowels
   if (stristr($word_one, "A")) {
      array_push($valid_characters_one, "A");
      $valid_characters_count_one++;
   }
   if (stristr($word_one, "E")) {
      array_push($valid_characters_one, "E");
      $valid_characters_count_one++;
   }
   if (stristr($word_one, "I")) {
      array_push($valid_characters_one, "I");
      $valid_characters_count_one++;
   }
   if (stristr($word_one, "O")) {
      array_push($valid_characters_one, "O");
      $valid_characters_count_one++;
   }
   if (stristr($word_one, "U")) {
      array_push($valid_characters_one, "U");
      $valid_characters_count_one++;
   }
   // Cover a couple of consonants
   if (stristr($word_one, "G")) {
      array_push($valid_characters_one, "G");
      $valid_characters_count_one++;
   }
   if (stristr($word_one, "S")) {
      array_push($valid_characters_one, "S");
      $valid_characters_count_one++;
   }
   if (stristr($word_one, "T")) {
      array_push($valid_characters_one, "T");
      $valid_characters_count_one++;
   }


   // Check for Word Two
   $valid_characters_two = array();
   $valid_characters_count_two = 0;

   // Cover all my vowels
   if (stristr($word_two, "A")) {
      array_push($valid_characters_two, "A");
      $valid_characters_count_two++;
   }
   if (stristr($word_two, "E")) {
      array_push($valid_characters_two, "E");
      $valid_characters_count_two++;
   }
   if (stristr($word_two, "I")) {
      array_push($valid_characters_two, "I");
      $valid_characters_count_two++;
   }
   if (stristr($word_two, "O")) {
      array_push($valid_characters_two, "O");
      $valid_characters_count_two++;
   }
   if (stristr($word_two, "U")) {
      array_push($valid_characters_two, "U");
      $valid_characters_count_two++;
   }
   // Cover a couple of consonants
   if (stristr($word_two, "G")) {
      array_push($valid_characters_two, "G");
      $valid_characters_count_two++;
   }
   if (stristr($word_two, "S")) {
      array_push($valid_characters_two, "S");
      $valid_characters_count_two++;
   }
   if (stristr($word_two, "T")) {
      array_push($valid_characters_two, "T");
      $valid_characters_count_two++;
   }

   // The program shuffles the array of valid characters, thus "randomizing" which character
   // is replaced from the valid characters. We take the first element of the shuffled array
   // as the character to be replaced in the password.
   shuffle($valid_characters_one);
   shuffle($valid_characters_two);

   // Go through all the valid charcters, replacing them with either a number or symbol to
   // make the password stronger. The number of characters replaced depends on the
   // readability level passed to this script.

   if ($readability == 1) {
      // Readability = 1
      // Replace at most one letter per word, passwords should resemble english

      $changed_char_count_one = 0;
      for ($i = 0; $i < $valid_characters_count_one; $i++) {
         $changing_character = $valid_characters_one[$i];

         if ($changing_character == "A"
            && $changed_char_count_one < 1) {
            $word_one = str_replace("A", "4", $word_one);
            $word_one = str_replace("a", "@", $word_one);
            $changed_char_count_one++;
         }
         else if ($changing_character == "E"
            && $changed_char_count_one < 1) {
            $word_one = str_replace("E", "3", $word_one);
            $word_one = str_replace("e", "3", $word_one);
            $changed_char_count_one++;
         }
         else if ($changing_character == "I"
            && $changed_char_count_one < 1) {
            $word_one = str_replace("I", "1", $word_one);
            $word_one = str_replace("i", "1", $word_one);
            $changed_char_count_one++;
         }
         else if ($changing_character == "O"
            && $changed_char_count_one < 1) {
            $word_one = str_replace("O", "0", $word_one);
            $word_one = str_replace("o", "0", $word_one);
            $changed_char_count_one++;
         }
         else if ($changing_character == "S"
            && $changed_char_count_one < 1) {
            $word_one = str_replace("S", "$", $word_one);
            $word_one = str_replace("s", "$", $word_one);
            $changed_char_count_one++;
         }
      }

      $changed_char_count_two = 0;
      for ($i = 0; $i < $valid_characters_count_two; $i++) {
         $changing_character = $valid_characters_two[$i];

         if ($changing_character == "A"
            && $changed_char_count_two < 1) {
            $word_two = str_replace("A", "4", $word_two);
            $word_two = str_replace("a", "@", $word_two);
            $changed_char_count_two++;
         }
         else if ($changing_character == "E"
            && $changed_char_count_two < 1) {
            $word_two = str_replace("E", "3", $word_two);
            $word_two = str_replace("e", "3", $word_two);
            $changed_char_count_two++;
         }
         else if ($changing_character == "I"
            && $changed_char_count_two < 1) {
            $word_two = str_replace("I", "1", $word_two);
            $word_two = str_replace("i", "1", $word_two);
            $changed_char_count_two++;
         }
         else if ($changing_character == "O"
            && $changed_char_count_two < 1) {
            $word_two = str_replace("O", "0", $word_two);
            $word_two = str_replace("o", "0", $word_two);
            $changed_char_count_two++;
         }
         else if ($changing_character == "S"
            && $changed_char_count_two < 1) {
            $word_two = str_replace("S", "$", $word_two);
            $word_two = str_replace("s", "5", $word_two);
            $changed_char_count_two++;
         }
      }
   } else if ($readability == 2) {
      // Readability = 2
      // Replace up to two letters per word. The passwords should be secure but also
      // somewhat easier to remember than readability = 3

      $changed_char_count_one = 0;
      for ($i = 0; $i < $valid_characters_count_one; $i++) {
         $changing_character = $valid_characters_one[$i];

         if ($changing_character == "A"
            && $changed_char_count_one < 2) {
            $word_one = str_replace("A", "4", $word_one);
            $word_one = str_replace("a", "@", $word_one);
            $changed_char_count_one++;
         }
         else if ($changing_character == "E"
            && $changed_char_count_one < 2) {
            $word_one = str_replace("E", "3", $word_one);
            $word_one = str_replace("e", "3", $word_one);
            $changed_char_count_one++;
         }
         else if ($changing_character == "I"
            && $changed_char_count_one < 2) {
            $word_one = str_replace("I", "1", $word_one);
            $word_one = str_replace("i", "1", $word_one);
            $changed_char_count_one++;
         }
         else if ($changing_character == "O"
            && $changed_char_count_one < 2) {
            $word_one = str_replace("O", "0", $word_one);
            $word_one = str_replace("o", "0", $word_one);
            $changed_char_count_one++;
         }
         else if ($changing_character == "S"
            && $changed_char_count_one < 2) {
            $word_one = str_replace("S", "$", $word_one);
            $word_one = str_replace("s", "$", $word_one);
            $changed_char_count_one++;
         }
      }

      $changed_char_count_two = 0;
      for ($i = 0; $i < $valid_characters_count_two; $i++) {
         $changing_character = $valid_characters_two[$i];

         if ($changing_character == "A"
            && $changed_char_count_two < 2) {
            $word_two = str_replace("A", "4", $word_two);
            $word_two = str_replace("a", "@", $word_two);
            $changed_char_count_two++;
         }
         else if ($changing_character == "E"
            && $changed_char_count_two < 2) {
            $word_two = str_replace("E", "3", $word_two);
            $word_two = str_replace("e", "3", $word_two);
            $changed_char_count_two++;
         }
         else if ($changing_character == "I"
            && $changed_char_count_two < 2) {
            $word_two = str_replace("I", "1", $word_two);
            $word_two = str_replace("i", "1", $word_two);
            $changed_char_count_two++;
         }
         else if ($changing_character == "O"
            && $changed_char_count_two < 2) {
            $word_two = str_replace("O", "0", $word_two);
            $word_two = str_replace("o", "0", $word_two);
            $changed_char_count_two++;
         }
         else if ($changing_character == "S"
            && $changed_char_count_two < 2) {
            $word_two = str_replace("S", "$", $word_two);
            $word_two = str_replace("s", "5", $word_two);
            $changed_char_count_two++;
         }
      }
   } else {
      // Readability = 3
      // Most secure password, replaces every character it can

      for ($i = 0; $i < $valid_characters_count_one; $i++) {
         $changing_character = $valid_characters_one[$i];

         if ($changing_character == "A") {
            $word_one = str_replace("A", "4", $word_one);
            $word_one = str_replace("a", "@", $word_one);
         }
         else if ($changing_character == "E") {
            $word_one = str_replace("E", "3", $word_one);
            $word_one = str_replace("e", "3", $word_one);
         }
         else if ($changing_character == "I") {
            $word_one = str_replace("I", "1", $word_one);
            $word_one = str_replace("i", "1", $word_one);
         }
         else if ($changing_character == "O") {
            $word_one = str_replace("O", "0", $word_one);
            $word_one = str_replace("o", "0", $word_one);
         }
         else if ($changing_character == "U") {
            $word_one = str_replace("U", "Ü", $word_one);
            $word_one = str_replace("u", "ü", $word_one);
         }
         else if ($changing_character == "G") {
            $word_one = str_replace("G", "9", $word_one);
            $word_one = str_replace("g", "9", $word_one);
         }
         else if ($changing_character == "S") {
            $word_one = str_replace("S", "$", $word_one);
            $word_one = str_replace("s", "5", $word_one);
         }
         else if ($changing_character == "T") {
            $word_one = str_replace("T", "7", $word_one);
            $word_one = str_replace("t", "7", $word_one);
         }
      }

      for ($i = 0; $i < $valid_characters_count_two; $i++) {
         $changing_character = $valid_characters_two[$i];

         if ($changing_character == "A") {
            $word_two = str_replace("A", "4", $word_two);
            $word_two = str_replace("a", "@", $word_two);
         }
         else if ($changing_character == "E") {
            $word_two = str_replace("E", "3", $word_two);
            $word_two = str_replace("e", "3", $word_two);
         }
         else if ($changing_character == "I") {
            $word_two = str_replace("I", "1", $word_two);
            $word_two = str_replace("i", "1", $word_two);
         }
         else if ($changing_character == "O") {
            $word_two = str_replace("O", "0", $word_two);
            $word_two = str_replace("o", "0", $word_two);
         }
         else if ($changing_character == "U") {
            $word_two = str_replace("U", "Ü", $word_two);
            $word_two = str_replace("u", "ü", $word_two);
         }
         else if ($changing_character == "G") {
            $word_two = str_replace("G", "9", $word_two);
            $word_two = str_replace("g", "9", $word_two);
         }
         else if ($changing_character == "S") {
            $word_two = str_replace("S", "$", $word_two);
            $word_two = str_replace("s", "5", $word_two);
         }
         else if ($changing_character == "T") {
            $word_two = str_replace("T", "7", $word_two);
            $word_two = str_replace("t", "7", $word_two);
         }
      }
   }

   // Combine the words into the password
   $password = $word_one . $word_two;
   if ($readability == 3) {
      $password = $word_one . "~" . $word_two;
   }

   // Add an ! and a # depending on readability
   if ($readability >= 2) {
      $password = $password . "!";
   }
   if ($readability == 3) {
      $password = "#" . $password;
   }

   $result = array("password" => $password,);

   echo json_encode($password);

?>