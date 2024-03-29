<?php
  $coursesArray = array('Accounting 11', 
                        'Biology 11',
                        'Communications 12',
                        'Digital Arts 11',
                        'English 12',
                        'French 11',
                        'History 12',
                        'Law 12',
                        'Physical Education 10',
                        'Robotics 11',
                  );
?>
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
      <form role="form" method="post" action="form-handler-assignment1.php" enctype="multipart/form-data">
        <!-- STUDENT INFO -->
        <div id="info" class="container col-md-16">
          <h2>Student Info</h2>
          <small>* Required</small>
              <!-- First Name --> 
            <div class="form-group">
              <div class="input-group" >
                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                <input type="text" class="form-control" name="fName" placeholder="First Name">
              </div>
              <span class="error">* <?php if(isset($_GET['firstNameError'])){ echo $_GET['firstNameError'];} ?></span>
            </div> 
              <!-- Last Name -->
            <div class="form-group">
              <div class="input-group" >
                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                <input type="text" class="form-control" name="lName" placeholder="Last Name">
              </div>
              <span class="error">* <?php if(isset($_GET['lastNameError'])){ echo $_GET['lastNameError'];}?></span>
            </div>
              <!-- Email -->
            <div class="form-group">
              <div class="input-group" >
                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                <input type="text" class="form-control" name="email" placeholder="Email">
              </div>
              <span class="error">* <?php if(isset($_GET['emailError'])){ echo $_GET['emailError'];} ?></span>
            </div>
              <!-- DOB -->
            <div class="form-group">
              <div class="input-group" >
                <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
                <input type="text" class="form-control" name="dob" placeholder="YYYY-MM-DD">
              </div>
            </div>
            <span class="error">* <?php if(isset($_GET['dobError'])){ echo $_GET['dobError'];} ?></span>
          </div>
            <!-- COURSE SELECTION -->
          <div id="course" class="container col-md-16">
            <h2>Course Selection</h2>
              <!-- Course 1 -->
              <div class="form-group">
                <select class="form-control" name="course1">
                    <option value="" selected disabled>Course 1</option>
                    <?php
                        foreach ($coursesArray as $value){
                            echo "<option value='" . $value . "'>" . $value . "</option>";
                        }
                    ?>
                </select>
                <span class="error">* <?php if(isset($_GET['course1Error'])){ echo $_GET['course1Error'];} ?></span>
               </div>
              <!-- Course 2 -->
              <div class="form-group">
                <select class="form-control" name="course2">
                    <option value="" selected disabled>Course 2</option>
                    <?php
                        foreach ($coursesArray as $value){
                            echo "<option value='" . $value . "'>" . $value . "</option>";
                        }
                    ?>
                </select>
                <span class="error">* <?php if(isset($_GET['course2Error'])){ echo $_GET['course2Error'];} ?></span>
              </div>
              <!-- Course 3 -->
              <div class="form-group">
                <select class="form-control" name="course3">
                    <option value="" selected disabled>Course 3</option>
                    <?php
                        foreach ($coursesArray as $value){
                            echo "<option value='" . $value . "'>" . $value . "</option>";
                        }
                    ?>
                </select>
                <span class="error">* <?php if(isset($_GET['course3Error'])){ echo $_GET['course3Error'];} ?></span>
              </div>
              <!-- Course 4 -->
              <div class="form-group">
                <select class="form-control" name="course4">
                    <option value="" selected disabled>Course 4</option>
                    <?php
                        foreach ($coursesArray as $value){
                            echo "<option value='" . $value . "'>" . $value . "</option>";
                        }
                    ?>
                </select>
                <span class="error">* <?php if(isset($_GET['course4Error'])){ echo $_GET['course4Error'];} ?></span>
              </div>                                    
          </div>
        <!-- IMAGE UPLOAD -->
        <div id="info" class="container col-md-16">
          <h2>Student Photo</h2>
              <!-- Image Upload --> 
            <div class="form-group">
              <span class="btn btn-default btn-file"><span class="glyphicon glyphicon-picture"></span> Browse <input type="file" id="imageToUpload" name="imageToUpload"></span>
              <span class="error"><?php if(isset($_GET['imageError'])){ echo $_GET['imageError'];} ?></span>
            </div> 
          </div>          
          <input id="submit" type="submit" name="submit" class="btn btn-default" value="Submit">
      </form>
</body>
</html>