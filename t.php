<?php
if(isset($_POST['submit'])) 
{ 
    $name = $_POST['name'];
    echo "User Has submitted the form and entered this name : <b> $name </b>";
    echo "<br>You can use the following form again to enter a new name."; 
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<body>


                        <!-- BEGIN FILTER BY CATEGORY -->
                        <h4>Experience in years:</h4>
                        <div class="form-group col-md-6">
                    
                          <input type="number" class="form-control" placeholder="Experience" required="required">
                        </div>
                        <h4>Degree:</h4>
                        <div class="checkbox">
                          <label><input type="checkbox" class="icheck" placeholder="post" > Postgraduate</label>
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox" class="icheck" placeholder="under" > Undergraduate</label>
                        </div>
                        <!-- END FILTER BY CATEGORY -->
                        
                        <h4>By Gender:</h4>
                        <div class="checkbox">
                          <label><input type="checkbox" class="icheck" placeholder="male" > Male</label>
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox" class="icheck" placeholder="Female" > Female</label>
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox" class="icheck" placeholder="Other" > Other</label>
                        </div>
                        
                        
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