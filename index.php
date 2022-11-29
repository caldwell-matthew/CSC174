<!DOCTYPE html>
  <head>CSC174 FINAL PROJECT</head><br><br> 
  <body>
    <form method = "post" action = "index.php">
      <label for="dname"> *Enter a Drink Name: (25 characters max.) </label><br>
      <textarea id = "dname" name = "dname" maxlength = "500" style = "width:300px"> </textarea>
      <br><br>
      <label for="size">Select a Size(oz):</label>
      <select name="size">
        <option value=6>6 oz</option>
        <option value=8>8 oz</option>
        <option value=10>10 oz</option>
        <option value=12>12 oz</option>
        <option value=14>14 oz</option>
        <option value=16>16 oz</option>
        <option value=20>20 oz</option>
        <option value=24>24 oz</option>
        <option value=30>30 oz</option>
      </select>
      <br>
      <label for="calories">Select how many Calories:</label>
      <select name="calories">
        <option value=0>0 Cal</option>
        <option value=100>100 Cal</option>
        <option value=200>200 Cal</option>
        <option value=300>300 Cal</option>
        <option value=400>400 Cal</option>
        <option value=500>500 Cal</option>
        <option value=600>600 Cal</option>
        <option value=700>700 Cal</option>
        <option value=800>800 Cal</option>
      </select>
      <br>
      <label for="caffeine">Select how much Caffeine(mg):</label>
      <select name="caffeine">
        <option value=0>Caffeine Free</option>
        <option value=10>10 mg</option>
        <option value=20>20 mg</option>
        <option value=30>30 mg</option>
        <option value=40>40 mg</option>
        <option value=50>50 mg</option>
        <option value=60>60 mg</option>
        <option value=70>70 mg</option>
        <option value=80>80 mg</option>
        <option value=90>90 mg</option>
        <option value=100>100 mg</option>
      </select>
      <br>
      <label for="sugar">Select how much Sugar(g):</label>
      <select name="sugar">
        <option value=0>Sugar Free</option>
        <option value=5>5 g</option>
        <option value=10>10 g</option>
        <option value=15>15 g</option>
        <option value=20>20 g</option>
        <option value=25>25 g</option>
        <option value=30>30 g</option>
        <option value=35>35 g</option>
        <option value=40>40 g</option>
        <option value=45>45 g</option>
        <option value=50>50 g</option>
      </select>
      <br>
      <br>
      <input type = "submit" value = "submit">
    </form>
  </body>
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
      die("<br/>mySQL CONNECTION FAILURE: ".$SQLcon -> connect_errno);
    else 
      echo "<br/>mySQL CONNECTION ACTIVE!<br/><br/>";

    // Prepared statement for inserting data into drink table.
    $insert = $SQLcon -> prepare(
      "INSERT INTO drink 
      (drink_id, name, size, calories, caffeine, sugar_qty) 
      VALUES (?, ?, ?, ?, ?, ?)");
    $insert -> bind_param("isiiii", $drink_id, $name, $size, $calories, $caffeine, $sugar_qty);

    // $insert -> execute();
    // $insert -> close();

    // Prepared statement for selecting all data from drink table.
    $select = $SQLcon -> prepare("SELECT * FROM drink");
    $result = $select -> execute();
    $result = $select -> get_result(); 
    
    foreach ($result as $row) {
      echo (
        'Drink ID: '.$row[drink_id].'<br/>'.
        'Name: '.$name.'<br/>'.
        'Size: '.$size.'oz'.'<br/>'.
        'Calories: '.$calories.'<br/>'.
        'Caffeine: '.$caffeine.'mg'.'<br/>'.
        'Sugar: '.$sugar_qty.'g'.'<br/>'
      );
    }

    $select -> close();
    $SQLcon -> close();

    // Values from form to be inserted.
    $drink_id = 0;
    $name= $_POST['dname'];
    $size = $_POST["size"];
    $calories = $_POST["calories"];
    $caffeine = $_POST["caffeine"];
    $sugar_qty = $_POST["sugar"];
    echo (
      'Name: '.$name.'<br/>'.
      'Size: '.$size.'oz'.'<br/>'.
      'Calories: '.$calories.'<br/>'.
      'Caffeine: '.$caffeine.'mg'.'<br/>'.
      'Sugar: '.$sugar_qty.'g'.'<br/>'
    );
  ?>
</html>