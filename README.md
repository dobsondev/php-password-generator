#PHP Password Generator

##README

This PHP Password Generator creates a randomly generated password from two randomly selected words from either the Unix Dictionary file ("/usr/share/dict/words") or a word from a list of adjectives and a word from a list of animals. The script takes the two words, capitalizes their first letters, and finally concatenates them together. The script then searches the combination word for certain characters. If the script finds these characters, they are added to an array of valid characters. Once all the valid characters are found from the combination word, the array of valid characters is shuffled. The script then takes the first character from the valid characters array, which will be random thanks to the shuffle done to the array. The script then replaces a certain amount of instances of the chosen valid character in the combination word with a number or symbol to increase the strength of the password.

The number of characters replaced is determined by the "readability" level of the password. The user can make the distinction between a more readable password or a more secure password. This will change the amount of mappings that occur.

By default the password generator has 3 levels, but you could change this to best suite your individual needs. Note that if you want to add more levels, you will have to add the code yourself.

The mappings are as follows:

- A ===> 4
- a ===> @
- E ===> 3
- e ===> 3
- I ===> 1
- i ===> 1
- O ===> 0
- o ===> 0
- U ===> Ü
- u ===> ü
- G ===> 9
- g ===> 9
- S ===> $
- s ===> 5
- T ===> 7
- t ===> 7

There is also a 20% chance that the password generator will add an "!" to the end of the password, and another 20% chance that the generator will add a "#" to the front of the password. In the future it would be nice to have a feature which determines how secure the password has to be, and then scale the password with tricks such as these to increase the security.

Once the particular character has been changed to its corresponding symbol or number, the password is returned. The passwords returned look like two english words that are perfectly readable (although granted some of the words in the Unix dictionary are not regularly used in everyday language).

##INSTALLATION

###WordPress

If you are using WordPress (which is what this is made for) then simply copy the entire php-password generator folder into the directory of the theme you are using. Next, open the template-password-generator.php file and modify the $THEME_FOLDER variable to match the folder of the theme you are using.

Everything should work from here. You can simply select the page you want to contain the password generator, give it the template of "PHP Password Generator" and then everything should work on that page.

###Non-WordPress

Non WordPress users have to make your own template that works by calling the password-generator.js file as an AJAX call. You will have to read the code and figure this out on your own. Good luck!

##CONTACT

If you have any problems, concerns, or improvements, feel free to contact me at alex@dobsondev.com. Of course this project is available at Git Hub under https://github.com/SufferMyJoy/php-password-generator so feel free to branch this project and make any changes you want. One of the large improvements that could be made is making the word list only common words to help readability of the passwords generated.

##LICENSE

Copyright (C) 2013 - 2014 Alex Dobson

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You can read about the GNU General Public License at [http://opensource.org/licenses/GPL-3.0](http://opensource.org/licenses/GPL-3.0), or write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA to receive a copy.