<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>JOB PORTAL</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    body{
        margin-top:20px;
        background:rgb(94, 95, 134);
        font-size: large;
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
<div class="text-center">
APPLICANT
</div>
    <?php
    // Include config file
    require_once "config.php";
    $name=$_GET['name'];
    // Attempt select query execution
    $sql = "SELECT * FROM loge";
    if($result = $conn->query($sql)){
    if($result->rowCount() > 0){
        echo '<table class="table table-bordered table-striped">';
            echo "<thead>";
                echo "<tr>";
                    echo "<th>APPLIED</th>";
                    echo "<th>STATUS</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while($row = $result->fetch()){
                echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
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


print <<<_HTML_
<div class="text-center">
    <!-- Button HTML (to Trigger Modal) -->
	<a href="appl.php?name=$name " class="trigger-btn" data-toggle="modal">APPLY TO JOBS!!!</a>
</div>
<div class="text-center">
    <!-- Button HTML (to Trigger Modal) -->
	<a href="index.html" class="trigger-btn" data-toggle="modal">LOGOUT</a>
</div>
_HTML_;

unset($conn);

?>
</body>
</html>