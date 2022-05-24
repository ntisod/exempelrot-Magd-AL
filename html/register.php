<?php

include("../templates/head.php");
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $passwordrr = $passwordtestrr ="";
$name = $email = $gender = $comment = $password = $passwordtest ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Användernamn krävs";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z'1-9 ]*$/",$name)) {
      $nameErr = "Endast bokstäver och och siffror";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "E-post krävs";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Ogiltigt e-postformat";
    }
  }

    
  if (empty($_POST["website"])) {
    $password = "";
  } else {
    $password = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/^[a-zA-Z'1-9 ]*$/",$password)) {
      $passwordrr = "Ogiltig Lösenord";
    }
  }

  if (empty($_POST["website"])) {
    $passwordtest = "";
  } else {
    $passwordtest = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/^[a-zA-Z'1-9 ]*$/",$password)) {
      $passwordtestrr = "Ogiltig Lösenord";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Magd - Registreringsformulär</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Användernamn: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Lösenord: <input type="text" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordrr;?></span>
  <br><br>
  Lösenord en gång till: <input type="text" name="password" value="<?php echo $password;?>">
  <span class="error"><?php echo $passwordrr;?></span>
  <br><br>
  Kommentar: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Kön:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Kvinna") echo "checked";?> value="Kvinna">Kvinna
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Man") echo "checked";?> value="Man">Man
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Annat") echo "checked";?> value="Annat">Annat  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form> 



<?php
echo "<h2>Din Inmatning: </h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $password;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;

include("../templates/foot.php");

?>



</body>
</html>