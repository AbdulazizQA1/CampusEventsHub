<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Events Hub - Event Details</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <?php include 'events_data.php'; ?>

    <main>
        <?php
        // يحصل الايدي
        $event_id = isset($_GET['id']) ? $_GET['id'] : null;

        // تحقق من صلاحية الايدي
        if ($event_id && array_key_exists($event_id, $events)) {
            // اذا موجود سويله بوول
            $event = $events[$event_id];
        ?>
            
            <h2><?php echo $event['title']; ?></h2>
            <p><strong>Date:</strong> <?php echo $event['date']; ?></p>
            <p><strong>Location:</strong> <?php echo $event['location']; ?></p>
            <p><strong>Description:</strong> <?php echo $event['description']; ?></p>
            <br>
            <a href="register.php">Click here to register for this event</a>

        <?php
        } else {
            // رسالة لليوزر بأن الايدي غير صحيح
            echo "<h2>Event Not Found</h2>";
            echo "<p>Sorry, the event you are looking for does not exist.</p>";
        }
        ?>
    </main>
    
    <?php include 'footer.php'; ?>
</body>

</html>