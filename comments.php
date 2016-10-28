<h2>Thank you for signing the Guestbook!</h2>
<?php
  $name = $_POST["name"];
  $comment = $_POST["comment"];

  //Look for forbidden words
  $forbid = false;
  if(strpos($name, "damn") != false){
    $forbid = true;
  }
  if(strpos($name, "hell") != false){
    $forbid = true;
  }
  if(strpos($name, "pox") != false){
    $forbid = true;
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
