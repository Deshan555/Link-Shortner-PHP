<?php
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
   }else 
   {
      echo "Opened database successfully\n";
   }

   $ID = $_POST['delete_id'];

   $sql =<<<EOF
      DELETE from Links_List where ID = $ID;
EOF;
   
   $ret = $db->exec($sql);
   
   if(!$ret)
   {
     echo $db->lastErrorMsg();
   }else 
   {
      header('location: index.php');
   }