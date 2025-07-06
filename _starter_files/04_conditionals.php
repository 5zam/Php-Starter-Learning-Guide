<?php

// =====================================
//  PHP Basics Course - Part 4
//  Topics: Conditionals & Operators
// =====================================



/* ------------ Operators ----------- */

/*
❓ What are comparison operators in PHP?
✅ They are used to compare values in conditions.
*/

/*
🔸 Common Operators:
<  Less than  
>  Greater than  
<= Less than or equal to  
>= Greater than or equal to  
== Equal (value)  
=== Identical (value & type)  
!= Not equal  
!== Not identical
*/

// 🧪 Example:
$age = 18;
if ($age >= 18) {
  echo "✅ You can register.<br>";
} else {
  echo "❌ Too young to register.<br>";
}

// 🧪 Example: Age verification system
$userAge = 25;
$minAge = 18;

echo "<h3>🔍 Comparison Operators Examples:</h3>";
echo "User age: $userAge, Minimum age: $minAge<br><br>";

// Less than
echo "Is user younger than 30? " . ($userAge < 30 ? "Yes" : "No") . "<br>";

// Greater than
echo "Is user older than minimum age? " . ($userAge > $minAge ? "Yes" : "No") . "<br>";

// Less than or equal to
echo "Is user 25 or younger? " . ($userAge <= 25 ? "Yes" : "No") . "<br>";

// Greater than or equal to
echo "Is user eligible (18+)? " . ($userAge >= 18 ? "Yes" : "No") . "<br>";

// Equal to (loose comparison)
echo "Is user exactly 25? " . ($userAge == 25 ? "Yes" : "No") . "<br>";
echo "Is '25' == 25? " . ('25' == 25 ? "Yes" : "No") . " (string vs number)<br>";

// Identical to (strict comparison)
echo "Is user exactly 25 (strict)? " . ($userAge === 25 ? "Yes" : "No") . "<br>";
echo "Is '25' === 25? " . ('25' === 25 ? "Yes" : "No") . " (type matters)<br>";

// Not equal to
echo "Is user not 20? " . ($userAge != 20 ? "Yes" : "No") . "<br>";

// Not identical to
echo "Is user not exactly '25' (strict)? " . ($userAge !== '25' ? "Yes" : "No") . "<br>";

echo "<hr>";

/*
❓ What are logical operators and when do we use them?
✅ Logical operators combine multiple conditions together.
   && (AND), || (OR), ! (NOT) are the most common ones.
*/

// 🧪 Example: User permission system
$isLoggedIn = true;
$isAdmin = false;
$hasPermission = true;
$userRole = "editor";

echo "<h3>🔗 Logical Operators Examples:</h3>";

// AND operator (&&)
echo "Can user edit? " . ($isLoggedIn && $hasPermission ? "Yes" : "No") . "<br>";
echo "Can user delete? " . ($isLoggedIn && $isAdmin ? "Yes" : "No") . "<br>";

// OR operator (||)
echo "Can user access dashboard? " . ($isAdmin || $userRole == "editor" ? "Yes" : "No") . "<br>";
echo "Is user staff? " . ($isAdmin || $userRole == "editor" || $userRole == "moderator" ? "Yes" : "No") . "<br>";

// NOT operator (!)
echo "Is user not admin? " . (!$isAdmin ? "Yes" : "No") . "<br>";
echo "Is user logged out? " . (!$isLoggedIn ? "Yes" : "No") . "<br>";

// Complex combinations
echo "Can user publish? " . ($isLoggedIn && ($isAdmin || $userRole == "editor") ? "Yes" : "No") . "<br>";

echo "<hr>";

/*
❓ What are arithmetic operators in PHP?
✅ Arithmetic operators perform mathematical calculations.
   +, -, *, /, %, ** are the main arithmetic operators.
*/

// 🧪 Example: Shopping cart calculation
$price = 100;
$quantity = 3;
$discount = 15; // percentage
$shippingCost = 25;

echo "<h3>🧮 Arithmetic Operators Examples:</h3>";

// Multiplication
$subtotal = $price * $quantity;
echo "Subtotal (\$price * \$quantity): $subtotal<br>";

// Multiplication and Division (for percentage calculation)
$discountAmount = $subtotal * ($discount / 100);
echo "Discount amount: $discountAmount<br>";

// Subtraction
$afterDiscount = $subtotal - $discountAmount;
echo "After discount: $afterDiscount<br>";

// Division
$installments = 4;
$monthlyPayment = $afterDiscount / $installments;
echo "Monthly payment: $monthlyPayment<br>";

// Addition (adding shipping cost)
$finalTotal = $afterDiscount + $shippingCost;
echo "Final total with shipping: $finalTotal<br>";

// Power
$compound = 1000 * (1.05 ** 3); // 5% interest for 3 years
echo "Compound interest example: $compound<br>";

// Modulo practical example
$totalItems = 25;
$itemsPerPage = 10;
$remainingItems = $totalItems % $itemsPerPage;
echo "Items on last page: $remainingItems<br>";

echo "<hr>";
/* ---------- If & If-Else Statements --------- */

/*
❓ How do if statements work in PHP?
✅ If statements execute code based on conditions.
   Basic syntax: if (condition) { code }
*/

// 🧪 Example: Weather-based recommendation system
$temperature = 28;
$humidity = 65;
$isRaining = false;

echo "<h3>🌤️ If Statement Examples:</h3>";

// Simple if statement
if ($temperature > 30) {
    echo "It's hot! Stay hydrated and avoid direct sunlight.<br>";
}

// If-else statement
if ($temperature < 15) {
    echo "It's cold! Wear warm clothes.<br>";
} else {
    echo "Temperature is comfortable.<br>";
}

// If-elseif-else statement
if ($temperature > 35) {
    echo "Extreme heat warning! Stay indoors.<br>";
} elseif ($temperature > 25) {
    echo "Perfect weather for outdoor activities!<br>";
} elseif ($temperature > 15) {
    echo "Mild weather, light jacket recommended.<br>";
} else {
    echo "Cold weather, dress warmly.<br>";
}

// Nested if statements
if (!$isRaining) {
    echo "No rain detected.<br>";
    if ($humidity > 70) {
        echo "High humidity - might rain later.<br>";
    } else {
        echo "Low humidity - clear skies ahead.<br>";
    }
} else {
    echo "It's raining! Take an umbrella.<br>";
}

echo "<hr>";

/*
❓ What are assignment operators in PHP?
✅ Assignment operators assign values to variables and can perform operations.
   =, +=, -=, *=, /=, .= are common assignment operators.
*/

// 🧪 Example: Gaming score system
$score = 0;
$lives = 3;
$playerName = "Ahmad";

echo "<h3>🎮 Assignment Operators Examples:</h3>";
echo "Initial score: $score<br>";

// Basic assignment
$score = 100;
echo "After first level: $score<br>";

// Addition assignment
$score += 50; // Same as $score = $score + 50
echo "After bonus: $score<br>";

// Subtraction assignment
$score -= 25; // Same as $score = $score - 25
echo "After penalty: $score<br>";

// Multiplication assignment
$score *= 2; // Same as $score = $score * 2
echo "After multiplier: $score<br>";

// Division assignment
$score /= 4; // Same as $score = $score / 4
echo "After division: $score<br>";

// String concatenation assignment
$message = "Player: ";
$message .= $playerName; // Same as $message = $message . $playerName
echo "$message<br>";

// Increment and decrement
$lives++; // Same as $lives = $lives + 1
echo "Lives after power-up: $lives<br>";

$lives--; // Same as $lives = $lives - 1
echo "Lives after hit: $lives<br>";

echo "<hr>";

/* -------- Ternary Operator -------- */

/*
❓ What is the ternary operator and when should we use it?
✅ The ternary operator is a shorthand if-else statement.
   Syntax: condition ? value_if_true : value_if_false
   Use it for simple conditions that assign values.
*/

// 🧪 Example: User interface elements
$isLoggedIn = true;
$messageCount = 5;
$userRole = "admin";
$darkMode = false;

echo "<h3>❓ Ternary Operator Examples:</h3>";

// Simple ternary
$greeting = $isLoggedIn ? "Welcome back!" : "Please login";
echo "$greeting<br>";

// Nested ternary (use sparingly)
$accessLevel = $isLoggedIn ? ($userRole == "admin" ? "Full Access" : "Limited Access") : "No Access";
echo "Access Level: $accessLevel<br>";

// Ternary with function calls
$notificationText = $messageCount > 0 ? "You have $messageCount new messages" : "No new messages";
echo "$notificationText<br>";

// Ternary for CSS classes
$themeClass = $darkMode ? "dark-theme" : "light-theme";
echo "Theme class: $themeClass<br>";

// Ternary for default values
$userName = isset($_GET['name']) ? $_GET['name'] : "Guest";
echo "Username: $userName<br>";

// Multiple ternary operations
$statusColor = $messageCount > 10 ? "red" : ($messageCount > 5 ? "orange" : "green");
echo "Status indicator color: $statusColor<br>";

echo "<hr>";

/* -------- Switch Statements ------- */

/*
❓ What is a switch statement and when should we use it?
✅ Switch statements compare a variable against multiple values.
   They're cleaner than multiple if-elseif statements when checking equality.
   Use switch when you have many possible values for one variable.
*/

// 🧪 Example: Day of the week scheduler
$dayOfWeek = date('N'); // 1 = Monday, 7 = Sunday
$currentDay = date('l'); // Full day name
$userRole = "manager";

echo "<h3>🗓️ Switch Statement Examples:</h3>";
echo "Today is: $currentDay<br>";

// Basic switch statement
switch ($dayOfWeek) {
    case 1:
        echo "Monday: Team meeting at 9 AM<br>";
        break;
    case 2:
        echo "Tuesday: Client calls scheduled<br>";
        break;
    case 3:
        echo "Wednesday: Project review day<br>";
        break;
    case 4:
        echo "Thursday: Training session<br>";
        break;
    case 5:
        echo "Friday: Weekly report due<br>";
        break;
    case 6:
    case 7:
        echo "Weekend: Rest and recharge!<br>";
        break;
    default:
        echo "Invalid day<br>";
        break;
}

// Switch with string values
$orderStatus = "shipped";

switch ($orderStatus) {
    case "pending":
        echo "Order Status: Waiting for payment<br>";
        break;
    case "processing":
        echo "Order Status: Being prepared<br>";
        break;
    case "shipped":
        echo "Order Status: On the way to you!<br>";
        break;
    case "delivered":
        echo "Order Status: Successfully delivered<br>";
        break;
    case "cancelled":
        echo "Order Status: Order has been cancelled<br>";
        break;
    default:
        echo "Order Status: Unknown status<br>";
        break;
}

// Switch with multiple cases (fall-through)
$userPermission = "editor";

switch ($userPermission) {
    case "admin":
        echo "✅ Can delete users<br>";
        echo "✅ Can manage system settings<br>";
        // Fall through to next case
    case "manager":
        echo "✅ Can view reports<br>";
        echo "✅ Can manage team<br>";
        // Fall through to next case
    case "editor":
        echo "✅ Can edit content<br>";
        echo "✅ Can publish posts<br>";
        // Fall through to next case
    case "user":
        echo "✅ Can view content<br>";
        echo "✅ Can comment<br>";
        break;
    default:
        echo "❌ No permissions<br>";
        break;
}

echo "<hr>";

/*
❓ What is the null coalescing operator?
✅ The null coalescing operator (??) returns the first non-null value.
   It's useful for setting default values when variables might be null.
*/

// 🧪 Example: Configuration with defaults
$config = [
    'theme' => 'dark',
    'language' => 'en'
    // 'timezone' is missing
];

echo "<h3>🔧 Null Coalescing Operator Examples:</h3>";

// Traditional way
$theme = isset($config['theme']) ? $config['theme'] : 'light';
echo "Theme (traditional): $theme<br>";

// Null coalescing way
$language = $config['language'] ?? 'en';
echo "Language: $language<br>";

$timezone = $config['timezone'] ?? 'Asia/Muscat';
echo "Timezone: $timezone<br>";

// Chaining null coalescing
$userLanguage = null;
$systemLanguage = 'ar';
$defaultLanguage = 'en';

$lang = $userLanguage ?? $systemLanguage ?? $defaultLanguage;
echo $lang; // Output: ar

echo "<hr>";

/*
❓ What is the spaceship operator?
✅ The spaceship operator (<=>) compares two values and returns:
   -1 if left is smaller, 0 if equal, 1 if left is greater
   It's useful for sorting and custom comparison functions.
*/

// 🧪 Example: Sorting and comparison
$a = 10;
$b = 20;
$c = 10;

echo "<h3>🚀 Spaceship Operator Examples:</h3>";

echo "10 <=> 20 = " . ($a <=> $b) . " (left is smaller)<br>";
echo "20 <=> 10 = " . ($b <=> $a) . " (left is greater)<br>";
echo "10 <=> 10 = " . ($a <=> $c) . " (equal)<br>";

echo "<h3>💡 When should I use the spaceship operator <=>?</h3>";
echo "<h4>for example, if you have a list of products and want to arrange them according to price</h4>";

$products = [
  ['name' => 'Keyboard', 'price' => 50],
  ['name' => 'Mouse', 'price' => 25],
  ['name' => 'Monitor', 'price' => 200]
];

// Sort products by price (ascending)
usort($products, function ($a, $b) {
    return $a['price'] <=> $b['price'];
});

// Display sorted products
echo "<h3>🛒 Products sorted by price (low to high):</h3>";
foreach ($products as $product) {
    echo "🔹 " . $product['name'] . " - $" . $product['price'] . "<br>";
}
/*
🤔 What’s the comparison rule?
When using the spaceship operator, PHP takes two items at a time from the array and compares them.

🔁 First Comparison:
👉 It compares Keyboard ($50) with Mouse ($25)
🔸 Is 50 > 25? Yes
🔁 So it returns 1 → which means Mouse should come before Keyboard

🔁 Second Comparison:
👉 It compares Keyboard ($50) with Monitor ($200)
🔸 Is 50 < 200? Yes
🔁 So it returns -1 → which means Keyboard stays before Monitor
*/
echo "<hr>";

// Practical use in sorting
$students = [
    ['name' => 'Ahmad', 'grade' => 85],
    ['name' => 'Sara', 'grade' => 92],
    ['name' => 'Omar', 'grade' => 78]
];

// Sort by grade using spaceship operator
usort($students, function($a, $b) {
    return $b['grade'] <=> $a['grade']; // Descending order
});

echo "Students sorted by grade (highest first):<br>";
foreach ($students as $student) {
    echo $student['name'] . ": " . $student['grade'] . "<br>";
}

echo "<hr>";

/* 🎯 Interview Questions Summary: */
echo "<h3>🎯 Interview Questions Summary:</h3>";
echo "<ol>";
echo "<li>What's the difference between == and === operators?</li>";
echo "<li>When would you use && vs || operators?</li>";
echo "<li>What's the advantage of switch over multiple if-elseif statements?</li>";
echo "<li>How does the ternary operator work and when should you use it?</li>";
echo "<li>What is the null coalescing operator (??) used for?</li>";
echo "<li>Explain the spaceship operator (<=>) with an example</li>";
echo "<li>What happens if you forget 'break' in a switch statement?</li>";
echo "<li>How do you handle default values for variables that might be null?</li>";
echo "</ol>";

/*
🎯 Interview Questions Summary - Answers
== vs ===
== compares value only, === compares value and type.

&& vs ||
&& means both conditions must be true, || means at least one must be true.

Switch vs if-elseif
switch is cleaner and faster when checking one variable against many values.

Ternary operator
A shortcut for simple if-else; useful for inline conditions.

Null coalescing operator ??
Returns the first value that is not null; used for default values.

Spaceship operator <=>
Compares two values; returns -1, 0, or 1 depending on comparison.

Missing break in switch
Code will "fall through" to the next case unintentionally.

Default values for null variables
Use ?? or isset() to assign a fallback value if the variable is null.
*/
?>
