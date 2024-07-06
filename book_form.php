<!-- <?php

   // $connection = mysqli_connect('localhost','root','','book_db');

   // if(isset($_POST['send'])){
   //    $user_id = $_POST['user_id'];
   //    $package_id = $_POST['package_id'];
   //    $guests = $_POST['guests'];
   //    $arrivals = $_POST['arrivals'];
   //    $leaving = $_POST['leaving'];
   //    $costperson = $_POST['costperson'];
   //    $totalcost = $guests * $costperson;
   //    $status = 1;


   //    $request = "insert into `user_bookings` ( `user_id`, `package_id`, `guests`, `arrivals`,`leaving` ,`status`,`costperson`,`totalcost`,`date_created`) values('$user_id', '$package_id', '$guests', '$arrivals','$leaving', '$status', '$costperson', '$totalcost', NOW())";

   //    mysqli_query($connection, $request);
   //    session_start();
   //    $_SESSION['success_message'] = "Booking successfully done.";
   //    header('location:package.php'); 

   // }else{
   //    echo 'something went wrong please try again!';
   // }

?> -->

<?php

$connection = mysqli_connect('localhost', 'root', '', 'book_db');

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['send'])) {
    $user_id = $_POST['user_id'];
    $package_id = $_POST['package_id'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];
    $costperson = $_POST['costperson'];
    $totalcost = $guests * $costperson;

    $request = "INSERT INTO `user_bookings` (`user_id`, `package_id`, `guests`, `arrivals`, `leaving`,  `costperson`, `totalcost`, `date_created`) VALUES ('$user_id', '$package_id', '$guests', '$arrivals', '$leaving',  '$costperson', '$totalcost', NOW())";

    if (mysqli_query($connection, $request)) {
        session_start();
        $_SESSION['success_message'] = "Booking successfully done.";
        header('Location: package.php');
        exit();
    } else {
        echo "Error: " . $request . "<br>" . mysqli_error($connection);
    }

} else {
    echo 'Something went wrong, please try again!';
}

mysqli_close($connection);
?>
