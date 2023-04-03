<?php
   class MyDB extends SQLite3 
   {
      function __construct() 
      {
         $this->open('URL_list.db');
      }
   }

   if(isset($_POST['submit']))
   {
    $db = new MyDB();
    
    if(!$db)
    {
      echo $db->lastErrorMsg();
    } 
    else 
    {
      echo "Opened database successfully\n";
    }

    $base_url = $_POST['base_url'];

   $sql =<<<EOF
      INSERT INTO Links_List (BASE_URL) VALUES ("$base_url");
      EOF;

   $ret = $db->exec($sql);
   
   if(!$ret) 
   {
      echo $db->lastErrorMsg();
   } 
   else 
   {
      header('location: ../index.php');
   }
   $db->close();
   }
   
?>