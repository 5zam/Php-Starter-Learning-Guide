<?php
// =====================================
//  PHP Basics Course - Part 4
//  Topics: Array Functions
// =====================================

/* --------- Array Functions -------- */

/*
❓ Why are array functions important in PHP?
✅ Array functions are built-in tools that help you manipulate, search, sort, and transform arrays efficiently.
   They save time and make your code cleaner and more readable.
   PHP has 70+ array functions for different purposes.
*/

echo "<h3>📊 PHP Array Functions Masterclass</h3>";
echo "<p>PHP Documentation: <a href='https://www.php.net/manual/en/ref.array.php'>Array Functions Reference</a></p>";

/* --------- Array Information Functions -------- */

/*
❓ How do we get information about arrays?
✅ Use count(), sizeof(), array_key_exists(), in_array(), and empty() 
   to get information about array size, contents, and structure.
*/

// 🧪 Example: Library management system
echo "<h3>📚 Array Information Functions:</h3>";

$library = [
    "programming" => ["PHP", "Python", "JavaScript", "Java"],
    "design" => ["Photoshop", "Illustrator"],
    "databases" => ["MySQL", "PostgreSQL", "MongoDB", "Redis"],
    "frameworks" => ["Laravel", "React", "Vue", "Django"]
];

echo "Library Statistics:<br>";
echo "Number of categories: " . count($library) . "<br>";
echo "Total books in programming: " . count($library["programming"]) . "<br>";
echo "Is 'databases' category available? " . (array_key_exists("databases", $library) ? "Yes" : "No") . "<br>";
echo "Do we have PHP book? " . (in_array("PHP", $library["programming"]) ? "Yes" : "No") . "<br>";
echo "Is library empty? " . (empty($library) ? "Yes" : "No") . "<br>";

// Check if specific book exists in any category
function findBookInLibrary($library, $bookName) {
    foreach ($library as $category => $books) {
        if (in_array($bookName, $books)) {
            return "Found '$bookName' in $category section";
        }
    }
    return "'$bookName' not found in library";
}

echo findBookInLibrary($library, "Laravel") . "<br>";
echo findBookInLibrary($library, "Kotlin") . "<br>";

echo "<hr>";

/* --------- Array Manipulation Functions -------- */

/*
❓ How do we add and remove elements from arrays?
✅ Use array_push(), array_unshift(), array_pop(), array_shift(), 
   and unset() to add and remove elements from different positions.
*/

// 🧪 Example: Task management system
echo "<h3>📝 Array Manipulation Functions:</h3>";

$tasks = ["Review code", "Update documentation"];
echo "Initial tasks: " . implode(", ", $tasks) . "<br>";

// Add tasks to the end
array_push($tasks, "Fix bugs", "Deploy to production");
echo "After adding tasks to end: " . implode(", ", $tasks) . "<br>";

// Add urgent task to the beginning
array_unshift($tasks, "Emergency fix");
echo "After adding urgent task: " . implode(", ", $tasks) . "<br>";

// Complete last task
$completedTask = array_pop($tasks);
echo "Completed: '$completedTask'<br>";
echo "Remaining tasks: " . implode(", ", $tasks) . "<br>";

// Complete first task
$firstCompleted = array_shift($tasks);
echo "Completed: '$firstCompleted'<br>";
echo "Final tasks: " . implode(", ", $tasks) . "<br>";

// Remove specific task by index
unset($tasks[1]); // Remove "Update documentation"
$tasks = array_values($tasks); // Re-index array
echo "After removing specific task: " . implode(", ", $tasks) . "<br>";

echo "<hr>";

/* --------- Array Transformation Functions -------- */

/*
❓ How do we transform and restructure arrays?
✅ Use array_chunk(), array_merge(), array_combine(), array_flip(),
   and array_slice() to reshape arrays according to your needs.
*/

// 🧪 Example: E-commerce product management
echo "<h3>🛍️ Array Transformation Functions:</h3>";

$products = [
    "Laptop", "Mouse", "Keyboard", "Monitor", "Headphones", 
    "Speaker", "Webcam", "Microphone", "Tablet", "Phone"
];

// Split products into pages (3 products per page)
echo "Products split into pages (3 per page):<br>";
$productPages = array_chunk($products, 3);
foreach ($productPages as $pageNum => $pageProducts) {
    $page = $pageNum + 1;
    echo "Page $page: " . implode(", ", $pageProducts) . "<br>";
}

echo "<br>";

// Merge with new arrivals
$newArrivals = ["Smartwatch", "Gaming Chair", "LED Strip"];
$allProducts = array_merge($products, $newArrivals);
echo "Total products after new arrivals: " . count($allProducts) . "<br>";

// Using spread operator (PHP 7.4+)
$updatedProducts = [...$products, ...$newArrivals];
echo "Using spread operator - Total: " . count($updatedProducts) . "<br>";

// Create product categories mapping
$categories = ["Electronics", "Accessories", "Peripherals", "Display", "Audio"];
$productCategories = array_combine(
    array_slice($products, 0, 5), // First 5 products
    $categories
);

echo "<br>Product Categories:<br>";
foreach ($productCategories as $product => $category) {
    echo "$product → $category<br>";
}

// Flip array for reverse lookup
$categoryProducts = array_flip($productCategories);
echo "<br>Reverse lookup - Electronics product: " . ($categoryProducts["Electronics"] ?? "None") . "<br>";

echo "<hr>";

/* --------- Array Search and Filter Functions -------- */

/*
❓ How do we search and filter arrays efficiently?
✅ Use array_search(), array_filter(), array_map(), and array_reduce()
   to find, filter, and process array data.
*/

// 🧪 Example: Employee management system
echo "<h3>👥 Array Search and Filter Functions:</h3>";

$employees = [
    ["name" => "Ahmad", "department" => "IT", "salary" => 8000, "experience" => 5],
    ["name" => "Fatima", "department" => "HR", "salary" => 6000, "experience" => 3],
    ["name" => "Omar", "department" => "IT", "salary" => 12000, "experience" => 8],
    ["name" => "Layla", "department" => "Finance", "salary" => 7000, "experience" => 4],
    ["name" => "Khalid", "department" => "IT", "salary" => 9500, "experience" => 6],
    ["name" => "Nour", "department" => "Marketing", "salary" => 5500, "experience" => 2]
];

// Filter IT department employees
$itEmployees = array_filter($employees, function($employee) {
    return $employee["department"] === "IT";
});

echo "IT Department Employees:<br>";
foreach ($itEmployees as $employee) {
    echo "- {$employee['name']} (Salary: {$employee['salary']} OMR)<br>";
}

// Filter high-salary employees (> 8000)
$highSalaryEmployees = array_filter($employees, fn($emp) => $emp["salary"] > 8000);
echo "<br>High Salary Employees (>8000 OMR): " . count($highSalaryEmployees) . " employees<br>";

// Map to get only names and salaries
$salaryReport = array_map(function($employee) {
    return [
        "name" => $employee["name"],
        "monthly_salary" => $employee["salary"],
        "annual_salary" => $employee["salary"] * 12
    ];
}, $employees);

echo "<br>Salary Report (First 3):<br>";
foreach (array_slice($salaryReport, 0, 3) as $report) {
    echo "{$report['name']}: {$report['monthly_salary']} OMR/month ({$report['annual_salary']} OMR/year)<br>";
}

// Calculate total company salary cost
$totalSalaryCost = array_reduce($employees, function($total, $employee) {
    return $total + $employee["salary"];
}, 0);

echo "<br>Total monthly salary cost: $totalSalaryCost OMR<br>";
echo "Average salary: " . round($totalSalaryCost / count($employees), 2) . " OMR<br>";

echo "<hr>";

/* --------- Array Sorting Functions -------- */

/*
❓ How do we sort arrays in different ways?
✅ Use sort(), rsort(), asort(), arsort(), ksort(), krsort(),
   usort(), and uasort() for different sorting needs.
*/

// 🧪 Example: Student grade management
echo "<h3>📊 Array Sorting Functions:</h3>";

$studentGrades = [
    "Ahmad" => 85,
    "Fatima" => 92,
    "Omar" => 78,
    "Layla" => 95,
    "Khalid" => 88,
    "Nour" => 83
];

// Sort by grades (values) - ascending s->b
$gradesByValue = $studentGrades;
asort($gradesByValue);
echo "Students sorted by grades (lowest to highest):<br>";
foreach ($gradesByValue as $name => $grade) {
    echo "$name: $grade%<br>";
}

// Sort by grades (values) - descending b ->s
$gradesByValueDesc = $studentGrades;
arsort($gradesByValueDesc);
echo "<br>Students sorted by grades (highest to lowest):<br>";
foreach ($gradesByValueDesc as $name => $grade) {
    echo "$name: $grade%<br>";
}

// Sort by names (keys) - alphabetical
$gradesByName = $studentGrades;
ksort($gradesByName);
echo "<br>Students sorted by name (A-Z):<br>";
foreach ($gradesByName as $name => $grade) {
    echo "$name: $grade%<br>";
}

// Custom sorting - complex student data
$students = [
    ["name" => "Ahmad", "grade" => 85, "age" => 20],
    ["name" => "Fatima", "grade" => 92, "age" => 19],
    ["name" => "Omar", "grade" => 78, "age" => 21],
    ["name" => "Layla", "grade" => 95, "age" => 18]
];

// Sort by grade (descending), then by age (ascending)
usort($students, function($a, $b) {
    if ($a["grade"] === $b["grade"]) {
        return $a["age"] <=> $b["age"]; // Secondary sort by age
    }
    return $b["grade"] <=> $a["grade"]; // Primary sort by grade (desc)
});

echo "<br>Students sorted by grade (desc), then age (asc):<br>";
foreach ($students as $student) {
    echo "{$student['name']}: Grade {$student['grade']}%, Age {$student['age']}<br>";
}

echo "<hr>";

/* --------- Array Utility Functions -------- */

/*
❓ What are some useful utility functions for arrays?
✅ array_keys(), array_values(), array_unique(), array_intersect(),
   array_diff(), range(), and array_rand() provide powerful utilities.
*/

// 🧪 Example: Social media analytics
echo "<h3>📱 Array Utility Functions:</h3>";

$userInterests = [
    "Ahmad" => ["Technology", "Sports", "Travel", "Food"],
    "Fatima" => ["Technology", "Art", "Music", "Travel"],
    "Omar" => ["Sports", "Gaming", "Technology", "Movies"],
    "Layla" => ["Art", "Travel", "Photography", "Music"]
];

// Get all unique interests
$allInterests = [];
foreach ($userInterests as $user => $interests) {
    $allInterests = array_merge($allInterests, $interests);
}
$uniqueInterests = array_unique($allInterests);
echo "All unique interests: " . implode(", ", $uniqueInterests) . "<br>";

// Find common interests between two users
$commonInterests = array_intersect($userInterests["Ahmad"], $userInterests["Fatima"]);
echo "Common interests between Ahmad and Fatima: " . implode(", ", $commonInterests) . "<br>";

// Find interests unique to Omar
$otherUsersInterests = [];
foreach ($userInterests as $user => $interests) {
    if ($user !== "Omar") {
        $otherUsersInterests = array_merge($otherUsersInterests, $interests);
    }
}
$omarUniqueInterests = array_diff($userInterests["Omar"], $otherUsersInterests);
echo "Interests unique to Omar: " . (empty($omarUniqueInterests) ? "None (Gaming is shared)" : implode(", ", $omarUniqueInterests)) . "<br>";

// Generate random content recommendations
echo "<br>Random interest recommendations:<br>";
$userNames = array_keys($userInterests);

// Get 2 random users safely
shuffle($userNames);
$selectedUsers = array_slice($userNames, 0, 2);

foreach ($selectedUsers as $userName) {
    $userInterestList = $userInterests[$userName];
    $randomInterest = $userInterestList[array_rand($userInterestList)];
    echo "- $userName might like content about: $randomInterest<br>";
}

// Create age range for user targeting
$ageRanges = [
    "18-25" => range(18, 25),
    "26-35" => range(26, 35),
    "36-50" => range(36, 50)
];

echo "<br>Age targeting ranges:<br>";
foreach ($ageRanges as $range => $ages) {
    echo "$range: " . count($ages) . " age values<br>";
}

echo "<hr>";

/* --------- Advanced Array Functions -------- */

/*
❓ How do we use advanced array functions for complex operations?
✅ array_walk(), array_column(), array_multisort(), and array_pad()
   provide advanced functionality for complex data manipulation.
*/

// 🧪 Example: Sales analytics dashboard
echo "<h3>💰 Advanced Array Functions:</h3>";

$salesData = [
    ["product" => "Laptop", "price" => 2500, "quantity" => 10, "category" => "Electronics"],
    ["product" => "Mouse", "price" => 50, "quantity" => 25, "category" => "Accessories"],
    ["product" => "Monitor", "price" => 800, "quantity" => 8, "category" => "Electronics"],
    ["product" => "Keyboard", "price" => 120, "quantity" => 15, "category" => "Accessories"],
    ["product" => "Phone", "price" => 1200, "quantity" => 12, "category" => "Electronics"]
];

// Extract specific columns
$products = array_column($salesData, "product");
$prices = array_column($salesData, "price");
$revenues = array_column($salesData, "price", "product"); // Price indexed by product

echo "Products: " . implode(", ", $products) . "<br>";
echo "Average price: " . round(array_sum($prices) / count($prices), 2) . " SAR<br>";

// Calculate revenue for each product using array_walk
array_walk($salesData, function(&$item) {
    $item["revenue"] = $item["price"] * $item["quantity"];
});

echo "<br>Revenue Report:<br>";
foreach ($salesData as $item) {
    echo "{$item['product']}: {$item['revenue']} SAR<br>";
}

// Sort by multiple criteria using array_multisort
$categories = array_column($salesData, "category");
$revenues = array_column($salesData, "revenue");

// Sort by category first, then by revenue (descending)
array_multisort($categories, SORT_ASC, $revenues, SORT_DESC, $salesData);

echo "<br>Sorted by category, then revenue:<br>";
foreach ($salesData as $item) {
    echo "{$item['category']} - {$item['product']}: {$item['revenue']} SAR<br>";
}

// Pad array to fixed size for reporting
$topProducts = array_slice($products, 0, 3);
$reportProducts = array_pad($topProducts, 5, "No Data");

echo "<br>Top 5 Products Report (padded):<br>";
foreach ($reportProducts as $index => $product) {
    $position = $index + 1;
    echo "$position. $product<br>";
}

echo "<hr>";

/* 🎯 Interview Questions Summary: */
echo "<h3>🎯 Interview Questions Summary:</h3>";
echo "<ol>";
echo "<li>What's the difference between array_merge() and the spread operator?</li>";
echo "<li>When would you use array_filter() vs array_map()?</li>";
echo "<li>How do you sort an associative array by values vs keys?</li>";
echo "<li>What's the difference between in_array() and array_search()?</li>";
echo "<li>How do you remove duplicate values from an array?</li>";
echo "<li>What's array_reduce() used for and how does it work?</li>";
echo "<li>How do you extract a column from a multidimensional array?</li>";
echo "<li>What's the difference between array_push() and using []?</li>";
echo "</ol>";

/* 🔧 Performance Tips: */
echo "<h3>⚡ Performance Tips:</h3>";
echo "<ul>";
echo "<li>Use isset() instead of array_key_exists() when possible</li>";
echo "<li>array_map() is faster than foreach for simple transformations</li>";
echo "<li>Use array_column() instead of loops for extracting data</li>";
echo "<li>count() is O(1) for arrays, very efficient</li>";
echo "<li>array_flip() for fast value-to-key lookups</li>";
echo "</ul>";



?>