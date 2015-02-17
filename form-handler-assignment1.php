<?php

//form variables
$fName = "";
$lName = "";
$yob = 0;
$grade = 0;
$siblings = 0;
$bed = 0;
$wake_up = 0;
$homework = 0;
$tv = 0;
$computer = 0;
$family = 0;
$friends = 0;
$yearsLeft = 0;
$emailAddress = "w0265131@nscc.ca";

//handling text inputs
    if($_POST['fName'] !== " "){
        $fName = $_POST['fName'];
    }
    if($_POST['lName'] !== " "){
        $lName = $_POST['lName'];     
    }
//handling form selects
    //yob selection
    if(isset($_POST['yob'])) 
    {
       $yob = $_POST['yob'];
    }else{
        $yob = "No Year of Birth Selected";
    }
    //current school year selection
    if(isset($_POST['grade'])) 
    {
       $grade = $_POST['grade'];
    }else{
        $grade = "No School Grade Selected";
    }
    //siblings selection
    if(isset($_POST['siblings'])) 
    {
       $siblings = $_POST['siblings'];
    }else{
        $siblings = "No Number of Siblings Selected";
    }
    //bed selection
    if($_POST['sleep'] !== " "){
        $bed = $_POST['sleep'];
    }
    //wake_up selection
    if($_POST['awake'] !== " "){
        $wake_up = $_POST['awake'];     
    }
    //homework selection
    if(isset($_POST['homework'])) 
    {
       $homework = $_POST['homework'];
    }else{
        $homework = "No Homework Hours Selected";
    }
    //TV selection
    if(isset($_POST['tv'])) 
    {
       $tv = $_POST['tv'];
    }else{
        $tv = "No TV Hours Selected";
    }
    //computer selection
    if(isset($_POST['computer'])) 
    {
       $computer = $_POST['computer'];
    }else{
        $computer = "No Computer Hours Selected";
    }
    //family selection
    if(isset($_POST['family'])) 
    {
       $family = $_POST['family'];
    }else{
        $family = "No Family Hours Selected";
    }
    //friends selection
    if(isset($_POST['friends'])) 
    {
       $friends = $_POST['friends'];
    }else{
        $friends = "No Friends Hours Selected";
    }
    //years left
    switch ($grade) {
        case 7:
            $yearsLeft = 6;
            break;
        case 8:
            $yearsLeft = 5;
            break;
        case 9:
            $yearsLeft = 4;
            break;
        case 10:
            $yearsLeft = 3;
            break;
        case 11:
            $yearsLeft = 2;
            break;
        case 12:
            $yearsLeft = 1;
            break;
        default:
            echo "You forgot to enter what grade you are in!";
    }

    function getHomeworkHours($yearsLeft, $homework){

        return ($yearsLeft * 365) * $homework;
    };
    function getScreenHours($yearsLeft, $tv, $computer){

        return ($yearsLeft * 365) * ($tv + $computer);
    };
    function getScreenPercentage($tv, $computer, $bed, $wake_up){
        $scrPct = (24 - $bed) / ($tv + $computer);

        return $scrPct . "%";
    };


    $msg = "<html><body><table style='background: red; height: 800px; width: 800px;'><tr><td>";
    $msg .= "E-MAIL SENT FROM " . $emailAddress . "\n";
    $msg .= "</td></tr><tr><td colspan='2'>";
    $msg .= "Results:";
    $msg .= "</td></tr><tr><td>";
    $msg .= "Full Name:";
    $msg .= "</td><td>";
    $msg .= $fName . " " . $lName;
    $msg .= "</td></tr><tr><td>";
    $msg .= "Year of Birth";
    $msg .= "</td><td>";
    $msg .= $yob;
    $msg .= "</td></tr><tr><td>";
    $msg .= "Number of Siblings";
    $msg .= "</td><td>";
    $msg .= $siblings;
    $msg .= "</td></tr>";
    $msg .= "<tr><td>";
    $msg .= "Current Grade";
    $msg .= "</td><td>";
    $msg .= $grade;
    $msg .= "</td></tr>";
    $msg .= "<tr><td>";
    $msg .= "Years Left";
    $msg .= "</td><td>";
    $msg .= $yearsLeft;
    $msg .= "</td></tr>";
    $msg .= "<tr><td>";
    $msg .= "Hours Spent Doing Homework";
    $msg .= "</td><td>";
    $msg .= getHomeworkHours($yearsLeft, $homework);
    $msg .= "</td></tr>";
    $msg .= "<tr><td>";
    $msg .= "Hours Spent In Front Of Screen";
    $msg .= "</td><td>";
    $msg .= getScreenHours($yearsLeft, $tv, $computer);
    $msg .= "</td></tr>";
    $msg .= "<tr><td>";
    $msg .= "% of Awake Time Spent in Front of a Screen";
    $msg .= "</td><td>";
    $msg .= getScreenPercentage($tv, $computer, $bed, $wake_up);
    $msg .= "</td></tr>";
    $msg .= "</table></body></html>";
    $to = $emailAddress;
    $subject = $fName . " " . $lName . "'s Survey Results";
    $mailheaders = "From: High School Time Tracker Form";
    mail($to, $subject, $msg, $mailheaders);

?>
<!--
A message saying "Great! Thanks [firstname] for responding to our survey".
A display of the students details formatted suitably (just name, birth-year, current school year and number of siblings) and make use of external CSS.
Use the students' current year at school to work out how many years they have left at school, and from this, how many hours they will spend doing homework or watching a screen until they finish school.
Work out the percentage of awake time spent in front of a screen.
An email should be sent to a set email address with a subject of, for example, "David Terry's Survey results." and a message that includes the data entered and your calculations.
The email should be formatted suitably using HTML and CSS and the data should be formated in a table.
-->
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

<div id="output" class="container col-md-16">
    <div>

    </div>
  <h2>A Summary of your High School Time Tracker Submission</h2>
    <div>
        Great! Thanks <?php echo "<strong>".$fName."</strong>"; ?> for responding to our survey!
        <br/><br/>
        <h4>E-mail sent:</h4>
        <p><strong>Your Name : </strong><?php echo $fName . " " . $lName ?></p>
        <p><strong>Your E-Mail Address : </strong><?php echo $emailAddress ?></p>
        <br/>
        <strong>SUMMARY</strong>
        <br/><br/>
        <strong>Full Name :</strong> <?php echo $fName . " " . $lName; ?>.
        <br/>
        <strong>Year of Birth :</strong> <?php echo $yob; ?>.
        <br/>
        <strong>Current School Grade :</strong> <?php echo $grade; ?>.
        <br/>
        <strong>Number of Siblings :</strong> <?php echo $siblings; ?> Siblings.
        <br/>
        <strong>Number of School Years Left :</strong> <?php echo $yearsLeft; ?> Years Left.
        <br/>
        <strong>Number of Hours Spent Doing Homework :</strong> <?php echo getHomeworkHours($yearsLeft, $homework); ?> Hours.
        <br/>
        <strong>Number of Hours Watching a Screen :</strong> <?php echo getScreenHours($yearsLeft, $tv, $computer); ?> Hours.
        <br/>
        <strong>Percentage of Awake Time Spent in Front of a Screen :</strong> <?php echo getScreenPercentage($tv, $computer, $bed, $wake_up); ?>.
    </div>
</div>
</body>
</html>