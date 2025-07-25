<?php
/*
 * PHP String Functions Tutorial
 * This file demonstrates string manipulation functions in PHP including:
 * - String length and case functions
 * - String search and replace functions
 * - String trimming and padding functions
 * - String splitting and joining functions
 * - String comparison functions
 * - String formatting functions
 * - Regular expression functions
 * 
 * Joonguini Programming in the Kitchen
 */

/* ---------- String Functions ---------- */

$string = "Hello World";

// Get the length of a string
echo strlen($string);
echo '<br>';

// Find the position of the first occurrence of a substring in a string
echo strpos($string, 'o');
echo '<br>';

// Find the position of the last occurrence of a substring in a string
echo strrpos($string, 'o');
echo '<br>';

// Reverse a string
echo strrev($string);
echo '<br>';

// Convert all characters to lowercase
echo strtolower($string);
echo '<br>';

// Convert all characters to uppercase
echo strtoupper($string);
echo '<br>';

// Uppercase the first character of each word
echo ucwords($string);
echo '<br>';

// String replace
echo str_replace('World', 'Everyone', $string);
echo '<br>';

// Return portion of a string specified by the offset and length
echo substr($string, 0, 5);
echo '<br>';
echo substr($string, 5);
echo '<br>';

// Starts with
if (str_starts_with($string, 'Hello')) {
  echo 'YES';
}
echo '<br>';

// Ends with
if (str_ends_with($string, 'ld')) {
  echo 'YES';
}
echo '<br>';

// HTML Entities
$string2 = '<h1>Hello World</h1>';
echo htmlentities($string2);
echo '<br>';

// Formatted strings - useful when you have outside data
// Different specifiers for different data types
printf('%s is a %s', 'joe', 'nice guy');
echo '<br>';
printf('1 + 1 = %d', 1 + 1);
echo '<br>';
printf('1 + 1 = %f', 1 + 1);
echo '<br>';
