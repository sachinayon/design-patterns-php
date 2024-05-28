<?php
include './autoload.php';

// Initialize variables
$message = '';

// Process notification preference when form is submitted
if(isset($_POST['submit'])) {
    // Check if the notification type is set in the POST data
    if(isset($_POST['notification_type'])) {
        $selectedNotification = $_POST['notification_type'];
        $notification = NotificationFactory::createNotification($selectedNotification);
        $message = $notification->sendNotification();
    } else {
        $message = 'Please select a notification preference.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Processing</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
            <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Select Notification Preference</h5>
                        <form method="post">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="email" name="notification_type" value="email">
                                    <label class="form-check-label" for="email">Email</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="sms" name="notification_type" value="sms">
                                    <label class="form-check-label" for="sms">SMS</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="whatsapp" name="notification_type" value="whatsapp">
                                    <label class="form-check-label" for="whatsapp">WhatsApp</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                        </form>
                        <?php if (!empty($message)): ?>
                            <p class="mt-4"><?php echo $message; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>