<?php
$feedback_message = "";

// تحقق اذا تم ارسال المعلومات
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // تحصيل المعلومات من قائمة الداتا
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // تحقق من أن الحقول غير فارغة وصيغة البريد الإلكتروني صحيحة
    if (!empty($name) && !empty($email) && !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // اذا كل شيء صحيح اظهر رسالة نجاح العملية
            $feedback_message = "<p class='success-message'>Thank you, " . htmlspecialchars($name) . "! Your message has been received.</p><br>";
        } else {
            // رسالة خطأ إذا كان البريد غير صالح
            $feedback_message = "<p class='error-message'>Error: Please enter a valid email address.</p><br>";
        }
    } else {
        // اذا في شيء غلط اظهر رسالة فشل العملية
        $feedback_message = "<p class='error-message'>Error: Please fill out all fields.</p><br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Events Hub - About Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <h2>About Us</h2>
        <p>Welcome to Campus Events Hub, your ultimate destination for all university activities, workshops, and gatherings. We help students stay connected with campus life.</p>
        
        <!-- اسماء الفريق -->
        <h3>Our Team</h3>
        <ul>
            <li><strong>Nawaf Fayih Alotaibi</strong> - Lead Developer</li>
            <li><strong>Abdolazez Kasemagha</strong> - UI/UX Designer</li>
        </ul>
        <br>
        
        <h3>Contact Us</h3>
        
        <!-- هنا بتظهر رسالة ال php لنجاح العملية او فشلها -->
        <?php echo $feedback_message; ?>

        <form action="about.php" method="POST">
            <div>
                <label for="name">Your Name:</label><br>
                <input type="text" id="name" name="name" required>
            </div>
            <br>
            <div>
                <label for="contact-email">Your Email:</label><br>
                <input type="email" id="contact-email" name="email" required>
            </div>
            <br>
            <div>
                <label for="message">Message:</label><br>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <br>
            <div>
                <button type="submit">Send Message</button>
            </div>
        </form>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>