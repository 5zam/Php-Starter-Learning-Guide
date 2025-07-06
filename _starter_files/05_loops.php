<?php
// =====================================
//  PHP Basics Course - Part 5
//  Topics: Loops & Iteration
// =====================================

/* -------- Loops & Iteration ------- */

/* ------------ For Loop ------------ */

/*
❓ What is a for loop and when should we use it?
✅ A for loop repeats code a specific number of times.
   Use it when you know exactly how many iterations you need.
   
   Syntax: for (initialize; condition; increment) {
     // code to be executed
   }
*/

// 🧪 Example: Building a multiplication table
echo "<h3>🔢 For Loop Examples:</h3>";

$number = 5;
echo "Multiplication table for $number:<br>";

for ($i = 1; $i <= 10; $i++) {
    $result = $number * $i;
    echo "$number × $i = $result<br>";
}

echo "<br>";

// 🧪 Example: Creating a countdown timer
echo "Rocket launch countdown:<br>";
for ($countdown = 10; $countdown >= 1; $countdown--) {
    echo "T-minus $countdown seconds...<br>";
}
echo "🚀 Blast off!<br><br>";

// 🧪 Example: Generating a progress bar
echo "Loading progress:<br>";
for ($progress = 0; $progress <= 100; $progress += 10) {
    $bars = str_repeat("█", $progress / 10);
    $spaces = str_repeat("░", (100 - $progress) / 10);
    echo "[$bars$spaces] $progress%<br>";
}

echo "<hr>";

/* ------------ While Loop ------------ */

/*
❓ What is a while loop and when should we use it?
✅ A while loop repeats code as long as a condition is true.
   Use it when you don't know the exact number of iterations needed.
   
   Syntax: while (condition) {
     // code to be executed
   }
*/

// 🧪 Example: User login attempts
echo "<h3>🔄 While Loop Examples:</h3>";

$maxAttempts = 3;
$attempts = 0;
$correctPassword = "secret123";
$userPassword = "wrong"; // Simulating wrong password

echo "Login system simulation:<br>";
while ($attempts < $maxAttempts && $userPassword !== $correctPassword) {
    $attempts++;
    echo "Attempt $attempts: Password incorrect<br>";
    
    // Simulate different password attempts
    if ($attempts == 1) $userPassword = "password";
    if ($attempts == 2) $userPassword = "123456";
    if ($attempts == 3) $userPassword = "secret123"; // Correct on 3rd try
}

if ($userPassword === $correctPassword) {
    echo "✅ Login successful!<br>";
} else {
    echo "❌ Account locked after $maxAttempts failed attempts<br>";
}

echo "<br>";

// 🧪 Example: Reading file data until end
echo "Processing data until complete:<br>";
$dataQueue = ["Task 1", "Task 2", "Task 3", "Task 4"];
$processed = 0;

while (!empty($dataQueue)) {
    $currentTask = array_shift($dataQueue);
    $processed++;
    echo "Processing: $currentTask (Remaining: " . count($dataQueue) . ")<br>";
}
echo "All $processed tasks completed!<br>";

echo "<hr>";

/* ---------- Do While Loop --------- */

/*
❓ What is a do-while loop and when should we use it?
✅ A do-while loop executes code once, then repeats while condition is true.
   Use it when you need the code to run at least once, regardless of condition.
   
   Syntax: do {
     // code to be executed
   } while (condition);
   
   Key difference: do...while guarantees at least one execution.
*/

// 🧪 Example: ATM withdrawal with validation
echo "<h3>🔁 Do-While Loop Examples:</h3>";

$balance = 1000;
$withdrawAmount = 1500; // More than balance
$attempts = 0;

echo "ATM withdrawal simulation:<br>";
echo "Current balance: $balance SAR<br>";

do {
    $attempts++;
    echo "Withdrawal attempt $attempts: $withdrawAmount SAR<br>";
    
    if ($withdrawAmount > $balance) {
        echo "❌ Insufficient funds. Please enter a smaller amount.<br>";
        $withdrawAmount -= 200; // Simulate user reducing amount
    } else {
        echo "✅ Withdrawal successful!<br>";
        $balance -= $withdrawAmount;
        echo "New balance: $balance SAR<br>";
        break;
    }
    
} while ($withdrawAmount > $balance && $attempts < 5);

if ($attempts >= 5 && $withdrawAmount > $balance) {
    echo "❌ Transaction cancelled after too many attempts.<br>";
}

echo "<br>";

// 🧪 Example: Game dice roll until target
echo "Dice game - Roll until you get 6:<br>";
$target = 6;
$rolls = 0;

do {
    $rolls++;
    $dice = rand(1, 6);
    echo "Roll $rolls: You got $dice<br>";
    
    if ($dice === $target) {
        echo "🎉 Congratulations! You got $target in $rolls rolls!<br>";
    }
    
} while ($dice !== $target && $rolls < 10);

if ($dice !== $target) {
    echo "😞 Better luck next time! Didn't get $target in 10 rolls.<br>";
}

echo "<hr>";

/* ---------- Foreach Loop ---------- */

/*
❓ What is a foreach loop and when should we use it?
✅ A foreach loop iterates through arrays and objects.
   Use it when working with collections of data.
   
   Syntax for indexed arrays: foreach ($array as $value) { }
   Syntax for associative arrays: foreach ($array as $key => $value) { }
*/

// 🧪 Example: Processing shopping cart items
echo "<h3>🛒 Foreach Loop Examples:</h3>";

$shoppingCart = [
    "Laptop" => 2500,
    "Mouse" => 50,
    "Keyboard" => 120,
    "Monitor" => 800,
    "Headphones" => 200
];

echo "Shopping Cart Summary:<br>";
$total = 0;
$itemCount = 0;

foreach ($shoppingCart as $item => $price) {
    $itemCount++;
    $total += $price;
    echo "$itemCount. $item: $price SAR<br>";
}

echo "<strong>Total: $total SAR ($itemCount items)</strong><br><br>";

// 🧪 Example: Student grades processing
$students = [
    ["name" => "Ahmad", "grade" => 85, "subject" => "Math"],
    ["name" => "Fatima", "grade" => 92, "subject" => "Science"],
    ["name" => "Omar", "grade" => 78, "subject" => "English"],
    ["name" => "Layla", "grade" => 95, "subject" => "History"],
    ["name" => "Khalid", "grade" => 88, "subject" => "Physics"]
];

echo "Student Performance Report:<br>";
$totalGrades = 0;
$passCount = 0;
$failCount = 0;

foreach ($students as $index => $student) {
    $studentNumber = $index + 1;
    $status = $student["grade"] >= 60 ? "✅ PASS" : "❌ FAIL";
    
    echo "$studentNumber. {$student['name']} - {$student['subject']}: {$student['grade']}% ($status)<br>";
    
    $totalGrades += $student["grade"];
    if ($student["grade"] >= 60) {
        $passCount++;
    } else {
        $failCount++;
    }
}

$averageGrade = round($totalGrades / count($students), 2);
echo "<br><strong>Class Statistics:</strong><br>";
echo "Average Grade: $averageGrade%<br>";
echo "Passed: $passCount students<br>";
echo "Failed: $failCount students<br>";

echo "<hr>";

/*
❓ How do we use loop control statements?
✅ break: Exits the loop completely
   continue: Skips current iteration and moves to next
   These help control loop flow based on conditions.
*/

// 🧪 Example: Finding specific data with break
echo "<h3>🎯 Loop Control Examples:</h3>";

$employees = [
    ["id" => 101, "name" => "Sarah", "department" => "IT"],
    ["id" => 102, "name" => "Ahmed", "department" => "HR"],
    ["id" => 103, "name" => "Mona", "department" => "Finance"],
    ["id" => 104, "name" => "Youssef", "department" => "IT"],
    ["id" => 105, "name" => "Nour", "department" => "Marketing"]
];

$searchId = 103;
echo "Searching for employee ID: $searchId<br>";

foreach ($employees as $employee) {
    echo "Checking employee: {$employee['name']} (ID: {$employee['id']})<br>";
    
    if ($employee["id"] === $searchId) {
        echo "✅ Found! {$employee['name']} works in {$employee['department']}<br>";
        break; // Stop searching once found
    }
}

echo "<br>";

// 🧪 Example: Processing valid data with continue
echo "Processing only IT department employees:<br>";

foreach ($employees as $employee) {
    // Skip non-IT employees
    if ($employee["department"] !== "IT") {
        continue;
    }
    
    echo "Processing IT employee: {$employee['name']} (ID: {$employee['id']})<br>";
}

echo "<hr>";

/*
❓ What are nested loops and when do we use them?
✅ Nested loops are loops inside other loops.
   Use them for multi-dimensional data or when you need combinations.
*/

// 🧪 Example: Creating a seating chart
echo "<h3>🪑 Nested Loops Examples:</h3>";

echo "Cinema Seating Chart:<br>";
$rows = 5;
$seatsPerRow = 8;

for ($row = 1; $row <= $rows; $row++) {
    echo "Row $row: ";
    
    for ($seat = 1; $seat <= $seatsPerRow; $seat++) {
        // Simulate some seats being taken
        $isOccupied = rand(0, 1);
        $seatStatus = $isOccupied ? "❌" : "✅";
        echo "$seatStatus";
    }
    
    echo "<br>";
}

echo "<br>";

// 🧪 Example: Multiplication table grid
echo "Multiplication Table (1-5):<br>";
echo "<table border='1' style='border-collapse: collapse;'>";

// Header row
echo "<tr><th>×</th>";
for ($col = 1; $col <= 5; $col++) {
    echo "<th>$col</th>";
}
echo "</tr>";

// Data rows
for ($row = 1; $row <= 5; $row++) {
    echo "<tr><th>$row</th>";
    
    for ($col = 1; $col <= 5; $col++) {
        $result = $row * $col;
        echo "<td style='text-align: center; padding: 5px;'>$result</td>";
    }
    
    echo "</tr>";
}

echo "</table><br>";

echo "<hr>";

/*
❓ How do we iterate through different array types efficiently?
✅ Choose the right loop type based on what you need:
   - foreach: When you need values (and possibly keys)
   - for: When you need index control or counting
   - while: When condition-based iteration is needed
*/

// 🧪 Example: Different ways to process the same data
echo "<h3>🔄 Array Iteration Comparison:</h3>";

$products = ["iPhone", "Samsung Galaxy", "Google Pixel", "OnePlus", "Xiaomi"];

echo "Method 1 - Using foreach (most common):<br>";
foreach ($products as $index => $product) {
    $position = $index + 1;
    echo "$position. $product<br>";
}

echo "<br>Method 2 - Using for loop:<br>";
for ($i = 0; $i < count($products); $i++) {
    $position = $i + 1;
    echo "$position. {$products[$i]}<br>";
}

echo "<br>Method 3 - Using while loop:<br>";
$i = 0;
while ($i < count($products)) {
    $position = $i + 1;
    echo "$position. {$products[$i]}<br>";
    $i++;
}

echo "<hr>";

/*
❓ How can we use advanced array functions with loops?
✅ PHP provides powerful array functions that work like internal loops:
   array_map, array_filter, array_reduce, array_walk
*/

// 🧪 Example: Data transformation and filtering
echo "<h3>🔧 Advanced Array Processing:</h3>";

$prices = [100, 250, 75, 300, 150, 50];

// Using array_map to apply discount
echo "Original prices: " . implode(", ", $prices) . " OMR<br>";

$discountedPrices = array_map(function($price) {
    return $price * 0.8; // 20% discount
}, $prices);

echo "After 20% discount: " . implode(", ", $discountedPrices) . " OMR<br>";

// Using array_filter to find expensive items
$expensiveItems = array_filter($prices, function($price) {
    return $price > 100;
});

echo "Expensive items (>100 OMR): " . implode(", ", $expensiveItems) . " SAR<br>";

// Using array_reduce to calculate total
$total = array_reduce($prices, function($sum, $price) {
    return $sum + $price;
}, 0);

echo "Total of all prices: $total SAR<br>";

echo "<hr>";

/* 🎯 Interview Questions & Answers: */
echo "<h3>🎯 Interview Questions & Answers:</h3>";

echo "<div style='margin: 20px 0;'>";
echo "<strong>1. When would you use a for loop vs a foreach loop?</strong><br>";
echo "<strong>Answer:</strong> Use <code>for</code> when you need index control or know exact iterations (e.g., counting 1-10). Use <code>foreach</code> when working with arrays/objects and you need the values (e.g., displaying all products).<br>";
echo "<em>Example:</em> for(counting), foreach(array data)<br><br>";

echo "<strong>2. What's the difference between while and do-while loops?</strong><br>";
echo "<strong>Answer:</strong> <code>while</code> checks condition first, may not execute at all. <code>do-while</code> executes code first, then checks condition, guarantees at least one execution.<br>";
echo "<em>Example:</em> do-while perfect for user input validation.<br><br>";

echo "<strong>3. How do break and continue statements work in loops?</strong><br>";
echo "<strong>Answer:</strong> <code>break</code> exits the entire loop immediately. <code>continue</code> skips the current iteration and moves to the next one.<br>";
echo "<em>Example:</em> break(stop search when found), continue(skip invalid data)<br><br>";

echo "<strong>4. When would you use nested loops?</strong><br>";
echo "<strong>Answer:</strong> When working with multi-dimensional data or need combinations. Common uses: tables, grids, matrix operations, or processing arrays of arrays.<br>";
echo "<em>Example:</em> Creating multiplication tables, seating charts, or processing 2D arrays.<br><br>";

echo "<strong>5. What are the performance considerations when using loops?</strong><br>";
echo "<strong>Answer:</strong> Avoid calling functions inside loop conditions (cache count()), minimize database queries inside loops, use appropriate loop type, and consider array functions (array_map) for better performance.<br>";
echo "<em>Tip:</em> \$count = count(\$array); for(\$i=0; \$i<\$count; \$i++) instead of for(\$i=0; \$i<count(\$array); \$i++)<br><br>";

echo "<strong>6. How do you iterate through associative arrays?</strong><br>";
echo "<strong>Answer:</strong> Use <code>foreach(\$array as \$key => \$value)</code> to get both keys and values. Use <code>foreach(\$array as \$value)</code> if you only need values.<br>";
echo "<em>Example:</em> foreach(\$user as \$field => \$data) echo \"\$field: \$data\";<br><br>";

echo "<strong>7. What's the difference between array_map and foreach?</strong><br>";
echo "<strong>Answer:</strong> <code>array_map</code> transforms array elements and returns new array. <code>foreach</code> iterates through array for processing but doesn't automatically return new array.<br>";
echo "<em>Use:</em> array_map for transformations, foreach for general processing.<br><br>";

echo "<strong>8. How would you exit from a nested loop?</strong><br>";
echo "<strong>Answer:</strong> Use <code>break 2;</code> to break out of 2 levels, or use labeled breaks, or set a flag variable and check it in outer loop.<br>";
echo "<em>Example:</em> break 2; (exits 2 nested loops), or use return if inside function.<br><br>";
echo "</div>";



?>