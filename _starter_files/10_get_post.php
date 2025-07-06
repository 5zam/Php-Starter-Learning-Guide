<?php
// =====================================
//  PHP Basics Course - Part 7
//  Topics: $_GET & $_POST Deep Dive
// =====================================

/* --- $_GET & $_POST Superglobals -- */

/*
❓ What's the difference between $_GET and $_POST? (Simple Version!)
✅ Think of them as two different ways to send information:

📬 $_GET = Like sending a postcard (everyone can see the message)
✉️ $_POST = Like sending a sealed letter (private and hidden)

🔍 $_GET: Data shows in URL → yoursite.com/page.php?name=Ahmad&age=25
🔒 $_POST: Data is hidden → Perfect for passwords and private info

When to use each:
• $_GET: Search filters, page numbers, sharing links
• $_POST: Login forms, contact forms, sensitive data
*/

echo "<h2>📬 \$_GET vs \$_POST - The Complete Guide for Beginners</h2>";
echo "<p><strong>Simple Rule:</strong> If you're okay with everyone seeing the data, use GET. If it's private, use POST!</p>";

/* ---------- $_GET Examples - Data in URL ---------- */

echo "<h3>📬 \$_GET - Data You Can See in URL</h3>";
echo "<div style='background: linear-gradient(135deg, #74b9ff, #0984e3); color: white; padding: 20px; border-radius: 10px; margin: 15px 0;'>";

echo "<h4>🔍 How $_GET Works:</h4>";
echo "1. User clicks a link or types URL with data<br>";
echo "2. Data appears after ? in the URL<br>";
echo "3. PHP automatically puts this data in \$_GET<br>";
echo "4. You can use this data in your code<br>";

echo "</div>";

// Handle GET data
if (!empty($_GET)) {
    echo "<div style='background: #e8f5e8; padding: 15px; border-radius: 8px; border-left: 5px solid #28a745;'>";
    echo "✅ <strong>GET Data Received!</strong><br>";
    
    foreach ($_GET as $key => $value) {
        $cleanKey = htmlspecialchars($key);
        $cleanValue = htmlspecialchars($value);
        echo "📌 <strong>$cleanKey:</strong> $cleanValue<br>";
    }
    echo "</div><br>";
}

// GET Examples with different scenarios
echo "<h4>🧪 Try These GET Examples:</h4>";
echo "<div style='background: #f8f9fa; padding: 15px; border-radius: 8px;'>";

// Current page URL for examples
$currentPage = $_SERVER['PHP_SELF'];

echo "<strong>🎯 Click these links to see GET in action:</strong><br><br>";

// Simple examples
echo "1. <a href='$currentPage?name=Ahmad&age=25' style='color: #007bff; text-decoration: none; padding: 5px 10px; background: #e3f2fd; border-radius: 4px; margin: 2px;'>User Profile: Ahmad, Age 25</a><br><br>";

echo "2. <a href='$currentPage?product=laptop&price=2500&category=electronics' style='color: #007bff; text-decoration: none; padding: 5px 10px; background: #e3f2fd; border-radius: 4px; margin: 2px;'>Product: Laptop - 2500 SAR</a><br><br>";

echo "3. <a href='$currentPage?language=arabic&theme=dark&notifications=on' style='color: #007bff; text-decoration: none; padding: 5px 10px; background: #e3f2fd; border-radius: 4px; margin: 2px;'>Settings: Arabic, Dark Theme</a><br><br>";

echo "4. <a href='$currentPage?search=PHP+tutorial&sort=date&filter=beginner' style='color: #007bff; text-decoration: none; padding: 5px 10px; background: #e3f2fd; border-radius: 4px; margin: 2px;'>Search: PHP Tutorial</a><br><br>";

echo "5. <a href='$currentPage' style='color: #dc3545; text-decoration: none; padding: 5px 10px; background: #f8d7da; border-radius: 4px; margin: 2px;'>Clear All Data</a><br>";

echo "</div>";

// Display current GET data in a nice format
if (!empty($_GET)) {
    echo "<h4>📊 Current URL Data Analysis:</h4>";
    echo "<div style='background: #fff3cd; padding: 15px; border-radius: 8px; border: 1px solid #ffeaa7;'>";
    
    // Show current URL
    $currentUrl = "http" . (isset($_SERVER['HTTPS']) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    echo "<strong>🔗 Current URL:</strong><br>";
    echo "<code style='background: #f8f9fa; padding: 5px; border-radius: 3px; word-break: break-all;'>$currentUrl</code><br><br>";
    
    // Analyze the data
    if (isset($_GET['name'])) {
        echo "👤 <strong>User Info:</strong><br>";
        echo "Name: " . htmlspecialchars($_GET['name']) . "<br>";
        if (isset($_GET['age'])) echo "Age: " . htmlspecialchars($_GET['age']) . "<br>";
        echo "<br>";
    }
    
    if (isset($_GET['product'])) {
        echo "🛍️ <strong>Product Info:</strong><br>";
        echo "Product: " . htmlspecialchars($_GET['product']) . "<br>";
        if (isset($_GET['price'])) echo "Price: " . htmlspecialchars($_GET['price']) . " SAR<br>";
        if (isset($_GET['category'])) echo "Category: " . htmlspecialchars($_GET['category']) . "<br>";
        echo "<br>";
    }
    
    if (isset($_GET['language'])) {
        echo "⚙️ <strong>Settings:</strong><br>";
        echo "Language: " . htmlspecialchars($_GET['language']) . "<br>";
        if (isset($_GET['theme'])) echo "Theme: " . htmlspecialchars($_GET['theme']) . "<br>";
        if (isset($_GET['notifications'])) echo "Notifications: " . htmlspecialchars($_GET['notifications']) . "<br>";
        echo "<br>";
    }
    
    if (isset($_GET['search'])) {
        echo "🔍 <strong>Search Query:</strong><br>";
        echo "Search: " . htmlspecialchars($_GET['search']) . "<br>";
        if (isset($_GET['sort'])) echo "Sort by: " . htmlspecialchars($_GET['sort']) . "<br>";
        if (isset($_GET['filter'])) echo "Filter: " . htmlspecialchars($_GET['filter']) . "<br>";
    }
    
    echo "</div>";
}

echo "<hr>";

/* ---------- $_POST Examples - Hidden Form Data ---------- */

echo "<h3>✉️ \$_POST - Hidden and Secure Data</h3>";
echo "<div style='background: linear-gradient(135deg, #fd79a8, #e84393); color: white; padding: 20px; border-radius: 10px; margin: 15px 0;'>";

echo "<h4>🔒 How $_POST Works:</h4>";
echo "1. User fills out a form and clicks submit<br>";
echo "2. Data is sent hidden (not in URL)<br>";
echo "3. PHP puts this data in \$_POST<br>";
echo "4. Perfect for passwords and private information<br>";

echo "</div>";

// Handle POST data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<div style='background: #d1ecf1; padding: 15px; border-radius: 8px; border-left: 5px solid #17a2b8;'>";
    echo "✅ <strong>POST Data Received!</strong><br>";
    
    // Display received POST data safely
    foreach ($_POST as $key => $value) {
        if ($key !== 'password' && $key !== 'confirm_password') {
            $cleanKey = htmlspecialchars($key);
            $cleanValue = htmlspecialchars($value);
            echo "📝 <strong>$cleanKey:</strong> $cleanValue<br>";
        } else {
            echo "🔒 <strong>$key:</strong> [Hidden for security]<br>";
        }
    }
    echo "</div><br>";
}

echo "<h4>📝 Interactive POST Examples:</h4>";

// Example 1: Simple Contact Form
echo "<div style='background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 15px 0;'>";
echo "<h5>📞 Example 1: Contact Form</h5>";
echo "<form method='POST' style='background: white; padding: 15px; border-radius: 5px; border: 1px solid #dee2e6;'>";

echo "<div style='margin-bottom: 10px;'>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>Your Name:</label>";
echo "<input type='text' name='contact_name' placeholder='Enter your full name' style='width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;' required>";
echo "</div>";

echo "<div style='margin-bottom: 10px;'>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>Email:</label>";
echo "<input type='email' name='contact_email' placeholder='your.email@example.com' style='width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;' required>";
echo "</div>";

echo "<div style='margin-bottom: 10px;'>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>Message:</label>";
echo "<textarea name='contact_message' placeholder='Write your message here...' style='width: 100%; height: 80px; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; resize: vertical;' required></textarea>";
echo "</div>";

echo "<input type='submit' name='contact_submit' value='Send Message' style='background: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;'>";
echo "</form>";
echo "</div>";

// Example 2: User Registration Form
echo "<div style='background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 15px 0;'>";
echo "<h5>👤 Example 2: User Registration</h5>";
echo "<form method='POST' style='background: white; padding: 15px; border-radius: 5px; border: 1px solid #dee2e6;'>";

echo "<div style='display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 10px;'>";
echo "<div>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>First Name:</label>";
echo "<input type='text' name='first_name' placeholder='Ahmad' style='width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;' required>";
echo "</div>";
echo "<div>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>Last Name:</label>";
echo "<input type='text' name='last_name' placeholder='Al-Rashid' style='width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;' required>";
echo "</div>";
echo "</div>";

echo "<div style='margin-bottom: 10px;'>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>Username:</label>";
echo "<input type='text' name='username' placeholder='Choose a unique username' style='width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;' required>";
echo "</div>";

echo "<div style='margin-bottom: 10px;'>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>Email:</label>";
echo "<input type='email' name='email' placeholder='your.email@example.com' style='width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;' required>";
echo "</div>";

echo "<div style='display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 10px;'>";
echo "<div>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>Password:</label>";
echo "<input type='password' name='password' placeholder='Strong password' style='width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;' required>";
echo "</div>";
echo "<div>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>Confirm Password:</label>";
echo "<input type='password' name='confirm_password' placeholder='Repeat password' style='width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;' required>";
echo "</div>";
echo "</div>";

echo "<div style='margin-bottom: 15px;'>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>Age:</label>";
echo "<select name='age' style='width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;' required>";
echo "<option value=''>Select your age range</option>";
echo "<option value='18-25'>18-25 years</option>";
echo "<option value='26-35'>26-35 years</option>";
echo "<option value='36-50'>36-50 years</option>";
echo "<option value='50+'>50+ years</option>";
echo "</select>";
echo "</div>";

echo "<div style='margin-bottom: 15px;'>";
echo "<label style='display: flex; align-items: center;'>";
echo "<input type='checkbox' name='agree_terms' value='yes' style='margin-right: 8px;' required>";
echo "I agree to the Terms and Conditions";
echo "</label>";
echo "</div>";

echo "<input type='submit' name='register_submit' value='Create Account' style='background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; width: 100%;'>";
echo "</form>";
echo "</div>";

// Example 3: Product Search Form
echo "<div style='background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 15px 0;'>";
echo "<h5>🔍 Example 3: Advanced Search</h5>";
echo "<form method='POST' style='background: white; padding: 15px; border-radius: 5px; border: 1px solid #dee2e6;'>";

echo "<div style='display: grid; grid-template-columns: 2fr 1fr; gap: 10px; margin-bottom: 10px;'>";
echo "<div>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>Search Products:</label>";
echo "<input type='text' name='search_query' placeholder='iPhone, Samsung, Laptop...' style='width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;'>";
echo "</div>";
echo "<div>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>Category:</label>";
echo "<select name='category' style='width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;'>";
echo "<option value=''>All Categories</option>";
echo "<option value='electronics'>Electronics</option>";
echo "<option value='clothing'>Clothing</option>";
echo "<option value='books'>Books</option>";
echo "<option value='home'>Home & Garden</option>";
echo "</select>";
echo "</div>";
echo "</div>";

echo "<div style='display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px; margin-bottom: 15px;'>";
echo "<div>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>Min Price:</label>";
echo "<input type='number' name='min_price' placeholder='0' style='width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;'>";
echo "</div>";
echo "<div>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>Max Price:</label>";
echo "<input type='number' name='max_price' placeholder='10000' style='width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;'>";
echo "</div>";
echo "<div>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>Sort By:</label>";
echo "<select name='sort_by' style='width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;'>";
echo "<option value='relevance'>Relevance</option>";
echo "<option value='price_low'>Price: Low to High</option>";
echo "<option value='price_high'>Price: High to Low</option>";
echo "<option value='newest'>Newest First</option>";
echo "<option value='rating'>Best Rating</option>";
echo "</select>";
echo "</div>";
echo "</div>";

echo "<input type='submit' name='search_submit' value='Search Products' style='background: #ffc107; color: #212529; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; width: 100%;'>";
echo "</form>";
echo "</div>";

echo "<hr>";

/* ---------- Security and Best Practices ---------- */

echo "<h3>🛡️ Security and Best Practices</h3>";
echo "<div style='background: linear-gradient(135deg, #ff7675, #d63031); color: white; padding: 20px; border-radius: 10px; margin: 15px 0;'>";

echo "<h4>⚠️ Important Security Rules:</h4>";
echo "1. <strong>ALWAYS</strong> clean user input with htmlspecialchars()<br>";
echo "2. <strong>NEVER</strong> trust user data directly<br>";
echo "3. <strong>USE</strong> \$_POST for passwords and private data<br>";
echo "4. <strong>VALIDATE</strong> all form inputs<br>";
echo "5. <strong>CHECK</strong> if data exists before using it<br>";

echo "</div>";

echo "<h4>✅ Good Security Example:</h4>";
echo "<div style='background: #f8f9fa; padding: 15px; border-radius: 8px; font-family: monospace; border: 1px solid #dee2e6;'>";
echo "<pre style='margin: 0; color: #495057;'>";
echo "// ✅ GOOD - Safe way to handle user input
if (isset(\$_POST['username'])) {
    \$username = htmlspecialchars(\$_POST['username']);
    \$username = trim(\$username);
    
    if (!empty(\$username)) {
        echo \"Hello \" . \$username;
    } else {
        echo \"Please enter a username\";
    }
}";
echo "</pre>";
echo "</div>";

echo "<h4>❌ Bad Security Example:</h4>";
echo "<div style='background: #f8d7da; padding: 15px; border-radius: 8px; font-family: monospace; border: 1px solid #f5c6cb;'>";
echo "<pre style='margin: 0; color: #721c24;'>";
echo "// ❌ BAD - Dangerous way (never do this!)
echo \"Hello \" . \$_POST['username']; // No security!";
echo "</pre>";
echo "</div>";

echo "<hr>";

/* ---------- Quick Comparison Table ---------- */

echo "<h3>📊 Quick Comparison: GET vs POST</h3>";
echo "<div style='overflow-x: auto;'>";
echo "<table style='width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);'>";

echo "<thead style='background: linear-gradient(135deg, #6c5ce7, #a29bfe); color: white;'>";
echo "<tr>";
echo "<th style='padding: 15px; text-align: left; border-bottom: 1px solid #dee2e6;'>Feature</th>";
echo "<th style='padding: 15px; text-align: left; border-bottom: 1px solid #dee2e6;'>📬 \$_GET</th>";
echo "<th style='padding: 15px; text-align: left; border-bottom: 1px solid #dee2e6;'>✉️ \$_POST</th>";
echo "</tr>";
echo "</thead>";

echo "<tbody>";
$comparisons = [
    ['Visibility', 'Visible in URL', 'Hidden from URL'],
    ['Security', 'Less secure', 'More secure'],
    ['Data Size', 'Limited (~2KB)', 'Large amounts'],
    ['Bookmarking', 'Can bookmark', 'Cannot bookmark'],
    ['Browser History', 'Saved in history', 'Not saved'],
    ['Caching', 'Can be cached', 'Not cached'],
    ['Back Button', 'Safe to use', 'May resubmit'],
    ['Best For', 'Search, filters, links', 'Forms, passwords, uploads']
];

foreach ($comparisons as $index => $comparison) {
    $bgColor = $index % 2 === 0 ? '#f8f9fa' : 'white';
    echo "<tr style='background: $bgColor;'>";
    echo "<td style='padding: 12px; border-bottom: 1px solid #dee2e6; font-weight: bold;'>{$comparison[0]}</td>";
    echo "<td style='padding: 12px; border-bottom: 1px solid #dee2e6;'>{$comparison[1]}</td>";
    echo "<td style='padding: 12px; border-bottom: 1px solid #dee2e6;'>{$comparison[2]}</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
echo "</div>";

echo "<hr>";

/* ---------- Summary and Next Steps ---------- */

echo "<h3>🎯 What You've Learned Today</h3>";
echo "<div style='background: linear-gradient(135deg, #00b894, #00cec9); color: white; padding: 20px; border-radius: 10px; margin: 15px 0;'>";

echo "<h4>✅ Mastered Skills:</h4>";
echo "• Understanding the difference between GET and POST<br>";
echo "• Creating interactive forms that actually work<br>";
echo "• Handling URL parameters safely<br>";
echo "• Security best practices for user input<br>";
echo "• When to use GET vs POST in real projects<br>";

echo "<br><h4>💪 You Can Now Build:</h4>";
echo "• Contact forms for websites<br>";
echo "• User registration systems<br>";
echo "• Search and filter functionality<br>";
echo "• Dynamic pages based on URL parameters<br>";
echo "• Secure data processing systems<br>";

echo "</div>";

echo "<div style='background: #28a745; color: white; padding: 15px; border-radius: 8px; margin: 15px 0;'>";
echo "<h4>🚀 Practice Challenge:</h4>";
echo "Try building a simple blog system where:<br>";
echo "• Use GET for: showing posts, pagination, categories<br>";
echo "• Use POST for: adding comments, user login, post creation<br>";
echo "<br><strong>Next lesson:</strong> We'll learn about Functions - how to organize your code better!";
echo "</div>";

?>