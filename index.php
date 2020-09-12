
<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">

<head>

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


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <h2>Carbon Survay</h2>
  Zipcode: <input type="text" class="w3-input w3-border w3-round-large" name="zipcode" value="<?php echo $zipcode;?>">

  <br><br>

  <h4>How far do you fly a year:</h4>

  <input type="radio" name="travel" <?php if (isset($travel) && $travel=="3.3") echo "checked";?> value=".2">None
  <input type="radio" name="travel" <?php if (isset($travel) && $travel=="2.5") echo "checked";?> value=".5">Short >6K Miles
  <input type="radio" name="travel" <?php if (isset($travel) && $travel=="1.7") echo "checked";?> value="4.5">Medium >13.5K Miles
  <input type="radio" name="travel" <?php if (isset($travel) && $travel=="1.5") echo "checked";?> value="11.5"> Long > 20K Miles


  <br><br>

<h4>  Diet catagory:</h4>
  <input type="radio" name="diet" <?php if (isset($diet) && $diet=="3.3") echo "checked";?> value="3.3">Carnavore
  <input type="radio" name="diet" <?php if (isset($diet) && $diet=="2.5") echo "checked";?> value="2.5">Omnivore
  <input type="radio" name="diet" <?php if (isset($diet) && $diet=="1.7") echo "checked";?> value="1.7">Vegetarian
  <input type="radio" name="diet" <?php if (isset($diet) && $diet=="1.5") echo "checked";?> value="1.5">Vegan

  <br><br>
  <div class="buttonholder">
  <input class="w3-button w3-amber w3-round"  class="block" type="submit" name="Apply" value="Submit">
</div>
    <br><br>
  <?php
  echo "<h2>Your co2 footprint in Tons:</h2>";

  echo "<br>";
  echo 13.5 + $diet + $travel;

  ?>
  <br><br>
<div class="buttonholder">
<button class="w3-button w3-amber w3-round"  class="block" onclick="myFunction()"> Next </button>
</div>
</form>




</body>
</html>
