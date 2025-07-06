<?php
// =====================================
//  PHP Basics Course - Part 5
//  Topics: String Functions
// =====================================

/* ---------- String Functions -------- */

/*
❓ Why are string functions crucial in web development?
✅ String functions are essential for data validation, user input processing, 
   content formatting, security (preventing XSS), and creating dynamic content.
   Almost every web application deals extensively with text processing.
   PHP has 100+ string functions for different purposes.
*/

echo "<h3>✨ PHP String Functions Masterclass</h3>";
echo "<p>PHP Documentation: <a href='https://www.php.net/manual/en/ref.strings.php'>String Functions Reference</a></p>";

/* ---------- String Length and Information Functions ---------- */

/*
❓ How do we get information about strings in real applications?
✅ Use strlen(), mb_strlen(), str_word_count(), and empty() to validate
   user input, enforce limits, and ensure data quality.
*/

// 🧪 Example: Social media post validation system
echo "<h3>📝 String Length and Information Functions:</h3>";

$userPost = "Just finished my PHP course! Excited to build amazing web applications. 🚀 #PHP #WebDev";
$username = "ahmad_dev2024";
$email = "ahmad@example.com";
$password = "MySecure123!";

echo "Social Media Post Validation:<br>";
echo "Original post: \"$userPost\"<br>";
echo "Post length: " . strlen($userPost) . " characters<br>";
echo "Word count: " . str_word_count($userPost) . " words<br>";
echo "Character limit check: " . (strlen($userPost) <= 280 ? "✅ Within limit" : "❌ Too long") . "<br>";

// Username validation
echo "<br>Username Validation:<br>";
echo "Username: $username<br>";
echo "Length: " . strlen($username) . " characters<br>";
echo "Valid length? " . (strlen($username) >= 6 && strlen($username) <= 20 ? "✅ Yes" : "❌ No") . "<br>";

// Password strength check
echo "<br>Password Strength:<br>";
echo "Password length: " . strlen($password) . " characters<br>";
echo "Strong password? " . (strlen($password) >= 8 ? "✅ Good length" : "❌ Too short") . "<br>";

// Multi-byte string support (for Arabic/Unicode)
$arabicText = "مرحبا بكم في دورة PHP";
echo "<br>Multi-byte Support:<br>";
echo "Arabic text: $arabicText<br>";
echo "Regular strlen(): " . strlen($arabicText) . " bytes<br>";
echo "Multi-byte strlen(): " . mb_strlen($arabicText, 'UTF-8') . " characters<br>";

echo "<hr>";

/* ---------- String Case Functions ---------- */

/*
❓ When do we need to change string case in real projects?
✅ For user input normalization, creating SEO-friendly URLs, 
   standardizing data before database storage, and improving user experience.
*/

// 🧪 Example: User registration and content management
echo "<h3>🔤 String Case Functions:</h3>";

$firstName = "aHmAd";
$lastName = "AL-RASHID";
$email = "AHMAD@EXAMPLE.COM";
$articleTitle = "how to learn php programming";

echo "User Registration Data Cleanup:<br>";

// Clean user names
$cleanFirstName = ucfirst(strtolower($firstName));
$cleanLastName = ucwords(strtolower($lastName));
$cleanEmail = strtolower($email);

echo "Original: $firstName $lastName ($email)<br>";
echo "Cleaned: $cleanFirstName $cleanLastName ($cleanEmail)<br>";

// Create username from name
$username = strtolower($cleanFirstName . "_" . str_replace("-", "", $cleanLastName));
echo "Generated username: $username<br>";

echo "<br>Content Management:<br>";
echo "Original title: \"$articleTitle\"<br>";

// Create SEO-friendly title
$seoTitle = ucwords($articleTitle);
echo "SEO title: \"$seoTitle\"<br>";

// Create URL slug
$urlSlug = strtolower(str_replace(" ", "-", $articleTitle));
echo "URL slug: $urlSlug<br>";

// Create constants for configuration
$constantName = strtoupper(str_replace(" ", "_", $articleTitle));
echo "Constant name: $constantName<br>";

echo "<hr>";

/* ---------- String Search and Position Functions ---------- */

/*
❓ How do we search within strings for validation and processing?
✅ Use strpos(), strrpos(), str_contains(), str_starts_with(), str_ends_with()
   for email validation, file type checking, content filtering, and data parsing.
*/

// 🧪 Example: Email validation and file upload system
echo "<h3>🔍 String Search and Position Functions:</h3>";

$userEmail = "developer@company.co.uk";
$fileName = "user_profile_photo.jpg";
$phoneNumber = "+968501234567";
$websiteUrl = "https://www.mycompany.com/about";

echo "Email Validation System:<br>";
echo "Email: $userEmail<br>";

// Check email structure
$atPosition = strpos($userEmail, '@');
$lastDotPosition = strrpos($userEmail, '.');

if ($atPosition !== false && $lastDotPosition !== false && $lastDotPosition > $atPosition) {
    echo "✅ Email structure looks valid<br>";
    
    // Extract parts
    $username = substr($userEmail, 0, $atPosition);
    $domain = substr($userEmail, $atPosition + 1);
    
    echo "Username part: $username<br>";
    echo "Domain part: $domain<br>";
} else {
    echo "❌ Invalid email structure<br>";
}

echo "<br>File Upload Validation:<br>";
echo "File: $fileName<br>";

// Check file extension
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
$dotPosition = strrpos($fileName, '.');

if ($dotPosition !== false) {
    $extension = strtolower(substr($fileName, $dotPosition + 1));
    echo "File extension: $extension<br>";
    echo "Allowed file type? " . (in_array($extension, $allowedExtensions) ? "✅ Yes" : "❌ No") . "<br>";
} else {
    echo "❌ No file extension found<br>";
}

echo "<br>Phone Number Validation:<br>";
echo "Phone: $phoneNumber<br>";
echo "Omani number? " . (str_starts_with($phoneNumber, '+968') ? "✅ Yes" : "❌ No") . "<br>";

echo "<br>URL Analysis:<br>";
echo "URL: $websiteUrl<br>";
echo "Is HTTPS? " . (str_starts_with($websiteUrl, 'https://') ? "✅ Secure" : "❌ Not secure") . "<br>";
echo "Company website? " . (str_contains($websiteUrl, 'mycompany.com') ? "✅ Yes" : "❌ No") . "<br>";

echo "<hr>";

/* ---------- String Replace and Modify Functions ---------- */

/*
❓ How do we clean and modify user input safely?
✅ Use str_replace(), str_ireplace(), preg_replace(), trim(), and htmlspecialchars()
   to sanitize data, prevent XSS attacks, and format content for display.
*/

// 🧪 Example: Content management and security
echo "<h3>🛡️ String Replace and Security Functions:</h3>";

$userComment = "  This is <script>alert('hack');</script> AMAZING content! Visit http://m.com  ";
$userBio = "I'm a developer who loves PHP, JavaScript & HTML/CSS!";
$blogContent = "Check out our special offers! Use code SAVE20 for discount.";

echo "Content Security and Cleaning:<br>";
echo "Original comment: \"$userComment\"<br>";

// Clean and secure user input
$cleanComment = trim($userComment); // Remove whitespace
$cleanComment = htmlspecialchars($cleanComment, ENT_QUOTES, 'UTF-8'); // Prevent XSS
$cleanComment = str_ireplace(['<script>', '</script>'], '[REMOVED]', $cleanComment); // Extra security

echo "Cleaned comment: \"$cleanComment\"<br>";

echo "<br>Content Processing:<br>";
echo "Original bio: \"$userBio\"<br>";

// Replace symbols with words for readability
$processedBio = str_replace(['&', '/'], [' and ', ' or '], $userBio);
echo "Processed bio: \"$processedBio\"<br>";

echo "<br>Marketing Content:<br>";
echo "Original: \"$blogContent\"<br>";

// Highlight special terms
$highlighted = str_ireplace(['special', 'discount'], ['<strong>SPECIAL</strong>', '<em>DISCOUNT</em>'], $blogContent);
echo "Highlighted: \"$highlighted\"<br>";

// Censor inappropriate words (example)
$inappropriateWords = ['bad', 'terrible', 'awful'];
$censoredContent = str_ireplace($inappropriateWords, '[***]', $blogContent);
echo "Censored example: \"$censoredContent\"<br>";

echo "<hr>";

/* ---------- String Extraction and Substring Functions ---------- */

/*
❓ How do we extract specific parts of strings for processing?
✅ Use substr(), substr_count(), explode(), and implode() for data parsing,
   creating summaries, processing CSV data, and extracting information.
*/

// 🧪 Example: News article processing and data extraction
echo "<h3>✂️ String Extraction Functions:</h3>";

$article = "Breaking News: PHP 8.3 Released with Amazing Features. The new version includes improved performance, better syntax, and enhanced security measures for web developers.";
$csvData = "Ahmad,25,Engineer,Muscat,ahmed@email.com";
$tags = "#PHP #WebDev #Programming #Technology";

echo "Article Processing:<br>";
echo "Full article: \"$article\"<br>";

// Create article summary
$summary = substr($article, 0, 50) . "...";
echo "Summary: \"$summary\"<br>";

// Extract title (until first period)
$titleEnd = strpos($article, '.');
$title = substr($article, 0, $titleEnd);
echo "Extracted title: \"$title\"<br>";

// Count word occurrences
$phpMentions = substr_count(strtolower($article), 'php');
echo "PHP mentioned: $phpMentions times<br>";

echo "<br>CSV Data Processing:<br>";
echo "CSV data: $csvData<br>";

// Parse CSV data
$userData = explode(',', $csvData);
$userFields = ['Name', 'Age', 'Job', 'City', 'Email'];

echo "Parsed user data:<br>";
foreach ($userData as $index => $value) {
    if (isset($userFields[$index])) {
        echo "{$userFields[$index]}: $value<br>";
    }
}

echo "<br>Social Media Tags:<br>";
echo "Tags string: $tags<br>";

// Extract hashtags
$tagArray = explode(' ', $tags);
$cleanTags = array_map(function($tag) {
    return str_replace('#', '', $tag);
}, $tagArray);

echo "Individual tags: " . implode(', ', $cleanTags) . "<br>";

// Create URL-friendly tags
$urlTags = strtolower(implode('-', $cleanTags));
echo "URL format: $urlTags<br>";

echo "<hr>";

/* ---------- String Formatting Functions ---------- */

/*
❓ How do we format strings for professional output?
✅ Use printf(), sprintf(), number_format(), and date formatting
   for reports, invoices, user interfaces, and data presentation.
*/

// 🧪 Example: E-commerce invoice and reporting system
echo "<h3>💰 String Formatting Functions:</h3>";

$customerName = "Ahmad Al-Rashid";
$orderNumber = 12345;
$itemPrice = 299.99;
$quantity = 3;
$taxRate = 0.15; // 15% VAT
$orderDate = date('Y-m-d');

echo "E-commerce Invoice System:<br>";

// Professional invoice formatting
printf("📄 <strong>INVOICE #%05d</strong><br>", $orderNumber);
printf("👤 Customer: %s<br>", $customerName);
printf("📅 Date: %s<br><br>", $orderDate);

// Calculate totals
$subtotal = $itemPrice * $quantity;
$tax = $subtotal * $taxRate;
$total = $subtotal + $tax;

// Format currency properly
printf("🛍️ Item Price: %.2f OMR<br>", $itemPrice);
printf("📦 Quantity: %d items<br>", $quantity);
printf("💵 Subtotal: %.2f OMR<br>", $subtotal);
printf("🏛️ VAT (%.0f%%): %.2f OMR<br>", $taxRate * 100, $tax);
printf("<strong>💳 Total: %.2f OMR</strong><br>", $total);

echo "<br>Business Report:<br>";

// Performance metrics
$salesTarget = 50000;
$actualSales = 47500;
$achievementRate = ($actualSales / $salesTarget) * 100;

printf("🎯 Sales Target: %s OMR<br>", number_format($salesTarget, 0));
printf("📊 Actual Sales: %s OMR<br>", number_format($actualSales, 0));
printf("📈 Achievement: %.1f%%<br>", $achievementRate);

// Status message
$status = $achievementRate >= 100 ? "✅ Target Achieved!" : "⚠️ Below Target";
printf("Status: %s<br>", $status);

echo "<br>Scientific Notation:<br>";
$bigNumber = 1234567890;
$smallNumber = 0.00000123;

printf("Large number: %.2e<br>", $bigNumber);
printf("Small number: %.2e<br>", $smallNumber);

echo "<hr>";

/* ---------- String Trimming and Padding Functions ---------- */

/*
❓ How do we clean whitespace and format output properly?
✅ Use trim(), ltrim(), rtrim(), str_pad(), and str_repeat()
   for data cleaning, creating formatted tables, and improving data quality.
*/

// 🧪 Example: Data import cleaning and table formatting
echo "<h3>🧹 String Trimming and Padding Functions:</h3>";

$importedData = [
    "  Ahmad Al-Rashid  ",
    "\t\tFatima  ",
    "  Omar\n",
    "Layla    "
];

echo "Data Import Cleaning:<br>";
echo "Raw imported data:<br>";

foreach ($importedData as $index => $rawName) {
    $cleanName = trim($rawName);
    printf("Row %d: '%s' → '%s'<br>", $index + 1, addslashes($rawName), $cleanName);
}

echo "<br>Formatted Table Output:<br>";

// Create a formatted table
$employees = [
    ['name' => 'Ahmad Al-Rashid', 'id' => '101', 'salary' => '8500'],
    ['name' => 'Fatima', 'id' => '102', 'salary' => '7200'],
    ['name' => 'Omar Abdullah', 'id' => '103', 'salary' => '9800']
];

echo "<pre>";
echo str_pad("ID", 5) . " | " . str_pad("Name", 15) . " | " . str_pad("Salary", 8) . "<br>";
echo str_repeat("-", 35) . "<br>";

foreach ($employees as $employee) {
    printf("%s | %s | %s<br>", 
        str_pad($employee['id'], 5),
        str_pad($employee['name'], 15),
        str_pad($employee['salary'] . " OMR", 8)
    );
}
echo "</pre>";

echo "Progress Bar Example:<br>";
$progress = 75; // 75% complete
$barLength = 20;
$filledLength = intval(($progress / 100) * $barLength);

$progressBar = "[" . str_repeat("█", $filledLength) . str_repeat("░", $barLength - $filledLength) . "]";
printf("%s %d%%<br>", $progressBar, $progress);

echo "<hr>";

/* ---------- Advanced String Functions ---------- */

/*
❓ How do we handle complex string operations and encoding?
✅ Use wordwrap(), nl2br(), strip_tags(), parse_url(), and base64_encode()
   for advanced text processing, security, and data handling.
*/

// 🧪 Example: Content management and data processing
echo "<h3>🔧 Advanced String Functions:</h3>";

$longText = "This is a very long paragraph that needs to be wrapped properly for better readability in emails and text displays. It should break at appropriate word boundaries.";
$htmlContent = "<h2>Article Title</h2><p>This is <strong>important</strong> content with <a href='#'>links</a>.</p>";
$userUrl = "https://www.example.com/blog/article?id=123&category=php&lang=en";

echo "Text Processing:<br>";
echo "Original text: \"$longText\"<br>";

// Wrap text for email
$wrappedText = wordwrap($longText, 50, "<br>");
echo "Wrapped text (50 chars):<br>$wrappedText<br>";

echo "<br>HTML Content Processing:<br>";
echo "Original HTML: $htmlContent<br>";

// Strip HTML tags for plain text version
$plainText = strip_tags($htmlContent);
echo "Plain text: $plainText<br>";

// Keep only specific tags
$safeHtml = strip_tags($htmlContent, '<strong><em>');
echo "Safe HTML: $safeHtml<br>";

echo "<br>URL Analysis:<br>";
echo "URL: $userUrl<br>";

// Parse URL components
$urlParts = parse_url($userUrl);
echo "Domain: " . ($urlParts['host'] ?? 'Unknown') . "<br>";
echo "Path: " . ($urlParts['path'] ?? 'None') . "<br>";

// Parse query parameters
if (isset($urlParts['query'])) {
    parse_str($urlParts['query'], $params);
    echo "Parameters:<br>";
    foreach ($params as $key => $value) {
        echo "  $key = $value<br>";
    }
}

echo "<br>Data Encoding:<br>";
$sensitiveData = "user:password123";
$encoded = base64_encode($sensitiveData);
$decoded = base64_decode($encoded);

echo "Original: $sensitiveData<br>";
echo "Encoded: $encoded<br>";
echo "Decoded: $decoded<br>";

echo "<hr>";

/* 🎯 Interview Questions Summary: */
echo "<h3>🎯 Interview Questions Summary:</h3>";
echo "<ol>";
echo "<li>How do you prevent XSS attacks when displaying user input?</li>";
echo "<li>What's the difference between strlen() and mb_strlen()?</li>";
echo "<li>How do you validate an email address using string functions?</li>";
echo "<li>When would you use str_replace() vs preg_replace()?</li>";
echo "<li>How do you extract a file extension from a filename?</li>";
echo "<li>What's the difference between trim(), ltrim(), and rtrim()?</li>";
echo "<li>How do you format currency values properly in PHP?</li>";
echo "<li>How do you handle multi-byte characters (Arabic/Chinese)?</li>";
echo "</ol>";

/* 🛡️ Security Best Practices: */
echo "<h3>🛡️ Security Best Practices:</h3>";
echo "<ul>";
echo "<li>Always use htmlspecialchars() for user input display</li>";
echo "<li>Validate and sanitize all user input</li>";
echo "<li>Use mb_* functions for international content</li>";
echo "<li>Never trust user input - always validate</li>";
echo "<li>Use prepared statements for database queries</li>";
echo "</ul>";



?>