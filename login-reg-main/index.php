<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
</head>
<body>
    <div class="container">
        <h1>Welcome to Your Profile</h1>
        
        <a href="logout.php" class="btn btn-warning">Logout</a>
        <a href="..\home.php" class="btn btn-warning">Return to Home Page</a>
    </div>
</body>
</html> -->




<?php
// session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'book_db');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_SESSION['user_id'];

// Fetch user's booking data with package title
$query = "
    SELECT 
        ub.package_id, 
        p.title AS package_title, 
        ub.arrivals, 
        ub.leaving, 
        ub.costperson, 
        ub.totalcost, 
        ub.date_created 
    FROM 
        user_bookings ub
    JOIN 
        packages p 
    ON 
        ub.package_id = p.id  
    WHERE 
        ub.user_id = '$user_id'
";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 800px;
        }
        h1, h2 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f4b400;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1c40f;
            color: white;
        }
        .btn-warning {
            background-color: #f4b400;
            border: none;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
            display: inline-block;
            text-align: center;
        }
        .btn-warning:hover {
            background-color: #e67e22;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome, <?php echo $_SESSION['Username']; ?>!</h1>
    <h2>Your Bookings</h2>
    <table>
        <thead>
            <tr>
                <th>Package Title</th>
                <th>Arrivals</th>
                <th>Leaving</th>
                <th>Cost per Person</th>
                <th>Total Cost</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['package_title'] . "</td>";
                    echo "<td>" . $row['arrivals'] . "</td>";
                    echo "<td>" . $row['leaving'] . "</td>";
                    echo "<td>" . $row['costperson'] . "</td>";
                    echo "<td>" . $row['totalcost'] . "</td>";
                    echo "<td>" . $row['date_created'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No bookings found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="logout.php" class="btn btn-warning">Logout</a>
        <a href="..\home.php" class="btn btn-warning">Return to Home Page</a>
</div>

<?php
mysqli_close($connection);
?>

</body>
</html>


