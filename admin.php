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

    if(isset($_GET['id']))
    {
        $sqldelete = "DELETE FROM userinformation WHERE UserID = '".$_GET['id']."'";
        mysqli_query($conn, $sqldelete);
    }
    $result = mysqli_query($conn, $sql);
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
        <?php
        
        echo '<table class="table table-hover">
                <thead>
                    <tr class="table-info">
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Profile Photo</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<tr class="table-primary">
                            <th scope="row">'.$row["Firstname"]. " " . $row["Lastname"].'</th>
                            <td>'.$row["Gender"].'</td>
                            <td>'.$row["Address"].'</td>
                            <td>'.$row["Email"].'</td>
                            <td>'.$row["Phone"].'</td>
                            <td><img src="'.$row["ProfilePhoto"].'" class="rounded border border-dark" alt="SEPL Banner" style="width: 50px; height: 50px"></td>
                            <td><a href="createsubscriber.php" class="btn btn-secondary my-2 my-sm-0 me-1" role="button" >Create</a>
                                <a href="editsubscriber.php?id='.$row["UserID"].'" class="btn btn-secondary my-2 my-sm-0 me-1" role="button" >Edit</a>
                                <a href="admin.php?id='.$row["UserID"].'" class="btn btn-secondary my-2 my-sm-0" role="button" >Delete</a>
                            </td>
                          </tr>'; 
                }
            } else 
            {
                echo '<tr class="table-primary">
                            <th scope="row" colspan="6">No record found</th>
                            <td><a href="createsubscriber.php" class="btn btn-secondary my-2 my-sm-0 me-1" role="button" >Create</a>
                            </td>
                      </tr>'; 
            }

            echo ' </tbody>
            </table>';
            
            mysqli_close($conn);
        ?>
    </div>
  </div>
<?php
    include_once('includes/footer.php');
?>