
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
body {
  margin: auto;
  width: 50%;
  border: 5px solid green;
  padding: 10px;
  background-color: lightblue;
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
#stylized input{
float:left;
font-size:12px;
padding:4px 2px;
border:solid 1px #aacfe4;
width:200px;
margin:2px 0 20px 10px;
}
#stylized button{
clear:both;
margin-left:160px;
width:125px;
height:31px;
background:#444;
text-align:center;
line-height:31px;
color:#FFFFFF;
font-size:11px;
font-weight:bold;
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

<h2>Carbon Survay</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Zipcode: <input type="text" name="zipcode" value="<?php echo $zipcode;?>">

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
