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
        <form action="#" method="POST">
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
                    <option value="tech-workshop">Tech Workshop</option>
                    <option value="annual-gather">Annual Gathering</option>
                    <option value="sports-day">Sports Day</option>
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