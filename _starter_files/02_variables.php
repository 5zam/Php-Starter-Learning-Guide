<?php
// =====================================
// Part 2: Variables, Data Types, Arrays, Conditionals, Loops
// =====================================

/* -------- Variables -------- */

/*
❓ What is a variable in PHP?
✅ A variable is used to store data like strings, numbers, arrays, etc.
   - In PHP, variables start with a dollar sign `$`
   - Names are case-sensitive
   - Must start with a letter or underscore

🧪 Example:
*/
$name = "Ahmed";
$age = 33;
echo "Name: $name, Age: $age <br>";

/* -------- Data Types -------- */

/*
❓ What are the main data types in PHP?
✅ PHP supports several data types:
   🔹 String
   🔹 Integer
   🔹 Float (double)
   🔹 Boolean
   🔹 Array
   🔹 Object
   🔹 NULL
   🔹 Resource (e.g., file handles, database connections)

🧪 Example:
*/
$text = "Hello";      // String
$number = 100;         // Integer
$price = 99.99;        // Float
$isAvailable = true;   // Boolean
$nothing = null;       // NULL
$langs = ["PHP", "JS"];// Array
$person = new stdClass();
$person->name = "Ali";  // Object
$file = fopen("sample.txt", "r"); // Resource

/* -------- Variable Naming -------- */

/*
❓ What are the rules for naming variables?
✅ Rules:
   - Start with $ sign
   - Followed by small letter or underscore
   - Case-sensitive
   - No spaces or hyphens allowed

🧪 Valid Examples:
*/
$firstName = "Noor";
$_private = "yes";
$user123 = "User";

/* -------- String Concatenation -------- */
// Here we use . instead of +
$first = "Ahmed";
$last = "Al Jabri";

$full1 = $first . " " . $last;
$full2 = "$first $last"; //interpolation
$full3 = "{$first} {$last}";
$full4 = $first;
$full4 .= " "; //added with previous 
$full4 .= $last;//added with previous 

echo "$full1<br>$full2<br>$full3<br>$full4<br>";

/* -------- Escaping Characters -------- 

❓ What is escaping characters in PHP?
✅ Escaping means using backslash (\) to insert special characters inside       strings.
   It's useful when you want to include quotes inside a quoted string.

🎯 Real-world example: You want to display a movie review with quotes
*/

// ✅ Correct usage with escaping
echo "She said \"Harry Potter\" is her favorite movie!<br>";

// ✅ Alternative using single quotes (no need to escape double quotes)
echo 'She said "Harry Potter" is her favorite movie!<br>';

/*🧪 Output:
She said "Harry Potter" is her favorite movie!<br>
It's magical!<br>

/* -------- Type Checking -------- */

/*
❓ How can we check and inspect variables in PHP?
✅ PHP offers many functions to inspect or check variable types.

🧪 Example:
*/
$first = "Hello";
$nothing = null;
$langs = ["PHP", "JavaScript"];
$person = (object) ["name" => "Alice"];

// Check if variable is set
var_dump(isset($first));      // ✅ true if variable is declared and not null

// Check if variable is empty
var_dump(empty($first));      // ✅ true if variable is empty ("", 0, null, false, [])

// Get the type of variable
echo gettype($first) . "<br>"; // ✅ returns "string"

// Check specific types
var_dump(is_string($first));     // true
var_dump(is_int($age));          // true
var_dump(is_bool($isAvailable)); // true
var_dump(is_array($langs));      // true
var_dump(is_object($person));    // true
var_dump(is_null($nothing));     // true

/*
📌 Summary:
🔸 `isset($var)`: true if the variable exists and is not null
🔸 `is_null($var)`: true only if the variable is null
🔸 `empty($var)`: true if variable is considered empty (null, false, "", 0, [], etc.)

🎯 Example Use Case:
👉 Before using a variable from a form or external input, always check with `isset()` or `empty()` to avoid errors.
*/

/* -------- Variable Scope -------- 
❓ What is Variable Scope in PHP?
✅ Scope means where a variable is accessible within your code.

PHP has 3 main types of scope:

🌍 Global: Variable defined outside any function.

🧩 Local: Variable defined inside a function — only visible there.

📦 Static: Special local variables that remember their value between function calls 
🧪 Example:
*/
$globalVar = 'Global Scope';
/*
This variable is declared outside the function.

It’s global, so by default it’s NOT  accessible inside functions ❌
------------------------------------------------------------------------
❓How do we use a global variable inside a function?
🔹There are two ways:

1. global keyword
*/
function showScope() {
    global $globalVar;
    echo "Inside Function: $globalVar<br>";
    echo "Using GLOBALS: {$GLOBALS['globalVar']}<br>";
}
showScope();
/*✅ This brings the global variable into local scope of the function.
2. $GLOBALS array (Superglobal)*/
echo $GLOBALS['globalVar'];
/*
✅ $GLOBALS is a built-in array in PHP that contains all global variables.
✅ It allows you to access or even change global variables from anywhere.
*/


/* -------- Type Casting -------- 

❓ What is Type Casting in PHP?
✅ Type casting means converting a value from one data type to another.
   - You can cast manually using (int), (string), (bool), etc.
   - Or use helper functions like intval(), floatval(), strval()

🧪 Example:
*/
$str = "123.45";
echo intval($str) . "<br>";       // 🔹 123 (convert string to integer)
echo floatval($str) . "<br>";     // 🔹 123.45 (convert string to float)
echo strval(789) . "<br>";        // 🔹 "789" (convert number to string)
echo (int) 3.9 . "<br>";          // 🔹 3 (manual cast float to int)
echo (string) true . "<br>";      // 🔹 "1" (true becomes string "1")
echo (bool) 0 . "<br>";           // 🔹 false (0 is falsy)


?>