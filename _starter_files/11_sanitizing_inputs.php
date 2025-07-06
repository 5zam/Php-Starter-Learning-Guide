<?php
// =====================================
//  PHP Basics Course - Part 8
//  Topics: Input Sanitization & Security
// =====================================

/* --- Sanitizing Inputs -- */

/*
❓ What is Input Sanitization? (Think of it as Data Cleaning!)
✅ Input sanitization is like washing dirty dishes before using them.
   When users send data to your website, it might contain harmful code.
   Sanitization cleans this data to make it safe to use.

🦠 Dangerous Input Examples:
• <script>alert('hack')</script> - JavaScript attacks
• DROP TABLE users; - Database attacks
• ../../../etc/passwd - File system attacks

🧼 Sanitization = Cleaning data to make it safe
🛡️ Validation = Checking if data is correct format
*/

echo "<h2>🧼 Input Sanitization - Keeping Your Website Safe</h2>";
echo "<p><strong>Simple Rule:</strong> Never trust user input! Always clean it first.</p>";

echo "<div style='background: linear-gradient(135deg, #ff6b6b, #ee5a52); color: white; padding: 20px; border-radius: 10px; margin: 15px 0;'>";
echo "<h4>⚠️ Why Sanitization is Critical:</h4>";
echo "1. <strong>Hackers</strong> can inject malicious code<br>";
echo "2. <strong>Accidents</strong> happen with special characters<br>";
echo "3. <strong>Database</strong> can be corrupted or stolen<br>";
echo "4. <strong>Users</strong> might see broken pages<br>";
echo "5. <strong>Your reputation</strong> gets damaged<br>";
echo "</div>";

/* ---------- Different Sanitization Methods ---------- */

echo "<h3>🛠️ PHP Sanitization Tools (Your Security Toolkit)</h3>";

// Handle form submission with different sanitization methods
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<div style='background: #fff3cd; padding: 15px; border-radius: 8px; border: 1px solid #ffeaa7; margin: 15px 0;'>";
    echo "<h4>📋 Form Data Received - Let's Clean It!</h4>";
    
    // Get raw data first (DANGEROUS - for demonstration only)
    $rawName = $_POST['name'] ?? '';
    $rawEmail = $_POST['email'] ?? '';
    $rawMessage = $_POST['message'] ?? '';
    $rawAge = $_POST['age'] ?? '';
    $rawWebsite = $_POST['website'] ?? '';
    
    echo "<strong>🚨 Raw Data (DANGEROUS):</strong><br>";
    echo "Name: <code style='background: #f8d7da; padding: 2px 4px; border-radius: 3px;'>" . substr($rawName, 0, 50) . "</code><br>";
    echo "Email: <code style='background: #f8d7da; padding: 2px 4px; border-radius: 3px;'>" . substr($rawEmail, 0, 50) . "</code><br>";
    if ($rawMessage) echo "Message: <code style='background: #f8d7da; padding: 2px 4px; border-radius: 3px;'>" . substr($rawMessage, 0, 50) . "...</code><br>";
    
    echo "<br><strong>✅ Cleaned Data (SAFE):</strong><br>";
    
    // Method 1: htmlspecialchars() - Most common
    $cleanName1 = htmlspecialchars($rawName, ENT_QUOTES, 'UTF-8');
    $cleanEmail1 = htmlspecialchars($rawEmail, ENT_QUOTES, 'UTF-8');
    
    echo "<em>Using htmlspecialchars():</em><br>";
    echo "Name: <span style='color: #28a745;'>$cleanName1</span><br>";
    echo "Email: <span style='color: #28a745;'>$cleanEmail1</span><br>";
    
    // Method 2: filter_var() - Advanced filtering
    $cleanName2 = filter_var($rawName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cleanEmail2 = filter_var($rawEmail, FILTER_SANITIZE_EMAIL);
    $cleanAge = filter_var($rawAge, FILTER_SANITIZE_NUMBER_INT);
    $cleanWebsite = filter_var($rawWebsite, FILTER_SANITIZE_URL);
    
    echo "<br><em>Using filter_var():</em><br>";
    echo "Name: <span style='color: #007bff;'>$cleanName2</span><br>";
    echo "Email: <span style='color: #007bff;'>$cleanEmail2</span><br>";
    if ($cleanAge) echo "Age: <span style='color: #007bff;'>$cleanAge</span><br>";
    if ($cleanWebsite) echo "Website: <span style='color: #007bff;'>$cleanWebsite</span><br>";
    
    // Method 3: filter_input() - Direct from source
    $cleanName3 = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cleanEmail3 = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    
    echo "<br><em>Using filter_input():</em><br>";
    echo "Name: <span style='color: #6f42c1;'>$cleanName3</span><br>";
    echo "Email: <span style='color: #6f42c1;'>$cleanEmail3</span><br>";
    
    echo "</div>";
}

/* ---------- Sanitization Methods Explained ---------- */

echo "<h4>🔧 Method 1: htmlspecialchars() - The Essential Guard</h4>";
echo "<div style='background: #e7f3ff; padding: 15px; border-radius: 8px; margin: 10px 0;'>";
echo "<strong>What it does:</strong> Converts dangerous HTML characters to safe text<br>";
echo "<strong>Perfect for:</strong> Displaying user input safely<br><br>";

echo "<strong>🧪 Example:</strong><br>";
echo "<div style='background: #f8f9fa; padding: 10px; border-radius: 5px; font-family: monospace;'>";
echo "Dangerous: &lt;script&gt;alert('hack')&lt;/script&gt;<br>";
echo "Safe: &amp;lt;script&amp;gt;alert('hack')&amp;lt;/script&amp;gt;";
echo "</div>";
echo "</div>";

echo "<h4>🔧 Method 2: filter_var() - The Smart Cleaner</h4>";
echo "<div style='background: #f0fff0; padding: 15px; border-radius: 8px; margin: 10px 0;'>";
echo "<strong>What it does:</strong> Cleans data based on specific rules<br>";
echo "<strong>Perfect for:</strong> Emails, URLs, numbers, and custom cleaning<br><br>";

echo "<strong>🎯 Common Filters:</strong><br>";
echo "• FILTER_SANITIZE_EMAIL → Cleans email addresses<br>";
echo "• FILTER_SANITIZE_URL → Cleans website URLs<br>";
echo "• FILTER_SANITIZE_NUMBER_INT → Keeps only numbers<br>";
echo "• FILTER_SANITIZE_FULL_SPECIAL_CHARS → Like htmlspecialchars<br>";
echo "</div>";

echo "<h4>🔧 Method 3: filter_input() - The Direct Protector</h4>";
echo "<div style='background: #fff0f5; padding: 15px; border-radius: 8px; margin: 10px 0;'>";
echo "<strong>What it does:</strong> Cleans data directly from \$_POST, \$_GET, etc.<br>";
echo "<strong>Perfect for:</strong> Maximum security with less code<br><br>";

echo "<strong>💡 Advantage:</strong> More secure because it works directly with superglobals<br>";
echo "</div>";

/* ---------- Interactive Security Test Form ---------- */

echo "<h3>🧪 Security Test Lab - Try Breaking Our Form!</h3>";
echo "<div style='background: linear-gradient(135deg, #74b9ff, #0984e3); color: white; padding: 20px; border-radius: 10px; margin: 15px 0;'>";
echo "<h4>🎯 Challenge:</h4>";
echo "Try entering dangerous code in the form below!<br>";
echo "Examples to try:<br>";
echo "• &lt;script&gt;alert('test')&lt;/script&gt;<br>";
echo "• &lt;img src=x onerror=alert('xss')&gt;<br>";
echo "• javascript:alert('hack')<br>";
echo "<br><strong>Our sanitization will protect against these attacks!</strong>";
echo "</div>";

// Security test form
echo "<form method='POST' style='background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin: 20px 0;'>";
echo "<h4>🔒 Secure Contact Form</h4>";

echo "<div style='margin-bottom: 15px;'>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>👤 Full Name:</label>";
echo "<input type='text' name='name' placeholder='Try entering: <script>alert(\"hack\")</script>' style='width: 100%; padding: 10px; border: 2px solid #dee2e6; border-radius: 5px; font-size: 16px;'>";
echo "<small style='color: #6c757d;'>Try entering HTML/JavaScript code here!</small>";
echo "</div>";

echo "<div style='margin-bottom: 15px;'>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>📧 Email Address:</label>";
echo "<input type='text' name='email' placeholder='Try: javascript:alert(\"xss\")@evil.com' style='width: 100%; padding: 10px; border: 2px solid #dee2e6; border-radius: 5px; font-size: 16px;'>";
echo "<small style='color: #6c757d;'>Try malicious email formats!</small>";
echo "</div>";

echo "<div style='margin-bottom: 15px;'>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>💬 Message:</label>";
echo "<textarea name='message' placeholder='Try: <img src=x onerror=alert(\"pwned\")>' style='width: 100%; height: 80px; padding: 10px; border: 2px solid #dee2e6; border-radius: 5px; font-size: 16px; resize: vertical;'></textarea>";
echo "<small style='color: #6c757d;'>Try injecting HTML or JavaScript!</small>";
echo "</div>";

echo "<div style='display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;'>";
echo "<div>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>🎂 Age:</label>";
echo "<input type='text' name='age' placeholder='Try: 25<script>alert(1)</script>' style='width: 100%; padding: 10px; border: 2px solid #dee2e6; border-radius: 5px; font-size: 16px;'>";
echo "</div>";
echo "<div>";
echo "<label style='display: block; font-weight: bold; margin-bottom: 5px;'>🌐 Website:</label>";
echo "<input type='text' name='website' placeholder='Try: javascript:alert(\"hack\")' style='width: 100%; padding: 10px; border: 2px solid #dee2e6; border-radius: 5px; font-size: 16px;'>";
echo "</div>";
echo "</div>";

echo "<input type='submit' name='submit' value='🚀 Test Our Security!' style='background: linear-gradient(135deg, #00b894, #00cec9); color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; width: 100%;'>";
echo "</form>";

/* ---------- Validation vs Sanitization ---------- */

echo "<h3>⚖️ Validation vs Sanitization - What's the Difference?</h3>";

echo "<div style='display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin: 20px 0;'>";

echo "<div style='background: #e3f2fd; padding: 20px; border-radius: 10px; border-left: 5px solid #2196f3;'>";
echo "<h4>🧼 Sanitization</h4>";
echo "<strong>Purpose:</strong> Clean and fix data<br>";
echo "<strong>Action:</strong> Removes or escapes dangerous parts<br>";
echo "<strong>Example:</strong> Turn &lt;script&gt; into &amp;lt;script&amp;gt;<br>";
echo "<strong>When:</strong> Before saving or displaying data<br>";
echo "<strong>Result:</strong> Data becomes safe to use<br>";
echo "</div>";

echo "<div style='background: #f3e5f5; padding: 20px; border-radius: 10px; border-left: 5px solid #9c27b0;'>";
echo "<h4>✅ Validation</h4>";
echo "<strong>Purpose:</strong> Check if data is correct<br>";
echo "<strong>Action:</strong> Accept or reject data<br>";
echo "<strong>Example:</strong> Check if email has @ symbol<br>";
echo "<strong>When:</strong> Before processing data<br>";
echo "<strong>Result:</strong> Data is accepted or rejected<br>";
echo "</div>";

echo "</div>";

/* ---------- Real-World Security Examples ---------- */

echo "<h3>🌍 Real-World Security Examples</h3>";

// Example 1: Safe user profile display
echo "<h4>👤 Example 1: User Profile Display</h4>";
echo "<div style='background: #f8f9fa; padding: 15px; border-radius: 8px; margin: 10px 0;'>";

$userData = [
    'name' => '<script>alert("hack")</script>Ahmad',
    'bio' => 'I love <b>PHP</b> & JavaScript!',
    'website' => 'javascript:alert("xss")'
];

echo "<strong>❌ Dangerous (Raw Data):</strong><br>";
echo "<div style='background: #f8d7da; padding: 10px; border-radius: 5px; margin: 5px 0; font-family: monospace;'>";
echo "Name: " . $userData['name'] . "<br>";
echo "Bio: " . $userData['bio'] . "<br>";
echo "Website: " . $userData['website'];
echo "</div>";

echo "<strong>✅ Safe (Sanitized Data):</strong><br>";
echo "<div style='background: #d4edda; padding: 10px; border-radius: 5px; margin: 5px 0;'>";
echo "Name: " . htmlspecialchars($userData['name']) . "<br>";
echo "Bio: " . htmlspecialchars($userData['bio']) . "<br>";
echo "Website: " . filter_var($userData['website'], FILTER_SANITIZE_URL);
echo "</div>";

echo "</div>";

// Example 2: Database insertion
echo "<h4>💾 Example 2: Database Safe Storage</h4>";
echo "<div style='background: #f8f9fa; padding: 15px; border-radius: 8px; margin: 10px 0;'>";

echo "<strong>✅ Secure Code Example:</strong><br>";
echo "<div style='background: #d4edda; padding: 10px; border-radius: 5px; font-family: monospace; margin: 5px 0;'>";
echo "<pre style='margin: 0; white-space: pre-wrap;'>";
echo "// Step 1: Sanitize input
\$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
\$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

// Step 2: Validate input
if (empty(\$name) || empty(\$email)) {
    die('Please fill all fields');
}

if (!filter_var(\$email, FILTER_VALIDATE_EMAIL)) {
    die('Invalid email format');
}

// Step 3: Use prepared statements for database
\$stmt = \$pdo->prepare('INSERT INTO users (name, email) VALUES (?, ?)');
\$stmt->execute([\$name, \$email]);";
echo "</pre>";
echo "</div>";

echo "</div>";

/* ---------- Security Checklist ---------- */

echo "<h3>✅ Security Checklist for Every Form</h3>";
echo "<div style='background: linear-gradient(135deg, #6c5ce7, #a29bfe); color: white; padding: 20px; border-radius: 10px; margin: 15px 0;'>";

echo "<h4>🛡️ Before Processing Any User Input:</h4>";
echo "<ol style='line-height: 1.8;'>";
echo "<li><strong>Sanitize</strong> - Clean the data with htmlspecialchars() or filter_var()</li>";
echo "<li><strong>Validate</strong> - Check if data format is correct</li>";
echo "<li><strong>Check Length</strong> - Ensure data isn't too long or too short</li>";
echo "<li><strong>Escape for Database</strong> - Use prepared statements</li>";
echo "<li><strong>Log Attempts</strong> - Keep track of suspicious activity</li>";
echo "</ol>";

echo "<br><h4>🚨 Red Flags to Watch For:</h4>";
echo "• &lt;script&gt; tags in user input<br>";
echo "• javascript: in URLs<br>";
echo "• SQL keywords like DROP, DELETE, UNION<br>";
echo "• Unusual file paths like ../../../<br>";
echo "• Extremely long input (potential buffer overflow)<br>";

echo "</div>";

/* ---------- Quick Reference Card ---------- */

echo "<h3>📋 Quick Reference - Security Functions</h3>";
echo "<div style='background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin: 20px 0;'>";

$securityFunctions = [
    [
        'function' => 'htmlspecialchars()',
        'use' => 'Display user input safely',
        'example' => 'htmlspecialchars($name, ENT_QUOTES, "UTF-8")',
        'color' => '#28a745'
    ],
    [
        'function' => 'filter_var()',
        'use' => 'Clean specific data types',
        'example' => 'filter_var($email, FILTER_SANITIZE_EMAIL)',
        'color' => '#007bff'
    ],
    [
        'function' => 'filter_input()',
        'use' => 'Clean data from superglobals',
        'example' => 'filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS)',
        'color' => '#6f42c1'
    ],
    [
        'function' => 'trim()',
        'use' => 'Remove extra spaces',
        'example' => 'trim($input)',
        'color' => '#fd7e14'
    ],
    [
        'function' => 'strlen()',
        'use' => 'Check input length',
        'example' => 'if (strlen($password) < 8) { error }',
        'color' => '#20c997'
    ]
];

echo "<table style='width: 100%; border-collapse: collapse;'>";
echo "<thead style='background: linear-gradient(135deg, #667eea, #764ba2); color: white;'>";
echo "<tr>";
echo "<th style='padding: 15px; text-align: left;'>Function</th>";
echo "<th style='padding: 15px; text-align: left;'>Use Case</th>";
echo "<th style='padding: 15px; text-align: left;'>Example</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

foreach ($securityFunctions as $index => $func) {
    $bgColor = $index % 2 === 0 ? '#f8f9fa' : 'white';
    echo "<tr style='background: $bgColor;'>";
    echo "<td style='padding: 12px; border-bottom: 1px solid #dee2e6;'>";
    echo "<code style='background: {$func['color']}; color: white; padding: 4px 8px; border-radius: 4px; font-weight: bold;'>{$func['function']}</code>";
    echo "</td>";
    echo "<td style='padding: 12px; border-bottom: 1px solid #dee2e6;'>{$func['use']}</td>";
    echo "<td style='padding: 12px; border-bottom: 1px solid #dee2e6; font-family: monospace; font-size: 14px;'>{$func['example']}</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
echo "</div>";

/* ---------- Summary and Next Steps ---------- */

echo "<h3>🎯 What You've Mastered Today</h3>";
echo "<div style='background: linear-gradient(135deg, #00b894, #00cec9); color: white; padding: 20px; border-radius: 10px; margin: 15px 0;'>";

echo "<h4>🛡️ Security Skills Unlocked:</h4>";
echo "• Understanding why input sanitization is critical<br>";
echo "• Using htmlspecialchars() to prevent XSS attacks<br>";
echo "• Applying filter_var() for specific data cleaning<br>";
echo "• Implementing filter_input() for maximum security<br>";
echo "• Recognizing dangerous input patterns<br>";
echo "• Building secure forms that resist attacks<br>";

echo "<br><h4>🚀 You Can Now Protect Against:</h4>";
echo "• Cross-Site Scripting (XSS) attacks<br>";
echo "• HTML injection attacks<br>";
echo "• JavaScript injection attempts<br>";
echo "• Malformed email and URL inputs<br>";
echo "• Buffer overflow attempts<br>";

echo "</div>";

echo "<div style='background: #dc3545; color: white; padding: 15px; border-radius: 8px; margin: 15px 0;'>";
echo "<h4>⚠️ Remember: Security is NOT Optional!</h4>";
echo "Every input from users must be treated as potentially dangerous.<br>";
echo "Always sanitize first, validate second, then process safely.<br>";
echo "<br><strong>Next:</strong> We'll learn about Functions - organizing your security code better!";
echo "</div>";

?>