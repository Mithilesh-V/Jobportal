<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            margin-top: 20px;
            background: rgb(94, 95, 134);
        }

    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">APPLY TO JOB</h2>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    $name = $_GET['name'];
                    // Attempt select query execution
                    $sql = "SELECT * FROM jobs";
                    if ($result = $conn->query($sql)) {
                        if ($result->rowCount() > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>TITLE</th>";
                            echo "<th>LOCATION</th>";
                            echo "<th>REQUIREMENTS</th>";
                            echo "<th>SALARY</th>";
                            echo "<th>APPLY</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = $result->fetch()) {
                                echo "<tr>";
                                echo "<td>" . $row['job_title'] . "</td>";
                                echo "<td>" . $row['loca'] . "</td>";
                                echo "<td>" . $row['degree_req'] . "</td>";
                                echo "<td>" . $row['salary'] . "</td>";
                                echo "<td>";
                                echo '<a href="addapp.php?name=' . $name . '&j_id=' . $row['j_id'] . '" class="mr-3" title="Apply" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                echo "</td>";

                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            unset($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    echo '<br><a href="emp.php?name=' . $name . '" >GO BACK</a><br>';
                    // Close connection
                    unset($conn);
                    ?>


                </div>
            </div>
        </div>
    </div>
</body>

</html>