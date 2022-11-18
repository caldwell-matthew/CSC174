<?php
  // Database Info
  $servername = 'us-cdbr-east-06.cleardb.net';
  $username = 'be21fda1d3f174';
  $password = '4d1817db';
  $dbname = 'heroku_2e91707667d2cbd';

  // PHP mySQL Connector
  $SQLcon = new mysqli($servername, $username, $password, $dbname);

  if($SQLcon -> connect_errno) {
    die("mySQL CONNECTION FAILURE: ".$SQLcon -> connect_errno);
  }
  else echo "mySQL CONNECTION ACTIVE!\n";
?>