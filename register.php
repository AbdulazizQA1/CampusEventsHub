<?php
$registration_message = "";

// تحقق اذا تم ارسال المعلومات
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // تحصيل المعلومات من الفورم
    $fullname = trim($_POST['fullname']);
    $studentid = trim($_POST['studentid']);
    $email = trim($_POST['email']);
    $event = trim($_POST['event']);

    // تحقق من أن الحقول غير فارغة وصيغة البريد الإلكتروني صحيحة
    if (!empty($fullname) && !empty($studentid) && !empty($email) && !empty($event)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            // ترتيب البيانات في مصفوفة عشان تناسب ملف ال csv
            $new_registration = [$fullname, $studentid, $email, $event];

            $csv_file = __DIR__ . '/registrations.csv';
            
            // التأكد من إضافة سطر جديد إذا كان الملف لا ينتهي بنهاية سطر صحيحة
            if (file_exists($csv_file) && filesize($csv_file) > 0) {
                $contents = file_get_contents($csv_file);
                if (substr($contents, -1) !== "\n") {
                    file_put_contents($csv_file, "\n", FILE_APPEND);
                }
            }

            $file = @fopen($csv_file, "a");
            
            if ($file !== FALSE) {
                fputcsv($file, $new_registration, ',', '"', '"');
                fclose($file);
                
                // رسالة نجاح باستخدام الكلاس الخارجي
                $registration_message = "<p class='success-message'>Registration successful! See you at the event.</p><br>";
            } else {
                $registration_message = "<p class='error-message'>Error: Could not save registration. Please try again later.</p><br>";
            }
        } else {
            $registration_message = "<p class='error-message'>Error: Please enter a valid email address.</p><br>";
        }
    } else {
        $registration_message = "<p class='error-message'>Error: Please fill out all fields.</p><br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Events Hub - Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <h2>Event Registration Form</h2>
        
        <!-- هنا بتظهر الرسالة -->
        <?php echo $registration_message; ?>

        <form action="register.php" method="POST">
            <div>
                <label for="fullname">Full Name:</label><br>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            <br>
            <div>
                <label for="studentid">Student ID:</label><br>
                <input type="text" id="studentid" name="studentid" required>
            </div>
            <br>
            <div>
                <label for="email">Email Address:</label><br>
                <input type="email" id="email" name="email" required>
            </div>
            <br>
            <div>
                <label for="event">Select Event:</label><br>
                <select id="event" name="event">
                    <option value="Tech Workshop: Intro to Web Dev">Tech Workshop: Intro to Web Dev</option>
                    <option value="Annual Gathering">Annual Gathering</option>
                    <option value="Sports Day">Sports Day</option>
                </select>
            </div>
            <br>
            <div>
                <button type="submit">Register Now</button>
            </div>
        </form>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>