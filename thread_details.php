<?php require './partials/_dbcon.php'?>
<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>XOXO Forum</title>
  <link rel="shortcut icon" href="./assets/group.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php require './partials/_navbar.php';?>
  <?php require './partials/_dbcon.php';?>

  <?php
  $thread_id = $_GET['thread_id'];
  $sql = 'SELECT * FROM `threads` WHERE thread_id = '.$thread_id;
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $thread_title = $row['thread_title'];
    $thread_desp = $row['thread_description'];
  }
  ?>

<?php
  echo '<div class="container bg-dark box_container mt-3 p-5">
    <h1 class="text-light">Welcome to '.$thread_title.'!!</h1>
    <p>'.$thread_desp.'</p>
  </div>';
?>

  <?php require './partials/_footer.php'?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>