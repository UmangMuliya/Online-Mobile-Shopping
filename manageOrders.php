<?php
$edit = 'disabled';
if(isset($_POST['editbtn'])){
    $edit = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Raghuveer Enterprise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
// Simulating user data - replace with actual data retrieval logic


include('includes/header.php');
?>


</br></br>
<div class="container-fluid mt-5 pt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Hello <?php echo $_SESSION['Name']; ?></h5>
                    <ul class="list-group">
                        <a href="user.php"><li class="list-group-item ">Profile Information</li></a>
                        <a href="manageAddress.php"><li class="list-group-item">Manage Address</li></a>
                        <a href="manageOrders.php"><li class="list-group-item active">Orders</li></a>
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
                    <h4 class="card-title">Your Orders</h4>
                    <div class="input-group search-bar">
                    <input type="text" class="form-control" placeholder="Search your orders here">
                    <button class="btn btn-primary" type="button">Search Orders</button>
            </div>

           <center>
            <div class="row">
            <div class="col no-orders">
            <img src="images/order.png" alt="No Orders Image">
            <p>You have no orders</p>
            <a href="index.php"><button class="btn btn-primary">Start Shopping</button></a>
        </div>
    </div>
    </center>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include ('includes/footer.php');
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
