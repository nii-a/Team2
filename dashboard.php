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
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="navbar">
        <div class="title">Dashboard</div>
        <a href="index.html" class="logout">Logout</a>
    </div>

    <?php include 'php/sidebar.php'; ?>

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
