<?php
session_start();
$conn = new mysqli("localhost", "root", "", "blog");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
  $post_id = $_POST['post_id'];

  $sql = "DELETE FROM posts WHERE id='$post_id' AND author='{$_SESSION['username']}'";

  if ($conn->query($sql) === TRUE) {
    echo "Post deleted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
<form method="post" action="">
  <input type="hidden" name="post_id" value="<?php echo $_GET['post_id']; ?>">
  <input type="submit" value="Delete Post">
</form>
