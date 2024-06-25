<?php
session_start();
$conn = new mysqli("localhost", "root", "", "blog");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $author = $_SESSION['username'];

  $sql = "INSERT INTO posts (title, content, author) VALUES ('$title', '$content', '$author')";

  if ($conn->query($sql) === TRUE) {
    echo "Post added successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
<form method="post" action="">
  Title: <input type="text" name="title"><br>
  Content: <textarea name="content"></textarea><br>
  <input type="submit" value="Add Post">
</form>
