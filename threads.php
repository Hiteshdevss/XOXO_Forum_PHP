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
  $cat_id = $_GET['catid'];
  $sql = 'SELECT * FROM `categories` WHERE categories_id = '.$cat_id;
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $cat_name = $row['categories_name'];
    $cat_desp = $row['categories_description'];
  }
  ?>

  <?php
  echo '<div class="container bg-secondary box_container mt-3 p-5">
    <h1>Welcome to '.$cat_name.'!!</h1>
    <p>'.$cat_desp.'</p>
    <ol>
    <li>No Spam / Advertising / Self-promote in the forums.</li>
    <li>Do not post copyright-infringing material.</li>
    <li>Do not post &ldquo;offensive&rdquo; posts, links or images.</li>
    <li>Do not cross post questions.</li>
    <li>Do not PM users asking for help.</li>
    <li>Remain respectful of other members at all times.</li>
    </ol>
  </div>';
?>

  <div class="container my-3">
    <h1 class="py-2">Browse Questions</h1>
    
    <?php 
      $sql = 'SELECT * FROM `threads`';
      $result = mysqli_query($conn, $sql);
      
      while ($row = mysqli_fetch_assoc($result)) {
        $thread_id = $row['thread_id'];
        $thread_title = $row['thread_title'];
        $thread_desp = $row['thread_description'];
      }
    ?>
    <?php
    echo '<div class="media my-3 d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-circle me-3" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
        <div class="media-body">
            <a href="thread_details.php?thread_id='.$thread_id.'">
                <h5 class="mt-0">'.$thread_title.'</h5>
            </a>
            <p style="text-align:justify;">'.subStr($thread_desp,0,200).'...<a href="thread_details.php?thread_id='.$thread_id.'"><b>Read More</b></a></p>
        </div>
    </div>';
    ?>

  </div>

  <?php require './partials/_footer.php'?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>