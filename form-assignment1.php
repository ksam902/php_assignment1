<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP : Assignment 1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="stylesheet.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="jumbotron">
      <div class="container text-center">
        <h2>Tracker <small>: Student Courses</small></h2>
      </div>
    </div>
      <form role="form" method="post" action="form-handler-assignment1.php">
        <!-- STUDENT INFO -->
        <div id="info" class="container col-md-16">
          <h2>Student Info</h2>
              <!-- First Name --> 
            <div class="form-group">
              <div class="input-group" >
                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                <input type="text" class="form-control" name="fName" placeholder="First Name">
              </div>
            </div> 
              <!-- Last Name -->
            <div class="form-group">
              <div class="input-group" >
                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                <input type="text" class="form-control" name="lName" placeholder="Last Name">
              </div>
            </div>
              <!-- Email -->
            <div class="form-group">
              <div class="input-group" >
                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                <input type="text" class="form-control" name="email" placeholder="Email">
              </div>
            </div>
              <!-- DOB -->
            <div class="form-group">
              <div class="input-group" >
                <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
                <input type="text" class="form-control" name="email" placeholder="DOB">
              </div>
            </div>
          </div>
            <!-- COURSE SELECTION -->
          <div id="course" class="container col-md-16">
            <h2>Course Selection</h2>
              <!-- Course 1 -->
            <select class="form-control" name="course1">
                <option value="" selected disabled>Course 1</option>
                <?php
                    for($i=0; $i<=5; $i++){
                        echo "<option value='" . $i . "'>" . $i . "</option>";
                    }
                ?>
            </select>
              <!-- Course 2 -->
            <select class="form-control" name="course2">
                <option value="" selected disabled>Course 2</option>
                <?php
                    for($i=0; $i<=5; $i++){
                        echo "<option value='" . $i . "'>" . $i . "</option>";
                    }
                ?>
            </select>
              <!-- Course 3 -->
            <select class="form-control" name="course3">
                <option value="" selected disabled>Course 3</option>
                <?php
                    for($i=0; $i<=5; $i++){
                        echo "<option value='" . $i . "'>" . $i . "</option>";
                    }
                ?>
            </select>
              <!-- Course 4 -->
            <select class="form-control" name="course4">
                <option value="" selected disabled>Course 4</option>
                <?php
                    for($i=0; $i<=5; $i++){
                        echo "<option value='" . $i . "'>" . $i . "</option>";
                    }
                ?>
            </select>                                    
          </div>
        <!-- IMAGE UPLOAD -->
        <div id="info" class="container col-md-16">
          <h2>Student Photo</h2>
              <!-- Image Upload --> 
            <div class="form-group">
              <span class="btn btn-default btn-file"><span class="glyphicon glyphicon-picture"></span> Browse <input type="file"></span>
            </div> 
          </div>          
          <input id="submit" type="submit" name="submit" class="btn btn-default" value="Submit">
      </form>
</body>
</html>