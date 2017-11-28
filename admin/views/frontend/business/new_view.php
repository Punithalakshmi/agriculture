<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php

  foreach ($query->result() as $value) {
  //  echo "<pre>"; print_r($value); 
   echo $value->id." ".$value->name."<br>";
  }
  echo $links;
?>
</body>
</html>