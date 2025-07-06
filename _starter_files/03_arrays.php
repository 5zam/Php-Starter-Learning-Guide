
<?php
// =====================================
//  PHP Basics Course - Part 4
//  Topics: Arrays
// =====================================


/*
❓ What is an array?
✅ An array is a variable that can hold multiple values.
   There are 3 types:
   🔹 Indexed arrays
   🔹 Associative arrays
   🔹 Multidimensional arrays
*/

// 🧪 Example: List of grocery items (Indexed Array)
$groceries = ["Milk", "Bread", "Eggs"];
echo $groceries[1] . "<br>"; // Output: Bread<br>

// 🧪 Example: User information (Associative Array)
$user = [
  "name" => "Layla",
  "email" => "layla@example.com",
  "is_active" => true
];
echo $user["email"]. "<br>"; // Output: layla@example.com<br>

// 🧪 Example: List of products with prices (Multidimensional Array)
$products = [
  ["name" => "Laptop", "price" => 750],
  ["name" => "Mouse", "price" => 25],
  ["name" => "Keyboard", "price" => 50],
];
echo $products[1]["name"]. "<br>"; // Output: Mouse<br>

/*
❓ How to add and modify array items?
✅ You can append using [] or array_push(), or update specific indexes.
*/
$tasks = ["Check email", "Team meeting"];
echo "1- ";
echo implode(", ", $tasks) . "<br>";


$tasks[] = "Write report"; // Add to end
echo "2- ";
echo implode(", ", $tasks) . "<br>";


array_push($tasks, "Plan sprint1","Plan sprint2");  // Add multiple
echo "3- ";
echo implode(", ", $tasks) . "<br>";


$tasks[0] = "Reply to emails"; // Modify first
echo "4- ";
echo implode(", ", $tasks) . "<br>";



/*
❓ How to remove elements from an array?
✅ Use unset(), array_pop(), or array_shift()
*/
echo "<br>";
unset($tasks[1]);                  // Remove by index
echo implode(", ", $tasks) . "<br>";
$lastTask = array_pop($tasks);     // Remove last
echo implode(", ", $tasks) . "<br>";
echo $lastTask;
echo "<br>";
$firstTask = array_shift($tasks);  // Remove first
echo implode(", ", $tasks) . "<br>";
echo $firstTask;
echo "<br>";
/*
❓ Useful Array Functions:
*/
$skills = ["PHP", "JavaScript", "Python"];
echo count($skills); // Output: 3<br>
echo "<br>";
echo in_array("PHP", $skills) ? "Found" : "Not found"; // Found<br>
echo "<br>";
echo "-------------------------------------";
// 🧪 Keys and values
// 🔍 Get all keys (field names) and values from associative array
echo "<br>";
print_r(array_keys($user));      // Output: ["name", "email", "is_active"]
echo "<br>";
print_r(array_values($user));    // Output: ["Layla", "layla@example.com", true]

echo "<br>";
echo "-------------------------------------";
// 🧪 Merge arrays
// 🔧 Combine two arrays together
$backend = ["PHP", "Node.js"];
$frontend = ["React", "Vue"];
$stack = array_merge($backend, $frontend);
echo "<br>";
print_r($stack); // Output: ["PHP", "Node.js", "React", "Vue"]
echo "<br>";
echo "-------------------------------------";
echo "<br>";
// 🧪 Spread operator (PHP 7.4+)
// 💡 Same as merge but cleaner syntax
$stack2 = [...$backend, ...$frontend];
print_r($stack2);
echo "<br>";
echo "-------------------------------------";
echo "<br>";
// 🧪 Combine related values
// 🎨 Assign meaning to each color
$colors = ["Red", "Green", "Blue"];
$meanings = ["Love", "Growth", "Calm"];
$colorMeaning = array_combine($colors, $meanings);
print_r($colorMeaning); // Output: ["Red" => "Love", "Green" => "Growth", "Blue" => "Calm"]
echo "<br>";


// 🧪 Flip keys and values
// 🔁 Swap keys and values (useful for reverse lookup)
print_r(array_flip($colorMeaning));
echo "<br>";

// 🧪 Range of numbers
// 📅 Generate a range like days of the week (1 to 7)
$days = range(1, 7);
print_r($days); // Output: [1, 2, 3, 4, 5, 6, 7]
echo "<br>";

/*❓ What is array_map used for?
✅ It transforms every element of an array
*/

$emails = ["joe@example.com", "amy@example.com"];
$maskedEmails = array_map(fn($email) => "User: $email", $emails);
print_r($maskedEmails);
echo "<br>";

/*
❓ What is array_filter used for?
✅ It filters elements based on a condition
*/
$grades = [95, 40, 88, 60, 70];
$passed = array_filter($grades, fn($grade) => $grade >= 60);
print_r($passed);
echo "<br>";
/*
❓ What is array_reduce used for?
✅ It reduces an array to a single value (e.g., sum)
*/
$total = array_reduce($grades, fn($sum, $g) => $sum + $g);
echo $total; // Total score<br>
echo "<br>";

/*
❓ How to work with JSON and arrays?
✅ Convert array to JSON with json_encode(), and JSON to object with json_decode()
*/

// 🧪 Real-world: Send user profile from PHP to JavaScript
$profile = ["name" => "Salim", "email" => "salim@example.com"];
$jsonProfile = json_encode($profile); // Convert to JSON format string
echo $jsonProfile; // Output: {"name":"Salim","email":"salim@example.com"}<br>

// 🧪 Real-world: Receive JSON (e.g., API response) and convert it to usable object
$decoded = json_decode($jsonProfile);
echo $decoded->name; // Output: Salim<br>

/* 🎯 Summary:
✅ Arrays allow storing and managing grouped data
✅ Functions like count(), in_array(), array_merge(), array_map(), and json_encode() make arrays powerful
*/

?>
