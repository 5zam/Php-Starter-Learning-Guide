<?php
// =====================================
//  PHP Basics Course - Part 9
//  Topics: Superglobals (Easy Guide for Beginners)
// =====================================

/* ---------- Superglobals ---------- */

/*
❓ What are Superglobals? (Think of them as Magic Boxes!)
✅ Superglobals are special variables that PHP gives you for FREE!
   They work everywhere in your code - no setup needed.
   Think of them as magic boxes that hold different types of information:
   
   📦 $_GET     = Data from URL (like ?name=Ahmad)
   📦 $_POST    = Data from forms (hidden from URL)
   📦 $_SESSION = Data that remembers users
   📦 $_COOKIE  = Small data stored in browser
   📦 $_SERVER  = Information about your website
   📦 $_FILES   = Files uploaded by users
   📦 $GLOBALS  = All your variables in one place
   📦 $_ENV     = Computer environment settings
   📦 $_REQUEST = Combination of GET and POST (not recommended)
*/

echo "<h2>🎉 Welcome to PHP Superglobals - Your Magic Toolbox!</h2>";


/* ---------- $_SERVER - Information About Your Website ---------- */

/*
❓ What is $_SERVER? (Your Website's ID Card!)
✅ $_SERVER tells you everything about your website and visitors.
   It's like an ID card for your website with lots of details.
   You can use this to make your website smarter and more secure.
*/

echo "<h3>🌐 \$_SERVER - Your Website's Information Card</h3>";
echo "<div style='background: #f0f8ff; padding: 15px; border-radius: 8px; margin: 10px 0;'>";

echo "<h4>📍 Website Location Info:</h4>";
echo "🏠 Website Address: " . ($_SERVER['HTTP_HOST'] ?? 'Unknown') . "<br>";
echo "📁 Website Folder: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'Unknown') . "<br>";
echo "📄 Current Page: " . ($_SERVER['PHP_SELF'] ?? 'Unknown') . "<br>";
echo "🔗 Full URL: " . ($_SERVER['REQUEST_URI'] ?? 'Unknown') . "<br>";

echo "<h4>⚙️ Server Details:</h4>";
echo "💻 Server Software: " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') . "<br>";
echo "🚪 Port Number: " . ($_SERVER['SERVER_PORT'] ?? 'Unknown') . "<br>";

echo "<h4>👤 Visitor Information:</h4>";
echo "🌍 Visitor's IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "<br>";
echo "🔌 Visitor's Port: " . ($_SERVER['REMOTE_PORT'] ?? 'Unknown') . "<br>";
echo "📱 Browser Info: " . substr(($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown'), 0, 50) . "...<br>";

echo "</div>";

// Practical example: Security check
echo "<h4>🛡️ Practical Example - Simple Security Check:</h4>";
$userBrowser = $_SERVER['HTTP_USER_AGENT'] ?? '';
if (strpos(strtolower($userBrowser), 'bot') !== false) {
    echo "🤖 <em>Robot visitor detected!</em><br>";
} else {
    echo "👋 <em>Hello human visitor!</em><br>";
}

echo "<hr>";

/* ---------- $_GET - Data from URL ---------- */

/*
❓ What is $_GET? (Like Getting Mail from URL!)
✅ $_GET gets information from the website address (URL).
   When you see ?name=Ahmad&age=25 in a URL, that's GET data!
   It's visible to everyone - don't use it for passwords!
   
   Perfect for: Search filters, page numbers, public settings
   Don't use for: Passwords, private information
*/

echo "<h3>📬 \$_GET - Getting Information from URL</h3>";
echo "<div style='background: #f0fff0; padding: 15px; border-radius: 8px; margin: 10px 0;'>";

echo "<h4>📝 How GET Works:</h4>";
echo "When someone visits: <code>yoursite.com/page.php?name=Ahmad&city=Riyadh</code><br>";
echo "PHP automatically puts this data in the \$_GET box for you!<br><br>";

// Check if we have GET data
if (!empty($_GET)) {
    echo "<h4>📦 Current GET Data in Your URL:</h4>";
    foreach ($_GET as $key => $value) {
        // Simple security: clean the data
        $cleanKey = htmlspecialchars($key);
        $cleanValue = htmlspecialchars($value);
        echo "📌 <strong>$cleanKey:</strong> $cleanValue<br>";
    }
} else {
    echo "<h4>📭 No GET data found in current URL</h4>";
    echo "Try adding ?name=YourName&age=25 to the URL and refresh!<br>";
}

echo "<br><h4>🧪 Real Example - User Profile Page:</h4>";
// Simulate a user profile system
$userName = $_GET['name'] ?? 'Guest';
$userAge = $_GET['age'] ?? 'Unknown';
$userCity = $_GET['city'] ?? 'Unknown';

$cleanUserName = htmlspecialchars($userName);
$cleanUserAge = htmlspecialchars($userAge);
$cleanUserCity = htmlspecialchars($userCity);

echo "<div style='border: 2px solid #4CAF50; padding: 10px; border-radius: 8px;'>";
echo "👤 <strong>User Profile</strong><br>";
echo "Name: $cleanUserName<br>";
echo "Age: $cleanUserAge<br>";
echo "City: $cleanUserCity<br>";
echo "</div>";

echo "<br><strong>💡 Try this:</strong> Add ?name=Ahmad&age=25&city=Riyadh to your URL!<br>";

echo "</div>";

echo "<hr>";

/* ---------- $_POST - Data from Forms (Hidden Way) ---------- */

/*
❓ What is $_POST? (Like Sending a Secret Letter!)
✅ $_POST gets information from HTML forms in a hidden way.
   Unlike GET, POST data doesn't show in the URL.
   It's safer for passwords, personal info, and large data.
   
   Perfect for: Login forms, contact forms, file uploads
   Use this for: Private information, passwords, large text
*/

echo "<h3>✉️ \$_POST - Secret Data from Forms</h3>";
echo "<div style='background: #fff0f5; padding: 15px; border-radius: 8px; margin: 10px 0;'>";

echo "<h4>🔒 Why POST is Better for Private Data:</h4>";
echo "✅ Data is hidden from URL<br>";
echo "✅ Can send lots of data<br>";
echo "✅ More secure for passwords<br>";
echo "✅ Better for forms<br><br>";

// Simple contact form example
echo "<h4>📝 Example: Simple Contact Form</h4>";

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and clean form data
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');
    
    if (!empty($name) && !empty($email) && !empty($message)) {
        echo "<div style='background: #d4edda; padding: 10px; border-radius: 5px; border: 1px solid #c3e6cb;'>";
        echo "✅ <strong>Message Received!</strong><br>";
        echo "From: $name ($email)<br>";
        echo "Message: " . substr($message, 0, 100) . (strlen($message) > 100 ? '...' : '') . "<br>";
        echo "</div><br>";
    } else {
        echo "<div style='background: #f8d7da; padding: 10px; border-radius: 5px; border: 1px solid #f5c6cb;'>";
        echo "❌ Please fill all fields!<br>";
        echo "</div><br>";
    }
}

// The contact form
echo "<form method='POST' style='background: #f8f9fa; padding: 15px; border-radius: 8px;'>";
echo "<strong>Contact Us:</strong><br><br>";
echo "Your Name:<br>";
echo "<input type='text' name='name' style='width: 200px; padding: 5px; margin-bottom: 10px;'><br>";
echo "Your Email:<br>";
echo "<input type='email' name='email' style='width: 200px; padding: 5px; margin-bottom: 10px;'><br>";
echo "Your Message:<br>";
echo "<textarea name='message' style='width: 300px; height: 80px; padding: 5px; margin-bottom: 10px;'></textarea><br>";
echo "<input type='submit' value='Send Message' style='background: #007bff; color: white; padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer;'>";
echo "</form>";

echo "</div>";

echo "<hr>";

/* ---------- $_SESSION - Remember Users ---------- */

/*
❓ What is $_SESSION? (Like a Memory for Your Website!)
✅ $_SESSION remembers information about users between pages.
   It's like giving each visitor a special ID card that remembers their info.
   Perfect for login systems, shopping carts, user preferences.
   
   Must do: Start session with session_start() at the top of your page!
*/

// Start session (always do this first!)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

echo "<h3>🧠 \$_SESSION - Website Memory for Users</h3>";
echo "<div style='background: #f0f8ff; padding: 15px; border-radius: 8px; margin: 10px 0;'>";

echo "<h4>💡 How Sessions Work:</h4>";
echo "1. User visits your website<br>";
echo "2. PHP gives them a special ID (like a ticket)<br>";
echo "3. You can store info about them using this ticket<br>";
echo "4. Info stays remembered until they close browser<br><br>";

// Simple session demo
if (isset($_POST['login'])) {
    $_SESSION['username'] = htmlspecialchars($_POST['username']);
    $_SESSION['login_time'] = date('H:i:s');
    echo "<div style='background: #d4edda; padding: 10px; border-radius: 5px;'>";
    echo "✅ Welcome " . $_SESSION['username'] . "! You logged in at " . $_SESSION['login_time'] . "<br>";
    echo "</div><br>";
}

if (isset($_POST['logout'])) {
    session_destroy();
    echo "<div style='background: #fff3cd; padding: 10px; border-radius: 5px;'>";
    echo "👋 You have been logged out!<br>";
    echo "</div><br>";
    // Restart session for demo
    session_start();
}

echo "<h4>🎮 Try Our Simple Login System:</h4>";

if (isset($_SESSION['username'])) {
    echo "<div style='background: #d1ecf1; padding: 10px; border-radius: 5px;'>";
    echo "👤 <strong>You are logged in as:</strong> " . $_SESSION['username'] . "<br>";
    echo "⏰ <strong>Login time:</strong> " . ($_SESSION['login_time'] ?? 'Unknown') . "<br>";
    echo "<form method='POST' style='margin-top: 10px;'>";
    echo "<input type='submit' name='logout' value='Logout' style='background: #dc3545; color: white; padding: 5px 10px; border: none; border-radius: 4px;'>";
    echo "</form>";
    echo "</div>";
} else {
    echo "<form method='POST' style='background: #f8f9fa; padding: 10px; border-radius: 5px;'>";
    echo "Username: <input type='text' name='username' style='padding: 5px; margin: 0 10px;'>";
    echo "<input type='submit' name='login' value='Login' style='background: #28a745; color: white; padding: 5px 10px; border: none; border-radius: 4px;'>";
    echo "</form>";
}

echo "</div>";

echo "<hr>";

/* ---------- $_COOKIE - Small Data in Browser ---------- */

/*
❓ What is $_COOKIE? (Like Sticky Notes in Browser!)
✅ $_COOKIE stores small pieces of information in the user's browser.
   It's like leaving sticky notes that the browser remembers.
   Cookies stay even after closing the browser (until they expire).
   
   Perfect for: Remember login, user preferences, language settings
   Size limit: Very small (4KB max)
*/

echo "<h3>🍪 \$_COOKIE - Sticky Notes in Browser</h3>";
echo "<div style='background: #fff8dc; padding: 15px; border-radius: 8px; margin: 10px 0;'>";

echo "<h4>📌 How Cookies Work:</h4>";
echo "1. Website puts small data in user's browser<br>";
echo "2. Browser remembers this data<br>";
echo "3. Next time user visits, browser sends data back<br>";
echo "4. Data stays until it expires or user deletes it<br><br>";

// Handle cookie operations
if (isset($_POST['set_cookie'])) {
    $cookieValue = htmlspecialchars($_POST['cookie_value']);
    setcookie('user_preference', $cookieValue, time() + 3600); // 1 hour
    echo "<div style='background: #d4edda; padding: 10px; border-radius: 5px;'>";
    echo "✅ Cookie set! Refresh the page to see it.<br>";
    echo "</div><br>";
}

if (isset($_POST['delete_cookie'])) {
    setcookie('user_preference', '', time() - 3600); // Delete by setting past time
    echo "<div style='background: #fff3cd; padding: 10px; border-radius: 5px;'>";
    echo "🗑️ Cookie deleted! Refresh to see the change.<br>";
    echo "</div><br>";
}

echo "<h4>🧪 Cookie Demo - Remember Your Favorite Color:</h4>";

// Check if cookie exists
if (isset($_COOKIE['user_preference'])) {
    $favoriteColor = htmlspecialchars($_COOKIE['user_preference']);
    echo "<div style='background: $favoriteColor; padding: 10px; border-radius: 5px; color: white;'>";
    echo "🎨 <strong>Your favorite color is:</strong> $favoriteColor<br>";
    echo "</div><br>";
    
    echo "<form method='POST'>";
    echo "<input type='submit' name='delete_cookie' value='Forget My Color' style='background: #dc3545; color: white; padding: 5px 10px; border: none; border-radius: 4px;'>";
    echo "</form>";
} else {
    echo "<form method='POST' style='background: #f8f9fa; padding: 10px; border-radius: 5px;'>";
    echo "Choose your favorite color: ";
    echo "<select name='cookie_value' style='padding: 5px; margin: 0 10px;'>";
    echo "<option value='#ff6b6b'>Red</option>";
    echo "<option value='#4ecdc4'>Teal</option>";
    echo "<option value='#45b7d1'>Blue</option>";
    echo "<option value='#96ceb4'>Green</option>";
    echo "<option value='#ffeaa7'>Yellow</option>";
    echo "</select>";
    echo "<input type='submit' name='set_cookie' value='Remember It!' style='background: #28a745; color: white; padding: 5px 10px; border: none; border-radius: 4px;'>";
    echo "</form>";
    echo "<small>🔄 Note: You'll need to refresh the page to see the cookie effect!</small>";
}

echo "</div>";

echo "<hr>";

/* ---------- $_FILES - File Uploads ---------- */

/*
❓ What is $_FILES? (Like a Mailbox for Files!)
✅ $_FILES contains information about files that users upload.
   When someone uploads a photo or document, info goes here.
   You can check file size, type, name, and if upload was successful.
   
   Important: Always check file type and size for security!
*/

echo "<h3>📁 \$_FILES - File Upload Information</h3>";
echo "<div style='background: #f5f5f5; padding: 15px; border-radius: 8px; margin: 10px 0;'>";

echo "<h4>📤 How File Uploads Work:</h4>";
echo "1. User selects file from their computer<br>";
echo "2. Browser sends file to your website<br>";
echo "3. PHP puts file info in \$_FILES<br>";
echo "4. You can check and save the file<br><br>";

echo "<h4>🔍 File Upload Demo (Info Only):</h4>";

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['demo_file'])) {
    $file = $_FILES['demo_file'];
    
    echo "<div style='background: #e7f3ff; padding: 10px; border-radius: 5px;'>";
    echo "📋 <strong>File Information:</strong><br>";
    echo "📄 Name: " . htmlspecialchars($file['name']) . "<br>";
    echo "📏 Size: " . number_format($file['size']) . " bytes<br>";
    echo "🏷️ Type: " . htmlspecialchars($file['type']) . "<br>";
    echo "📍 Temp Location: " . htmlspecialchars($file['tmp_name']) . "<br>";
    
    if ($file['error'] === 0) {
        echo "✅ Upload Status: Success!<br>";
        
        // Check file size (limit to 1MB for demo)
        if ($file['size'] > 1048576) {
            echo "⚠️ Warning: File is larger than 1MB<br>";
        }
        
        // Check file type
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'text/plain'];
        if (in_array($file['type'], $allowedTypes)) {
            echo "✅ File type is allowed<br>";
        } else {
            echo "❌ File type not allowed<br>";
        }
    } else {
        echo "❌ Upload Status: Error (Code: " . $file['error'] . ")<br>";
    }
    echo "</div><br>";
}

// File upload form
echo "<form method='POST' enctype='multipart/form-data' style='background: #f8f9fa; padding: 10px; border-radius: 5px;'>";
echo "<strong>Upload a file to see \$_FILES in action:</strong><br><br>";
echo "Choose file: <input type='file' name='demo_file' style='margin: 5px 0;'><br>";
echo "<small>📝 This demo only shows file info - doesn't actually save files</small><br>";
echo "<input type='submit' value='Check File Info' style='background: #007bff; color: white; padding: 5px 10px; border: none; border-radius: 4px; margin-top: 5px;'>";
echo "</form>";

echo "</div>";

echo "<hr>";

/* ---------- $GLOBALS - All Variables in One Place ---------- */

/*
❓ What is $GLOBALS? (Like a Master List of Everything!)
✅ $GLOBALS contains ALL your variables in one big list.
   It's like having a master directory of everything in your code.
   You can access any variable from anywhere using $GLOBALS.
   
   Useful for: Debugging, accessing variables across functions
   Be careful: Too much use can make code confusing
*/

echo "<h3>🗂️ \$GLOBALS - Master List of All Variables</h3>";
echo "<div style='background: #f0f0f0; padding: 15px; border-radius: 8px; margin: 10px 0;'>";

// Create some sample variables
$sampleText = "Hello World";
$sampleNumber = 42;
$sampleArray = ['apple', 'banana', 'orange'];

echo "<h4>📊 Current Variables in \$GLOBALS:</h4>";
echo "<div style='max-height: 200px; overflow-y: auto; background: white; padding: 10px; border-radius: 5px;'>";

// Show some interesting GLOBALS (filter out system stuff)
$interestingGlobals = ['sampleText', 'sampleNumber', 'sampleArray', '_GET', '_POST', '_SESSION', '_COOKIE'];

foreach ($interestingGlobals as $varName) {
    if (isset($GLOBALS[$varName])) {
        echo "<strong>$varName:</strong> ";
        if (is_array($GLOBALS[$varName])) {
            echo "Array with " . count($GLOBALS[$varName]) . " items<br>";
        } else {
            echo htmlspecialchars(substr(print_r($GLOBALS[$varName], true), 0, 50)) . "<br>";
        }
    }
}

echo "</div>";

echo "<br><h4>🧪 Quick Demo:</h4>";
echo "We can access any variable through \$GLOBALS:<br>";
echo "• \$sampleText = '" . $GLOBALS['sampleText'] . "'<br>";
echo "• \$sampleNumber = " . $GLOBALS['sampleNumber'] . "<br>";
echo "• \$sampleArray has " . count($GLOBALS['sampleArray']) . " items<br>";

echo "</div>";

echo "<hr>";

/* ---------- Quick Summary for Beginners ---------- */

echo "<h3>📚 Quick Summary - Your Superglobal Cheat Sheet</h3>";
echo "<div style='background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 10px; margin: 15px 0;'>";

echo "<div style='display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 15px;'>";

echo "<div style='background: rgba(255,255,255,0.1); padding: 15px; border-radius: 8px;'>";
echo "<h4>🌐 \$_SERVER</h4>";
echo "<strong>What:</strong> Website & visitor info<br>";
echo "<strong>Use for:</strong> Security, analytics<br>";
echo "<strong>Example:</strong> Get visitor's IP address";
echo "</div>";

echo "<div style='background: rgba(255,255,255,0.1); padding: 15px; border-radius: 8px;'>";
echo "<h4>📬 \$_GET</h4>";
echo "<strong>What:</strong> Data from URL<br>";
echo "<strong>Use for:</strong> Search filters, page links<br>";
echo "<strong>Example:</strong> ?name=Ahmad&page=2";
echo "</div>";

echo "<div style='background: rgba(255,255,255,0.1); padding: 15px; border-radius: 8px;'>";
echo "<h4>✉️ \$_POST</h4>";
echo "<strong>What:</strong> Hidden form data<br>";
echo "<strong>Use for:</strong> Passwords, contact forms<br>";
echo "<strong>Example:</strong> Login forms";
echo "</div>";

echo "<div style='background: rgba(255,255,255,0.1); padding: 15px; border-radius: 8px;'>";
echo "<h4>🧠 \$_SESSION</h4>";
echo "<strong>What:</strong> Remembers users<br>";
echo "<strong>Use for:</strong> Login status, shopping cart<br>";
echo "<strong>Example:</strong> Stay logged in";
echo "</div>";

echo "<div style='background: rgba(255,255,255,0.1); padding: 15px; border-radius: 8px;'>";
echo "<h4>🍪 \$_COOKIE</h4>";
echo "<strong>What:</strong> Browser storage<br>";
echo "<strong>Use for:</strong> User preferences<br>";
echo "<strong>Example:</strong> Remember language";
echo "</div>";

echo "<div style='background: rgba(255,255,255,0.1); padding: 15px; border-radius: 8px;'>";
echo "<h4>📁 \$_FILES</h4>";
echo "<strong>What:</strong> Upload information<br>";
echo "<strong>Use for:</strong> File uploads<br>";
echo "<strong>Example:</strong> Profile pictures";
echo "</div>";

echo "</div>";

echo "<br><h4>🎯 Remember These Key Points:</h4>";
echo "✅ Always clean user input with htmlspecialchars()<br>";
echo "✅ Use \$_POST for private data, \$_GET for public data<br>";
echo "✅ Start sessions with session_start() before using \$_SESSION<br>";
echo "✅ Check file size and type before saving uploads<br>";
echo "✅ Superglobals work everywhere - no setup needed!<br>";

echo "</div>";

echo "<h3>🎉 Congratulations! You've mastered PHP Superglobals!</h3>";
echo "<p>You now know how to get data from URLs, forms, sessions, cookies, and file uploads. These are the building blocks of interactive websites!</p>";

echo "<div style='background: #28a745; color: white; padding: 15px; border-radius: 8px; margin: 15px 0;'>";
echo "<h4>🚀 What You Can Build Now:</h4>";
echo "• Contact forms that actually work<br>";
echo "• User login and registration systems<br>";
echo "• File upload features<br>";
echo "• User preference systems<br>";
echo "• Dynamic content based on URL parameters<br>";
echo "• Secure data handling<br>";
echo "</div>";

echo "<p><strong>Next:</strong> We'll learn about Functions - how to organize your code better!</p>";

?>