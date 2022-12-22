<?php
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SEPL</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/bootstrap.css" rel="stylesheet" >-->
    <link href="css/bootstrap.min.css" rel="stylesheet" >
  </head>
  <body>
    <div class="container border" style="background-color: #fff;">
        <img src="images/bg.jpg" class="rounded border border-dark" alt="SEPL Banner" style="width:100%; height: 200px">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gallery.php">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactus.php">Contact US</a>
        </li>
      </ul>
      <div class="d-flex">
        <?php
          if(isset($_SESSION['UserID']))
          {
            echo '<a href="admin.php" class="btn btn-secondary my-2 my-sm-0 me-4" role="button" >Welcome '.$_SESSION['Name'].'</a>';
            echo '<a href="logout.php" class="btn btn-secondary my-2 my-sm-0" role="button" >Logout</a>';
          }
          else
          {
              echo '<a href="registration.php" class="btn btn-secondary my-2 my-sm-0 me-2" role="button" >Registration</a>
                    <a href="login.php" class="btn btn-secondary my-2 my-sm-0" role="button" >Login</a>';
          }
        ?>
      </div>
    </div>
  </div>
</nav>