<?php
  include 'action.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP MySQLi CRUD Prepared Statement with upload image</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="text-center text-dark mt-2">PHP MySQLi CRUD Prepared Statement with upload image</h3>
            <hr>
            <?php if (isset($_SESSION['response'])) { ?>
            <div class="alert alert-<?php echo  $_SESSION['res_type']; ?> alert-dismissible text-center">
              <b><?php echo  $_SESSION['response']; ?></b>
            </div>
            <?php } unset($_SESSION['response']); ?>
        </div>
    </div>
     
    <div class="row justify-content-center">
      <div class="col-md-6 mt-3 bg-info p-4 rounded">
        <h2 class="bg-light p-2 rounded text-center text-dark">ID : <?php echo  $vid; ?></h2>
        <div class="text-center">
          <img src="<?php echo  $vphoto; ?>" width="300" class="img-thumbnail">
        </div>
        <h4 class="text-light">Name : <?php echo  $vname; ?></h4>
        <h4 class="text-light">Email : <?php echo  $vemail; ?></h4>
        <h4 class="text-light">Phone : <?php echo  $vphone; ?></h4>
      </div>
    </div>
</div>
</body>
</html>