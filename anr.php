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
      background: #AFEEEE;
    }

    .formmith {
      color: #999;
      width: 500px;
      border-radius: 3px;
      margin-bottom: 15px;
      background: #AFEEEE;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      padding: 30px;
    }

    .new1 {
      width: 100pxs;
    }

    h2 {
      color: #999;
      margin-bottom: 10px;
    }

    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 90%;
      margin: auto;

    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
      background-color: #ddd;
    }

    #customers tr:nth-child(even) {
      background-color: #191970;
    }

    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: rgb(50, 115, 220);
      ;
      color: white;
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
                echo '<table id="customers">';
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


          $hmm = $_SERVER['PHP_SELF'];
          echo <<<_HTML_
<br><a href="admin.php" >GO BACK</a><br>
<div class="formmith">
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
    <br>
    <input class="new1" type="submit" name="submit" value="Filter"><br>
  </div>
    </form>

_HTML_;
          ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>