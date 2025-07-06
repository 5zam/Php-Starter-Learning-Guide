<?php
// =====================================
//  PHP Basics Course - Part 9
//  Topics: Cookies (Simple Guide)
// =====================================

/* ------------- Cookies ------------ */

/*
❓ What are Cookies? (Think of them as Browser Memory Notes!)
✅ Cookies are small pieces of information stored in the user's browser.
   Think of them like sticky notes that your website leaves in someone's browser.
   When they come back, you can read these notes to remember them!

🍪 Cookie Examples in Real Life:
• Remember user's name: "Welcome back, Ahmad!"
• Save language preference: Arabic vs English
• Keep shopping cart items
• Remember if user likes dark mode
• Store user's city for weather

📏 Cookie Limitations:
• Small size only (4KB max per cookie)
• Can be deleted by user
• Not secure for passwords
• Expire after set time
*/

echo "<h2>🍪 Cookies - Your Website's Memory System</h2>";
echo "<p><strong>Simple Idea:</strong> Leave notes in user's browser to remember them later!</p>";

echo "<div style='background: linear-gradient(135deg, #fdcb6e, #e17055); color: white; padding: 20px; border-radius: 10px; margin: 15px 0;'>";
echo "<h4>🎯 How Cookies Work:</h4>";
echo "1. <strong>User visits</strong> your website<br>";
echo "2. <strong>You set cookie</strong> - setcookie('name', 'Ahmad')<br>";
echo "3. <strong>Browser saves</strong> this information<br>";
echo "4. <strong>User returns</strong> days later<br>";
echo "5. <strong>Browser sends</strong> cookie back to you<br>";
echo "6. <strong>You read cookie</strong> - \$_COOKIE['name']<br>";
echo "7. <strong>You say</strong> 'Welcome back, Ahmad!'<br>";
echo "</div>";

/* ---------- Cookie Management Functions ---------- */

// Handle cookie operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['set_name_cookie'])) {
        $userName = htmlspecialchars($_POST['user_name']);
        $expiry = time() + (30 * 24 * 60 * 60); // 30 days
        setcookie('user_name', $userName, $expiry, '/');
        echo "<div style='background: #d4edda; padding: 10px; border-radius: 5px; margin: 10px 0; border: 1px solid #c3e6cb;'>";
        echo "✅ <strong>Cookie Set!</strong> Your name '$userName' has been saved for 30 days.<br>";
        echo "🔄 <em>Refresh the page to see the cookie in action!</em>";
        echo "</div>";
    }
    
    if (isset($_POST['set_preferences'])) {
        $theme = $_POST['theme'];
        $language = $_POST['language'];
        $notifications = isset($_POST['notifications']) ? 'on' : 'off';
        
        // Set multiple cookies
        setcookie('user_theme', $theme, time() + (365 * 24 * 60 * 60), '/'); // 1 year
        setcookie('user_language', $language, time() + (365 * 24 * 60 * 60), '/');
        setcookie('notifications', $notifications, time() + (365 * 24 * 60 * 60), '/');
        
        echo "<div style='background: #d1ecf1; padding: 10px; border-radius: 5px; margin: 10px 0; border: 1px solid #bee5eb;'>";
        echo "✅ <strong>Preferences Saved!</strong><br>";
        echo "Theme: $theme | Language: $language | Notifications: $notifications<br>";
        echo "🔄 <em>Refresh to see changes!</em>";
        echo "</div>";
    }
    
    if (isset($_POST['delete_cookies'])) {
        // Delete cookies by setting past expiry time
        setcookie('user_name', '', time() - 3600, '/');
        setcookie('user_theme', '', time() - 3600, '/');
        setcookie('user_language', '', time() - 3600, '/');
        setcookie('notifications', '', time() - 3600, '/');
        setcookie('shopping_cart', '', time() - 3600, '/');
        
        echo "<div style='background: #fff3cd; padding: 10px; border-radius: 5px; margin: 10px 0; border: 1px solid #ffeaa7;'>";
        echo "🗑️ <strong>All cookies deleted!</strong> Refresh to see changes.";
        echo "</div>";
    }
    
    if (isset($_POST['add_to_cart'])) {
        $product = htmlspecialchars($_POST['product']);
        $currentCart = isset($_COOKIE['shopping_cart']) ? $_COOKIE['shopping_cart'] : '';
        $newCart = $currentCart ? $currentCart . ',' . $product : $product;
        
        setcookie('shopping_cart', $newCart, time() + (7 * 24 * 60 * 60), '/'); // 7 days
        
        echo "<div style='background: #d4edda; padding: 10px; border-radius: 5px; margin: 10px 0; border: 1px solid #c3e6cb;'>";
        echo "🛒 <strong>'$product' added to cart!</strong> Refresh to see updated cart.";
        echo "</div>";
    }
}

/* ---------- Display Current Cookies ---------- */

echo "<h3>📋 Your Current Cookies</h3>";
echo "<div style='background: #f8f9fa; padding: 20px; border-radius: 10px; margin: 15px 0; border: 1px solid #dee2e6;'>";

if (empty($_COOKIE)) {
    echo "<div style='text-align: center; padding: 20px; color: #6c757d;'>";
    echo "🍪 <strong>No cookies found!</strong><br>";
    echo "Use the forms below to create some cookies.";
    echo "</div>";
} else {
    echo "<h4>🍪 Active Cookies:</h4>";
    
    foreach ($_COOKIE as $name => $value) {
        // Skip PHP session cookie
        if (strpos($name, 'PHPSESSID') !== false) continue;
        
        echo "<div style='background: white; padding: 10px; margin: 8px 0; border-radius: 5px; border-left: 4px solid #007bff;'>";
        echo "<strong>🏷️ $name:</strong> " . htmlspecialchars($value);
        echo "</div>";
    }
    
    // Special display for shopping cart
    if (isset($_COOKIE['shopping_cart'])) {
        echo "<h4>🛒 Shopping Cart Contents:</h4>";
        $cartItems = explode(',', $_COOKIE['shopping_cart']);
        echo "<div style='background: white; padding: 15px; border-radius: 5px; border: 2px solid #28a745;'>";
        foreach ($cartItems as $item) {
            if (trim($item)) {
                echo "• " . htmlspecialchars(trim($item)) . "<br>";
            }
        }
        echo "</div>";
    }
}

echo "</div>";

/* ---------- Cookie Examples ---------- */

echo "<h3>🧪 Interactive Cookie Examples</h3>";

// Example 1: User Name Cookie
echo "<div style='background: white; padding: 20px; border-radius: 10px; margin: 15px 0; box-shadow: 0 2px 10px rgba(0,0,0,0.1);'>";
echo "<h4>👤 Example 1: Remember User Name</h4>";

if (isset($_COOKIE['user_name'])) {
    echo "<div style='background: #d4edda; padding: 15px; border-radius: 5px; margin: 10px 0;'>";
    echo "🎉 <strong>Welcome back, " . htmlspecialchars($_COOKIE['user_name']) . "!</strong><br>";
    echo "We remembered you from your last visit!";
    echo "</div>";
} else {
    echo "<p>👋 Hello stranger! Let us remember you for next time:</p>";
}

echo "<form method='POST' style='background: #f8f9fa; padding: 15px; border-radius: 5px;'>";
echo "<div style='margin-bottom: 10px;'>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>Your Name:</label>";
echo "<input type='text' name='user_name' placeholder='Enter your name' style='width: 200px; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;' required>";
echo "</div>";
echo "<input type='submit' name='set_name_cookie' value='Remember Me!' style='background: #007bff; color: white; padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer;'>";
echo "</form>";
echo "</div>";

// Example 2: User Preferences
echo "<div style='background: white; padding: 20px; border-radius: 10px; margin: 15px 0; box-shadow: 0 2px 10px rgba(0,0,0,0.1);'>";
echo "<h4>⚙️ Example 2: Save User Preferences</h4>";

// Show current preferences
if (isset($_COOKIE['user_theme']) || isset($_COOKIE['user_language'])) {
    $theme = $_COOKIE['user_theme'] ?? 'light';
    $language = $_COOKIE['user_language'] ?? 'english';
    $notifications = $_COOKIE['notifications'] ?? 'off';
    
    echo "<div style='background: #e2e3e5; padding: 15px; border-radius: 5px; margin: 10px 0;'>";
    echo "⚙️ <strong>Your Current Settings:</strong><br>";
    echo "🎨 Theme: " . ucfirst($theme) . "<br>";
    echo "🌍 Language: " . ucfirst($language) . "<br>";
    echo "🔔 Notifications: " . ucfirst($notifications);
    echo "</div>";
}

echo "<form method='POST' style='background: #f8f9fa; padding: 15px; border-radius: 5px;'>";
echo "<div style='display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;'>";

echo "<div>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>🎨 Theme:</label>";
echo "<select name='theme' style='width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;'>";
echo "<option value='light'" . (isset($_COOKIE['user_theme']) && $_COOKIE['user_theme'] === 'light' ? ' selected' : '') . ">Light</option>";
echo "<option value='dark'" . (isset($_COOKIE['user_theme']) && $_COOKIE['user_theme'] === 'dark' ? ' selected' : '') . ">Dark</option>";
echo "<option value='auto'" . (isset($_COOKIE['user_theme']) && $_COOKIE['user_theme'] === 'auto' ? ' selected' : '') . ">Auto</option>";
echo "</select>";
echo "</div>";

echo "<div>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>🌍 Language:</label>";
echo "<select name='language' style='width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;'>";
echo "<option value='english'" . (isset($_COOKIE['user_language']) && $_COOKIE['user_language'] === 'english' ? ' selected' : '') . ">English</option>";
echo "<option value='arabic'" . (isset($_COOKIE['user_language']) && $_COOKIE['user_language'] === 'arabic' ? ' selected' : '') . ">العربية</option>";
echo "<option value='spanish'" . (isset($_COOKIE['user_language']) && $_COOKIE['user_language'] === 'spanish' ? ' selected' : '') . ">Español</option>";
echo "</select>";
echo "</div>";

echo "</div>";

echo "<div style='margin-bottom: 15px;'>";
echo "<label style='display: flex; align-items: center;'>";
$notificationsChecked = (isset($_COOKIE['notifications']) && $_COOKIE['notifications'] === 'on') ? ' checked' : '';
echo "<input type='checkbox' name='notifications' value='on' style='margin-right: 8px;'$notificationsChecked>";
echo "🔔 Enable notifications";
echo "</label>";
echo "</div>";

echo "<input type='submit' name='set_preferences' value='Save Preferences' style='background: #28a745; color: white; padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer;'>";
echo "</form>";
echo "</div>";

// Example 3: Shopping Cart
echo "<div style='background: white; padding: 20px; border-radius: 10px; margin: 15px 0; box-shadow: 0 2px 10px rgba(0,0,0,0.1);'>";
echo "<h4>🛒 Example 3: Shopping Cart (Cookie-Based)</h4>";

echo "<p>Add items to your cart - they'll be remembered even if you close the browser!</p>";

echo "<form method='POST' style='background: #f8f9fa; padding: 15px; border-radius: 5px; margin-bottom: 15px;'>";
echo "<div style='display: flex; gap: 10px; align-items: end;'>";
echo "<div>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>Product:</label>";
echo "<select name='product' style='padding: 8px; border: 1px solid #ced4da; border-radius: 4px;'>";
echo "<option value='iPhone 15'>iPhone 15 - 3999 SAR</option>";
echo "<option value='Samsung Galaxy S24'>Samsung Galaxy S24 - 3499 SAR</option>";
echo "<option value='MacBook Pro'>MacBook Pro - 8999 SAR</option>";
echo "<option value='AirPods Pro'>AirPods Pro - 999 SAR</option>";
echo "<option value='iPad Air'>iPad Air - 2299 SAR</option>";
echo "</select>";
echo "</div>";
echo "<input type='submit' name='add_to_cart' value='Add to Cart' style='background: #ffc107; color: #212529; padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer;'>";
echo "</div>";
echo "</form>";

if (isset($_COOKIE['shopping_cart'])) {
    $cartItems = explode(',', $_COOKIE['shopping_cart']);
    $itemCount = count(array_filter($cartItems));
    
    echo "<div style='background: #e7f3ff; padding: 15px; border-radius: 5px; border: 1px solid #b3d7ff;'>";
    echo "🛒 <strong>Your Cart ($itemCount items):</strong><br>";
    foreach ($cartItems as $item) {
        if (trim($item)) {
            echo "• " . htmlspecialchars(trim($item)) . "<br>";
        }
    }
    echo "</div>";
}

echo "</div>";

/* ---------- Cookie Security and Best Practices ---------- */

echo "<h3>🛡️ Cookie Security and Best Practices</h3>";

echo "<div style='background: linear-gradient(135deg, #e17055, #d63031); color: white; padding: 20px; border-radius: 10px; margin: 15px 0;'>";
echo "<h4>⚠️ Important Security Rules:</h4>";
echo "<ol style='line-height: 1.8;'>";
echo "<li><strong>Never store passwords</strong> in cookies</li>";
echo "<li><strong>Don't store sensitive data</strong> like credit card numbers</li>";
echo "<li><strong>Always sanitize</strong> cookie values before use</li>";
echo "<li><strong>Set appropriate expiry times</strong> - don't make them last forever</li>";
echo "<li><strong>Use HTTPS</strong> for secure cookies in production</li>";
echo "<li><strong>Validate cookie data</strong> before trusting it</li>";
echo "</ol>";
echo "</div>";

echo "<h4>✅ Good for Cookies:</h4>";
echo "<div style='background: #d4edda; padding: 15px; border-radius: 8px; margin: 10px 0;'>";
echo "• User preferences (theme, language)<br>";
echo "• Shopping cart items<br>";
echo "• User's name or display name<br>";
echo "• Remember login status (with proper security)<br>";
echo "• Website settings and customizations<br>";
echo "• Analytics and tracking (with user consent)<br>";
echo "</div>";

echo "<h4>❌ Bad for Cookies:</h4>";
echo "<div style='background: #f8d7da; padding: 15px; border-radius: 8px; margin: 10px 0;'>";
echo "• Passwords or sensitive authentication data<br>";
echo "• Credit card or payment information<br>";
echo "• Social security numbers or IDs<br>";
echo "• Private messages or personal documents<br>";
echo "• Large amounts of data (use sessions instead)<br>";
echo "• Temporary data that changes frequently<br>";
echo "</div>";

/* ---------- Cookie Management ---------- */

echo "<h3>🔧 Cookie Management</h3>";

echo "<div style='background: #f8f9fa; padding: 20px; border-radius: 10px; margin: 15px 0; border: 1px solid #dee2e6;'>";
echo "<h4>📊 Cookie Information:</h4>";

// Show cookie count and total size
$cookieCount = 0;
$totalSize = 0;

foreach ($_COOKIE as $name => $value) {
    if (strpos($name, 'PHPSESSID') === false) {
        $cookieCount++;
        $totalSize += strlen($name) + strlen($value);
    }
}

echo "<div style='display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-bottom: 15px;'>";
echo "<div style='background: white; padding: 15px; border-radius: 5px; text-align: center; border: 2px solid #007bff;'>";
echo "<h5 style='margin: 0; color: #007bff;'>🍪 Cookie Count</h5>";
echo "<p style='font-size: 24px; margin: 5px 0; font-weight: bold;'>$cookieCount</p>";
echo "</div>";

echo "<div style='background: white; padding: 15px; border-radius: 5px; text-align: center; border: 2px solid #28a745;'>";
echo "<h5 style='margin: 0; color: #28a745;'>📏 Total Size</h5>";
echo "<p style='font-size: 24px; margin: 5px 0; font-weight: bold;'>{$totalSize} bytes</p>";
echo "</div>";

echo "<div style='background: white; padding: 15px; border-radius: 5px; text-align: center; border: 2px solid #ffc107;'>";
echo "<h5 style='margin: 0; color: #f39c12;'>⏰ Typical Expiry</h5>";
echo "<p style='font-size: 18px; margin: 5px 0; font-weight: bold;'>7-365 days</p>";
echo "</div>";
echo "</div>";

echo "<form method='POST'>";
echo "<input type='submit' name='delete_cookies' value='🗑️ Delete All Cookies' style='background: #dc3545; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;'>";
echo "</form>";

echo "</div>";

/* ---------- Code Examples ---------- */

echo "<h3>💻 Cookie Code Examples</h3>";

echo "<div style='background: #f8f9fa; padding: 20px; border-radius: 10px; margin: 15px 0;'>";

echo "<h4>🔧 Setting a Cookie:</h4>";
echo "<div style='background: #2d3748; color: #e2e8f0; padding: 15px; border-radius: 5px; font-family: monospace; margin: 10px 0;'>";
echo "<pre style='margin: 0; white-space: pre-wrap;'>";
echo "// Basic cookie (expires when browser closes)
setcookie('username', 'Ahmad');

// Cookie with 30-day expiry
setcookie('username', 'Ahmad', time() + (30 * 24 * 60 * 60));

// Secure cookie with path and domain
setcookie('preference', 'dark_mode', time() + 86400, '/', '.example.com', true, true);";
echo "</pre>";
echo "</div>";

echo "<h4>📖 Reading a Cookie:</h4>";
echo "<div style='background: #2d3748; color: #e2e8f0; padding: 15px; border-radius: 5px; font-family: monospace; margin: 10px 0;'>";
echo "<pre style='margin: 0; white-space: pre-wrap;'>";
echo "// Check if cookie exists and read it
if (isset(\$_COOKIE['username'])) {
    \$username = htmlspecialchars(\$_COOKIE['username']);
    echo \"Welcome back, \" . \$username . \"!\";
} else {
    echo \"Hello, guest!\";
}";
echo "</pre>";
echo "</div>";

echo "<h4>🗑️ Deleting a Cookie:</h4>";
echo "<div style='background: #2d3748; color: #e2e8f0; padding: 15px; border-radius: 5px; font-family: monospace; margin: 10px 0;'>";
echo "<pre style='margin: 0; white-space: pre-wrap;'>";
echo "// Delete cookie by setting past expiry time
setcookie('username', '', time() - 3600);

// Or set it to empty with past time
setcookie('username', '', time() - 86400, '/');";
echo "</pre>";
echo "</div>";

echo "</div>";

/* ---------- Summary ---------- */

echo "<h3>🎯 What You've Learned About Cookies</h3>";
echo "<div style='background: linear-gradient(135deg, #74b9ff, #0984e3); color: white; padding: 20px; border-radius: 10px; margin: 15px 0;'>";

echo "<h4>🍪 Cookie Mastery Achieved:</h4>";
echo "• Understanding what cookies are and how they work<br>";
echo "• Setting cookies with proper expiry times<br>";
echo "• Reading cookies safely with proper validation<br>";
echo "• Deleting cookies when no longer needed<br>";
echo "• Knowing what data is safe vs unsafe for cookies<br>";
echo "• Building user-friendly features with cookies<br>";

echo "<br><h4>💪 You Can Now Build:</h4>";
echo "• User preference systems<br>";
echo "• Shopping cart functionality<br>";
echo "• 'Remember me' features<br>";
echo "• Language and theme switchers<br>";
echo "• Basic analytics tracking<br>";
echo "• Personalized user experiences<br>";

echo "</div>";

echo "<div style='background: #28a745; color: white; padding: 15px; border-radius: 8px; margin: 15px 0;'>";
echo "<h4>🚀 Practice Challenge:</h4>";
echo "Build a simple website that remembers:<br>";
echo "• User's favorite color for the background<br>";
echo "• Their preferred font size<br>";
echo "• Whether they want to see a welcome message<br>";
echo "<br><strong>Next:</strong> We'll learn about Sessions - more secure data storage!";
echo "</div>";

?>