<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style-2.css">
</head>
<body>

<?php
// define variables and set to empty values
$zipcodeErr = $dietErr = $travelErr = 0;
$zipcode = $diet = $travel = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["zipcode"])) {
    $nameErr = "required";
  } else {
    $zipcode = test_input($_POST["zipcode"]);
    // check if name only contains letters and whitespace

  }

  if (empty($_POST["travel"])) {
    $travelErr = "required";
  } else {
    $travel = test_input($_POST["travel"]);
  }
}

  if (empty($_POST["diet"])) {
    $dietErr = "required";
  } else {
    $diet = test_input($_POST["diet"]);
  }


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

}
?>
<script>
function myFunction() {
  var howmuch = <?php echo $total = 13.5 + $diet + $travel; ?>;
  var howmuchr = Math.round(howmuch);
  document.write(howmuchr);

  window.location.replace("http://www.lightco2.org/buy-your-offset/" +howmuchr);
}
</script>

<h2>Carbon Survay</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Zipcode: <input class="w3-input w3-border w3-round-large" type="text" name="zipcode" value="<?php echo $zipcode;?>">

  <br><br>

  <h4 id = "form-title">How far do you fly a year:</h4>
  <div id="debt-amount-slider">
  <input type="radio" name="travel" id="1" <?php if (isset($travel) && $travel=="3.3") echo "checked";?> value=".2" required>
  <label for="1" data-debt-amount="None"></label>
  <input type="radio" name="travel" id="2" <?php if (isset($travel) && $travel=="2.5") echo "checked";?> value=".5" required>
  <label for="2" data-debt-amount="Short"></label>
  <input type="radio" name="travel" id="3" <?php if (isset($travel) && $travel=="1.7") echo "checked";?> value="4.5" required>
  <label for="3" data-debt-amount="Medium"></label>
  <input type="radio" name="travel" id="4" <?php if (isset($travel) && $travel=="1.5") echo "checked";?> value="11.5" required>
  <label for="4" data-debt-amount="Long"></label>
  <div id="debt-amount-pos"></div>
  </div>


  <br><br>

<h4 id="form-title">  Diet catagory:</h4>
<div id="debt-amount-slider-2">
  <input type="radio" name="diet" id="1" <?php if (isset($diet) && $diet=="3.3") echo "checked";?> value="3.3">
  <label for="1" data-debt-amount="$10k"></label>
  <input type="radio" name="diet" id="2" <?php if (isset($diet) && $diet=="2.5") echo "checked";?> value="2.5">
  <label for="2" data-debt-amount="$10k"></label>
  <input type="radio" name="diet" id="3" <?php if (isset($diet) && $diet=="1.7") echo "checked";?> value="1.7">
  <label for="3" data-debt-amount="$10k"></label>
  <input type="radio" name="diet" id="4" <?php if (isset($diet) && $diet=="1.5") echo "checked";?> value="1.5">
  <label for="4" data-debt-amount="$10k"></label>
  <div id="debt-amount-pos-2"></div>
</div>
  <br><br>
  <input class="w3-button w3-amber w3-round" type="submit" name="Apply" value="Submit">
    <br><br>
<button class="w3-button w3-amber w3-round" onclick="myFunction()">Next</button>

</form>


<?php
echo "<h2>Your co2 footprint in Tons:</h2>";

echo "<br>";
echo 13.5 + $diet + $travel;

?>

</body>
</html>
