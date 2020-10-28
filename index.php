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
  <p>Some Really bad movies from a while back..........</p>

<?php

$sql = "SELECT * FROM `movies` WHERE year = 1976 and rank < 4 ORDER BY `movies`.`rank` ASC LIMIT 10";
    
    
$db->query("SET SESSION MAX_EXECUTION_TIME=1000;");
    
    $sql = "SELECT OriginState, AirTime, DestCityName 
FROM `On_Time_On_Time_Performance_2016_1` 
WHERE (OriginState, AirTime) 
IN ( SELECT OriginState, MAX(Airtime) FROM `On_Time_On_Time_Performance_2016_1` GROUP BY OriginState ) 
ORDER BY `On_Time_On_Time_Performance_2016_1`.`AirTime` DESC";
    
    
$result = $db->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_array()) {
    $exp = $row["AirTime"];
    $name = $row["OriginState"]." ".$row["DestCityName"];
    echo
    '<div class="country">'.
      '<div class="indicator" style="flex-basis: '.($exp/10).'%" >'.
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
