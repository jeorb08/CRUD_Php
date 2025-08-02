<?php
  include "connection.php";
  $id = "";
  $name = "";
  $email = "";
  $phone = "";
  $join_date = "";

  $error = "";
  $success = "";

  if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
      header("location:crud100/index.php");
      exit;
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM crud1 WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if (!$row) {
      header("location: crud100/index.php");
      exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $join_date = $row["join_date"]; // 👈 fetch join_date
  } else {
    // POST
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $join_date = $_POST["join_date"];

    $sql = "UPDATE crud1 SET name='$name', email='$email', phone='$phone', join_date='$join_date' WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result) {
      header("Location: index.php");
      exit;
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
 <title>CRUD</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">PHP CRUD OPERATION</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create.php">Add New</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="col-lg-6 m-auto">
  <form method="post">
    <br><br><div class="card">
      <div class="card-header bg-warning">
        <h1 class="text-white text-center">Update Member</h1>
      </div><br>

      <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control">

      <label>NAME:</label>
      <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" required> <br>

      <label>EMAIL:</label>
      <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" required> <br>

      <label>PHONE:</label>
      <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control" required> <br>

      <!-- 👇 Join Date Field -->
      <label>JOIN DATE:</label>
      <input type="date" name="join_date" value="<?php echo $join_date; ?>" class="form-control" required> <br>

      <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
      <a class="btn btn-info" href="index.php">Cancel</a><br>

    </div>
  </form>
</div>
</body>
</html>
