

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Raghuveer Enterprise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .address-card {
      margin-top: 20px;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
    }
  </style>
</head>
<body>

<?php
include ('includes/config.php');

session_start();
$user_id = $_SESSION['user_id'];
$addid = 0;
ob_start();
//Simulating user data - replace with actual data retrieval logic
$user = [
    'name' => 'Umang',
    'email' => 'umang@example.com',
    'phone' => '1234567890',
    'address' => '123 Main St, City, Country'
];


include('includes/header.php');
?>


</br></br>
<div class="container-fluid mt-5 ">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Hello <?php echo $_SESSION['Name']; ?></h5>
                    <ul class="list-group">
                        <a href="user.php"><li class="list-group-item ">Profile Information</li></a>
                        <a href="manageAddress.php"><li class="list-group-item active">Manage Address</li></a>
                        <a href="manageOrders.php"><li class="list-group-item">Orders</li></a>
                        <a href="saveCards.php"><li class="list-group-item">Saved Cards</li></a>
                        <a href="wishList.php"><li class="list-group-item">WishList</li></a>
                        <a href="coupons.php"><li class="list-group-item">Coupons</li></a>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><b>Manage Addresses</b></h4>

                     <?php
                        if(isset($_GET['addbtn'])){?>

                        <div class="container mt-5">
                                <h2>Add New Address</h2>
                                <form method="post">
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="fname" placeholder="First Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="lname" placeholder="Last Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="addr" placeholder="Address(Area and Street)" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="Town/City" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="State" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="zipCode" class="form-label">Zip Code</label>
                                        <input type="text" class="form-control" id="zipCode" name="code" placeholder="PinCode" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="country" class="form-label">Landmark</label>
                                        <input type="text" class="form-control" id="landmark" name="landmark" placeholder="LandMark" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="addAddr">Submit</button>
                                </form>
                            <?php
                            if(isset($_POST['addAddr'])){
                                $uid = $user_id;
                                $fname = $_POST['fname'];
                                $lname = $_POST['lname'];
                                $addr = $_POST['addr'];
                                $city = $_POST['city'];
                                $state = $_POST['state'];
                                $code = $_POST['code'];
                                $landmark = $_POST['landmark'];
                              
                                $sql = "INSERT INTO `address`(`uid`, `firstName`, `lastName`, `address`, `city`, `state`, `pincode`, `landmark`) 
                                VALUES ('$uid','$fname','$lname','$addr','$city','$state','$code','$landmark')";
                                $result = mysqli_query($conn,$sql);

                                if($result){
                                    header('location:manageAddress.php?success=added successfully');
                                    exit();
                                       

                                }
                                else{
                                    echo "not inserted";
                                }    
                            }?>
                           
                            </div>
                        <?php
                        }
                        else{
                            $sql = "select * from address where uid = $user_id";
                            $result = mysqli_query($conn,$sql); 
                            $a=0; 
                        ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                    <button class="btn btn-primary my-3" name="addbtn">Add a New Address</button>
                        <?php
                            while ($row = mysqli_fetch_assoc($result)){
                                $addid = $row['aid'];
                                $a++;

                                
                        ?>
                    <div class="address-card">
                        <h5><span class="badge text-bg-secondary">Home</span> </h5>
                        <p><b> <?php echo $row['firstName']." " .$row['lastName']; ?></b></p>
                        <p> <?php echo $row['mobileNo'] ?> </p>
                        <p> <?php echo $row['address'].", ".$row['city'].", ".$row['state'].", ".$row['pincode'].", ".$row['landmark'] ?> </p>
                        <button type="submit" class="btn btn-primary" name="dltbtn">Delete</button>
                        <button type="submit" class="btn btn-primary" name="editbtn">Edit</button>
                    </div>
                    </form>
                    <?php
                         if(isset($_GET['dltbtn'])){
                            $sql = "delete from address where aid = $addid ";
                            $result1 = mysqli_query($conn, $sql);
                            if($result1){
                                header('location:manageAddress.php?success=deleted successfully');
                                exit();
                                ob_end_flush();
                            }
                        }    
                        
                        }}
                       
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include ('includes/footer.php');
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</body>
</html>

