<?php
    include_once('includes/header.php');
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "SEPL";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }

        $txtUsername = $_POST["txtUsername"];
        $txtPassword = $_POST["txtPassword"];

        $sql = "SELECT UserID,Firstname, Lastname, Role, ProfilePhoto FROM userinformation WHERE Username = '".$txtUsername."' AND Password = '".$txtPassword."'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['UserID'] = $row["UserID"];
            $_SESSION['Name'] = $row["Firstname"]. " " . $row["Lastname"];
            $_SESSION['Role'] = $row["Role"];
            $_SESSION['ProfilePhoto'] = $row["ProfilePhoto"];

            if($_SESSION['Role'] == 'Admin')
            {
                header('location: admin.php');
            }
            else
            {
                header('location: index.php');
            }
        }
        } else {
        echo "0 results";
        }

        mysqli_close($conn);
    }
?>
    
    <div class="row">
    <div class="col-12 m-5 text-center text-dark"><h3>Spence Events Planning Limited</h3></div>
    <div class="col-4">
    <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
        <div class="card-header">Upcoming Event</div>
        <div class="card-body">
            <h4 class="card-title">December 27th, 2022</h4>
            <p class="card-text">A day filled with fun activities for all members of the families</p>
            <p class="card-text">Cost: Adult $2,500.00JMD</p>
            <p class="card-text">Children $1,000.00JMD</p>
        </div>
        </div>
    </div>
    <div class="col-8"> 
        <h5>
            Login
        </h5>
        <form class="row g-3" action="login.php" method="post">
            <div class="col-6">
                <label for="txtUsername" class="form-label">Username</label>
                <input type="text" class="form-control" name="txtUsername" id="txtUsername" required>
            </div>
            <div class="col-md-6">
                
            </div>
            <div class="col-6">
                <label for="txtPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="txtPassword" id="txtPassword" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
  </div>
<?php
    include_once('includes/footer.php');
?>