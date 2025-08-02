<?php
    include "connection.php";
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $join_date = $_POST['join_date'];

        $q = "INSERT INTO `crud1`(`name`, `email`, `phone`, `join_date`) VALUES ('$name', '$email', '$phone', '$join_date')";
        $query = mysqli_query($conn, $q);

        // ✅ Redirect to index.php if insert is successful
        if($query){
            header('Location: index.php');
            exit(); // important to stop script execution after redirect
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
          <a class="nav-link" href="create.php"><span style="font-size:larger;">Add New</span></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="col-lg-6 m-auto">
  <form method="post">
    <br><br><div class="card">

      <div class="card-header bg-primary">
        <h1 class="text-white text-center">Create New Member</h1>
      </div><br>

      <label>NAME:</label>
      <input type="text" name="name" class="form-control" required> <br>

      <label>EMAIL:</label>
      <input type="email" name="email" class="form-control" required> <br>

      <label>PHONE:</label>
      <input type="text" name="phone" class="form-control" required> <br>

      <label>JOIN DATE:</label>
      <input type="date" name="join_date" class="form-control" required> <br>

      <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
      <a class="btn btn-info" href="index.php">Cancel</a><br>

    </div>
  </form>
</div>

</body>
</html>
