<?php
  // Database Info
  // mysql://b39bd7484b29d1:e63a8cc1@us-cdbr-east-06.cleardb.net/heroku_9a0b3385c551174?reconnect=true
  $servername = 'us-cdbr-east-06.cleardb.net';
  $username = 'b39bd7484b29d1';
  $password = 'e63a8cc1';
  $dbname = 'heroku_9a0b3385c551174';

  // PHP mySQL Connector
  $SQLcon = new mysqli($servername, $username, $password, $dbname);

  if($SQLcon -> connect_errno) {
    die("mySQL CONNECTION FAILURE: ".$SQLcon -> connect_errno);
  }
  else echo "mySQL CONNECTION ACTIVE!\n\n";

  $insert = $SQLcon -> prepare(
    "INSERT INTO drink (drink_id, name, size, calories, caffeine, sugar_qty) VALUES (?, ?, ?, ?, ?, ?)");
  $insert -> bind_param("isiiii", $drink_id, $name, $size, $calories, $caffeine, $sugar_qty);

  // $drink_id = 0;
  // $name = "Latte";
  // $size = 1;
  // $calories = 2;
  // $caffeine = 3;
  // $sugar_qty = 4;
  // $insert -> execute();
  // $insert -> close();

  $select = $SQLcon -> prepare("SELECT * FROM drink");
  $result = $select -> execute();
  $result = $select -> get_result(); 
  foreach ($result as $row) {
    print_r($row);
    print_r("\n");
  }

  $select -> close();
  $SQLcon -> close();
?>