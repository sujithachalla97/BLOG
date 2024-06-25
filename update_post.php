<?php
session_start();
$conn = new mysqli("localhost", "root", "", "blog");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
  $post_id = $_POST['post_id'];
  $title = $_POST['title'];
  $content = $_POST['content'];

  $sql = "UPDATE posts SET title='$title', content='$content' WHERE id='$post_id' AND author='{$_SESSION['username']}'";

  if ($conn->query($sql) === TRUE) {
    echo "Post updated successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
<form method="post" action="">
  <input type="hidden" name="post_id" value="<?php echo $_GET['post_id']; ?>">
  Title: <input type="text" name="title"><br>
  Content: <textarea name="content"></textarea><br>
  <input type="submit" value="Update Post">
</form>
