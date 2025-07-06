<?php

// =====================================
//  PHP Basics Course - Part 1
//  Topics: Output & Comments
// =====================================



/*
  This course is structured as:
  ✅ Question → ✅ Answer → ✅ Example
  So it's ideal for both beginners and interview preparation!
*/



/* -------- Output & Comments ------- */
/*
❓What is PHP and how do we output data to the browser?
✅ HyperText Preprocessor, PHP is a server-side scripting language.
can be embedded into HTML easily
code is executed on the server then sent to the client 
meaning code is hidden.
*/

/* Multiple functions that can be used to output data to the browser 
*********************************************************************/

/* 
❓ What's the difference between echo and print?
  🔹 echo: Can take multiple parameters, no return value, slightly faster
  🔸 print: Takes only one parameter, always returns 1, slightly slower

🧪 Example:
*/

// Output using echo
echo "Hello, World! <br>"; // Most common way
echo "First", " Second", " Third<br>"; // echo can take multiple parameters

// Output using print
// print "First", " Second";  // This would cause an error
print("Welcome to PHP! <br>"); // takes one parameter only
/*
----------------------------------------------------------


❓ What is printf() used for in PHP?
✅ printf() prints a formatted string.
🔹 %s is a placeholder for a string, and "product" will replace it.
🔹 It’s useful for formatting numbers, currencies, dates, etc.

🧪 Example:
*/
$product = "Laptop";
$price = 799.95;

printf("The price of %s is $%.2f<br>", $product, $price);
/*
🧪 Output:
The price of Laptop is $799.95
----------------------------------------------------------

❓What does var_dump() do?
✅ A: It shows detailed information about a variable: its type and value.
🔍 Useful for debugging.

🧪 Example:
*/
var_dump("<br>I love PHP");            // For know datatype ,debugging

/*
🧪 Output:
string(11) "I love PHP"
----------------------------------------------------------

❓Why is there HTML inside echo?
✅ A: You can include HTML tags in PHP output.
🔹 <hr> creates a horizontal line in the browser.

🧪 Example:
*/
echo "<hr>";                       // Print line




?>