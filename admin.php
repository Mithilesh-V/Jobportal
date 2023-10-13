<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ADMIN</title>
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
        font-style:'Varela Round';
        background:#AFEEEE;
        font-size: large;
    }
    
    .btn {
        margin-bottom: 5px;
    }
    
    .grid {
        position: relative;
        width: 80%;
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
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<div class="text-center">
ADMINISTRATOR
</div>
<div>
    <br><br><br>
    <?php
    // Include config file
    use "config.php";

    // Attempt select query execution
    $sql = "SELECT * FROM suma()";
    if($result = $conn->query($sql)){
    if($result->rowCount() > 0){
        echo '<table id = "customers" >';
            echo "<thead>";
                echo "<tr>";
                    echo "<th>APPLIED</th>";
                    echo "<th>ACCEPTED</th>";
                    echo "<th>REJECTED</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while($row = $result->fetch()){
                echo "<tr>";
                    echo "<td>" . $row['app'] . "</td>";
                    echo "<td>" . $row['acpt'] . "</td>";
                    echo "<td>" . $row['rjct'] . "</td>";
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
<br><br><br><br><br>
</div>
<div class="modal-footer" >
<div class="text-left">
    <!-- Button HTML (to Trigger Modal) -->
	<a href="anr.php" class="trigger-btn" >Accept And Reject Applicants</a>
</div>
<div class="text-center">
    <!-- Button HTML (to Trigger Modal) -->
	<a href="addjobs.php" class="trigger-btn" >Add Jobs</a>
</div>
<div class="text-right">
    <!-- Button HTML (to Trigger Modal) -->
	<a href="index.html" class="trigger-btn" >LOGOUT</a>
</div>
</div>
</body>
</html>
