<!DOCTYPE HTML>

<html>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

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

  <div class="left"> <!--This div contains the zipcode textbox. TODO: format-->
    <div style="font-size: 30px;">Zip Code?</div> <input type="text" class="w3-input w3-border w3-round-large" name="zipcode" value="<?php echo $zipcode;?>">
    <div style="font-size: 20px;">We will never share this.</div>
  </div>

  <br><br>

  <div class="main">
    <div> <!--This div contains the diet question for formating. TODO: format-->
        <h4>  Diet catagory:</h4>
        <label class="container">Carnavore
          <input type="radio" name="diet" <?php if (isset($diet) && $diet=="3.3") echo "checked";?> value="3.3">
          <span class="checkmark"></span>
        </label>

        <label class="container">Omnivore
          <input type="radio" name="diet" <?php if (isset($diet) && $diet=="2.5") echo "checked";?> value="2.5">
          <span class="checkmark"></span>
        </label>
        
        <label class="container">Vegetarian
          <input type="radio" name="diet" <?php if (isset($diet) && $diet=="1.7") echo "checked";?> value="1.7">
          <span class="checkmark"></span>
        </label>

        <label class="container">Vegan
          <input type="radio" name="diet" <?php if (isset($diet) && $diet=="1.5") echo "checked";?> value="1.5">
          <span class="checkmark"></span>
        </label>
    </div>
    <br><br>
    <div> <!--This div contains the Milage textbox. TODO: format-->
      <h4>How far do you drive a year?</h4>

      <label class="container">None
          <input type="radio" name="travel" <?php if (isset($travel) && $travel=="3.3") echo "checked";?> value=".2">
          <span class="checkmark"></span>
        </label>

        <label class="container">Short >6K Miles
        <input type="radio" name="travel" <?php if (isset($travel) && $travel=="2.5") echo "checked";?> value=".5">
          <span class="checkmark"></span>
        </label>

        <label class="container">Medium >13.5K Mile
        <input type="radio" name="travel" <?php if (isset($travel) && $travel=="1.7") echo "checked";?> value="4.5">
          <span class="checkmark"></span>
        </label>

        <label class="container">Long >20K Mil
          <input type="radio" name="travel" <?php if (isset($travel) && $travel=="1.5") echo "checked";?> value="11.5"> 
          <span class="checkmark"></span>
        </label>

    </div>
  </div>
  <br><br>
  <div class="right">
    <div class="buttonholder"> <!--This div containes the submit button. TODO: format-->
      <input class="button" class="block" type="submit" name="Apply" value="Calculate">
    </div>

    <br><br>

    <?php
      echo "<h4>You Produce ";
      echo 13.5 + $diet + $travel;
      echo " tonnes of CO<sub>2</sub>.</h4>"
    ?>

    <br><br>

    <div> <!--This div containes the Next Button. TODO: format-->
     <button class="button" onclick="myFunction()"> <span>Next </span> </button>
    <div>
  </div>

</form>

</body>

</html>
