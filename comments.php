<h2>Thank you for signing the Guestbook!</h2>
<?php
  $name = $_POST["name"];
  $comment = $_POST["comment"];

  $forbidList = [];
  $fh = fopen("forbidden.txt", "r");
  while(!feof($fh)){
    $word = fgets($fh);
    echo "Word: ".$word;
    array_push($forbidList, $word);
  }
  fclose($fh);
  //echo $forbidList;

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
  while(!feof($fh)){
    //Read line
    $lineName = fgets($fh);
    echo "<br />--Comment--<br />";
    echo "Name: ".$lineName."<br />";

    //Read Name
    $line = fgets($fh);
    $listSignUp[$lineNb] = $line;
    echo "Comment: ".$line."<br />";
  }
  fclose($fh);
?>
