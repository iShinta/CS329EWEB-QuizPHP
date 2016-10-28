<h2>Thank you for signing the Guestbook!</h2>
<?php
  $name = $_POST["name"];
  $comment = $_POST["comment"];

  $forbidList = [];
  $fh = fopen("forbidden.txt", "r");
  while(!feof($fh)){
    $word = fgets($fh);
    array_push($forbidList, $word);
  }
  fclose($fh);
  $forbidList = ["damn", "hell", "pox"];

  //Look for forbidden words
  foreach ($forbidList as $key) {
    if(strpos($name, $key) !== false || strpos($comment, $key) !== false){
      $forbid = true;
      break;
    }
  }

  if(!$forbid){
    $fh = fopen("comments.txt", "a");
    fwrite($fh, $name."\n");
    fwrite($fh, $comment."\n");
    fclose($fh);
  }else{
    echo "Forbidden word has been found. Comment not registered";
  }

  //Read the file and put the results in the array
  $fh = fopen("comments.txt", "r");
  echo "<table border=\"1\">";
  echo "<tr><th>Name</th><th>Comments</th></tr>";
  while(!feof($fh)){
    $lineName = fgets($fh);
    $line = fgets($fh);
    if($lineName != "" && $line != ""){
      echo "<tr>";
      echo "<td>".$lineName."</td>";

      echo "<td>".$line."</td>";
      echo "</tr>";
    }
  }
  echo "</table>";
  fclose($fh);
?>
