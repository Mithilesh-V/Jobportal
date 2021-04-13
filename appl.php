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
        body{margin-top:20px;
        background:rgb(94, 95, 134);
        }
    
        .btn {
        margin-bottom: 5px;
        }
    
        .grid {
        position: relative;
        width: 100%;
        background: #fff;
        color: #666666;
        border-radius: 2px;
        margin-bottom: 25px;
        box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
        }
    
    .grid .grid-body {
        padding: 15px 20px 15px 20px;
        font-size: 0.9em;
        line-height: 1.9em;
    }
    
    .search table tr td.rate {
        color: #f39c12;
        line-height: 50px;
    }
    
    .search table tr:hover {
        cursor: pointer;
    }
    
    .search table tr td.image {
        width: 50px;
    }
    
    .search table tr td img {
        width: 50px;
        height: 50px;
    }
    
    .search table tr td.rate {
        color: #f39c12;
        line-height: 50px;
    }
    
    .search table tr td.price {
        font-size: 1.5em;
        line-height: 50px;
    }
    
    .search #price1,
    .search #price2 {
        display: inline;

    }
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
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
                        <h2 class="pull-left">Employees Details</h2>
                    </div>
                    <?php
                        // Include config file
                        require_once "config.php";
                        $name=$_GET['name'];
                        // Attempt select query execution
                        $sql = "SELECT * FROM jobs";
                        if($result = $conn->query($sql)){
                        if($result->rowCount() > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>TITLE</th>";
                                        echo "<th>LOCATION</th>";
                                        echo "<th>SALARY</th>";
                                        echo "<th>APPLY</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch()){
                                    echo "<tr>";
                                        echo "<td>" . $row['title'] . "</td>";
                                        echo "<td>" . $row['location'] . "</td>";
                                        echo "<td>" . $row['sal'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="addapp.php?name='. $row['name'] .'&j_id='. $row['j_id'] .'" class="mr-3" title="Apply" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        echo "</td>";

                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            unset($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                        } else{
                        echo "Oops! Something went wrong. Please try again later.";
                        }
                    
                    // Close connection
                        unset($conn);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>