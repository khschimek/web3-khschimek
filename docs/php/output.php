<?php
    $name=$_REQUEST['name'] ?? "";

    // Checks if the input is valid
    $ok = TRUE;
    $ok = $ok && preg_match("/^(|-?[0-9]+([.][0-9]+)?)$/",$x);
    $ok = $ok && preg_match("/^(|-?[0-9]+([.][0-9]+)?)$/",$y);
  
    if (!$ok) {
      exit("bad form data.");
    }
  
    if ($x == ((float) $x) && $y == ((float) $y)) {
      $z = ((float)$x) + ((float)$y); 
    }  else {
      $z = "";
    }
  
    function nohtmlentities($x) {
      return $x;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="output.php" method="POST">
        What is your name?
        <input type="text" name="name" placeholder="Your Name Here" value="<?php echo htmlentities($name) ?>">
        <br>
        Nice to meet you, 
        <input type="text" name="response" placeholder=" " value="<?php echo htmlentities($name) ?>">
        .
        <input type="submit" value="Answer"> 
    </form>
</body>
</html>