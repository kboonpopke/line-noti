<?php
    session_start();
    require 'dbcon.php';
?>
<?php   
    require 'nav.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <?php include('message.php'); ?>
    <link href="css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="sb-admin-2.min.css" rel="stylesheet">
    <link href="sb-admin-2.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <!DOCTYPE html>
    <html lang="en">

    <div class="dashboard">
        <h1 class="h3 mb-0 text-gray-800">HOME</h1>
    </div>
    <div class="container mt-4">

        <?php include('message.php'); ?>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Pallet list
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Goods</th>
                                    <th>Amount</th>
                                    <th>Requested time</th>
                                    <th>Required time</th>
                                    <th>note</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            $query = "SELECT * FROM line";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $line)
                                {
                                    ?>
                                <tr>
                                    <td><?= $line['id']; ?></td>
                                    <td><?= $line['name']; ?></td>
                                    <td><?= $line['department']; ?></td>
                                    <td><?= $line['goods']; ?></td>
                                    <td><?= $line['amount']; ?></td>
                                    <td><?= $line['time2'] . '::' . $line['date2']; ?></td>
                                    <td><?= $line['time1'] . ':: ' . $line['date1']; ?></td>
                                    <td><?= $line['note']; ?></td>
                                    <td>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                }
                            }
                            else
                            {
                                echo "<h5> No Record Found </h5>";
                            }
                        ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>