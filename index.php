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

</head>
<body>

<h1>A Fancy Table</h1>

<form method="POST" action="database/insert.php" name="forms" style="width: 100%;">

    <div style="width: 100%; ">
    <input type="url" name="base_url" id="base_url" placeholder="type your url">
        <button type="submit" name="submit" id="submit">SUBMIT</button>
    </div>

</form>

<table id="customers">
  <tr>
    <th>URL ID</th>
    <th>SHORT URL</th>
    <th>BASE URL</th>
  </tr>

  <?php 
    while($row = $ret->fetchArray(SQLITE3_ASSOC)) 
    { ?>
        


        <tr>
    <td><?php echo $row['ID']?></td>
    
    <td><a href="<?php echo $row['BASE_URL']?>" target="_blank">http://localhost/r?c=<?php echo $row['ID']; ?></a></td>

    <td><?php echo $row['BASE_URL']?></td>
  </tr>
    <?php }

     $db->close();
  ?>


</table>

</body>
</html>


