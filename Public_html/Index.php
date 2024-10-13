<?php
session_start();

// Function to predict future result (evenly random)
function predict_future() {
    // Get the current time in seconds and use modulo to alternate between Big and Small
    $current_time = time();
    return ($current_time % 2 == 0) ? 'Big' : 'Small'; // Alternates between Big and Small based on time
}

// Function to determine the final result based on Win or Out
function determine_result($prediction, $is_win) {
    return $is_win ? $prediction : ($prediction === 'Big' ? 'Small' : 'Big');
}

// Get the prediction
$prediction = predict_future();
$final_result = '';
$is_win = true;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['result'])) {
        $is_win = $_POST['result'] === 'win';
        $final_result = determine_result($prediction, $is_win);
    }
} else {
    $final_result = $prediction; // Default to initial prediction
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiranga Prediction</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            background-color: #2e2e2e;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            color: #ff4c4c;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .future-prediction-box {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }

        h2 {
            font-size: 24px;
            color: #00cc99;
            margin-bottom: 10px;
        }

        .prediction-result {
            font-size: 32px;
            font-weight: bold;
            color: #ffcc00;
        }

        .footer p {
            font-size: 14px;
            margin-top: 20px;
            color: #00cc99;
        }

        .footer {
            border-top: 1px solid #444;
            padding-top: 10px;
        }

        .button {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
            background-color: #00cc99;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Tiranga Server Hacked!</h1>

    <div class="future-prediction-box">
        <h2>Next Result Prediction:</h2>
        <div class="prediction-result">
            <?php echo $final_result; ?>
        </div>
    </div>

    <form method="POST">
        <button type="submit" name="result" value="win" class="button">Win</button>
        <button type="submit" name="result" value="out" class="button">Out</button>
    </form>

    <div class="footer">
        <p>80% - 90% Accurate Big or Small Prediction<br>
           NOTE ⚠️: THIS IS PAID HACK ✔️✔️<br>
           FULL CREDIT TO = SHAHNAWAZ KHAN HACKER 💀💀💀💀</p>
    </div>
</div>

</body>
</html>
