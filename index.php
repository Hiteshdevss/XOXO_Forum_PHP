<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>XOXO Forum</title>
  <link rel="shortcut icon" href="./assets/group.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <?php require './partials/_navbar.php';?>
  <?php require './partials/_dbcon.php';?>

  <div class="container mt-5 mb-5">
    <h1>Our Categories</h1>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mt-2">
    
    <!-- fetch all categories -->
    <?php
    $sql = 'SELECT * FROM `categories`';
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $cat_id = $row['categories_id'];
        $cat_img = $row['categories_img'];
        $cat_name = $row['categories_name'];
        $cat_desp = $row['categories_description'];
        echo '<div class="col">
              <div class="card">
                <img src="'.$cat_img.'" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">'.$cat_name.'</h5>
                  <p class="card-text">'.subStr($cat_desp,0,200).'</p>
                  <a href="threads.php?catid='.$cat_id.'" class="btn btn-primary">Enter Forum</a>
                </div>
              </div>
            </div>';
        }
    ?>
      <!-- Repeat the above card structure for the remaining cards -->
    </div>
  </div>

  <?php require './partials/_footer.php'?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
