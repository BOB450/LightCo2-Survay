
<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<head>
<style>
body{
font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
}
p, h1, form, button{border:0; margin:0; padding:0;}
.spacer{clear:both; height:1px;}
/* ----------- My Form ----------- */
.form{
margin:0 auto;
width:400px;
padding:14px;
}
html, body {
	width: 100%;
	height: 100%;
	display: -webkit-box;
	display: flex;
	-webkit-box-align: center;
			align-items: center;
	-webkit-box-pack: center;
			justify-content: center;
	font-family: 'Nunito', sans-serif;
	color: #192E5B;
	background-color: #ECF8FF;
	-webkit-user-select: none;
	   -moz-user-select: none;
		-ms-user-select: none;
			user-select: none;
  }


  #form-wrapper {
  width: 100%;
  display: -webkit-box;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      flex-direction: column;
  -webkit-box-align: center;
      align-items: center;
  }

  form {
  width: 90%;
  max-width: 500px;
  }
  form #form-title {
  margin-top: 0;
  font-weight: 400;
  text-align: center;
  }

/* ----------- basic ----------- */
#basic{
border:solid 2px #DEDEDE;
}
#basic h1 {
font-size:14px;
font-weight:bold;
margin-bottom:8px;
}
h2 {

  width: 50%;
  padding: 4px;
}
#basic p{
font-size:11px;
color:#666666;
margin-bottom:20px;
border-bottom:solid 1px #dedede;
padding-bottom:10px;
}
#basic label{
display:block;
font-weight:bold;
text-align:right;
width:140px;
float:left;
}
#basic .small{
color:#666666;
display:block;
font-size:11px;
font-weight:normal;
text-align:right;
width:140px;
}



/* ----------- stylized ----------- */
#stylized{
border:solid 2px #b7ddf2;
background:#ebf4fb;

}
#stylized h1 {
font-size:14px;
font-weight:bold;
margin-bottom:8px;
}
#stylized p{
font-size:11px;
color:#666666;
margin-bottom:20px;
border-bottom:solid 1px #b7ddf2;
padding-bottom:10px;
}
#stylized label{
display:block;
font-weight:bold;
text-align:right;
width:140px;
float:left;
}
#stylized .small{
color:#666666;
display:block;
font-size:11px;
font-weight:normal;
text-align:right;
width:140px;
}
button,input
{
  width: 100%;
}

.buttonholder{ text-align: center; }

/* Customize the label (the container) */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}

</style>
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
