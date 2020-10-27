<?php require 'connect.php'; ?>
<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<head>
  <title>Bad Old Movies</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <h1>Terrible Films</h1>
  <p>Some Really bad movies from a while back.......</p>

<?php

$sql = "SELECT * FROM `movies` WHERE year = 1976 and rank < 4 ORDER BY `movies`.`rank` ASC LIMIT 10";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_array()) {
    $exp = $row["rank"];
    $name = $row["name"];
    echo
    '<div class="country">'.
      '<div class="indicator" style="flex-basis: '.($exp*10).'%" >'.
            $exp.
      '</div>'.
      '<div class="name">'.$name.'</div>'.
    '</div>';
  }
} else {
    echo "<p>Nothing to show</p>";
}

$db->close();
?>

</body>
</html>
