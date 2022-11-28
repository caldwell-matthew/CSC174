<?php
  // Database Info
  // mysql://b39bd7484b29d1:e63a8cc1@us-cdbr-east-06.cleardb.net/heroku_9a0b3385c551174?reconnect=true
  $servername = 'us-cdbr-east-06.cleardb.net';
  $username = 'b39bd7484b29d1';
  $password = 'e63a8cc1';
  $dbname = 'heroku_9a0b3385c551174';

  // PHP mySQL Connector
  $SQLcon = new mysqli($servername, $username, $password, $dbname);

  if($SQLcon -> connect_errno) 
    die("mySQL CONNECTION FAILURE: ".$SQLcon -> connect_errno);
  else 
    echo "mySQL CONNECTION ACTIVE!\n\n";

  // Prepared statement for inserting data into drink table.
  $insert = $SQLcon -> prepare(
    "INSERT INTO drink 
    (drink_id, name, size, calories, caffeine, sugar_qty) 
    VALUES (?, ?, ?, ?, ?, ?)");
  $insert -> bind_param("isiiii", $drink_id, $name, $size, $calories, $caffeine, $sugar_qty);

  // Values from index.html form to be inserted.
  $drink_id = 0;
  $name = $_GET["dname"];
  $size = $_GET["size"];
  $calories = $_GET["calories"];
  $caffeine = $_GET["caffeine"];
  $sugar_qty = $_GET["sugar"];
  // $insert -> execute();
  // $insert -> close();

  echo $_GET["dname"];

  // Prepared statement for selecting all data from drink table.
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