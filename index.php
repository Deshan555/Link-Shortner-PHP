<?php

// OPEN DATABASE
   class MyDB extends SQLite3 
   {
      function __construct() 
      {
         $this->open('database/URL_list.db');
      }
   }
   
   $db = new MyDB();
   if(!$db) 
   {
      echo $db->lastErrorMsg();
   }

   $sql =<<<EOF
      SELECT * from Links_List;;
    EOF;

   $ret = $db->query($sql);
?>

<!-- HTML TEMPLATE -->

<!DOCTYPE html>

<html>

<head>

<link href="style.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
input[type=text], select 
{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] 
{
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover 
{
  background-color: #45a049;
}

div 
{
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>

<title>URL Shortener</title>

</head>

<body id="app">

<h1>URL shortener</h1>

<div>

  <!--HTML FORM FOR URL SUBMISSION-->
  <form method="POST" action="database/insert.php">
    
    <label for="lname">Long URL</label>
    
    <input type="text" id="lname" name="base_url" placeholder="http://www.example.com/examples">

    <input type="submit" name="submit" id="submit">

  </form>

  <h3>Your Links</h3>

  <!--HTML TABLE FOR RESULTS SHOW-->
  
  <table id="customers">
    
    <tr>
      <th>URL ID</th>
      <th>SHORT URL</th>
      <th>BASE URL</th>
      <th>REMOVE</th>
    </tr>
    
    <?php 
    while($row = $ret->fetchArray(SQLITE3_ASSOC)) 
    { ?>
    
    <tr>
      
      <td><?php echo $row['ID']?></td>
      
      <td><a href="<?php echo $row['BASE_URL']?>" target="_blank">http://localhost/r?c=<?php echo $row['ID']; ?></a></td>
      
      <td><?php echo $row['BASE_URL']?></td>

      <td>
        <form action="delete.php" method="POST" id="delete<?php echo $row['ID'];?>">
                              
          <input type="hidden" value="<?php echo $row['ID']; ?>" name="delete_id">
                              
          <i class="material-icons" style="color:red; cursor: pointer;" 
            onclick="document.getElementById('delete'+<?php echo $row['ID'];?>).submit();">delete</i>
                            
        </form>
      </td>
  
    </tr>
  
    <?php } $db->close(); ?>
  
  </table>

</div>

</body>

</html>


