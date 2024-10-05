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
$user = [
    'name' => 'Umang',
    'email' => 'umang@example.com',
    'phone' => '1234567890',
    'address' => '123 Main St, City, Country'
];


include('includes/header.php');
?>


</br></br>
<div class="container-fluid mt-5 pt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Hello <?php echo htmlspecialchars($user['name']); ?></h5>
                    <ul class="list-group">
                        <a href="user.php"><li class="list-group-item ">Profile Information</li></a>
                        <a href="manageAddress.php"><li class="list-group-item">Manage Address</li></a>
                        <a href="manageOrders.php"><li class="list-group-item">Orders</li></a>
                        <a href="saveCards.php"><li class="list-group-item">Saved Cards</li></a>
                        <a href="wishList.php"><li class="list-group-item">WishList</li></a>
                        <a href="coupons.php"><li class="list-group-item active">Coupons</li></a>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profile Information</h4>
                    <form method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" <?php echo $edit;?>>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" <?php echo $edit;?>>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" <?php echo $edit;?>>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" rows="3" <?php echo $edit;?>><?php echo htmlspecialchars($user['address']); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="submit" class="btn btn-primary" name="editbtn">Edit</button>
                       
                    </form>
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
