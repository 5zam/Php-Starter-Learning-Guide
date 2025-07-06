<?php
// =====================================
//  PHP Basics Course - Part 6
//  Topics: Functions
// =====================================

/* ------------ Functions ----------- */

/*
❓ What is a function and why do we use functions?
✅ Functions are reusable blocks of code that perform specific tasks.
   Benefits: Code reusability, organization, easier maintenance, and testing.
   Functions have their own local scope, separate from global scope.
   
   Function Syntax:
   function functionName($arg1, $arg2, ...) {
     // code to be executed
     return $value; // optional
   }
*/

// 🧪 Example: Simple function without parameters
echo "<h3>🔧 Basic Functions Examples:</h3>";

function displayWelcomeMessage() {
    echo "🎉 Welcome to our amazing website!<br>";
    echo "We're glad you're here!<br>";
}

echo "Calling function without parameters:<br>";
displayWelcomeMessage();

echo "<br>";

// 🧪 Example: Function with single parameter
function greetUser($name) {
    echo "Hello, $name! Hope you have a great day!<br>";
}

echo "Calling function with one parameter:<br>";
greetUser("Ahmad");
greetUser("Fatima");

echo "<hr>";

/*
❓ How do we pass multiple parameters to functions?
✅ Functions can accept multiple parameters separated by commas.
   Parameters act as local variables inside the function.
   Arguments are the actual values passed when calling the function.
*/

// 🧪 Example: E-commerce price calculation function
echo "<h3>💰 Functions with Multiple Parameters:</h3>";

function calculateTotalPrice($price, $quantity, $taxRate) {
    $subtotal = $price * $quantity;
    $tax = $subtotal * ($taxRate / 100);
    $total = $subtotal + $tax;
    
    echo "Item Price: $price OMR<br>";
    echo "Quantity: $quantity<br>";
    echo "Subtotal: $subtotal OMR<br>";
    echo "Tax ({$taxRate}%): $tax OMR<br>";
    echo "<strong>Total: $total OMR</strong><br><br>";
}

calculateTotalPrice(100, 3, 15); // laptop
calculateTotalPrice(25, 2, 15);  // mouse

// 🧪 Example: User profile creation
function createUserProfile($firstName, $lastName, $email, $age) {
    $fullName = $firstName . " " . $lastName;
    $domain = substr($email, strpos($email, '@') + 1);
    
    echo "Profile Created:<br>";
    echo "Name: $fullName<br>";
    echo "Email: $email<br>";
    echo "Age: $age years old<br>";
    echo "Email Domain: $domain<br><br>";
}

createUserProfile("Omar", "Al-Salem", "omar@company.com", 28);

echo "<hr>";

/*
❓ How do we return values from functions?
✅ Use the 'return' statement to send data back from a function.
   Functions can return any data type: strings, numbers, arrays, objects.
   Without return, function returns NULL by default.
*/

// 🧪 Example: Mathematical calculations with return values
echo "<h3>📊 Functions with Return Values:</h3>";

function calculateDiscount($originalPrice, $discountPercent) {
    $discountAmount = $originalPrice * ($discountPercent / 100);
    $finalPrice = $originalPrice - $discountAmount;
    
    return $finalPrice;
}

$laptopPrice = calculateDiscount(2000, 20);
$phonePrice = calculateDiscount(800, 15);

echo "Laptop after 20% discount: $laptopPrice OMR<br>";
echo "Phone after 15% discount: $phonePrice OMR<br>";

// 🧪 Example: String processing function
function formatPhoneNumber($phone) {
    // Remove any non-digit characters
    $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
    
    // Format as Saudi number
    if (strlen($cleanPhone) == 9) {
        $formatted = '+968 ' . substr($cleanPhone, 0, 2) . ' ' . 
                     substr($cleanPhone, 2, 3) . ' ' . 
                     substr($cleanPhone, 5, 4);
        return $formatted;
    }
    
    return "Invalid phone number";
}

$phone1 = formatPhoneNumber("501234567");
$phone2 = formatPhoneNumber("55-987-6543");

echo "Formatted phones:<br>";
echo "Phone 1: $phone1<br>";
echo "Phone 2: $phone2<br>";

echo "<br>";

// 🧪 Example: Function returning an array
function getStudentStats($grades) {
    $total = array_sum($grades);
    $count = count($grades);
    $average = $total / $count;
    $highest = max($grades);
    $lowest = min($grades);
    
    return [
        'total' => $total,
        'average' => round($average, 2),
        'highest' => $highest,
        'lowest' => $lowest,
        'grade_count' => $count
    ];
}

$studentGrades = [85, 92, 78, 96, 87];
$stats = getStudentStats($studentGrades);

echo "Student Grade Statistics:<br>";
echo "Total Points: {$stats['total']}<br>";
echo "Average: {$stats['average']}%<br>";
echo "Highest: {$stats['highest']}%<br>";
echo "Lowest: {$stats['lowest']}%<br>";
echo "Number of Grades: {$stats['grade_count']}<br>";

echo "<hr>";

/*
❓ What are default parameters and how do we use them?
✅ Default parameters have preset values that are used when no argument is provided.
   They make functions more flexible and reduce the need for function overloading.
   Default parameters should come after required parameters.
*/

// 🧪 Example: Email sending function with defaults
echo "<h3>📧 Functions with Default Parameters:</h3>";

function sendEmail($to, $subject, $message, $from = "noreply@company.com", $priority = "normal") {
    echo "Email Details:<br>";
    echo "To: $to<br>";
    echo "From: $from<br>";
    echo "Subject: $subject<br>";
    echo "Priority: $priority<br>";
    echo "Message: $message<br>";
    echo "✅ Email sent successfully!<br><br>";
}

// Using all defaults
sendEmail("user@example.com", "Welcome!", "Thank you for joining us!");

// Overriding some defaults
sendEmail("admin@example.com", "Alert!", "System backup completed", "system@company.com", "high");

// 🧪 Example: Database connection function
function connectToDatabase($host = "localhost", $username = "root", $password = "", $database = "myapp") {
    echo "Connecting to database:<br>";
    echo "Host: $host<br>";
    echo "Username: $username<br>";
    echo "Database: $database<br>";
    echo "✅ Connection established!<br><br>";
}

// Using defaults
connectToDatabase();

// Custom connection
connectToDatabase("production-server", "app_user", "secure_pass", "production_db");

echo "<hr>";

/*
❓ What is variable scope in functions?
✅ Scope determines where variables can be accessed:
   - Local scope: Variables inside functions
   - Global scope: Variables outside functions
   - Use 'global' keyword to access global variables inside functions
*/

// 🧪 Example: Understanding variable scope
echo "<h3>🌐 Variable Scope Examples:</h3>";

$globalCounter = 0;    // Global variable
$siteName = "MyWebsite";

function incrementCounter() {
    global $globalCounter;  // Access global variable
    $localCounter = 1;      // Local variable
    
    $globalCounter++;
    echo "Local counter: $localCounter<br>";
    echo "Global counter: $globalCounter<br><br>";
}

function displaySiteInfo() {
    global $siteName;
    $pageTitle = "Home Page";  // Local variable
    
    echo "Site: $siteName<br>";
    echo "Page: $pageTitle<br><br>";
}

echo "Before function calls:<br>";
echo "Global counter: $globalCounter<br><br>";

incrementCounter();
incrementCounter();
displaySiteInfo();

echo "After function calls:<br>";
echo "Global counter: $globalCounter<br>";
// echo $localCounter;  // This would cause an error - local variable not accessible
// echo $pageTitle;     // This would cause an error - local variable not accessible

echo "<hr>";

/*
❓ What are anonymous functions and when do we use them?
✅ Anonymous functions (closures) are functions without names.
   They're often used for callbacks, event handlers, and short operations.
   Can be assigned to variables or passed as arguments to other functions.
*/

// 🧪 Example: Anonymous functions for data processing
echo "<h3>🎭 Anonymous Functions Examples:</h3>";

$products = [
    ["name" => "Laptop", "price" => 2500],
    ["name" => "Mouse", "price" => 50],
    ["name" => "Keyboard", "price" => 120],
    ["name" => "Monitor", "price" => 800]
];

// Anonymous function assigned to variable
$applyDiscount = function($price, $discount) {
    return $price * (1 - $discount / 100);
};

echo "Applying 20% discount:<br>";
foreach ($products as $product) {
    $discountedPrice = $applyDiscount($product["price"], 20);
    echo "{$product['name']}: {$product['price']} OMR → $discountedPrice OMR<br>";
}

echo "<br>";

// Using anonymous function with array_map
$prices = [100, 200, 150, 300];

$discountedPrices = array_map(function($price) {
    return $price * 0.85; // 15% discount
}, $prices);

echo "Original prices: " . implode(", ", $prices) . " OMR<br>";
echo "15% discount applied: " . implode(", ", $discountedPrices) . " OMR<br>";

echo "<hr>";

/*
❓ What are arrow functions and how are they different from anonymous functions?
✅ Arrow functions (PHP 7.4+) are a shorter syntax for simple anonymous functions.
   Syntax: fn($parameters) => expression
   They automatically capture variables from parent scope (implicit closure).
   Best for single expressions, not multiple statements.
*/

// 🧪 Example: Arrow functions for quick calculations
echo "<h3>🏹 Arrow Functions Examples:</h3>";

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// Arrow function for doubling numbers
$doubled = array_map(fn($n) => $n * 2, $numbers);
echo "Original: " . implode(", ", $numbers) . "<br>";
echo "Doubled: " . implode(", ", $doubled) . "<br><br>";

// Arrow function for filtering
$evenNumbers = array_filter($numbers, fn($n) => $n % 2 === 0);
echo "Even numbers: " . implode(", ", $evenNumbers) . "<br>";

$largeNumbers = array_filter($numbers, fn($n) => $n > 5);
echo "Numbers > 5: " . implode(", ", $largeNumbers) . "<br><br>";

// Using external variable in arrow function
$multiplier = 3;
$tripled = array_map(fn($n) => $n * $multiplier, $numbers);
echo "Tripled (using external variable): " . implode(", ", $tripled) . "<br>";

// Comparison: Anonymous vs Arrow function
echo "<br>Comparison - Same functionality:<br>";

// Anonymous function
$anonymousSquare = function($x) {
    return $x * $x;
};

// Arrow function  
$arrowSquare = fn($x) => $x * $x;

echo "Anonymous function result: " . $anonymousSquare(5) . "<br>";
echo "Arrow function result: " . $arrowSquare(5) . "<br>";

echo "<hr>";

/*
❓ How do we create and use callback functions?
✅ Callback functions are functions passed as arguments to other functions.
   They allow flexible behavior and are common in event handling and data processing.
*/

// 🧪 Example: Data processing with callbacks
echo "<h3>📞 Callback Functions Examples:</h3>";

function processArray($array, $callback) {
    $result = [];
    foreach ($array as $item) {
        $result[] = $callback($item);
    }
    return $result;
}

$temperatures = [20, 25, 30, 35, 40]; // Celsius

// Convert to Fahrenheit
$fahrenheit = processArray($temperatures, function($celsius) {
    return ($celsius * 9/5) + 32;
});

// Convert to Kelvin
$kelvin = processArray($temperatures, fn($celsius) => $celsius + 273.15);

echo "Celsius: " . implode(", ", $temperatures) . "°C<br>";
echo "Fahrenheit: " . implode(", ", $fahrenheit) . "°F<br>";
echo "Kelvin: " . implode(", ", $kelvin) . "K<br>";

echo "<hr>";

/*
❓ What are some important built-in PHP functions we should know?
✅ PHP has thousands of built-in functions for strings, arrays, dates, files, etc.
   Learning commonly used functions improves productivity and code quality.
*/

// 🧪 Example: Essential built-in functions
echo "<h3>🛠️ Important Built-in Functions:</h3>";

$text = "  Welcome to PHP Programming  ";
$email = "user@example.com";
$date = "2024-12-25";

echo "String Functions:<br>";
echo "Original: '$text'<br>";
echo "Trimmed: '" . trim($text) . "'<br>";
echo "Uppercase: " . strtoupper(trim($text)) . "<br>";
echo "Length: " . strlen(trim($text)) . " characters<br>";
echo "Word count: " . str_word_count(trim($text)) . " words<br><br>";

echo "Email validation:<br>";
echo "Email: $email<br>";
echo "Valid email? " . (filter_var($email, FILTER_VALIDATE_EMAIL) ? "Yes" : "No") . "<br>";
echo "Domain: " . substr($email, strpos($email, '@') + 1) . "<br><br>";

echo "Date Functions:<br>";
echo "Date string: $date<br>";
echo "Formatted: " . date('l, F j, Y', strtotime($date)) . "<br>";
echo "Days from now: " . floor((strtotime($date) - time()) / (60*60*24)) . " days<br>";

echo "<hr>";

/* 🎯 Interview Questions & Answers: */
echo "<h3>🎯 Interview Questions & Answers:</h3>";

echo "<div style='margin: 20px 0;'>";
echo "<strong>1. What's the difference between parameters and arguments?</strong><br>";
echo "<strong>Answer:</strong> Parameters are variables in function definition (\$name, \$age). Arguments are actual values passed when calling function ('Ahmad', 25). Parameters are placeholders, arguments are real data.<br><br>";

echo "<strong>2. What happens if you don't return a value from a function?</strong><br>";
echo "<strong>Answer:</strong> Function returns NULL by default. It's good practice to explicitly return values for clarity, even if returning NULL.<br><br>";

echo "<strong>3. How do default parameters work in PHP?</strong><br>";
echo "<strong>Answer:</strong> Default parameters have preset values used when no argument provided. Must come after required parameters. Example: function greet(\$name, \$greeting = 'Hello')<br><br>";

echo "<strong>4. What's the difference between global and local scope?</strong><br>";
echo "<strong>Answer:</strong> Local scope: variables inside functions, only accessible within that function. Global scope: variables outside functions, accessible everywhere. Use 'global' keyword to access global variables inside functions.<br><br>";

echo "<strong>5. When would you use anonymous functions vs regular functions?</strong><br>";
echo "<strong>Answer:</strong> Anonymous functions for callbacks, short operations, and one-time use. Regular functions for reusable code, complex logic, and when you need a descriptive name.<br><br>";

echo "<strong>6. What's the difference between anonymous functions and arrow functions?</strong><br>";
echo "<strong>Answer:</strong> Arrow functions (fn() =>) are shorter syntax for simple expressions (PHP 7.4+). They auto-capture parent scope variables. Anonymous functions (function()) allow multiple statements and require explicit 'use' for parent variables.<br><br>";

echo "<strong>7. How do you pass a function as a callback to another function?</strong><br>";
echo "<strong>Answer:</strong> Pass function name as string, use anonymous function, or pass variable containing function. Example: array_map('strtoupper', \$array) or array_map(\$myFunction, \$array)<br><br>";

echo "<strong>8. What are some best practices for writing functions?</strong><br>";
echo "<strong>Answer:</strong> Use descriptive names, keep functions small and focused, minimize side effects, use type hints, document with comments, validate input parameters, and return consistent data types.<br><br>";
echo "</div>";


?>