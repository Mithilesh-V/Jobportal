<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Registration Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
	body {

      margin-top: 20px;
      background: #AFEEEE;
	}

</style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h1 class="pull-left">Post JOBS</h1>
                    </div>
                    <?php
                        // Include config file
                        require_once "config.php";
                        // Attempt select query execution
                        $sql = "SELECT * FROM jobs";
                        if($result = $conn->query($sql)){
                        if($result->rowCount() > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>TITLE</th>";
                                        echo "<th>LOCATION</th>";
                                        echo "<th>REQUIREMENTS</th>";
                                        echo "<th>SALARY</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch()){
                                    echo "<tr>";
                                        echo "<td>" . $row['job_title'] . "</td>";
                                        echo "<td>" . $row['loca'] . "</td>";
                                        echo "<td>" . $row['degree_req'] . "</td>";
                                        echo "<td>" . $row['salary'] . "</td>";
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
    	
<div class="signup-form">
    <form action="insj.php" method="post">
		<h1>ADD JOBS</h1>
        <div class="form-group">
            <input type="text" class="form-control" name="j_title" placeholder="Job Title" required="required">	
        </div>
		<div class="form-group">
            <input type="text" class="form-control" name="loca" placeholder="Location" required="required">
        </div>
		<div class="form-group">
            <input type="text" class="form-control" name="req" placeholder="Requirements- UG or PG" required="required">
        </div>
		<div class="form-group">
            <input type="number" class="form-control" name="sal" placeholder="salary" required="required">
        </div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
        </div>
    </form>
    <br><a href="admin.php" >GO BACK</a><br>
    
</div>

</body>
</html>