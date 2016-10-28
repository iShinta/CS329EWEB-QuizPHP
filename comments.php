<h2>Thank you for signing the Guestbook!</h2>
<?php
  $name = $_POST["name"];
  echo "Name: ".$name;

  $comment = $_POST["comment"];
  echo "Comment: ".$comment;

  $fh = fopen("comments.txt", "a");
  fwrite($fh, $name);
  fwrite($fh, $comment);
  fclose($fh);
?>
