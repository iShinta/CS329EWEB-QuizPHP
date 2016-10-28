<h2>Thank you for signing the Guestbook!</h2>
<?php
  $name = $_POST["name"];
  $comment = $_POST["comment"];

  //Look for forbidden words
  if(strpos($name, "damn") == false){
    $fh = fopen("comments.txt", "a");
    fwrite($fh, $name."\n");
    fwrite($fh, $comment."\n");
    fclose($fh);
  }

  //Read the file and put the results in the array
  $fh = fopen("comments.txt", "r");
  while(!feof($fh)){
    //Read line
    $lineName = fgets($fh);
    echo "--Comment--";
    echo "Name: ".$lineName."<br />";

    //Read Name
    $line = fgets($fh);
    $listSignUp[$lineNb] = $line;
    echo "Comment: ".$line."<br />";
  }
  fclose($fh);
?>
