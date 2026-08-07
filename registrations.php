<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Events Hub - Registrations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <h2>Submitted Registrations</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Student ID</th>
                    <th>Email</th>
                    <th>Event</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // يفتح ملف csv
                $file = @fopen("registrations.csv", "r");
                
                // يتحقق من وجود الملف واذا انفتح بشكل صحيح
                if ($file !== FALSE) {
                    // يمشي على كل صف فملف ال csv
                    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($data[0]) . "</td>"; 
                        echo "<td>" . htmlspecialchars($data[1]) . "</td>"; 
                        echo "<td>" . htmlspecialchars($data[2]) . "</td>"; 
                        echo "<td>" . htmlspecialchars($data[3]) . "</td>"; 
                        echo "</tr>";
                    }
                    fclose($file); 
                } else {
                    // فيدباك اذا الملف المطلوب ما كان موجود
                    echo "<tr><td colspan='4'>No registrations found yet.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>