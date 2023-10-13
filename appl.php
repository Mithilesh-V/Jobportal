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
        body{
	    margin-top: 10px;
            background: #AFEEEE;
        }
        h2{
        color: #999;
		margin-bottom: 10px;
		
    }
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 90%;
        margin:auto;
        
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    background-color:#ddd;
    }

    #customers tr:nth-child(even){background-color: #191970;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: rgb(50, 115, 220);;
    color: white;
    }

        a:link, a:visited {
     background-color: #00FA9A;
    color: white;
    padding: 10px 20px;
    text-align: center;
    margin:auto;
    text-decoration: none;
    display: inline-block;
    }

    a:hover, a:active {
    background-color: #00ff7f;
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
                        <h2 class="pull-left">APPLY FOR JOB</h2>
                    </div>
                    <?php
                    // Include config file
                    use "config.php";
                    $name = $_GET['name'];
                    // Attempt select query execution
                    $sql = "SELECT * FROM jobs";
                    if ($result = $conn->query($sql)) {
                        if ($result->rowCount() > 0) {
                            echo '<table id="customers">';
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
                                echo '<a href="addapp.php?name=' . $name . '&j_id=' . $row['j_id'] . 
					'" class="mr-3" title="Apply" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
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
