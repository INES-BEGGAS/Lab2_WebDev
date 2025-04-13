<?php
$result = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = htmlspecialchars($_POST['name']);
$weight = floatval($_POST['weight']);
$height = floatval($_POST['height']);

if ($weight > 0 && $height > 0) {
$bmi = $weight / ($height * $height);
if ($bmi < 18.5) {
$interpretation = "Underweight";
} elseif ($bmi < 25) {
$interpretation = "Normal weight";
} elseif ($bmi < 30) {
$interpretation = "Overweight";
} else {
$interpretation = "Obesity";
}
$result = "Hello, $name. Your BMI is " . number_format($bmi, 2) . " ($interpretation).";
} else {
$result = "Invalid input values.";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>BMI Calculator</title>
<link rel="stylesheet" href="style.css">
<script src="script.js" defer></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h1 class="mt-5">BMI Calculator</h1>
<?php if ($result != "") { echo "<p>$result</p>"; } ?>
<form action="" method="post">
<div class="form-group">
<label for="name">Name:</label>
<input type="text" id="name" name="name" class="form-control" required>
</div>
<div class="form-group">
<label for="weight">Weight (kg):</label>
<input type="number" id="weight" name="weight" class="form-control" required>
</div>
<div class="form-group">
<label for="height">Height (m):</label>
<input type="number" id="height" name="height" class="form-control" required>
</div>
<input type="submit" value="Calculate" class="btn btn-primary">
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
