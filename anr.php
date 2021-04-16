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
          if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $hmm =$_POST['gender'];
            echo "User Has submitted the form and entered this name : <b> $name </b>";
            echo "User Has submitted the form and entered this name : <b> $hmm </b>";
            echo "<br>You can use the following form again to enter a new name.";
          
          // Include config file
          require_once "config.php";

          // Attempt select query execution
          $sql = "SELECT * FROM loge";
          if ($result = $conn->query($sql)) {
            if ($result->rowCount() > 0) {
              echo '<table class="table table-bordered table-striped">';
              echo "<thead>";
              echo "<tr>";
              echo "<th>USER</th>";
              echo "<th>PASSWORD</th>";
              echo "<th>OPTIONS</th>";
              echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
              while ($row = $result->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>";
                echo '<a href="read.php?id=' . $row['name'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                echo '<a href="delete.php?id=' . $row['name'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
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
          ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <!-- BEGIN FILTER BY CATEGORY -->
  <h4>Experience in years:</h4>
  <div class="form-group col-md-6">

    <input type="number" class="form-control" placeholder="Experience" >
  </div>


  <h4>Degree:</h4>
  <input type="radio" id="Postgraduate" name="degree" value="PG">
  <label for="Postgraduate">Postgraduate</label><br>
  <input type="radio" id="Undergraduate" name="degree" value="UG">
  <label for="Undergraduate">Undergraduate</label><br>
  <!-- END FILTER BY CATEGORY -->

  <h4>By Gender:</h4>
  <input type="radio" id="male" name="gender" value="male">
  <label for="male">Male</label><br>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label><br>
  <input type="radio" id="other" name="gender" value="other">
  <label for="other">Other</label>


  <!-- BEGIN FILTER BY DATE -->
  <article class="card-group-item">
    <header class="card-header">
      <h4 class="title">Age Range: </h4>
    </header>
    <div class="filter-content">
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Min</label>
            <input type="number" class="form-control" id="inputEmail4" placeholder="0">
          </div>
          <div class="form-group col-md-6 text-right">
            <label>Max</label>
            <input type="number" class="form-control" placeholder="60">
          </div>
        </div>
      </div> <!-- card-body.// -->
    </div>
  </article> <!-- card-group-item.// -->




  <input type="text" name="name"><br>
  <input type="submit" name="submit" value="Submit Form"><br>
</form>