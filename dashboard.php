<?php
include 'datacon.php';

// Fetch the number of users from the database
$sql = "SELECT COUNT(*) as total_users FROM users";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_users = $row['total_users'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .navbar {
            background-color: #333;
            color: white;
            padding: 10px;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar .title {
            margin-left: 20px;
            font-size: 24px;
        }

        .navbar .logout {
            margin-right: 20px;
            text-decoration: none;
            color: white;
            font-size: 16px;
            padding: 5px 10px;
            background-color: #555;
            border-radius: 5px;
        }

        .sidebar {
            background-color: #444;
            color: white;
            width: 200px;
            padding-top: 60px;
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
            margin: 10px 0;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        .content {
            margin-left: 200px;
            padding: 60px 20px;
            width: 100%;
            box-sizing: border-box;
        }

        .chart-container {
            width: 60%;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="title">Dashboard</div>
        <a href="login.html" class="logout">Logout</a>
    </div>

    <div class="sidebar">
        <a href="#">Team 2</a>
        <a href="#">Nii Adokwei Addo</a>
        <a href="#">Kekeli Lovelace</a>
        <a href="#">Mohammed</a>
    </div>

    <div class="content">
        <div class="chart-container">
            <canvas id="userChart"></canvas>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {
            type: 'bar', // You can change this to 'pie' for a pie chart
            data: {
                labels: ['Total Users'],
                datasets: [{
                    label: 'Number of Users',
                    data: [<?php echo $total_users; ?>],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
