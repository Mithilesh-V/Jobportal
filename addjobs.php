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

      margin-top: 10px;
      background: #AFEEEE;
      font-family: 'Roboto', sans-serif;
	}
    
    a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 10px 20px;
  text-align: center;
  position: relative;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: orange;
}


    .form-control{
		height: 30px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 700px;
		padding: 10px 0;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 10px;
		text-align: center;
	}
    h1{
        color: #999;
		margin-bottom: 10px;
		
    }
    .signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #AFEEEE;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 20px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
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

</style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h1 class="pull-left">AVAILABLE JOB VACANCY</h1>
                    </div>
                    <?php
                        // Include config file
                        require_once "config.php";
                        // Attempt select query execution
                        $sql = "SELECT * FROM jobs";
                        if($result = $conn->query($sql)){
                        if($result->rowCount() > 0){
                            echo '<table id = "customers">';
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
		<h1>ADD JOB VACANCY</h1>
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