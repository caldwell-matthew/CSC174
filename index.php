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

  $statement = $SQLcon -> prepare("SELECT * FROM user");
  $result = $statement -> execute();
  
  $rows = $result -> fetch_all(MYSQLI_ASSOC);
  foreach($rows as $row) {
    printf("%s (%s)\n", $row["user_id"], $row["username"]);
  }

  $statement -> close();
  $SQLcon -> close();

  // $msg = $_POST['message'];
  // echo $msg;
?>