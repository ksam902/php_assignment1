<?php

//form variables
$fName = "";
$lName = "";
$email = "";
$dob = "";
$course1 = "";
$course2 = "";
$course3 = "";
$course4 = "";
$emailAddress = "w0265131@nscc.ca";

//handling text inputs
    if($_POST['fName'] !== " "){
        $fName = $_POST['fName'];
    }
    if($_POST['lName'] !== " "){
        $lName = $_POST['lName'];     
    }
    if($_POST['email'] !== " "){
        $email = $_POST['email'];     
    }
    if($_POST['dob'] !== " "){
        $dob = $_POST['dob'];     
    }
//handling form selects
    //course 1 selection
    if(isset($_POST['course1'])) 
    {
       $course1 = $_POST['course1'];
    }else{
        $course1 = "No Course Selected";
    }
    //course 2 selection
    if(isset($_POST['course2'])) 
    {
       $course2 = $_POST['course2'];
    }else{
        $course2 = "No Course Selected";
    }    
    //course 3 selection
    if(isset($_POST['course3'])) 
    {
       $course3 = $_POST['course3'];
    }else{
        $course3 = "No Course Selected";
    }
    //course 4 selection
    if(isset($_POST['course4'])) 
    {
       $course4 = $_POST['course4'];
    }else{
        $course4 = "No Course Selected";
    }

    // $msg = "<html><body><table style='background: red; height: 800px; width: 800px;'><tr><td>";
    // $to = $emailAddress;
    // $subject = $fName . " " . $lName . "'s Survey Results";
    // $mailheaders = "From: High School Time Tracker Form";
    // mail($to, $subject, $msg, $mailheaders);

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
        <h2>Confirmation <small>:  A Summary of Your Student Course Tracker</small></h2>
      </div>
    </div>    
    <div id="summary" class="container col-md-16">
        <div id="container">
            <h4>Great! Thanks <strong><?php echo $fName; ?></strong> for responding to our survey!</h4>
            <p><strong>Student's Name : </strong><?php echo $fName . " " . $lName ?></p>
            <p><strong>Student's E-Mail Address : </strong><?php echo $email ?></p>
            <br/>
            <strong>SUMMARY</strong>
            <br/><br/>
            <div id="studentInfo">
                <strong>Student Info</strong><br/><br/>           
                <p><strong>First Name :</strong> <?php echo $fName; ?>.</p>
                <p><strong>Last Name :</strong> <?php echo $lName; ?>.</p>
                <p><strong>Email :</strong> <?php echo $email; ?>.</p>
                <p><strong>D.O.B. :</strong> <?php echo $dob; ?>.</p>
            </div>
            <div id="courseSelection">
                <strong>Course Selection</strong><br/><br/> 
                <p><strong>Course 1 :</strong> <?php echo $course1; ?>.</p>
                <p><strong>Course 2 :</strong> <?php echo $course2; ?>.</p>
                <p><strong>Course 3 :</strong> <?php echo $course3; ?>.</p>
                <p><strong>Course 4 :</strong> <?php echo $course4; ?>.</p>
            </div>
            <div id="imageUpload">
                <strong>Image Uploaded : </strong>
            </div>   
        </div>
    </div>
</body>
</html>