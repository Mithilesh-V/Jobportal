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

    .wrapper {
      width: 600px;
      margin: 0 auto;
    }

    table tr td:last-child {
      width: 120px;
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
            <h2 class="pull-left">Accept Or Reject Applicants</h2>
          </div>
          <?php
         error_reporting(E_ALL ^ E_WARNING); 
          if (isset($_POST['submit'])) {
       
            $gen = $_POST['gender'];
            $deg = $_POST['degree'];
            $pexp = $_POST['p_exp'];

            // Include config file
            require_once "config.php";

            // Attempt select query execution
            $sql = "SELECT * FROM showanr('$gen','$deg',$pexp)";
            if ($result = $conn->query($sql)) {
              if ($result->rowCount() > 0) {
                echo '<table class="table table-bordered table-striped">';
                echo "<thead>";
                echo "<tr>";
                echo "<th>Job Title</th>";
                echo "<th>Location</th>";
                echo "<th>Salary</th>";
                echo "<th>Name</th>";
                echo "<th>Age</th>";
                echo "<th>Gender</th>";
                echo "<th>Prof. Exp.</th>";
                echo "<th>Options</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = $result->fetch()) {
                  echo "<tr>";
                  echo "<td>" . $row['t1'] . "</td>";
                  echo "<td>" . $row['t2'] . "</td>";
                  echo "<td>" . $row['t3'] . "</td>";
                  echo "<td>" . $row['t4'] . "</td>";
                  echo "<td>" . $row['t5'] . "</td>";
                  echo "<td>" . $row['t6'] . "</td>";
                  echo "<td>" . $row['t7'] . "</td>";
                  echo '<td>';
                  echo '<a href="acptapp.php?name=' . $row['t8'] . '&j_id=' . $row['t9'] . '" class="mr-3" title="ACCEPT" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                  echo '<a href="rmapp.php?name=' . $row['t8'] . '&j_id=' . $row['t9'] . '" title="REJECT" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
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

            // Close connection
            unset($conn);
          }
          
        
          $hmm=$_SERVER['PHP_SELF'];
echo <<<_HTML_
<br><a href="admin.php" >GO BACK</a><br>
  <form method="post" action= "$hmm">

    <h4>Degree:</h4>
    <input type="radio" id="Postgraduate" name="degree" value="PG">
    <label for="Postgraduate">Postgraduate</label><br>
    <input type="radio" id="Undergraduate" name="degree" value="UG">
    <label for="Undergraduate">Undergraduate</label><br>


    <h4>By Gender:</h4>
    <input type="radio" id="male" name="gender" value="M">
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="F">
    <label for="female">Female</label><br>
    <input type="radio" id="other" name="gender" value="O">
    <label for="other">Other</label>

    <h4 class="title">Min Professional Exp: </h4>
    <input type="number" class="form-control" name="p_exp" placeholder="In years" value=0>
    <input type="submit" name="submit" value="Filter"><br>
  </form>

_HTML_;
?>
</div>
      </div>
    </div>
  </div>
</body>

</html>