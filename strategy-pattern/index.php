<?php
include './autoload.php';

// Initialize variables
$successMessage = '';
$showForm = true;
$errorMessage = '';

if(isset($_POST['proceed'])) {
    // Validate amount
    if(empty($_POST['amount'])) {
        $errorMessage = 'Amount is required.';
    } elseif(!is_numeric($_POST['amount']) || $_POST['amount'] <= 0) {
        $errorMessage = 'Amount must be a positive number.';
    } else {
        $amount = floatval($_POST['amount']);
        $selectedPaymentMethod = $_POST['payment_method'];
        if(processPayment($amount, $selectedPaymentMethod)) {
            $successMessage = 'Payment processed successfully. <br> Amount: LKR' . number_format($amount, 2) . ', <br>Payment Method: ' . ucfirst($selectedPaymentMethod);
            // Hide the form after successful payment
            $showForm = false;
        } else {
            $errorMessage = 'Payment processing failed.';
        }
    }
}
// Payment processing function
function processPayment($amount, $paymentMethod) {
    if ($paymentMethod === 'paypal') {
        $paypalProcessor = new PaymentProcessor(new PayPalGateway());
        return $paypalProcessor->processPayment($amount);
    } elseif ($paymentMethod === 'stripe') {
        $stripeProcessor = new PaymentProcessor(new StripeGateway());
        return $stripeProcessor->processPayment($amount);
    }
    return false;
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
                        <h5 class="card-title">Your Cart</h5>
                        <p class="card-text">Total Amount: LKR100.00</p>
                        <?php if ($errorMessage): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $errorMessage; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($showForm): ?>
                            <form method="post">
                                <div class="form-group">
                                    <label for="amount">Enter Amount:<span class="text-danger">*</span></label>
                                    <input type="number" name="amount" id="amount" placeholder="Enter the amount" class="form-control" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="paymentMethod">Select Payment Method:</label>
                                    <select id="paymentMethod" name="payment_method" class="form-control">
                                        <option value="paypal">PayPal</option>
                                        <option value="stripe">Stripe</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" name="proceed">Proceed to Pay</button>
                            </form>
                        <?php endif; ?>
                        <?php if ($successMessage): ?>
                            <div class="alert alert-success mt-3" role="alert">
                                <?php echo $successMessage; ?>
                            </div>
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