<?php
require '../../../dbConnection.php';
require "../headeradmin.php";
require '../../../checklogin/checkLogin.php';


$sql1 = "select e_reservation.* ,events.id as eventID, events.event_name as eventName ,users.name as eventenroller from e_reservation join events on e_reservation.event_id = events.id join users on users.id = e_reservation.enroller order by e_reservation.id ASC";
$op = mysqli_query($con, $sql1);







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Data</title>
    <link rel="stylesheet" href="../../../css/display.css">
    <style>
        .head {
            margin-top: 20px;
        }

        .add {
            text-align: center;
            position: absolute;
            left: 15%;
            transform: translateX(-50%) translateY(-125%);
        }

        table {
            width: 100% !important;
        }


        th h1 {
            text-align: center !important;
        }

        td {
            text-align: center !important;
        }
    </style>
</head>

<body>
    <h1 class="head"><span class="blue">&lt;</span>Events<span class="blue">&gt;</span> <span class="yellow">Enrollers</pan>
    </h1>
    <h2>Admin Premission Only! <br><br>
        <?php if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        unset($_SESSION['message']);
        ?>

    </h2>


    <a href="create.php" title="Avaliable only for Company Users to add Events to checked" class="btn btn-secondary add" style="color: #fff ;
    background-color: gray;
    border-color: black;">Add New +</a>


    <table class="container">
        <thead>
            <tr>
                <th>
                    <h1>ID</h1>
                </th>
                <th>
                    <h1>Event Name</h1>
                </th>

                <th>
                    <h1>Event enroller</h1>
                </th>
                <th>
                    <h1>Event Details</h1>
                </th>

            </tr>
        </thead>
        <tbody>
            <?php while ($data = mysqli_fetch_assoc($op)) { ?>

                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['eventName']; ?></td>
                    <td><?php echo $data['eventenroller']; ?></td>
                    <td> <a href="eventDeatails.php?id=<?php echo $data['eventID']; ?>" class="btn btn-primary ">Show Me Event</a>
                    </td>
                </tr>
            <?php } ?>




        </tbody>
    </table>
</body>


</html>