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
  $result = $statement -> get_result();
  foreach ($result as $row) {
    print_r($row['username'].':'.$row['email']);
    print_r("\n");
  }

  $statement -> close();
  $SQLcon -> close();

  // $msg = $_POST['message'];
  // echo $msg;
?>