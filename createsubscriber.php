<?php
    include_once('includes/header.php');

    if(isset($_SESSION['Role']) && $_SESSION['Role'] != 'Admin')
    {
        header('location: index.php');
    }

    if(!isset($_SESSION['UserID']))
    {
        header('location: index.php');
    }

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

    $sql = "SELECT UserID,Password, Username, Firstname, Lastname, Gender, Address, Phone, Email, Role, ProfilePhoto, Active FROM userinformation WHERE Role = 'Subscriber'";
    $result = mysqli_query($conn, $sql);

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
        $txtFirstname = $_POST["txtFirstname"];
        $txtLastname = $_POST["txtLastname"];
        $txtEmail = $_POST["txtEmail"];
        $txtTelephone = $_POST["txtTelephone"];
        $sltGender = $_POST["sltGender"];
        $txtAddress = $_POST["txtAddress"];
        $txtRole = "Subscriber";
        $txtStatus = 1;
  
        $fileProfilePhoto = "profilephoto/";
        $fileexist = basename($_FILES["fileProfileImage"]["name"]);
        if($fileexist !== "")
        {
            $fileProfilePhoto .= basename($_FILES["fileProfileImage"]["name"]);
            move_uploaded_file($_FILES["fileProfileImage"]["tmp_name"], $fileProfilePhoto);
        }
        else
        {
            if($sltGender == "Male")
            {
                $fileProfilePhoto .= "maledefault.jpg";
            }
            else
            {
                $fileProfilePhoto .= "femaledefault.jpg";
            }
        }

        $sql = "INSERT INTO userinformation(Password, Username, Firstname, Lastname, Gender, Address, Phone, Email, Role, ProfilePhoto, Active) 
        VALUES ('".$txtPassword."','".$txtUsername."','".$txtFirstname."','".$txtLastname."','".$sltGender."','".$txtAddress."','".$txtTelephone."','".$txtEmail."','".$txtRole."','".$fileProfilePhoto."','".$txtStatus."')";

        if (mysqli_query($conn, $sql)) {
            header('location: admin.php');
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
?>
    
    <div class="row">
    <div class="col-12 m-5 text-center text-dark"><h1>Admin  Panel</h1></div>
    <div class="col-3">
        <div class="card bg-secondary mb-3" style="max-width: 20rem;">
            <div class="card-header text-primary"><?php echo $_SESSION['Name']; ?></div>
            <div class="card-body">
                <?php echo '<img src="'. $_SESSION['ProfilePhoto'] .'" class="rounded border border-dark" alt="SEPL Banner" style="width: 250px; height: 250px">'; ?>
            </div>
        </div>
    </div>
    <div class="col-9"> 
        <h5>
            Create Subscriber
        </h5>
        <form class="row g-3" action="createsubscriber.php" method="post" enctype="multipart/form-data">
            <div class="col-12">
                <label for="fileProfileImage" class="form-label mt-4">Profile Photo</label>
                <input class="form-control" type="file" name="fileProfileImage" id="fileProfileImage">
            </div>
            <div class="col-md-6">
                <label for="txtUsername" class="form-label">Username</label>
                <input type="text" class="form-control" name="txtUsername" id="txtUsername" required>
            </div>
            <div class="col-md-6">
                <label for="txtPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="txtPassword" id="txtPassword" required>
            </div>
            <div class="col-md-6">
                <label for="txtFirstname" class="form-label">Firstname</label>
                <input type="text" class="form-control" name="txtFirstname" id="txtFirstname" required>
            </div>
            <div class="col-md-6">
                <label for="txtLastname" class="form-label">Lastname</label>
                <input type="text" class="form-control" name="txtLastname" id="txtLastname" required>
            </div>
            <div class="col-md-6">
                <label for="txtEmail" class="form-label">Email</label>
                <input type="email" class="form-control" name="txtEmail" id="txtEmail" required>
            </div>
            <div class="col-md-6">
                <label for="txtTelephone" class="form-label">Telephone</label>
                <input type="tel" class="form-control" name="txtTelephone" id="txtTelephone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Gender</label>
                <select id="inputState" class="form-select" name="sltGender">
                <option value="Female" selected>Female</option>
                <option value="Male">Male</option>
                </select>
            </div>
            <div class="col-8">
                <label for="txtAddress" class="form-label">Address</label>
                <input type="text" class="form-control" name="txtAddress" id="txtAddress" placeholder="12 Main Avenue">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
  </div>
<?php
    include_once('includes/footer.php');
?>