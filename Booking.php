<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head> 
    <title>Passenger Booking System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Passenger Booking System</h2>

    <a href="create_booking.php" class="btn btn-primary mb-3">Create New Booking</a>
    <a href="create_passenger.php" class="btn btn-success mb-3">Add Passenger</a>

    <table class="table table-bordered table-striped">
        <tr class="table-dark">
            <th>ID</th>
            <th>Passenger</th>
            <th>From</th>
            <th>To</th>
            <th>Departure</th>
            <th>Return</th>
            <th>Actions</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "
            SELECT bookings.*, passengers.fullname 
            FROM bookings 
            JOIN passengers ON passengers.id = bookings.passenger_id
        ");

        while ($row = mysqli_fetch_assoc($result)):
        ?>

        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['fullname'] ?></td>
            <td><?= $row['departure'] ?></td>
            <td><?= $row['destination'] ?></td>
            <td><?= $row['departure_date'] ?> (<?= $row['departure_time'] ?>)</td>
            <td><?= $row['return_date'] ?> (<?= $row['return_time'] ?>)</td>

            <td>
                <a href="edit_booking.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_booking.php?id=<?= $row['id'] ?>" 
                   onclick="return confirm('Cancel this booking?')"
                   class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>

        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
