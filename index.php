<?php
  include 'action.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP MySQLi CRUD Prepared Statement with upload image</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
  <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
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
     
    <div class="row">
        <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                Add Record
              </div>
              <div class="card-body">
                <form action="action.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo  $id; ?>">
                  <div class="mb-3">
                    <input type="text" name="name" value="<?php echo  $name; ?>" class="form-control" placeholder="Enter name" required>
                  </div>
                  <div class="mb-3">
                    <input type="email" name="email" value="<?php echo  $email; ?>" class="form-control" placeholder="Enter e-mail" required>
                  </div>
                  <div class="mb-3">
                    <input type="tel" name="phone" value="<?php echo  $phone; ?>" class="form-control" placeholder="Enter phone" required>
                  </div>
                  <div class="mb-3">
                    <input type="hidden" name="oldimage" value="<?php echo  $photo; ?>">
                    <input type="file" name="image" class="custom-file">
                    <img src="<?php echo  $photo; ?>" width="120" class="img-thumbnail">
                  </div>
                  <div class="mb-3">
                    <?php if ($update == true) { ?>
                    <input type="submit" name="update" class="btn btn-success btn-block" value="Update Record">
                    <?php } else { ?>
                    <input type="submit" name="add" class="btn btn-primary btn-block" value="Add Record">
                    <?php } ?>
                  </div>
                </form>
              </div>
            </div>
        </div>
        <div class="col-md-8">
            <?php
              $query = 'SELECT * FROM member';
              $stmt = $conn->prepare($query);
              $stmt->execute();
              $result = $stmt->get_result();
            ?>
            <div class="card">
            <div class="card-header">
                Record
            </div>
            <div class="card-body">
            <table class="table table-bordered table-striped table-hover" id="data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                  <td><?php echo  $row['id']; ?></td>
                  <td><img src="<?php echo  $row['photo']; ?>" width="25"></td>
                  <td><?php echo  $row['name']; ?></td>
                  <td><?php echo  $row['email']; ?></td>
                  <td><?php echo  $row['phone']; ?></td>
                  <td>
                    <a href="details.php?details=<?php echo  $row['id']; ?>" class="btn btn-primary btn-sm">Details</a> |
                    <a href="action.php?delete=<?php echo  $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you want delete this record?');">Delete</a> |
                    <a href="index.php?edit=<?php echo  $row['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#data-table').DataTable({
      paging: true
    });
  });
</script>
</body>
</html>