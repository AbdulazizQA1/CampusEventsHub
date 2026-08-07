<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Events Hub - Events</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    
    <!-- pull من ملف الداتا حق الافينتس -->
    <?php include 'events_data.php'; ?> 

    <main>
        <h2>All Campus Events</h2>
        <ul>
            <?php foreach ($events as $id => $event) { ?>
            <li>
                <!-- PHP تلقائيا بيحط التاريخ والعنوان -->
                <h3><?php echo $event['title']; ?></h3>
                <p>Date: <?php echo $event['date']; ?></p>
                
                <a href="event-details.php?id=<?php echo $id; ?>">View Details</a>
            </li>
            <?php } ?>
        </ul>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>