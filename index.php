<?php

$designPatterns = array(
    array(
        'name' => 'Factory Method',
        'description' => 'Description of the Factory Method design pattern.',
        'url' => 'factory-pattern'
    ),
    array(
        'name' => 'Strategy Pattern',
        'description' => 'Description of the Strategy Pattern design pattern.',
        'url' => 'strategy-pattern'
    ),
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Pattern Selection</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Select a Design Pattern</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($designPatterns as $pattern): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?= $pattern['name']; ?></h5>
                            <p class="card-text"><?= $pattern['description']; ?>.</p>
                            <a href="<?= $pattern['url']; ?>" class="btn btn-primary btn-block">Continue</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
